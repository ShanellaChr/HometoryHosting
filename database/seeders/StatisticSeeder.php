<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('statistics')->insert([
        //     // Juni 2025
        //     [ 'category_id' => 1, 'month_year' => '2025-06-01', 'total_items' => 210 ],
        //     [ 'category_id' => 2, 'month_year' => '2025-06-01', 'total_items' => 178 ],
        //     [ 'category_id' => 3, 'month_year' => '2025-06-01', 'total_items' => 154 ],
        //     [ 'category_id' => 4, 'month_year' => '2025-06-01', 'total_items' => 228 ],
        //     [ 'category_id' => 5, 'month_year' => '2025-06-01', 'total_items' => 125 ],
        //     [ 'category_id' => 6, 'month_year' => '2025-06-01', 'total_items' => 105 ],
        //     // Juli 2025
        //     [ 'category_id' => 1, 'month_year' => '2025-07-01', 'total_items' => 43 ],
        //     [ 'category_id' => 2, 'month_year' => '2025-07-01', 'total_items' => 36 ],
        //     [ 'category_id' => 3, 'month_year' => '2025-07-01', 'total_items' => 27 ],
        //     [ 'category_id' => 4, 'month_year' => '2025-07-01', 'total_items' => 80 ],
        //     [ 'category_id' => 5, 'month_year' => '2025-07-01', 'total_items' => 91 ],
        //     [ 'category_id' => 6, 'month_year' => '2025-07-01', 'total_items' => 12 ],
        //     // Agustus 2025
        //     [ 'category_id' => 1, 'month_year' => '2025-08-01', 'total_items' => 52 ],
        //     [ 'category_id' => 2, 'month_year' => '2025-08-01', 'total_items' => 41 ],
        //     [ 'category_id' => 3, 'month_year' => '2025-08-01', 'total_items' => 34 ],
        //     [ 'category_id' => 4, 'month_year' => '2025-08-01', 'total_items' => 62 ],
        //     [ 'category_id' => 5, 'month_year' => '2025-08-01', 'total_items' => 76 ],
        //     [ 'category_id' => 6, 'month_year' => '2025-08-01', 'total_items' => 24 ],
        //     // September 2025
        //     [ 'category_id' => 1, 'month_year' => '2025-09-01', 'total_items' => 63 ],
        //     [ 'category_id' => 2, 'month_year' => '2025-09-01', 'total_items' => 52 ],
        //     [ 'category_id' => 3, 'month_year' => '2025-09-01', 'total_items' => 38 ],
        //     [ 'category_id' => 4, 'month_year' => '2025-09-01', 'total_items' => 70 ],
        //     [ 'category_id' => 5, 'month_year' => '2025-09-01', 'total_items' => 84 ],
        //     [ 'category_id' => 6, 'month_year' => '2025-09-01', 'total_items' => 20 ],
        //     // Oktober 2025
        //     [ 'category_id' => 1, 'month_year' => '2025-10-01', 'total_items' => 56 ],
        //     [ 'category_id' => 2, 'month_year' => '2025-10-01', 'total_items' => 49 ],
        //     [ 'category_id' => 3, 'month_year' => '2025-10-01', 'total_items' => 34 ],
        //     [ 'category_id' => 4, 'month_year' => '2025-10-01', 'total_items' => 61 ],
        //     [ 'category_id' => 5, 'month_year' => '2025-10-01', 'total_items' => 78 ],
        //     [ 'category_id' => 6, 'month_year' => '2025-10-01', 'total_items' => 23 ],
        //     // November 2025
        //     [ 'category_id' => 1, 'month_year' => '2025-11-01', 'total_items' => 81 ],
        //     [ 'category_id' => 2, 'month_year' => '2025-11-01', 'total_items' => 67 ],
        //     [ 'category_id' => 3, 'month_year' => '2025-11-01', 'total_items' => 54 ],
        //     [ 'category_id' => 4, 'month_year' => '2025-11-01', 'total_items' => 88 ],
        //     [ 'category_id' => 5, 'month_year' => '2025-11-01', 'total_items' => 102 ],
        //     [ 'category_id' => 6, 'month_year' => '2025-11-01', 'total_items' => 26 ],
        //     // Desember 2025
        //     [ 'category_id' => 1, 'month_year' => '2025-12-01', 'total_items' => 50 ],
        //     [ 'category_id' => 2, 'month_year' => '2025-12-01', 'total_items' => 39 ],
        //     [ 'category_id' => 3, 'month_year' => '2025-12-01', 'total_items' => 30 ],
        //     [ 'category_id' => 4, 'month_year' => '2025-12-01', 'total_items' => 56 ],
        //     [ 'category_id' => 5, 'month_year' => '2025-12-01', 'total_items' => 65 ],
        //     [ 'category_id' => 6, 'month_year' => '2025-12-01', 'total_items' => 25 ],
        //     // jan 26
        //     [ 'category_id' => 1, 'month_year' => '2026-01-01', 'total_items' => 71 ],
        //     [ 'category_id' => 2, 'month_year' => '2026-01-01', 'total_items' => 58 ],
        //     [ 'category_id' => 3, 'month_year' => '2026-01-01', 'total_items' => 54 ],
        //     [ 'category_id' => 4, 'month_year' => '2026-01-01', 'total_items' => 81 ],
        //     [ 'category_id' => 5, 'month_year' => '2026-01-01', 'total_items' => 86 ],
        //     [ 'category_id' => 6, 'month_year' => '2026-01-01', 'total_items' => 38 ],
        //     // februari
        //     [ 'category_id' => 1, 'month_year' => '2026-02-01', 'total_items' => 48 ],
        //     [ 'category_id' => 2, 'month_year' => '2026-02-01', 'total_items' => 47 ],
        //     [ 'category_id' => 3, 'month_year' => '2026-02-01', 'total_items' => 26 ],
        //     [ 'category_id' => 4, 'month_year' => '2026-02-01', 'total_items' => 62 ],
        //     [ 'category_id' => 5, 'month_year' => '2026-02-01', 'total_items' => 74 ],
        //     [ 'category_id' => 6, 'month_year' => '2026-02-01', 'total_items' => 20 ],
        //     // maret
        //     [ 'category_id' => 1, 'month_year' => '2026-03-01', 'total_items' => 59 ],
        //     [ 'category_id' => 2, 'month_year' => '2026-03-01', 'total_items' => 53 ],
        //     [ 'category_id' => 3, 'month_year' => '2026-03-01', 'total_items' => 31 ],
        //     [ 'category_id' => 4, 'month_year' => '2026-03-01', 'total_items' => 68 ],
        //     [ 'category_id' => 5, 'month_year' => '2026-03-01', 'total_items' => 73 ],
        //     [ 'category_id' => 6, 'month_year' => '2026-03-01', 'total_items' => 23 ],
        //     // april
        //     [ 'category_id' => 1, 'month_year' => '2026-04-01', 'total_items' => 52 ],
        //     [ 'category_id' => 2, 'month_year' => '2026-04-01', 'total_items' => 41 ],
        //     [ 'category_id' => 3, 'month_year' => '2026-04-01', 'total_items' => 29 ],
        //     [ 'category_id' => 4, 'month_year' => '2026-04-01', 'total_items' => 55 ],
        //     [ 'category_id' => 5, 'month_year' => '2026-04-01', 'total_items' => 56 ],
        //     [ 'category_id' => 6, 'month_year' => '2026-04-01', 'total_items' => 27 ],
        //     // mei
        //     [ 'category_id' => 1, 'month_year' => '2026-05-01', 'total_items' => 60 ],
        //     [ 'category_id' => 2, 'month_year' => '2026-05-01', 'total_items' => 37 ],
        //     [ 'category_id' => 3, 'month_year' => '2026-05-01', 'total_items' => 36 ],
        //     [ 'category_id' => 4, 'month_year' => '2026-05-01', 'total_items' => 68 ],
        //     [ 'category_id' => 5, 'month_year' => '2026-05-01', 'total_items' => 74 ],
        //     [ 'category_id' => 6, 'month_year' => '2026-05-01', 'total_items' => 36 ],
        //     // juni 26
        //     [ 'category_id' => 1, 'month_year' => '2026-06-01', 'total_items' => 56 ],
        //     [ 'category_id' => 2, 'month_year' => '2026-06-01', 'total_items' => 39 ],
        //     [ 'category_id' => 3, 'month_year' => '2026-06-01', 'total_items' => 32 ],
        //     [ 'category_id' => 4, 'month_year' => '2026-06-01', 'total_items' => 70 ],
        //     [ 'category_id' => 5, 'month_year' => '2026-06-01', 'total_items' => 94 ],
        //     [ 'category_id' => 6, 'month_year' => '2026-06-01', 'total_items' => 21 ],
        // ]);
    }
}
