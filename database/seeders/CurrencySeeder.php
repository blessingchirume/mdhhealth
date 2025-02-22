<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'name' => 'USD',
            'description' => 'United States Dollar'
        ]);
        Currency::create([
            'name' => 'ZAR',
            'description' => 'South African Rand'
        ]);
        Currency::create([
            'name' => 'ZWL',
            'description' => 'Zimbabwean Dollar'
        ]);
    }
}
