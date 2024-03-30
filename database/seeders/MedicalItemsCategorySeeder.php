<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalItemsCategory;

class MedicalItemsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicalItemsCategory::truncate();
        MedicalItemsCategory::create([
            'name' => 'Drugs',
            'description' => ''
        ]);
        MedicalItemsCategory::create([
            'name' => 'Sundries',
            'description' => ''
        ]);
        MedicalItemsCategory::create([
            'name' => 'Procedures',
            'description' => ''
        ]);
        MedicalItemsCategory::create([
            'name' => 'Ancillary Services',
            'description' => ' This category includes services provided alongside medical treatment, such as rehabilitation services, counseling, dietary services, etc.'
        ]);
    }
}
