<?php

namespace Database\Seeders;

use App\Constants\PermisionConstants;
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
            'order' => 1,
            //'permission' => PermisionConstants::viewDashboard
        ]);

        Menu::create([
            'name' => 'departments',
            'display_name' => 'Departments',
            'icon' => 'fa-code-branch',
            'url' => 'designation.index',
            'parent_id' => null,
            'order' => 1,
            //'permission' => PermisionConstants::viewDepartments
        ]);

        Menu::create([
            'name' => 'modules',
            'display_name' => 'Modules',
            'icon' => 'fa-clock',
            'url' => null,
            'parent_id' => null,
            'order' => 1,
            // 'permission' => PermisionConstants::viewDashboard
        ]);

        Menu::create([
            'name' => 'billing',
            'display_name' => 'Billing',
            'icon' => 'fa-circle',
            'url' => 'patient.index',
            'parent_id' => 3,
            'order' => 1,
            //'permission' => PermisionConstants::viewPatients
        ]);

        Menu::create([
            'name' => 'stores',
            'display_name' => 'Stores',
            'icon' => 'fa-circle',
            'url' => 'reciept.index',
            'parent_id' => 3,
            'order' => 1,
            // 'permission' => PermisionConstants::viewI
        ]);

        Menu::create([
            'name' => 'credit_control',
            'display_name' => 'Credit Control',
            'icon' => 'fa-circle',
            'url' => 'reciept.index',
            'parent_id' => 3,
            'order' => 1,
            // 'permission' => PermisionConstants::viewDashboard
        ]);

        Menu::create([
            'name' => 'payments',
            'display_name' => 'Payments',
            'icon' => 'fa-money-bill-alt',
            'url' => 'payment.index',
            'parent_id' => null,
            'order' => 1,
            //'permission' => PermisionConstants::viewPayments
        ]);
        Menu::create([
            'name' => 'providers',
            'display_name' => 'Providers',
            'icon' => 'fa-shuttle-van',
            'url' => 'medicalaid.index',
            'parent_id' => null,
            'order' => 1,
            //'permission' => PermisionConstants::viewProviders
        ]);
        Menu::create([
            'name' => 'inventory',
            'display_name' => 'Inventory',
            'icon' => 'fa-luggage-cart',
            'url' => null,
            'parent_id' => null,
            'order' => 1,
            // 'permission' => PermisionConstants::viewDashboard
        ]);
        Menu::create([
            'name' => 'items',
            'display_name' => 'Items',
            'icon' => 'fa-circle',
            'url' => 'item.index',
            'parent_id' => 9,
            'order' => 1,
            // 'permission' => PermisionConstants::viewIt
        ]);
        Menu::create([
            'name' => 'reciept',
            'display_name' => 'Reciept',
            'icon' => 'fa-circle',
            'url' => 'reciept.index',
            'parent_id' => 9,
            'order' => 1,
            // 'permission' => PermisionConstants::viewInventoryIntake
        ]);
        Menu::create([
            'name' => 'users',
            'display_name' => 'User Management',
            'icon' => 'fa-users',
            'url' => 'users.index',
            'parent_id' => null,
            'order' => 1,
           // 'permission' => PermisionConstants::viewUserMaster

        ]);
        Menu::create([
            'name' => 'Laboratory',
            'display_name' => 'Laboratory',
            'icon' => 'fa-flask',
            'url' => 'laboratory.index',
            'parent_id' => 3,
            'order' => 1,
          //  'permission' => PermisionConstants::viewLaboratory
        ]);

        Menu::create([
            'name' => 'Test Booking',
            'display_name' => 'Test Booking',
            'icon' => 'fa-circle',
            'url' => 'laboratory.index',
            'parent_id' => 13,
            'order' => 1,
           // 'permission' => PermisionConstants::viewTestBooking
        ]);

        Menu::create([
            'name' => 'vitals',
            'display_name' => 'Vitals',
            'icon' => 'fa-heartbeat',
            'url' => 'patient.vitals.index',
            'parent_id' => 3,
            'order' => 1,
           // 'permission' => PermisionConstants::viewVitals
        ]);

        Menu::create([
            'name' => 'vitals',
            'display_name' => 'Vitals Queue',
            'icon' => 'fa-circle',
            'url' => 'patient.vitals.index',
            'parent_id' => 15,
            'order' => 1,
           // 'permission' => PermisionConstants::viewVitalsQueue
        ]);

        Menu::create([
            'name' => 'appointments',
            'display_name' => 'Appointments',
            'icon' => 'fa-calendar',
            'url' => 'appointments',
            'parent_id' => 3,
            'order' => 1,
           // 'permission' => PermisionConstants::viewAppointmentsMaster
        ]);
        Menu::create([
            'name' => 'appointments',
            'display_name' => 'View Appointments',
            'icon' => 'fa-circle',
            'url' => 'appointments',
            'parent_id' => 17,
            'order' => 1,
           // 'permission' => PermisionConstants::viewAppointments
        ]);
        Menu::create([
            'name' => 'theatre',
            'display_name' => 'Theatre',
            'icon' => 'fa-circle',
            'url' => null,
            'parent_id' => 3,
            'order' => 1,
           // 'permission' => PermisionConstants::viewTheater
        ]);

        Menu::create([
            'name' => 'emergency room',
            'display_name' => 'ER Admissions',
            'icon' => 'fa-circle',
            'url' => 'emergency-room-admissions.create',
            'parent_id' => 3,
            'order' => 1,
           // 'permission' => PermisionConstants::viewEmergencyRoomAddmissions
        ]);

        Menu::create([
            'name' => 'ICU',
            'display_name' => 'ICU Admissions',
            'icon' => 'fa-bed',
            'url' => 'icu',
            'parent_id' => 3,
            'order' => 2,
           // 'permission' => PermisionConstants::viewIcu
        ]);

        Menu::create([
            'name' => 'ICU Admissions',
            'display_name' => 'ICU Admissions',
            'icon' => 'fa-user-injured',
            'url' => 'icu',
            'parent_id' => 21,
            'order' => 1,
           // 'permission' => PermisionConstants::viewIcuAdmissions
        ]);

        Menu::create([
            'name' => 'Providers',
            'display_name' => 'Medical Providers',
            'icon' => 'fa-user-injured',
            'url' => 'medicalaid.index',
            // 'parent_id' => 21,
            'order' => 1,
           // 'permission' => PermisionConstants::viewProviders
        ]);

        Menu::create([
            'name' => 'Roles',
            'display_name' => 'User Roles',
            'icon' => 'fa-user-injured',
            'url' => 'role.index',
            'parent_id' => 12,
            'order' => 1,
           // 'permission' => PermisionConstants::viewUserRoles
        ]);

        Menu::create([
            'name' => 'users',
            'display_name' => 'System Users',
            'icon' => 'fa-user-injured',
            'url' => 'role.index',
            'parent_id' => 12,
            'order' => 1,
           // 'permission' => PermisionConstants::viewUsers
        ]);

        Menu::create([
            'name' => 'Clinic',
            'display_name' => 'Clinic',
            'icon' => 'fa-user-injured',
            // 'url' => 'role.index',
            // 'parent_id' => 12,
            'order' => 1,
            // 'permission' => PermisionConstants::viewProviders
        ]);

        Menu::create([
            'name' => 'Nurses',
            'display_name' => 'Nurses',
            'icon' => 'fa-user-injured',
            'url' => 'view-nurses',
            'parent_id' => 26,
            'order' => 1,
            // 'permission' => PermisionConstants::viewProviders
        ]);

        Menu::create([
            'name' => 'Doctors',
            'display_name' => 'Doctors',
            'icon' => 'fa-user-injured',
            'url' => 'view-doctors',
            'parent_id' => 26,
            'order' => 1,
            // 'permission' => PermisionConstants::viewProviders
        ]);

        Menu::create([
            'name' => 'theatre_queue',
            'display_name' => 'Theatre Queue',
            'icon' => 'fa-user-injured',
            'url' => 'theatre.index',
            'parent_id' => 19,
            'order' => 1,
            // 'permission' => PermisionConstants::viewProviders
        ]);

        Menu::create([
            'name' => 'theatre_rooms',
            'display_name' => 'Theatre Rooms',
            'icon' => 'fa-user-injured',
            'url' => 'theatre.rooms',
            'parent_id' => 19,
            'order' => 1,
            // 'permission' => PermisionConstants::viewProviders
        ]);

        Menu::create([
            'name' => 'billing',
            'display_name' => 'Billing Groups',
            'icon' => 'fa-circle',
            'url' => 'currency.index',
            'parent_id' => 4,
            'order' => 1,
            'permission' => PermisionConstants::viewPatients
        ]);

        Menu::create([
            'name' => 'patients',
            'display_name' => 'Patients',
            'icon' => 'fa-circle',
            'url' => 'patient.index',
            'parent_id' => 4,
            'order' => 1,
            'permission' => PermisionConstants::viewPatients
        ]);

        Menu::create([
            'name' => 'patients',
            'display_name' => 'Patients',
            'icon' => 'fa-circle',
            'url' => 'patient.index',
            'parent_id' => 3,
            'order' => 1,
            'permission' => PermisionConstants::viewPatients
        ]);

        Menu::create([
            'name' => 'opd',
            'display_name' => 'OPD',
            'icon' => 'fa-circle',
            'url' => null,
            'parent_id' => 3,
            'order' => 1,
            // 'permission' => PermisionConstants::viewIt
        ]);

        Menu::create([
            'name' => 'opd',
            'display_name' => 'OPD Queue',
            'icon' => 'fa-circle',
            'url' => 'opd.index',
            'parent_id' => 34,
            'order' => 1,
            // 'permission' => PermisionConstants::viewIt
        ]);

        Menu::create([
            'name' => 'radiology',
            'display_name' => 'Radiology',
            'icon' => 'fa-circle',
            'url' => 'radiology.index',
            'parent_id' => 3,
            'order' => 1,
            // 'permission' => PermisionConstants::viewIt
        ]);

        Menu::create([
            'name' => 'radiology_list',
            'display_name' => 'Radiology Queue',
            'icon' => 'fa-circle',
            'url' => 'radiology.index',
            'parent_id' => 36,
            'order' => 1,
            // 'permission' => PermisionConstants::viewIt
        ]);

        Menu::create([
            'name' => 'radiology_add',
            'display_name' => 'Add Items',
            'icon' => 'fa-circle',
            'url' => 'scan.create',
            'parent_id' => 36,
            'order' => 1,
            // 'permission' => PermisionConstants::viewIt
        ]);

        Menu::create([
            'name' => 'maternity',
            'display_name' => 'Maternity',
            'icon' => 'fa-circle',
            'url' => 'maternity.index',
            'parent_id' => 3,
            'order' => 1,
            // 'permission' => PermisionConstants::viewIt
        ]);

        Menu::create([
            'name' => 'maternity_list',
            'display_name' => 'Maternity Queue',
            'icon' => 'fa-circle',
            'url' => 'maternity.index',
            'parent_id' => 39,
            'order' => 1,
            // 'permission' => PermisionConstants::viewIt
        ]);


    }
}
