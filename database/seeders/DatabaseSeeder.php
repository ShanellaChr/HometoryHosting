<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Controllers\StatisticController;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            StatisticSeeder::class,
            SubcategorySeeder::class,
            ArticleSeeder::class,
            WishlistSeeder::class,
            ItemSeeder::class,
            ExpirationDateSeeder::class,
        ]);

        app(StatisticController::class)->recalculateStatisticsForUser(2);
    }
}
