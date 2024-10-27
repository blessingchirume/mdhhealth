<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrugsAndSundriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drugs_and_sundries')->truncate();
        // Medications
        $medications = [
            ['code' => 'ASPIRIN', 'name' => 'Aspirin', 'description' => 'Acetylsalicylic acid', 'medical_categories_id' => '1'],
            ['code' => 'PARACETAMOL', 'name' => 'Paracetamol', 'description' => 'Acetaminophen', 'medical_categories_id' => '1'],
            ['code' => 'IBUPROFEN', 'name' => 'Ibuprofen', 'description' => '', 'medical_categories_id' => '1'],
            ['code' => 'AMOXICILLIN', 'name' => 'Amoxicillin', 'description' => '', 'medical_categories_id' => '1'],
            ['code' => 'OMEPRAZOLE', 'name' => 'Omeprazole', 'description' => '', 'medical_categories_id' => '1'],
            ['code' => 'METFORMIN', 'name' => 'Metformin', 'description' => '', 'medical_categories_id' => '1'],
            ['code' => 'ATORVASTATIN', 'name' => 'Atorvastatin', 'description' => '', 'medical_categories_id' => '1'],
            ['code' => 'LISINOPRIL', 'name' => 'Lisinopril', 'description' => '', 'medical_categories_id' => '1'],
            ['code' => 'LEVOTHYROXINE', 'name' => 'Levothyroxine', 'description' => '', 'medical_categories_id' => '1'],
            ['code' => 'METOPROLOL', 'name' => 'Metoprolol', 'description' => '', 'medical_categories_id' => '1'],
            ['code' => 'SIMVASTATIN', 'name' => 'Simvastatin', 'description' => '', 'medical_categories_id' => '1'],
            ['code' => 'ALBUTEROL', 'name' => 'Albuterol', 'description' => 'Salbutamol', 'medical_categories_id' => '1'],
            ['code' => 'CETIRIZINE', 'name' => 'Cetirizine', 'description' => '', 'medical_categories_id' => '1'],
            ['code' => 'RANITIDINE', 'name' => 'Ranitidine', 'description' => '', 'medical_categories_id' => '1'],
            ['code' => 'DIPHENHYDRAMINE', 'name' => 'Diphenhydramine', 'description' => 'Benadryl', 'medical_categories_id' => '1'],
        ];

        // Medical Sundries
        $sundries = [
            ['code' => 'BANDAGE', 'name' => 'Adhesive bandages', 'description' => 'Band-Aids', 'medical_categories_id' => '2'],
            ['code' => 'GAUZE', 'name' => 'Gauze pads', 'description' => '', 'medical_categories_id' => '2'],
            ['code' => 'SWABS', 'name' => 'Alcohol swabs', 'description' => '', 'medical_categories_id' => '2'],
            ['code' => 'COTTON', 'name' => 'Cotton balls', 'description' => '', 'medical_categories_id' => '2'],
            ['code' => 'TAPE', 'name' => 'Medical tape', 'description' => '', 'medical_categories_id' => '2'],
            ['code' => 'GLOVES', 'name' => 'Disposable gloves', 'description' => '', 'medical_categories_id' => '2'],
            ['code' => 'SYRINGES', 'name' => 'Syringes', 'description' => '', 'medical_categories_id' => '2'],
            ['code' => 'THERMOMETER', 'name' => 'Thermometer', 'description' => '', 'medical_categories_id' => '2'],
            ['code' => 'TWEEZERS', 'name' => 'Tweezers', 'description' => '', 'medical_categories_id' => '2'],
            ['code' => 'SCALPEL', 'name' => 'Scalpel blades', 'description' => '', 'medical_categories_id' => '2'],
            ['code' => 'SALINE', 'name' => 'Sterile saline solution', 'description' => '', 'medical_categories_id' => '2'],
            ['code' => 'WIPES', 'name' => 'Antiseptic wipes', 'description' => '', 'medical_categories_id' => '2'],
            ['code' => 'SPLINTS', 'name' => 'Splints', 'description' => '', 'medical_categories_id' => '2'],
            ['code' => 'BANDAGES', 'name' => 'Elastic bandages', 'description' => '', 'medical_categories_id' => '2'],
            ['code' => 'COLD_PACKS', 'name' => 'Cold packs', 'description' => '', 'medical_categories_id' => '2'],
        ];

        // Medical Procedures
        $procedures = [
            ['code' => 'APPENDECTOMY', 'name' => 'Appendectomy', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'ANGIOPLASTY', 'name' => 'Coronary angioplasty', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'CATARACT_SURGERY', 'name' => 'Cataract surgery', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'KNEE_ARTHROSCOPY', 'name' => 'Knee arthroscopy', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'COLONOSCOPY', 'name' => 'Colonoscopy', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'TONSILLECTOMY', 'name' => 'Tonsillectomy', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'CESAREAN_SECTION', 'name' => 'Cesarean section (C-section)', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'ENDOSCOPY', 'name' => 'Endoscopy', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'LUMBAR_PUNCTURE', 'name' => 'Lumbar puncture (Spinal tap)', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'BONE_MARROW_BIOPSY', 'name' => 'Bone marrow biopsy', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'PROSTATECTOMY', 'name' => 'Prostatectomy', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'HYSTERECTOMY', 'name' => 'Hysterectomy', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'RHINOPLASTY', 'name' => 'Rhinoplasty', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'VASECTOMY', 'name' => 'Vasectomy', 'description' => '', 'medical_categories_id' => '3'],
            ['code' => 'DENTAL_IMPLANT', 'name' => 'Dental implant surgery', 'description' => '', 'medical_categories_id' => '3'],
        ];

        // Inserting medications
        foreach ($medications as $medication) {
            DB::table('drugs_and_sundries')->insert(array_merge($medication, ['created_by' => 1, 'updated_by' => 1]));
        }

        // Inserting sundries
        foreach ($sundries as $sundry) {
            DB::table('drugs_and_sundries')->insert(array_merge($sundry, ['created_by' => 1, 'updated_by' => 1]));
        }

        // Inserting procedures
        foreach ($procedures as $procedure) {
            DB::table('drugs_and_sundries')->insert(array_merge($procedure, ['created_by' => 1, 'updated_by' => 1]));
        }
    }
}
