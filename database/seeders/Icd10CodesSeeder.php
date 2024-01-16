<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Icd10CodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('icd10_codes')->insert([
            ['code' => 'A00', 'description' => 'Cholera'],
            ['code' => 'A01', 'description' => 'Typhoid fever'],
            ['code' => 'B00', 'description' => 'Herpesviral [herpes simplex] infections'],
            ['code'=>'B01', 'description'=>'HPV'],
        ]);
    }
}
