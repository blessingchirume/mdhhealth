<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designation::create([
            'code' => 'MDHD' . rand(111111, 999999),
            'name' => 'Casualty',
            'description' => 'Starting point for every patient to get viatls and initial checks'
        ]);

        Designation::create([
            'code' => 'MDHD' . rand(111111, 999999),
            'name' => 'Clinic',
            'description' => 'Starting point for every patient to get viatls and initial checks'
        ]);

        Designation::create([
            'code' => 'MDHD' . rand(111111, 999999),
            'name' => 'Laboritoy',
            'description' => 'Responsible for advanced diagnosis and tests for patient blooad and simen'
        ]);

        Designation::create([
            'code' => 'MDHD' . rand(111111, 999999),
            'name' => 'Theater',
            'description' => 'Responsible for all surgical treatments'
        ]);

        Designation::create([
            'code' => 'MDHD' . rand(111111, 999999),
            'name' => 'Radiology',
            'description' => 'Has to do with all electronic scanning e.g ex-rays, scans e.t.c'
        ]);

        Designation::create([
            'code' => 'MDHD' . rand(111111, 999999),
            'name' => 'Dental',
            'description' => 'Responsible for all tooth care services'
        ]);

        Designation::create([
            'code' => 'MDHD' . rand(111111, 999999),
            'name' => 'Billing',
            'description' => 'Responsible for all tooth care services'
        ]);

        Designation::create([
            'code' => 'MDHD' . rand(111111, 999999),
            'name' => 'Martenity',
            'description' => 'Responsible for Martenity services'
        ]);

        Designation::create([
            'code' => 'MDHD' . rand(111111, 999999),
            'name' => 'ICU',
            'description' => 'Responsible for all Intensive Care Unit services'
        ]);
    }
}
