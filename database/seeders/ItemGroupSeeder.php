<?php

namespace Database\Seeders;

use App\Models\ItemGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemGroup::create([
            'name' => 'Medical Supplies'
        ]);

        ItemGroup::create([
            'name' => 'Medical Procedures'
        ]);
    }
}
