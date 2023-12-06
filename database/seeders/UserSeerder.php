<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Super',
            'surname' => 'User',
            'email' => 'chirume37@gmail.com',
            'role_id' => 1,
            'branch_id' => 1,
            'designation_id' => 1,
            'password' => Hash::make('12345678')
        ]);
        $user = User::create([
            'name' => 'System',
            'surname' => 'User',
            'email' => 'chirume27@gmail.com',
            'role_id' => 2,
            'branch_id' => 2,
            'designation_id' => 2,
            'password' => Hash::make('12345678')
        ]);

        // Designation users

        $clinic = User::create([
            'name' => 'Clinic',
            'surname' => 'User',
            'email' => 'clinic@mdh.co.zw',
            'role_id' => 2,
            'branch_id' => 1,
            'designation_id' => 1,
            'password' => Hash::make('12345678')
        ]);

        $laboritory = User::create([
            'name' => 'Laboritory',
            'surname' => 'User',
            'email' => 'laboritory@mdh.co.zw',
            'role_id' => 2,
            'branch_id' => 1,
            'designation_id' => 2,
            'password' => Hash::make('12345678')
        ]);

        $theater = User::create([
            'name' => 'Theater',
            'surname' => 'User',
            'email' => 'theater@mdh.co.zw',
            'role_id' => 2,
            'branch_id' => 1,
            'designation_id' => 3,
            'password' => Hash::make('12345678')
        ]);

        $radiology = User::create([
            'name' => 'Radiolody',
            'surname' => 'User',
            'email' => 'radiology@mdh.co.zw',
            'role_id' => 2,
            'branch_id' => 1,
            'designation_id' => 4,
            'password' => Hash::make('12345678')
        ]);

        $dental = User::create([
            'name' => 'Dental',
            'surname' => 'User',
            'email' => 'dental@mdh.co.zw',
            'role_id' => 2,
            'branch_id' => 1,
            'designation_id' => 5,
            'password' => Hash::make('12345678')
        ]);
    }
}
