<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = Role::create(['name' => 'system admin']);
        $clinic = Role::create(['name' => 'clinic']);
        $laboritory = Role::create(['name' => 'laboritory']);
        $theater = Role::create(['name' => 'theater']);
        $radiology = Role::create(['name' => 'radiology']);
        $dental = Role::create(['name' => 'dental']);
    }
}
