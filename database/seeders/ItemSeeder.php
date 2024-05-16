<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create(
            [
                "item_code" => "Paracetamol",
                "item_description" => "Paracetamol",
                "price_unit" => 20,
                "si_unit" => "mg",
                'item_group_id' => 4,
                'base_price' => 1
            ]
        );
        Item::create(
            [
                "item_code" => "Oxygen",
                "item_description" => "Paracetamol",
                "price_unit" => 60,
                "si_unit" => "Min", //Minutes
                'item_group_id' => 1,
                'base_price' => 64
            ]
        );
        Item::create(
            [
                "item_code" => "Bandage",
                "item_description" => "Bandage",
                "price_unit" => 1,
                "si_unit" => "mg",
                'item_group_id' => 4,
                'base_price' => 1
            ]
        );
        Item::create(
            [
                "item_code" => "OPR",
                "item_description" => "Operating Room Fees",
                "price_unit" => 2.5,
                "si_unit" => "Min", //Minutes
                'item_group_id' => 2,
                'base_price' => 0.0
            ]
        );
    }
}
