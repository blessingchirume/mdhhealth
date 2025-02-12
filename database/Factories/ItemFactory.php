<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {        
        return [
            'item_code' => 'MDHI'. rand(1111, 9999),
            'item_description' => '5mg Paracetamol Satchet',
            'item_group_id' => 1,
            'si_unit' => 'mg',
            'price_unit' => rand(1, 20),
            'base_price' => rand(111, 999)
        ];
    }
}
