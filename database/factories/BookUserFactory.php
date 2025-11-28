<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BookUser;
use App\Models\User;
use App\Models\Book;

class BookUserFactory extends Factory
{
    protected $model = BookUser::class;

    public function definition()
    {
        $borrowedAt = $this->faker->dateTimeBetween('-30 days', 'now');
        $dueDate = (clone $borrowedAt)->modify('+14 days');
        $returnedAt = $this->faker->optional()->dateTimeBetween($borrowedAt, 'now');

        return [
            'user_id' => User::factory(),
            'borrowable_id' => Book::factory(),
            'borrowable_type' => 'App\Models\Book',
            'borrowed_at' => $borrowedAt,
            'due_date' => $dueDate,
            'returned_at' => $returnedAt,
            'status' => $returnedAt ? 'returned' : 'borrowed',
        ];
    }
}
