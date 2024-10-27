<?php

namespace App\Constants;

class PermisionConstants
{
    // dashboard
    const viewAdminOption  = 'View admnin option';
    const viewDashboard  = 'view dashboard';

    // misc
    const viewSkimMilk = 'view skim milk';

    // intake 
    const viewInventoryMaster  = 'view inventory master';
    const viewInventoryIntake  = 'view inventory intake';
    const viewDailyInventoryIntake  = 'view daily inventory intake';
    const viewYTDInventoryIntake  = 'view YTD inventory intake';
    const createInventoryReciept  = 'create inventory reciept';
    const viewRelatedInventoryRecieptBatch  = 'view related inventory reciept batch';

    // tansfers
    const viewInventoryTransferMaster  = 'view inventory transfer master';
    const viewDailyInventoryTransfer  = 'view daily Inventory transfer';
    const viewInventoryTransfer  = 'view Inventory transfer';
    const viewYTDInventoryTransfer  = 'view YTD inventory transfer';
    const createInventoryTransfer  = 'create inventory transfer';

    // users
    const viewUserMaster = 'view user master';
    const viewUsers  = 'view users';
    const viewUser = 'view user';
    const deleteUser = 'delete user';
    const updateUser  = 'update user';
    const createUser  = 'create new user';
    // roles 
    const viewUserRoles  = 'view user roles';
    const updateUserRole  = 'update user role';
    const revokeUserRole  = 'revoke user role';
    const attachRole  = 'attach role';

    // config
    const viewSystemConfig  = 'view system config';
    const viewSystemValues  = 'view system values';
    const viewSystemProducts  = 'view system products';
    const viewSystemVendors  = 'view system vendors';
    const viewSystemWarehouses  = 'view system warehouses';

    // Patients 
    const viewPatients  = 'view patients';
    const viewPatient  = 'view patient';
    const createPatient  = 'create patient';
    const updatePatient  = 'update patient';
    const deletePatient  = 'delete patient';

    // departments
    const viewDepartments  = 'view departments';
    const viewDepartment  = 'view department';
    const createDepartment  = 'create department';
    const updateDepartment  = 'update department';
    const deleteDepartment  = 'delete department';
    const attachUserToDepartment  = 'attach user to department';
    const revokeUserFromDepartment  = 'revoke user from department';

    // Payments 
    const viewPayments  = 'view payments';
    const viewPayment  = 'view payment';
    const createPayment  = 'create payment';
    const updatePayment  = 'update payment';
    const deletePayment  = 'delete payment';

    // Providers
    const viewProviders  = 'view providers';
    const viewProvider  = 'view provider';
    const createProvider  = 'create provider';
    const updateProvider  = 'update provider';
    const deleteProvider  = 'delete provider';
    const attachPackageToProvider  = 'attach package to provider';
    const revokePackageFromProvider = 'revoke package from provider';

    // Packages 
    const viewPackages  = 'view packages';
    const viewPackage  = 'view package';
    const createPackage  = 'create package';
    const updatePackage  = 'update package';
    const deletePackage  = 'delete package';

    // Vital 
    const createVital = 'create patient vitals';
    const viewVitals = 'view vitals';
    const viewVitalsQueue = 'view vitals queue';
    const viewIcu = 'view icu';
    const viewEmergencyRoomAddmissions = 'view emegerncy room admissions';
    const viewIcuAdmissions = 'view icu admissions';
    const viewTheater = 'view theater';
    const viewAppointments = 'view appointments';
    const viewLaboratory = 'view laboratory';
    const viewAppointmentsMaster = 'view appointment master';
    const viewTestBooking = 'view laboratory tests booking';


}
