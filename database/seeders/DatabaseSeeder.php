<?php

namespace Database\Seeders;

use App\Models\PriceGroup;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            RoleSeeder::class, 
            UserSeerder::class, 
            BranchSeeder::class, 
            TankSeeder::class,
            PartnerSeeder::class,
            PackageSeeder::class,
            DesignationSeeder::class,
            PriceGroupSeeder::class,
            ItemSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
