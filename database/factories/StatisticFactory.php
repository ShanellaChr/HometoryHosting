<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Statistic>
 */
class StatisticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 6),
            'month_year' => $this->faker->dateTimeBetween('-1 years', 'now')->format('Y-m-01'),
            'total_items' => $this->faker->numberBetween(0, 300),
        ];
    }
}
