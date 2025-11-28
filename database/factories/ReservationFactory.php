<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
     protected $model = Reservation::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'book_id' => Book::factory(),
            'status' => 'active',
            'reserved_at' => now(),
        ];
    }
}

