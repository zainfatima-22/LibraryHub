<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActivityLog>
 */
class ActivityLogFactory extends Factory
{
    protected $model = ActivityLog::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'action' => $this->faker->randomElement(['created','updated','deleted']),
            'table_name' => $this->faker->word,
            'record_id' => $this->faker->randomNumber(),
            'before_data' => null,
            'after_data' => null,
        ];
    }
}

