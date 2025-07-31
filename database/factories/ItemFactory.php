<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(2, true);

        return [
            'name' => $name,
            'slug' => Str::slug($name . '-' . Str::random(5)),
            'category_id' => $this->faker->numberBetween(1, 6),
            'subcategory_id' => $this->faker->numberBetween(1, 32),
            'location' => $this->faker->randomElement(['Fridge', 'Pantry', 'Freezer']),
            'note' => $this->faker->optional()->sentence,
            'user_id' => $this->faker->numberBetween(1, 2),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
