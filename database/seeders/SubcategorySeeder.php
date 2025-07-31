<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subcategories')->insert(
            [
                [
                    'id' => 1,
                    'subcategory' => 'Makeup & Cosmetics',
                    'img' => 'img/Personal Care - Makeup & Cosmetics.svg',
                    'category_id' => 1,
                ],
                [
                    'id' => 2,
                    'subcategory' => 'Body Care',
                    'img' => 'img/PC - Body Care.svg',
                    'category_id' => 1,
                ],
                [
                    'id' => 3,
                    'subcategory' => 'Facial Care',
                    'img' => 'img/PC - Facial Care.svg',
                    'category_id' => 1,
                ],
                [
                    'id' => 4,
                    'subcategory' => 'Hair Care',
                    'img' => 'img/Personal Care - Hair Care.svg',
                    'category_id' => 1,
                ],
                [
                    'id' => 5,
                    'subcategory' => 'Fragrances',
                    'img' => 'img/Personal Care - Fragrances.svg',
                    'category_id' => 1,
                ],
                [
                    'id' => 6,
                    'subcategory' => 'Feminine Hygiene & Diapers',
                    'img' => 'img/Personal Care - Feminine Hygiene & Diapers.svg',
                    'category_id' => 1,
                ],
                [
                    'id' => 7,
                    'subcategory' => 'Oral Care',
                    'img' => 'img/Personal Care - Oral Care.svg',
                    'category_id' => 1,
                ],
                [
                    'id' => 8,
                    'subcategory' => 'Others (Personal Care)',
                    'img' => 'img/Personal Care - Default.svg',
                    'category_id' => 1,
                ],
                [
                    'id' => 9,
                    'subcategory' => 'Instant Food',
                    'img' => 'img/Foods - Instant Food.svg',
                    'category_id' => 2,
                ],
                [
                    'id' => 10,
                    'subcategory' => 'Snacks',
                    'img' => 'img/Foods - Snacks.svg',
                    'category_id' => 2,
                ],
                [
                    'id' => 11,
                    'subcategory' => 'Canned Food',
                    'img' => 'img/Foods - Canned Food.svg',
                    'category_id' => 2,
                ],
                [
                    'id' => 12,
                    'subcategory' => 'Spreads & Cereals',
                    'img' => 'img/Foods - Spreads & Cereals.svg',
                    'category_id' => 2,
                ],
                [
                    'id' => 13,
                    'subcategory' => 'Others (Foods)',
                    'img' => 'img/Foods - Default.svg',
                    'category_id' => 2,
                ],
                [
                    'id' => 14,
                    'subcategory' => 'Dairy Products',
                    'img' => 'img/Beverages - Dairy Products.svg',
                    'category_id' => 3,
                ],
                [
                    'id' => 15,
                    'subcategory' => 'Soft Drinks',
                    'img' => 'img/Beverages - Soft Drinks.svg',
                    'category_id' => 3,
                ],
                [
                    'id' => 16,
                    'subcategory' => 'Instant Beverages',
                    'img' => 'img/Beverages - Instant Beverages.svg',
                    'category_id' => 3,
                ],
                [
                    'id' => 17,
                    'subcategory' => 'Others (Beverages)',
                    'img' => 'img/Beverages - Default.svg',
                    'category_id' => 3,
                ],
                [
                    'id' => 18,
                    'subcategory' => 'Kitchen & Dining Utensils',
                    'img' => 'img/Kitchen Needs - Kitchen & Dining Utensils.svg',
                    'category_id' => 4,
                ],
                [
                    'id' => 19,
                    'subcategory' => 'Seasonings & Spices',
                    'img' => 'img/Kitchen Needs - Seasonings & Spices.svg',
                    'category_id' => 4,
                ],
                [
                    'id' => 20,
                    'subcategory' => 'Baking Ingredients',
                    'img' => 'img/Kitchen Needs - Baking Ingredients.svg',
                    'category_id' => 4,
                ],
                [
                    'id' => 21,
                    'subcategory' => 'Cooking Ingredients',
                    'img' => 'img/Kitchen Needs - Cooking Ingredients.svg',
                    'category_id' => 4,
                ],
                [
                    'id' => 22,
                    'subcategory' => 'Others (Kitchen Needs)',
                    'img' => 'img/Kitchen Needs - Default.svg',
                    'category_id' => 4,
                ],
                [
                    'id' => 23,
                    'subcategory' => 'Cleaning & Care Products',
                    'img' => 'img/Household Essentials - Cleaning & Care Products.svg',
                    'category_id' => 5,
                ],
                [
                    'id' => 24,
                    'subcategory' => 'Home Utilities',
                    'img' => 'img/Household Essentials - Home Utilities.svg',
                    'category_id' => 5,
                ],
                [
                    'id' => 25,
                    'subcategory' => 'Fresheners & Dehumidifiers',
                    'img' => 'img/Household Essentials - Air Fresheners & Dehumidifiers.svg',
                    'category_id' => 5,
                ],
                [
                    'id' => 26,
                    'subcategory' => 'Pest Control',
                    'img' => 'img/Household Essentials - Pest Control.svg',
                    'category_id' => 5,
                ],
                [
                    'id' => 27,
                    'subcategory' => 'Others (Household Essentials)',
                    'img' => 'img/Household Essentials - Default.svg',
                    'category_id' => 5,
                ],
                [
                    'id' => 28,
                    'subcategory' => 'Medicines',
                    'img' => 'img/Health Supplies - Medicines.svg',
                    'category_id' => 6,
                ],
                [
                    'id' => 29,
                    'subcategory' => 'Vitamins & Supplements',
                    'img' => 'img/Health Supplies - Vitamins & Supplements.svg',
                    'category_id' => 6,
                ],
                [
                    'id' => 30,
                    'subcategory' => 'Medical Devices',
                    'img' => 'img/Health Supplies - Medical Devices.svg',
                    'category_id' => 6,
                ],
                [
                    'id' => 31,
                    'subcategory' => 'Hygiene Products',
                    'img' => 'img/Health Supplies - Hygiene Products.svg',
                    'category_id' => 6,
                ],
                [
                    'id' => 32,
                    'subcategory' => 'Others (Health Supplies)',
                    'img' => 'img/Health Supplies - Default.svg',
                    'category_id' => 6,
                ],
            ]
        );
    }
}
