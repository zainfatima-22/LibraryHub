<?php

namespace Database\Factories;

use App\Models\BookUser;
use App\Models\Fine;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fine>
 */
class FineFactory extends Factory
{
    protected $model = Fine::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'borrow_id' => BookUser::factory(),
            'amount' => $this->faker->randomFloat(2, 1, 50),
            'reason' => 'Overdue book',
            'status' => 'unpaid',
        ];
    }
}

