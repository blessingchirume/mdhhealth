<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Icd10Code;

class Icd10CodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Icd10Code::truncate();

        $csvFile = fopen(base_path("database/data/icd10codescopy.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Icd10Code::create([
                    "code" => $data['0'],
                    "description" => $data['1'],
                    "category" => 1
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
