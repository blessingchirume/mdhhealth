<?php

namespace Database\Seeders;

use App\Constants\FactoryRoleConstants;
use App\Constants\PermisionConstants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        // dashboard
        Permission::create(['name' => PermisionConstants::viewAdminOption]);
        Permission::create(['name' => PermisionConstants::viewDashboard]);

        // misc
        Permission::create(['name' => PermisionConstants::viewSkimMilk]);

        // intake
        Permission::create(['name' => PermisionConstants::viewInventoryMaster]);
        Permission::create(['name' => PermisionConstants::viewDailyInventoryIntake]);
        Permission::create(['name' => PermisionConstants::viewYTDInventoryIntake]);
        Permission::create(['name' => PermisionConstants::createInventoryReciept]);
        Permission::create(['name' => PermisionConstants::viewRelatedInventoryRecieptBatch]);

        // transfers 
        Permission::create(['name' => PermisionConstants::viewInventoryTransferMaster]);
        Permission::create(['name' => PermisionConstants::viewDailyInventoryTransfer]);
        Permission::create(['name' => PermisionConstants::viewYTDInventoryTransfer]);
        Permission::create(['name' => PermisionConstants::createInventoryTransfer]);

        // users
        Permission::create(['name' => PermisionConstants::viewUserMaster]);
        Permission::create(['name' => PermisionConstants::viewUsers]);
        Permission::create(['name' => PermisionConstants::viewUser]);
        Permission::create(['name' => PermisionConstants::deleteUser]);
        Permission::create(['name' => PermisionConstants::updateUser]);

        // roles
        Permission::create(['name' => PermisionConstants::viewUserRoles]);
        Permission::create(['name' => PermisionConstants::updateUserRole]);
        Permission::create(['name' => PermisionConstants::revokeUserRole]);
        Permission::create(['name' => PermisionConstants::attachRole]);

        // config
        Permission::create(['name' => PermisionConstants::viewSystemConfig]);
        Permission::create(['name' => PermisionConstants::viewSystemValues]);
        Permission::create(['name' => PermisionConstants::viewSystemProducts]);
        Permission::create(['name' => PermisionConstants::viewSystemVendors]);
        Permission::create(['name' => PermisionConstants::viewSystemWarehouses]);

        // Patients
        Permission::create(['name' => PermisionConstants::viewPatient]);
        Permission::create(['name' => PermisionConstants::viewPatients]);
        Permission::create(['name' => PermisionConstants::createPatient]);
        Permission::create(['name' => PermisionConstants::updatePatient]);
        Permission::create(['name' => PermisionConstants::deletePatient]);

        // Departments
        Permission::create(['name' => PermisionConstants::viewDepartments]);
        Permission::create(['name' => PermisionConstants::viewDepartment]);
        Permission::create(['name' => PermisionConstants::createDepartment]);
        Permission::create(['name' => PermisionConstants::updateDepartment]);
        Permission::create(['name' => PermisionConstants::deleteDepartment]);
        Permission::create(['name' => PermisionConstants::attachUserToDepartment]);
        Permission::create(['name' => PermisionConstants::revokeUserFromDepartment]);

        // Payments
        Permission::create(['name' => PermisionConstants::viewPayment]);
        Permission::create(['name' => PermisionConstants::viewPayments]);
        Permission::create(['name' => PermisionConstants::createPayment]);
        Permission::create(['name' => PermisionConstants::updatePayment]);
        Permission::create(['name' => PermisionConstants::deletePayment]);

        // Providers
        Permission::create(['name' => PermisionConstants::viewProvider]);
        Permission::create(['name' => PermisionConstants::viewProviders]);
        Permission::create(['name' => PermisionConstants::createProvider]);
        Permission::create(['name' => PermisionConstants::updateProvider]);
        Permission::create(['name' => PermisionConstants::deleteProvider]);
        Permission::create(['name' => PermisionConstants::attachPackageToProvider]);
        Permission::create(['name' => PermisionConstants::revokePackageFromProvider]);

        // Payments
        Permission::create(['name' => PermisionConstants::viewPackage]);
        Permission::create(['name' => PermisionConstants::viewPackages]);
        Permission::create(['name' => PermisionConstants::createPackage]);
        Permission::create(['name' => PermisionConstants::updatePackage]);
        Permission::create(['name' => PermisionConstants::deletePackage]);

        // Vital
        Permission::create(['name' => PermisionConstants::createVital]);
        Permission::create(['name' => PermisionConstants::viewVitals]);
        Permission::create(['name' => PermisionConstants::viewVitalsQueue]);

        // Admissions
        Permission::create(['name' => PermisionConstants::viewIcu]);
        Permission::create(['name' => PermisionConstants::viewEmergencyRoomAddmissions]);
        Permission::create(['name' => PermisionConstants::viewIcuAdmissions]);

        // Theater
        Permission::create(['name' => PermisionConstants::viewTheater]);

        // Appointments
        Permission::create(['name' => PermisionConstants::viewAppointments]);
        Permission::create(['name' => PermisionConstants::viewAppointmentsMaster]);

        // Bookings
        Permission::create(['name' => PermisionConstants::viewTestBooking]);

        // Laboratory
        Permission::create(['name' => PermisionConstants::viewLaboratory]);

        $super = Role::create(['name' => FactoryRoleConstants::SuperAdmin]);
        $inventoryClerk = Role::create(['name' => FactoryRoleConstants::InventoryClerk]);
        $billingClerk = Role::create(['name' => FactoryRoleConstants::BillingClerk]);
        $doctor = Role::create(['name' => FactoryRoleConstants::Doctor]);
        $sister = Role::create(['name' => FactoryRoleConstants::Sister]);
    }
}
