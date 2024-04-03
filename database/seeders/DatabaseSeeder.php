<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            CurrencySeeder::class,
            RoleSeeder::class, 
            UserSeerder::class, 
            BranchSeeder::class, 
            TankSeeder::class,
            PartnerSeeder::class,
            PackageSeeder::class,
            DesignationSeeder::class,
            PriceGroupSeeder::class,
            ItemGroupSeeder::class,
            ItemSeeder::class,
            // PaymentSeeder::class,
            VitalGroupSeeder::class,
            MenuSeeder::class,
            // Icd10CodesSeeder::class,
            InvoiceSeeder::class,
            TestsSeeder::class,
            TestCategorySeeder::class,
            PaymentOptionSeeder::class,
            CurrencySeeder::class
        ]);
    }
}
