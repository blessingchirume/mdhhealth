<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TestCategory;

class TestCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TestCategory::create([
            'name'=>'Microbiology',
            'description'=>''
        ]);
        TestCategory::create([
            'name'=> 'Blood Tests',
            'description'=> ''
        ]);
        TestCategory::create([
            'name'=> 'Urine Tests',
            'description'=> ''
        ]);
    }
}
