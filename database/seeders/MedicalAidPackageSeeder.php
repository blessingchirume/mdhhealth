<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MedicalAidPackage;

class MedicalAidPackageSeeder extends Seeder
{
    public function run()
    {
        // CIMAS Medical Aid Packages
        $cimasPackages = [
            'Comprehensive',
            'Standard',
            'Basic',
            'Premier',
            'Plus',
            'Maternity',
            'Junior',
            'Golden Oldies',
        ];

        $medicalAidId = 1; // ID of CIMAS Medical Aid Society in the medical_aids table

        foreach ($cimasPackages as $package) {
            MedicalAidPackage::create([
                'medical_aid_id' => $medicalAidId,
                'name' => $package,
            ]);
        }

        // Add more packages for other medical aid providers if needed
    }
}
