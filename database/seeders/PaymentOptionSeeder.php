<?php

namespace Database\Seeders;

use App\Models\PaymentOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $option = PaymentOption::Create(['name' => 'Cash']);
        $option = PaymentOption::Create(['name' => 'Medical Aid']);
    }
}
