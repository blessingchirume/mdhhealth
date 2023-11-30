<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Package;
use App\Models\PriceGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PriceGroup::factory()->count(5
        )->create();
    }
}
