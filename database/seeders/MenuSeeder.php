<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();
        Menu::create([
            'name' => 'dashboard',
            'display_name' => 'Dashboard',
            'icon' => 'fa-chart-bar',
            'url' => 'home',
            'parent_id' => null,
            'order' => 1
        ]);

        Menu::create([
            'name' => 'departments',
            'display_name' => 'Departments',
            'icon' => 'fa-code-branch',
            'url' => 'designation.index',
            'parent_id' => null,
            'order' => 1
        ]);

        Menu::create([
            'name' => 'modules',
            'display_name' => 'Modules',
            'icon' => 'fa-clock',
            'url' => null,
            'parent_id' => null,
            'order' => 1
        ]);

        Menu::create([
            'name' => 'billing',
            'display_name' => 'Billing',
            'icon' => 'fa-circle',
            'url' => 'patient.index',
            'parent_id' => 3,
            'order' => 1
        ]);

        Menu::create([
            'name' => 'stores',
            'display_name' => 'Stores',
            'icon' => 'fa-circle',
            'url' => 'reciept.index',
            'parent_id' => 3,
            'order' => 1
        ]);

        Menu::create([
            'name' => 'credit_control',
            'display_name' => 'Credit Control',
            'icon' => 'fa-circle',
            'url' => 'reciept.index',
            'parent_id' => 3,
            'order' => 1
        ]);

        Menu::create([
            'name' => 'payments',
            'display_name' => 'Payments',
            'icon' => 'fa-money-bill-alt',
            'url' => 'payment.index',
            'parent_id' => null,
            'order' => 1
        ]);
        Menu::create([
            'name' => 'providers',
            'display_name' => 'Providers',
            'icon' => 'fa-shuttle-van',
            'url' => 'medicalaid.index',
            'parent_id' => null,
            'order' => 1
        ]);
        Menu::create([
            'name' => 'inventory',
            'display_name' => 'Inventory',
            'icon' => 'fa-luggage-cart',
            'url' => null,
            'parent_id' => null,
            'order' => 1
        ]);
        Menu::create([
            'name' => 'items',
            'display_name' => 'Items',
            'icon' => 'fa-circle',
            'url' => 'item.index',
            'parent_id' => 9,
            'order' => 1
        ]);
        Menu::create([
            'name' => 'reciept',
            'display_name' => 'Reciept',
            'icon' => 'fa-circle',
            'url' => 'reciept.index',
            'parent_id' => 9,
            'order' => 1
        ]);
        Menu::create([
            'name' => 'users',
            'display_name' => 'User Management',
            'icon' => 'fa-users',
            'url' => 'users.index',
            'parent_id' => null,
            'order' => 1,

        ]);
        Menu::create([
            'name' => 'Laboratory',
            'display_name' => 'Laboratory',
            'icon' => 'fa-flask',
            'url' => 'laboratory.index',
            'parent_id' => 3,
            'order' => 1
        ]);

        Menu::create([
            'name' => 'Test Booking',
            'display_name' => 'Test Booking',
            'icon' => 'fa-circle',
            'url' => 'laboratory.index',
            'parent_id' => 13,
            'order' => 1
        ]);

        Menu::create([
            'name' => 'vitals',
            'display_name' => 'Vitals',
            'icon' => 'fa-heartbeat',
            'url' => 'patient.vitals.index',
            'parent_id' => 3,
            'order' => 1
        ]);

        Menu::create([
            'name' => 'vitals',
            'display_name' => 'Vitals Queue',
            'icon' => 'fa-circle',
            'url' => 'patient.vitals.index',
            'parent_id' => 15,
            'order' => 1
        ]);

        Menu::create([
            'name' => 'appointments',
            'display_name' => 'Appointments',
            'icon' => 'fa-calendar',
            'url' => 'appointments',
            'parent_id' => 3,
            'order' => 1
        ]);
        Menu::create([
            'name' => 'appointments',
            'display_name' => 'View Appointments',
            'icon' => 'fa-circle',
            'url' => 'appointments',
            'parent_id' => 17,
            'order' => 1
        ]);
        Menu::create([
            'name' => 'theatre',
            'display_name' => 'Theatre',
            'icon' => 'fa-circle',
            'url' => 'theatre.index',
            'parent_id' => 3,
            'order' => 1
        ]);

        Menu::create([
            'name' => 'emergency room',
            'display_name' => 'ER Admissions',
            'icon' => 'fa-circle',
            'url' => 'emergency-room-admissions.create',
            'parent_id' => 3,
            'order' => 1
        ]);

        Menu::create([
            'name' => 'ICU',
            'display_name' => 'ICU Admissions',
            'icon' => 'fa-bed',
            'url' => 'icu',
            'parent_id' => 3,
            'order' => 2
        ]);

        Menu::create([
            'name' => 'ICU Admissions',
            'display_name' => 'ICU Admissions',
            'icon' => 'fa-user-injured',
            'url' => null,//'icu.show',
            'parent_id' => 21,
            'order' => 1
        ]);
    }
}
