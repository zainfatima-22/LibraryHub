<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Publisher;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = \App\Models\Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'isbn' => $this->faker->unique()->isbn13(),
            'description' => $this->faker->paragraph(),
            'category_id' => Category::factory(),
            'publisher_id' => Publisher::factory(),
            'published_year' => $this->faker->year(),
            'created_at' => now(),
            'updated_at' => now(),
            'image' => null,
        ];
    }
}

