<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::create([
            'name' => 'Dr. John Doe',
            'speciality' => 'General Practitioner',
            'phone' => '1234567890',
            'email' => 'fLbqV@example.com',
            'status' => 'Available',
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Doctor::create([
            'name' => 'Dr. Jane Smith',
            'speciality' => 'Dietitian',
            'phone' => '0987654321',
            'email' => 'XqgDy@example.com',
            'status' => 'Available',
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Doctor::create([
            'name' => 'Dr. Mark Johnson',
            'speciality' => 'Oncologist',
            'phone' => '1234567890',
            'email' => 'fLbqV@example.com',
            'status' => 'Available',
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
