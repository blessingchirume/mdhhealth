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
            'password' => Hash::make('12345678')
        ]);
        $user = User::create([
            'name' => 'System',
            'surname' => 'User',
            'email' => 'chirume27@gmail.com',
            'role_id' => 2,
            'branch_id' => 2,
            'password' => Hash::make('12345678')
        ]);
    }
}
