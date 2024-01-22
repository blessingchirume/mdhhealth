<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tests;
use App\Models\TestCategory;

class TestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $bloodtest = Tests::create(
                [
                    'name' => 'Complete Blood Count (CBC)',
                    'slug' => 'cbc',
                    'description' => 'Evaluates red and white blood cells, platelets, and hemoglobin levels.',
                    'category' => TestCategory::where('name', 'Blood Tests')->first()->id
                ]
            );
        } catch (\Exception $e) {
            // handle exception
        }

        try {
            $microbiology = Tests::create(
                [
                    'name' => 'Blood Culture',
                    'slug' => 'blood-culture',
                    'description' => 'Identifies bacteria or fungi causing bloodstream infections.',
                    'category' => TestCategory::where('name', 'Microbiology')->first()->id
                ]
            );
        } catch (\Exception $e) {
            // handle exception
        }

        try {
            $urineTests = Tests::create(
                [
                    'name' => 'Urinalysis',
                    'slug' => 'urinalysis',
                    'description' => 'Analyzes urine for abnormalities like blood, protein, or bacteria.',
                    'category' => TestCategory::where('name', 'Urine Tests')->first()->id
                ]
            );
        } catch (\Exception $e) {
            // handle exception
        }
    }
}