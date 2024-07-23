<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'author_id' => \App\Models\Author::factory(),
            'ISBN' => $this->faker->isbn13(),
            'image' => $this->faker->imageUrl(),
            'publisher_id' => \App\Models\Publisher::factory(),
            'published_year' => $this->faker->year(),
            'category_id' => \App\Models\Category::factory(),
            // 'category_id' => $this->faker->numberBetween(1, 20),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
// [
    // 'title',
    // 'author_id',
    // 'ISBN',
    // 'image',
    // 'publisher_id',
    // 'published_year',
    // 'category_id',
    // 'quantity',
// ];