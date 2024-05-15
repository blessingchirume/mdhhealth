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
        Item::factory()->count(10)->create();
        Item::create(
            [
                "item_code"=> "OPR",
                "item_description"=> "Operating Room Fees",
                "price_unit"=> 2.5,
                "si_unit"=> "Min",//Minutes
                'item_group_id'=>2,
                'base_price'=>0.0,
                'tariff_code'=>11101
            ]);
    }
}
