<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Statistic;
use App\Models\Item;
use App\Models\ExpirationDate;
use App\Models\Categories;
use Illuminate\Support\Carbon;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $monthParam = $request->query('month');

        // Validasi format bulan: YYYY-MM
        if ($monthParam && preg_match('/^\d{4}-\d{2}$/', $monthParam)) {
            $currentMonth = Carbon::parse($monthParam . '-01')->startOfMonth();
        } else {
            $currentMonth = now()->startOfMonth();
        }

        $latestMonth = now()->startOfMonth(); // Bulan ini
        $earliestMonth = $latestMonth->copy()->subMonths(11); // 12 bulan ke belakang

        $prevMonth = $currentMonth->copy()->subMonth();
        $nextMonth = $currentMonth->copy()->addMonth();

        // Pakai string compare karena Carbon::greaterThan bisa error kalau tipe beda
        $hasPrev = $currentMonth->format('Y-m') > $earliestMonth->format('Y-m');
        $hasNext = $currentMonth->format('Y-m') < $latestMonth->format('Y-m');

        $categories = Categories::all();

        $statistics = Statistic::where('user_id', Auth::id())
            ->whereYear('month_year', $currentMonth->year)
            ->whereMonth('month_year', $currentMonth->month)
            ->get();

        $totalItems = $statistics->sum('total_items');

        $cards = $categories->map(function ($category) use ($statistics, $totalItems) {
            $stat = $statistics->firstWhere('category_id', $category->id);
            $itemTotal = $stat ? $stat->total_items : 0;
            $percentage = $totalItems > 0 ? round(($itemTotal / $totalItems) * 100, 1) : 0;

            return [
                'title' => $category->category,
                'color' => $category->color ?? 'text-muted',
                'value' => $percentage,
                'desc' => $this->getCategoryDescription($category->category),
                'items' => $itemTotal,
            ];
        });

        return view('statistic.statisticPage', [
            'cards' => $cards,
            'currentMonth' => $currentMonth,
            'prevMonth' => $prevMonth,
            'nextMonth' => $nextMonth,
            'hasPrev' => $hasPrev,
            'hasNext' => $hasNext,
        ]);
    }


    private function getCategoryDescription($category)
    {
        return match ($category) {
            'Personal Care' => 'Makeup, body care, facial care, hair care, perfume, feminine hygiene & diapers, dental & oral care, and others.',
            'Foods' => 'Instant foods, snacks, canned foods, jams and cereals, and others.',
            'Beverages' => 'Dairy products, soft drinks, instant drinks, and others.',
            'Kitchen Needs' => 'Kitchen & dining equipment, spices, baking ingredients, cooking ingredients, and others.',
            'Household Essentials' => 'Care & cleaning, home supplies, air fresheners & dehumidifiers, pest & insect repellent, and others.',
            'Health Supplies' => 'Medicines, vitamins & supplements, medical devices, hygiene products, and others.',
            default => 'Other category.',
        };
    }

    public function recalculateStatisticsForUser($userId)
    {
        $months = $this->getAllActiveMonths($userId);

        foreach ($months as $month) {
            foreach (range(1, 6) as $categoryId) {
                $total = $this->calculateActiveItemsInMonth($userId, $categoryId, $month);

                Statistic::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'category_id' => $categoryId,
                        'month_year' => $month->format('Y-m-d'),
                    ],
                    [
                        'total_items' => $total,
                    ]
                );
            }
        }
    }

    private function calculateActiveItemsInMonth($userId, $categoryId, Carbon $month)
    {
        $endOfMonth = $month->copy()->endOfMonth();

        $items = Item::where('user_id', $userId)
            ->where('category_id', $categoryId)
            ->whereDate('created_at', '<=', $endOfMonth)
            ->with('expirationDates')
            ->get();

        $total = 0;

        foreach ($items as $item) {
            foreach ($item->expirationDates as $exp) {
                $total += $exp->qty;
            }
        }

        return $total;
    }


    private function getAllActiveMonths($userId)
    {
        $minCreated = Item::where('user_id', $userId)->min('created_at');
        $maxExpired = ExpirationDate::whereHas('item', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->max('expiration_date');

        if (!$minCreated || !$maxExpired) {
            return collect();
        }

        $months = collect();
        $current = Carbon::parse($minCreated)->startOfMonth();
        $end = Carbon::parse($maxExpired)->startOfMonth();

        while ($current <= $end) {
            $months->push($current->copy());
            $current->addMonth();
        }

        return $months;
    }

    public function updateStatisticForSingleItem($item)
    {
        $userId = $item->user_id;
        $categoryId = $item->category_id;
        $createdMonth = Carbon::parse($item->created_at)->startOfMonth();

        $months = collect();

        // Buat tambah bulan saat item dibuat
        $months->push($createdMonth);

        // Ambil bulan terakhir dari semua tanggal expired
        $lastExpiration = $item->expirationDates()->max('expiration_date');
        if ($lastExpiration) {
            $expMonth = Carbon::parse($lastExpiration)->startOfMonth();
            $current = $createdMonth->copy()->addMonth();

            while ($current <= $expMonth) {
                $months->push($current->copy());
                $current->addMonth();
            }
        }

        $months = $months->unique();

        foreach ($months as $month) {
            $total = $this->calculateActiveItemsInMonth($userId, $categoryId, $month);

            Statistic::updateOrCreate(
                [
                    'user_id' => $userId,
                    'category_id' => $categoryId,
                    'month_year' => $month->copy()->startOfMonth()->format('Y-m-d'),
                ],
                [
                    'total_items' => $total,
                ]
            );
        }
    }
}
