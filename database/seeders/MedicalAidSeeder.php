<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MedicalAid;

class MedicalAidSeeder extends Seeder
{
    public function run()
    {
        MedicalAid::create([
            'provider_code' => 'cimas',
            'provider_name' => 'CIMAS Medical Aid Society',
        ]);

        // Add more medical aid providers if needed
    }
}
