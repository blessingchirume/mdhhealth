<?php

namespace Database\Seeders;

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
            PackageSeeder::class
        ]);
    }
}
