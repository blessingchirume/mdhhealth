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
        Tests::withoutEvents(function () {
            Tests::insert(
                [
                    [
                        'category' => 1,
                        'name' => 'Bacterial Culture',
                        'slug' => 'bacterial-culture',
                        'description' => 'Test for identifying bacterial infections'
                    ],
                    [
                        'category' => 1,
                        'name' => 'Fungal Culture',
                        'slug' => 'fungal-culture',
                        'description' => 'Test for identifying fungal infections'
                    ],
                    [
                        'category' => 1,
                        'name' => 'Antibiotic Susceptibility',
                        'slug' => 'antibiotic-susceptibility',
                        'description' => 'Test for determining effective antibiotics'
                    ],
                    [
                        'category' => 1,
                        'name' => 'Gram Stain',
                        'slug' => 'gram-stain',
                        'description' => 'Test for classifying bacteria'
                    ],
                    [
                        'category' => 1,
                        'name' => 'Viral Culture',
                        'slug' => 'viral-culture',
                        'description' => 'Test for identifying viral infections'
                    ],
                    [
                        'category' => 1,
                        'name' => 'Rapid Antigen Test',
                        'slug' => 'rapid-antigen-test',
                        'description' => 'Test for detecting antigens of specific pathogens'
                    ],
                    [
                        'category' => 1,
                        'name' => 'Polymerase Chain Reaction (PCR)',
                        'slug' => 'pcr',
                        'description' => 'Test for detecting genetic material of specific pathogens'
                    ],
                    [
                        'category' => 1,
                        'name' => 'Serology',
                        'slug' => 'serology',
                        'description' => 'Test for detecting antibodies against specific pathogens'
                    ],
                    [
                        'category' => 1,
                        'name' => 'Dark-field Microscopy',
                        'slug' => 'dark-field-microscopy',
                        'description' => 'Test for visualizing certain microorganisms'
                    ],
                    [
                        'category' => 2,
                        'name' => 'Complete Blood Count (CBC)',
                        'slug' => 'cbc',
                        'description' => 'Test for evaluating overall health'
                    ],
                    [
                        'category' => 2,
                        'name' => 'Blood Glucose',
                        'slug' => 'blood-glucose',
                        'description' => 'Test for measuring blood sugar levels'
                    ],
                    [
                        'category' => 2,
                        'name' => 'Blood Type',
                        'slug' => 'blood-type',
                        'description' => 'Test for determining blood type'
                    ],
                    [
                        'category' => 2,
                        'name' => 'Lipid Panel',
                        'slug' => 'lipid-panel',
                        'description' => 'Test for assessing lipid levels'
                    ],
                    [
                        'category' => 2,
                        'name' => 'Coagulation Panel',
                        'slug' => 'coagulation-panel',
                        'description' => 'Test for measuring blood clotting ability'
                    ],
                    [
                        'category' => 2,
                        'name' => 'Hemoglobin A1c (HbA1c)',
                        'slug' => 'hba1c',
                        'description' => 'Test for monitoring long-term blood glucose control'
                    ],
                    [
                        'category' => 2,
                        'name' => 'Liver Function Tests (LFTs)',
                        'slug' => 'lfts',
                        'description' => 'Test for assessing liver function'
                    ],
                    [
                        'category' => 2,
                        'name' => 'Kidney Function Tests (KFTs)',
                        'slug' => 'kfts',
                        'description' => 'Test for assessing kidney function'
                    ],
                    [
                        'category' => 2,
                        'name' => 'Thyroid Function Tests (TFTs)',
                        'slug' => 'tfts',
                        'description' => 'Test for assessing thyroid function'
                    ],
                    [
                        'category' => 3,
                        'name' => 'Urinalysis',
                        'slug' => 'urinalysis',
                        'description' => 'Test for analyzing urine composition'
                    ],
                    [
                        'category' => 3,
                        'name' => 'Urine Culture',
                        'slug' => 'urine-culture',
                        'description' => 'Test for identifying urinary tract infections'
                    ],
                    [
                        'category' => 3,
                        'name' => 'Urinary pH',
                        'slug' => 'urinary-ph',
                        'description' => 'Test for measuring urine acidity'
                    ],
                    [
                        'category' => 3,
                        'name' => 'Microscopic Examination',
                        'slug' => 'microscopic-examination',
                        'description' => 'Test for microscopic analysis of urine sediment'
                    ],
                    [
                        'category' => 3,
                        'name' => 'Urine Protein',
                        'slug' => 'urine-protein',
                        'description' => 'Test for detecting protein in urine'
                    ],
                    [
                        'category' => 3,
                        'name' => 'Urine Creatinine',
                        'slug' => 'urine-creatinine',
                        'description' => 'Test for assessing kidney function'
                    ],
                    [
                        'category' => 3,
                        'name' => 'Urine Glucose',
                        'slug' => 'urine-glucose',
                        'description' => 'Test for detecting glucose in urine'
                    ],
                    [
                        'category' => 3,
                        'name' => 'Urine Ketones',
                        'slug' => 'urine-ketones',
                        'description' => 'Test for detecting ketones in urine'
                    ],
                    [
                        'category' => 3,
                        'name' => 'Bilirubin',
                        'slug' => 'bilirubin',
                        'description' => 'Test for detecting bilirubin in urine'
                    ],
                
            ]);
        });
    }
}