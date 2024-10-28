<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PriceGroup>
 */
class PriceGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $item = rand(1, Item::all()->count());
        $package = rand(1, Package::all()->count());
        return [
           'item_id' => $item,
           'package_id' => $package,
           'price' => rand(111,999)
        ];
    }
}
