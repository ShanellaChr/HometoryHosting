<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
                [
                    // 1
                    'category' => 'Personal Care',
                    'slug' => 'personal-care',
                    'color' => 'pinkcategory'
                ],
                [
                    // 2
                    'category' => 'Foods',
                    'slug' => 'foods',
                    'color' => 'merahtuacategory'
                ],
                [
                    // 3
                    'category' => 'Beverages',
                    'slug' => 'beverages',
                    'color' => 'birucategory'
                ],
                [
                    // 4
                    'category' => 'Kitchen Needs',
                    'slug' => 'kitchen-needs',
                    'color' => 'coklatcategory'
                ],
                [
                    // 5
                    'category' => 'Household Essentials',
                    'slug' => 'household-essentials',
                    'color' => 'ijocategory'
                ],
                [
                    // 6
                    'category' => 'Health Supplies',
                    'slug' => 'health-supplies',
                    'color' => 'merahcategory'
                ],
            ]
        );
    }
}
