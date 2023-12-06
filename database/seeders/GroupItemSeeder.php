<?php

namespace Database\Seeders;

use App\Models\GroupItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GroupItem::create([
            'name' => 'Medical Supplies'
        ]);

        GroupItem::create([
            'name' => 'Medical Procedures'
        ]);
    }
}
