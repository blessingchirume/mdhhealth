<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Designation>
 */
class DesignationFactory extends Factory
{
    public function definition()
    {
        return [
           'code' => 'MDHD'. rand(111111, 999999),
           'name' => fake()->text(20),
           'description' => fake()->text(100)
        ];
    }
}
