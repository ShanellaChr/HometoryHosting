<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Categories;
use App\Models\Subcategories;
use App\Models\ExpirationDate;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::with(['category', 'subCategory', 'expirationDates'])
            ->where('user_id', Auth::id());

        if ($request->filled('category')) {
            $category = Categories::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        $items = $query->get()->sortBy(function ($item) {
            return optional($item->expirationDates->sortBy('expiration_date')->first())->expiration_date;
        });

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 9;
        $pagedItems = new LengthAwarePaginator(
            $items->forPage($currentPage, $perPage)->values(),
            $items->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('myInventory.myInventoryPage', [
            'items' => $pagedItems,
            'selectedCategory' => $request->category
        ]);
    }

    public function create()
    {
        return view('myInventory.crudItemPage', ['mode' => 'create']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required',
            'subcategory' => 'required',
            'location' => 'required|string|max:255',
            'note' => 'nullable|string',
            'date' => 'required|array',
            'date.*' => 'required|date',
            'qty' => 'required|array',
            'qty.*' => 'required|integer|min:1',
        ]);

        $category = Categories::where('category', $request->category)->first();

        $item = Item::create([
            'name' => $request->name,
            'category_id' => $category->id,
            'subcategory_id' => Subcategories::where('subcategory', $request->subcategory)->first()->id,
            'location' => $request->location,
            'note' => $request->note,
            'user_id' => Auth::id(),
        ]);

        foreach ($request->date as $index => $date) {
            $item->expirationDates()->create([
                'expiration_date' => $date,
                'qty' => $request->qty[$index] ?? 1,
                'user_id' => Auth::id(),
            ]);
        }

        $this->updateStatistics($item);

        return redirect()->route('item.index')->with('success', 'Item added successfully.');
    }

    public function show(string $slug)
    {
        $item = Item::with(['category', 'subCategory', 'expirationDates'])
            ->where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('myInventory.itemDetailPage', compact('item'));
    }

    public function edit(string $slug)
    {
        $item = Item::with('category', 'subcategory', 'expirationDates')
            ->where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('myInventory.crudItemPage', ['item' => $item, 'mode' => 'edit']);
    }

    public function update(Request $request, string $slug)
    {
        $item = Item::with('expirationDates')->where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $originalCategoryId = $item->category_id;
        $originalQty = $item->expirationDates->sum('qty');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'subcategory' => 'required|string',
            'location' => 'required|string',
            'note' => 'nullable|string',
            'date' => 'required|array',
            'date.*' => 'required|date',
            'qty' => 'required|array',
            'qty.*' => 'required|integer|min:1',
        ]);

        $item->update([
            'name' => $validated['name'],
            'category_id' => Categories::where('category', $validated['category'])->first()->id,
            'subcategory_id' => Subcategories::where('subcategory', $validated['subcategory'])->first()->id,
            'location' => $validated['location'],
            'note' => $validated['note'],
        ]);

        $item->expirationDates()->delete();

        foreach ($validated['date'] as $index => $expDate) {
            $item->expirationDates()->create([
                'expiration_date' => $expDate,
                'qty' => $validated['qty'][$index] ?? 1,
                'user_id' => $item->user_id,
            ]);
        }

        $this->updateStatistics($item, $originalCategoryId, $originalQty);

        return redirect()->route('item.detail', ['slug' => $item->slug])->with('success', 'Item updated successfully.');
    }

    public function destroy(string $slug)
    {
        $item = Item::with('expirationDates')->where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $currentMonth = Carbon::now()->startOfMonth();
        $deletedQty = $item->expirationDates->sum('qty');

        $item->expirationDates()->delete();
        $item->delete();

        Statistic::where([
            'user_id' => Auth::id(),
            'category_id' => $item->category_id,
            'month_year' => $currentMonth->format('Y-m-d'),
        ])->decrement('total_items', $deletedQty);

        return redirect()->route('item.index')->with('success', 'Item berhasil dihapus.');
    }

    public function expiredItems()
    {
        $today = Carbon::today();

        $expiredDates = ExpirationDate::with('item.category', 'item.subCategory')
            ->whereHas('item', fn($q) => $q->where('user_id', Auth::id()))
            ->whereDate('expiration_date', '<', $today)
            ->orderBy('expiration_date', 'asc')
            ->get();

        return view('myInventory.expiredItemPage', compact('expiredDates'));
    }

    public function deleteExpiration($id)
    {
        $exp = ExpirationDate::findOrFail($id);
        $item = $exp->item;

        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        $currentMonth = Carbon::now()->startOfMonth();
        $deletedQty = $exp->qty;
        $categoryId = $item->category_id;

        $exp->delete();

        if ($item->expirationDates()->count() === 0) {
            $item->delete();
        }

        Statistic::where([
            'user_id' => Auth::id(),
            'category_id' => $categoryId,
            'month_year' => $currentMonth->format('Y-m-d'),
        ])->decrement('total_items', $deletedQty);

        return redirect()->route('item.expired')->with('success', 'Expiration date deleted.');
    }

    private function updateStatistics(Item $item, $originalCategoryId = null, $originalQty = null)
    {
        $userId = $item->user_id;
        $month = Carbon::now()->startOfMonth()->format('Y-m-d');
        $newCategoryId = $item->category_id;
        $newQty = $item->expirationDates()->sum('qty');

        if ($originalCategoryId && $originalCategoryId != $newCategoryId) {
            $oldStat = Statistic::firstOrNew([
                'user_id' => $userId,
                'category_id' => $originalCategoryId,
                'month_year' => $month,
            ]);
            $oldStat->total_items = max(0, ($oldStat->exists ? $oldStat->total_items : 0) - ($originalQty ?? 0));
            $oldStat->save();

            // Buat nambah statistik kategori baru
            $newStat = Statistic::firstOrNew([
                'user_id' => $userId,
                'category_id' => $newCategoryId,
                'month_year' => $month,
            ]);
            $newStat->total_items = ($newStat->exists ? $newStat->total_items : 0) + $newQty;
            $newStat->save();
        } else {
            // Kategori tetap
            $diffQty = $newQty - ($originalQty ?? 0);

            $stat = Statistic::firstOrNew([
                'user_id' => $userId,
                'category_id' => $newCategoryId,
                'month_year' => $month,
            ]);

            $stat->total_items = ($stat->exists ? $stat->total_items : 0) + $diffQty;
            $stat->save();
        }
    }
}
