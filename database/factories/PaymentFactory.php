<?php

namespace Database\Factories;

use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    public function definition()
    {
        return [
           'episode_id' => 1,
           'amount' => rand(1111, 9999),
           'balance' => rand(1111, 9999),
           'date' => fake()->date()
        ];
    }
}
