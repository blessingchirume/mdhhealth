<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ward;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ward::create([
            'name'=>'Casualty',
            'type_id'=>1
        ]);

        Ward::create([
            'name'=>'Clinic',
            'type_id'=>2
        ]);
        Ward::create([
            'name'=>'Theatre',
            'type_id'=>4
        ]);
    }
}
