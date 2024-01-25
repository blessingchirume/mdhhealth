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
        VitalGroup::create([
            'name' => 'HR'
        ]);

        VitalGroup::create([
            'name' => 'Glucose'
        ]);

        VitalGroup::create([
            'name' => 'SPO2'
        ]);

        VitalGroup::create([
            'name' => 'Rep'
        ]);

        VitalGroup::create([
            'name' => 'Pulse'
        ]);

        VitalGroup::create([
            'name' => 'MAP'
        ]);
    }
}
