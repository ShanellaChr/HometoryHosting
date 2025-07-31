<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExpirationDateSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('expiration_dates')->insert([
            ['user_id' => 2, 'item_id' => 1,  'expiration_date' => '2026-01-22', 'qty' => 3],
            ['user_id' => 2, 'item_id' => 1,  'expiration_date' => '2026-03-03', 'qty' => 1],
            ['user_id' => 2, 'item_id' => 1,  'expiration_date' => '2025-12-19', 'qty' => 2],
            ['user_id' => 2, 'item_id' => 2,  'expiration_date' => '2026-02-10', 'qty' => 4],
            ['user_id' => 2, 'item_id' => 3,  'expiration_date' => '2025-12-28', 'qty' => 2],
            ['user_id' => 2, 'item_id' => 4,  'expiration_date' => '2026-01-18', 'qty' => 3],
            ['user_id' => 2, 'item_id' => 5,  'expiration_date' => '2025-06-09', 'qty' => 1], 
            ['user_id' => 2, 'item_id' => 5,  'expiration_date' => '2025-09-22', 'qty' => 1],
            ['user_id' => 2, 'item_id' => 6,  'expiration_date' => '2026-02-08', 'qty' => 2],
            ['user_id' => 2, 'item_id' => 7,  'expiration_date' => '2025-08-12', 'qty' => 1], 
            ['user_id' => 2, 'item_id' => 8,  'expiration_date' => '2025-05-05', 'qty' => 2], 
            ['user_id' => 2, 'item_id' => 8,  'expiration_date' => '2025-10-20', 'qty' => 5],
            ['user_id' => 2, 'item_id' => 9,  'expiration_date' => '2025-07-07', 'qty' => 6], 
            ['user_id' => 2, 'item_id' => 10, 'expiration_date' => '2025-08-17', 'qty' => 2], 
            ['user_id' => 2, 'item_id' => 11, 'expiration_date' => '2026-01-27', 'qty' => 1],
            ['user_id' => 2, 'item_id' => 12, 'expiration_date' => '2026-03-07', 'qty' => 4],
            ['user_id' => 2, 'item_id' => 13, 'expiration_date' => '2025-05-25', 'qty' => 1], 
            ['user_id' => 2, 'item_id' => 13, 'expiration_date' => '2025-09-29', 'qty' => 3],
            ['user_id' => 2, 'item_id' => 14, 'expiration_date' => '2026-01-05', 'qty' => 9],
            ['user_id' => 2, 'item_id' => 15, 'expiration_date' => '2026-03-03', 'qty' => 3],
            ['user_id' => 2, 'item_id' => 16, 'expiration_date' => '2025-06-05', 'qty' => 6], 
            ['user_id' => 2, 'item_id' => 16, 'expiration_date' => '2025-10-03', 'qty' => 3],
            ['user_id' => 2, 'item_id' => 17, 'expiration_date' => '2026-03-20', 'qty' => 2],
            ['user_id' => 2, 'item_id' => 18, 'expiration_date' => '2026-04-01', 'qty' => 3],
            ['user_id' => 2, 'item_id' => 19, 'expiration_date' => '2026-02-17', 'qty' => 2],
            ['user_id' => 2, 'item_id' => 20, 'expiration_date' => '2026-02-12', 'qty' => 3],
            ['user_id' => 2, 'item_id' => 21, 'expiration_date' => '2026-03-08', 'qty' => 1],
            ['user_id' => 2, 'item_id' => 22, 'expiration_date' => '2025-07-02', 'qty' => 1], 
            ['user_id' => 2, 'item_id' => 22, 'expiration_date' => '2025-09-08', 'qty' => 2],
            ['user_id' => 2, 'item_id' => 23, 'expiration_date' => '2025-06-21', 'qty' => 2], 
            ['user_id' => 2, 'item_id' => 23, 'expiration_date' => '2025-10-18', 'qty' => 2],
            ['user_id' => 2, 'item_id' => 24, 'expiration_date' => '2026-01-29', 'qty' => 2],
            ['user_id' => 2, 'item_id' => 25, 'expiration_date' => '2026-03-19', 'qty' => 10],
            ['user_id' => 2, 'item_id' => 26, 'expiration_date' => '2026-02-22', 'qty' => 1],
        ]);
    }
}
