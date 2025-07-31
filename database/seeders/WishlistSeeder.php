<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wishlists')->insert([
            [
                'items_name' => 'Dettol Liquid Soap',
                'category_id' => 1, 
                'items_description' => 'Dettol yang wangi sakura buat si adek yang gatel gatel',
                'user_id' => 2
            ],
            [
                'items_name' => 'Oreo 200gr',
                'category_id' => 2, 
                'items_description' => 'Oreo yang rasa cokelat buat nambah stock di rumah',
                'user_id' => 2
            ],
            [
                'items_name' => 'Ultramilk Coklat 1L',
                'category_id' => 3, 
                'items_description' => 'Susu coklat 1 liter buat si Yed',
                'user_id' => 2
            ],
            [
                'items_name' => 'Tepung Segitiga 1kg',
                'category_id' => 4, 
                'items_description' => 'Ini tepung yang biru, mau bikin nastar',
                'user_id' => 2
            ],
            [
                'items_name' => 'Stella Pewangi Ruangan',
                'category_id' => 5, 
                'items_description' => 'Yang pasti bukan yang jeruk, itu mah di SM adanya',
                'user_id' => 2
            ],
            [
                'items_name' => 'FG Troches',
                'category_id' => 6, 
                'items_description' => 'Lagi radang, disuruh mamanya Lala buat makan ini',
                'user_id' => 2
            ],
        ]);
    }
}