<?php

namespace Database\Factories;

use App\Models\Fine;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {
        return [
            'fine_id' => Fine::factory(),
            'amount' => $this->faker->randomFloat(2, 1, 50),
            'method' => $this->faker->randomElement(['cash','card','bank']),
            'paid_at' => now(),
        ];
    }
}

