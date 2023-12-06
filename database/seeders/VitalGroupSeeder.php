<?php

namespace Database\Seeders;

use App\Models\VitalGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VitalGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VitalGroup::create([
            'name' => 'BP'
        ]);

        VitalGroup::create([
            'name' => 'Weight'
        ]);

        VitalGroup::create([
            'name' => 'Temperature'
        ]);
    }
}
