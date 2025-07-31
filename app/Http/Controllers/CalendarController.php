<?php

namespace App\Http\Controllers;
use DateTime;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\ExpirationDate;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function show(Request $request, $month = null, $year = null, $selected_date = null){
        $month = $month ?? $request->input('month', now()->month);
        $year = $year ?? $request->input('year', now()->year);
        $selectedDate = $selected_date ?? $request->input('selected_date', null);
        $date = new DateTime("$year-$month-01");

        $daysInMonth = $date->format('t');
        $firstDay = $date->format('w');

        $userId = Auth::id();

        $expirations = Item::whereHas('expirationDates', function ($query) use ($month, $year, $userId) {
            $query->whereMonth('expiration_date', $month)
                ->whereYear('expiration_date', $year)
                ->where('user_id', $userId);
        })
        ->with(['expirationDates' => function ($query) use ($month, $year, $userId) {
            $query->whereMonth('expiration_date', $month)
                ->whereYear('expiration_date', $year)
                ->where('user_id', $userId);
        }])
        ->get()
        ->pluck('expirationDates')
        ->flatten()
        ->pluck('expiration_date')
        ->unique()
        ->values()
        ->toArray();

        $selectedItems = [];
        if ($selectedDate) {
            $selectedItems = Item::whereHas('expirationDates', function ($query) use ($selectedDate, $userId) {
                $query->whereDate('expiration_date', $selectedDate)
                      ->where('user_id', $userId);
            })
            ->with(['subcategory', 'expirationDates' => function ($query) use ($selectedDate, $userId) {
                $query->whereDate('expiration_date', $selectedDate)
                      ->where('user_id', $userId);
            }])
            ->get();
        }
        $prevDate = (clone $date)->modify('-1 month');
        $nextDate = (clone $date)->modify('+1 month');
        $prevMonth = $prevDate->format('m');
        $prevYear = $prevDate->format('Y');
        $nextMonth = $nextDate->format('m');
        $nextYear = $nextDate->format('Y');

        return view('calendar.calendarPage', compact('date', 'daysInMonth', 'firstDay', 'expirations', 'selectedDate', 'selectedItems','prevMonth', 'prevYear', 'nextMonth', 'nextYear'));
    }
}
