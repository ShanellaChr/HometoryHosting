<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wishlist>
 */
class WishlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'items_name' => $this->faker->words(3, true),
            'items_description' => $this->faker->sentence(8, true),
            'category_id' => $this->faker->numberBetween(1, 6),
            'user_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
