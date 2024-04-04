<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;
use App\Models\Episode;
use App\Models\ChargeSheet;
use App\Models\MedicalAid;
use App\Models\MedicalAidPackage;
use App\Models\PatientMedicalAidEntry;
use App\Models\PaymentOption;
use App\Models\Ward;
use App\Models\Gurantor;
use App\Models\NextOfKeen;

class AddPatientModal extends Component
{
    public $name;
    public $surname;
    public $dob;
    public $gender;
    public $search;
    public $existingPatients = [];
    public $selectedPatientId;
    public $medicalAidDetails;
    public $paymentGuarantorDetails;
    public $nextOfKinDetails;
    public $currentStage = 1;
    public $paymentOption=1;
    public $national_id;
    public $email;
    public $phone;
    public $address;
    public $medicalAidPolicyNumber;
    public $medicalAidMemberName;
    public $guarantorName;
    public $guarantorPhone;
    public $guarantorEmail;
    public $guarantorAddress;
    public $guarantorRelationship;
    public $guarantorNationalId;
    public $guarantorGender;
    public $guarantorSurname;
    public $medicalAidProviders;
    public $medicalAidProvider;
    public $medicalAidPackages = [];
    public $medicalAidPackage;
    public $paymentOptions;
    public $visitPurpose;
    public $otherVisitPurpose;
    public $ward;
    public $wards;
    public $medicalAidSuffix;
    public $kinName;
    public $kinSurname;
    public $kinPhone;
    public $kinGender;
    public $kinNationalId;
    public $kinAddress;
    public $kinRelation;

    public function mount()
    {
        // Fetch existing patients or set defaults
        // Fetch medical aid providers
        $this->medicalAidProviders = MedicalAid::all();
        $this->paymentOptions = PaymentOption::all();
        $this->wards = Ward::all();
    }

    public function updatedMedicalAidProvider($value)
    {
        // Fetch medical aid packages based on the selected provider
        if ($value) {
            $this->medicalAidPackages = MedicalAidPackage::where('medical_aid_id', $value)->get();
        } else {
            $this->medicalAidPackages = [];
        }
    }

    public function render()
    {
        // Only fetch existing patients if the search input is not empty
        if (!empty($this->search)) {
            $this->existingPatients = Patient::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('surname', 'like', '%' . $this->search . '%')
                ->get();
        } else {
            $this->existingPatients = [];
        }
        $medicalAidProviders = MedicalAid::all();
        return view('livewire.add-patient-modal', compact('medicalAidProviders'));
    }
    public function submitFocusedForm()
    {

    }
    public function resetForm()
    {
        $this->name = '';
        $this->surname = '';
        $this->dob = '';
        $this->gender = '';
        $this->search = '';
        $this->address = '';
        $this->phone = '';
        $this->national_id = '';
        $this->email = '';
        $this->selectedPatientId = null;
        $this->medicalAidDetails = '';
        $this->paymentGuarantorDetails = '';
        $this->nextOfKinDetails = '';
        $this->currentStage = 1;
    }

    public function nextStage()
    {
        $this->currentStage++;
    }

    public function previousStage()
    {
        $this->currentStage--;
    }
    public function skipStage()
    {
        // Increment the current stage to move to the next stage
        $this->currentStage++;
    }

    public function selectMedicalAid($provider)
    {
        $this->medicalAidPackages = MedicalAid::find($provider)->with('packages')->get();
    }

    public function switchStage($stage) {
        $this->currentStage = $stage;
    }

    public function selectPatient($patientId)
    {
        // Fetch the details of the selected patient
        $selectedPatient = Patient::find($patientId);

        // Set the form fields with the details of the selected patient
        $this->name = $selectedPatient->name;
        $this->surname = $selectedPatient->surname;
        $this->dob = $selectedPatient->dob;
        $this->gender = $selectedPatient->gender;
        $this->address = $selectedPatient->address;
        $this->phone = $selectedPatient->phone;
        $this->email = $selectedPatient->email;
        $this->national_id = $selectedPatient->national_id;

        //set selected patient value
        $this->selectedPatientId = $patientId;

        // Clear the search input and existing suggestions
        $this->search = '';
        $this->existingPatients = [];
    }

    public function addPatient()
    {
        // Create a new patient
        try {
            if ($this->selectedPatientId == null) {
                $this->validate([
                    'name' => 'required',
                    'surname' => 'required',
                    'dob' => 'required',
                    'gender' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'address' => 'required',
                    'national_id' => 'required',
                ]);
                $newPatient = Patient::create([
                    'name' => $this->name,
                    'surname' => $this->surname,
                    'dob' => $this->dob,
                    'gender' => $this->gender,
                    'address' => $this->address,
                    'phone' => $this->phone,
                    'email' => $this->email,
                    'national_id' => $this->national_id,
                    'patient_id' => 'MDHP' . rand(00000, 99999),
                ]);

                $this->selectedPatientId = $newPatient->id;

                session()->flash('success', 'Patient added successfully!');
                $this->nextStage();
            } else {
                $this->queuePatient();
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error adding patient: ' . $e->getMessage());
        }
    }

    public function addMedicalAid()
    {
        $this->validate([
            'medicalAidProvider' => 'required',
            'medicalAidPackage' => 'required',
            'medicalAidSuffix' => 'required',
            'medicalAidMemberName' => 'required',
            'medicalAidPolicyNumber' => 'required'
        ]);

        try {
            $medicalAidEntry = PatientMedicalAidEntry::create([
                'patient_id' => $this->selectedPatientId,
                'suffix_number' => $this->medicalAidSuffix,
                'package_id' => $this->medicalAidPackage,
                'member_name' => $this->medicalAidMemberName,
                'policy_number' => $this->medicalAidPolicyNumber,
            ]);

            session()->flash('success', 'Medical aid added successfully!');
            $this->nextStage();

        } catch (\Exception $e) {
            session()->flash('error', 'Error adding medical aid: ' . $e->getMessage());
        }

    }

    public function addGuarantor()
    {
        $this->validate([
            'guarantorName' => 'required',
            'guarantorSurname' => 'required',
            'guarantorPhone' => 'required',
            'guarantorGender' => 'required',
            'guarantorAddress' => 'required',
            'guarantorRelationship' => 'required',
            'guarantorNationalId' => 'required',
        ]);

        try {
            $guarantor = Gurantor::create([
                'patient_id' => $this->selectedPatientId,
                'name' => $this->guarantorName,
                'phone' => $this->guarantorPhone,
                'surname' => $this->guarantorSurname,
                'address' => $this->guarantorAddress,
                'relationship' => $this->guarantorRelationship,
                'national_id' => $this->guarantorNationalId,
                'gender' => $this->guarantorGender,
            ]);

            session()->flash('success', 'Guarantor added successfully!');
            $this->nextStage();
            $this->resetGuarantorFields();
        } catch (\Exception $e) {
            session()->flash('error', 'Error adding guarantor: ' . $e->getMessage());
        }
        //
    }

    public function resetGuarantorFields()
    {
        $this->guarantorName = '';
        $this->guarantorPhone = '';
        $this->guarantorEmail = '';
        $this->guarantorAddress = '';
        $this->guarantorRelationship = '';
    }

    public function addNextOfKin()
    {
        $this->validate([
            'kinName' => 'required',
            'kinSurname' => 'required',
            'kinPhone' => 'required',
            'kinGender' => 'required',
            'kinNationalId' => 'required',
            'kinAddress' => 'required',
            'kinRelation'=>'required',
        ]);

        try{
            $kindred = NextOfKeen::create([
                'patient_id' => $this->selectedPatientId,
                'next_of_keen_name' => $this->kinName,
                'next_of_keen_phone' => $this->kinPhone,
                'next_of_keen_surname' => $this->kinSurname,
                'next_of_keen_address' => $this->kinAddress,
                'next_of_keen_national_id' => $this->kinNationalId,
                'next_of_keen_gender' => $this->kinGender,
                'next_of_keen_relationship' =>$this->kinRelation
            ]);

            session()->flash('success', 'Next of Kin added successfully!');

        } catch (\Exception $e) {
            session()->flash('error', 'Error adding next of kin: ' . $e->getMessage());
        }
    }
    public function queuePatient()
    {
        $patient = Patient::find($this->selectedPatientId)->first();
        $patientId = $patient->patient_id;
        $data["episode_entry"] = (int) Episode::where('patient_id', $patientId)->max('episode_entry') + 1;
        $data["episode_code"] = $patientId . "/" . $data["episode_entry"];

        $data["patient_id"] = $this->selectedPatientId;
        $data["patient_type"] = 'OutPatient';
        $data["payment_option_id"] = $this->paymentOption;
        $data['visit_purpose'] = ($this->visitPurpose != 'other') ? $this->visitPurpose : $this->otherVisitPurpose;
        $data['ward'] = $this->ward;
        $data['attendee']='OPD';
        $data["date"] = date('Y-m-d');

        $episode = Episode::create($data);

        ChargeSheet::create([
            "episode_id" => $episode->id,
            "checkin" => date('Y-m-d'),
        ]);

        $this->resetForm();

        // Close the modal after adding the patient
        $this->emit('closeModal');
    }
}
