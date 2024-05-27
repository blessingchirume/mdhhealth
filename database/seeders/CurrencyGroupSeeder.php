<?php

namespace Database\Seeders;

use App\Models\CurrencyGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencyGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CurrencyGroup::create([
            'currency_id' => 1,
            'group_id' => 1,
            'rate' => 0.3
        ]);
        CurrencyGroup::create([
            'currency_id' => 2,
            'group_id' => 1,
            'rate' => 0.3
        ]);
        CurrencyGroup::create([
            'currency_id' => 3,
            'group_id' => 1,
            'rate' => 0.3
        ]);

        CurrencyGroup::create([
            'currency_id' => 1,
            'group_id' => 2,
            'rate' => 0.3
        ]);
        CurrencyGroup::create([
            'currency_id' => 2,
            'group_id' => 2,
            'rate' => 0.3
        ]);
        CurrencyGroup::create([
            'currency_id' => 3,
            'group_id' => 2,
            'rate' => 0.3
        ]);
   
    }
}
