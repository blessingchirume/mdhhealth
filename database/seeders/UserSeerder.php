<?php

namespace Database\Seeders;

use App\Constants\FactoryRoleConstants;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeerder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = User::create([
            'name' => 'Blessing',
            'surname' => 'Chirume',
            'email' => 'chirume37@gmail.com',
            'role_id' => 1,
            'branch_id' => 1,
            'designation_id' => 1,
            'password' => Hash::make('12345678')
        ]);

        $super->assignRole(Role::findByName(FactoryRoleConstants::SuperAdmin));
        // Designation users

        $clinic = User::create([
            'name' => 'Clinic',
            'surname' => 'User',
            'email' => 'clinic@mdh.co.zw',
            'role_id' => 1,
            'branch_id' => 1,
            'designation_id' => 1,
            'password' => Hash::make('12345678')
        ]);

        $clinic->assignRole(Role::findByName(FactoryRoleConstants::Sister));

        $laboritory = User::create([
            'name' => 'Laboritory',
            'surname' => 'User',
            'email' => 'laboritory@mdh.co.zw',
            'role_id' => 2,
            'branch_id' => 1,
            'designation_id' => 2,
            'password' => Hash::make('12345678')
        ]);

        $clinic->assignRole(Role::findByName(FactoryRoleConstants::Sister));

        $theater = User::create([
            'name' => 'Theater',
            'surname' => 'User',
            'email' => 'theater@mdh.co.zw',
            'role_id' => 3,
            'branch_id' => 1,
            'designation_id' => 3,
            'password' => Hash::make('12345678')
        ]);

        $theater->assignRole(Role::findByName(FactoryRoleConstants::Doctor));

        $radiology = User::create([
            'name' => 'Radiolody',
            'surname' => 'User',
            'email' => 'radiology@mdh.co.zw',
            'role_id' => 4,
            'branch_id' => 1,
            'designation_id' => 4,
            'password' => Hash::make('12345678')
        ]);

        $radiology->assignRole(Role::findByName(FactoryRoleConstants::Sister));

        $dental = User::create([
            'name' => 'Dental',
            'surname' => 'User',
            'email' => 'dental@mdh.co.zw',
            'role_id' => 5,
            'branch_id' => 1,
            'designation_id' => 5,
            'password' => Hash::make('12345678')
        ]);

        $dental->assignRole(Role::findByName(FactoryRoleConstants::Doctor));

        $billing = User::create([
            'name' => 'Shamiso',
            'surname' => 'Makwara',
            'email' => 'billing@mdh.co.zw',
            'role_id' => 6,
            'branch_id' => 1,
            'designation_id' => 6,
            'password' => Hash::make('12345678')
        ]);

        $billing->assignRole(Role::findByName(FactoryRoleConstants::BillingClerk));
    }
}
