<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use Exception;
use Livewire\Component;
use Auth;

class TreatmentForm extends Component
{
    public $treatmentType = 'medication';
    public $medications = [];
    public $otherTreatment = '';
    public $dosage = '';
    public $duration = '';
    public $frequency = '';
    public $medication = '';
    public $instructions = '';
    public $drugs;
    public $otherTreatments;
    public $dosages = ['5mg', '10mg', '15mg', '120mg'];
    public $frequencies = ['Once a day', 'Twice a day', 'Three times a day', 'As needed'];
    public $procedures = [];
    public $procedure = '';
    public $episode;
    public $prescriptions = [];
    public $hasPrescription;
    public $start_dose;
    public $has_start_dose;

    public function addProcedure()
    {
        // $this->validate([
        //     'medications.*.medication' => 'required',
        //     'medications.*.dosage' => 'required',
        //     'medications.*.frequency' => 'required',
        //     'medications.*.duration' => 'required',
        // ]);

        $item = Item::find($this->procedure);
        $this->procedures[] = [
            'medication' => $item->item_description,
            'id' => $this->medication,
            'start_dose' => $this->start_dose,
            'has_start_dose' => $this->has_start_dose,
            'dosage' => $this->dosage,
            'frequency' => $this->frequency,
            'duration' => $this->duration,
        ];
        $this->prescriptions[] = [
            'medication' => $this->procedure,
            'dosage' => $this->dosage,
            'start_dose' => $this->start_dose,
            'frequency' => $this->frequency,
            'duration' => $this->duration,
        ];
        // Reset form fields
        $this->reset(['medication', 'dosage', 'start_dose', 'frequency', 'duration']);


        // $item = Item::find($this->procedure);
        // $this->procedures[] = [
        //     'procedure' => $item->item_description,
        //     // 'procedure' => $this->procedure,
        // ];
        // $this->prescriptions[] = [
        //     'medication' => $this->procedure,
        //     'dosage' => null,
        //     'frequency' => null,
        //     'duration' => 1,
        // ];
        // $this->reset('procedure');
    }

    public function hasPrescription()
    {
        return Prescription::where('episode_id', $this->episode->id)->exists();
    }
    public function mount($episode)
    {
        $this->episode = $episode;
        $this->drugs = Item::whereHas('group', function ($query) {
            $query->whereIn('name', ['Drugs', 'Medical Supplies', 'Medicine']);
        })->pluck('item_description', 'id')->toArray();

        $this->otherTreatments = Item::whereHas('group', function ($query) {
            $query->whereIn('name', ['Procedures', 'Services', 'Medical Procedures']);
        })->pluck('item_description', 'id')->toArray();

        $this->hasPrescription = $this->hasPrescription();

        /* if ($this->hasPrescription()) {
            $prescription = Prescription::with('prescription_items')->where('episode_id', $this->episode->id)->first();

            foreach ($prescription->prescription_items as $drug) {
                $item = Item::where('id','=',$drug->item_id)->whereHas('group', function ($query) {
                    $query->whereIn('name', ['Drugs', 'Medical Supplies', 'Medicine']);
                })->pluck('item_description', 'id')->toArray();//dd($item);
                $this->medications[] = [
                    'medication' => $item[$drug->item_id],
                    'id' => $drug->item_id,
                    'has_start_dose' => $drug->has_start_dose,
                    'dosage' => $drug->dosage,
                    'frequency' => $drug->frequency,
                    'duration' => $drug->duration,
                ];
            }
        }else{

        }*/
    }

    public function addMedication()
    {
        $this->validate([
            'medications.*.medication' => 'required',
            'medications.*.dosage' => 'required',
            'medications.*.frequency' => 'required',
            'medications.*.duration' => 'required',
        ]);

        $item = Item::find($this->medication);
        $this->medications[] = [
            'medication' => $item->item_description,
            'id' => $this->medication,
            'start_dose' => $this->start_dose,
            'has_start_dose' => $this->has_start_dose,
            'dosage' => $this->dosage,
            'frequency' => $this->frequency,
            'duration' => $this->duration,
        ];
        $this->prescriptions[] = [
            'medication' => $this->medication,
            'dosage' => $this->dosage,
            'start_dose' => $this->start_dose,
            'frequency' => $this->frequency,
            'duration' => $this->duration,
        ];
        // Reset form fields
        $this->reset(['medication', 'dosage', 'start_dose', 'frequency', 'duration']);

        // Emit custom event to re-render the component
        $this->emit('medicationAdded');
    }

    public function removeMedication($index)
    {
        unset($this->medications[$index]);
    }

    public function submit()
    {

        // Handle form submission logic here
        if (!$this->hasPrescription()) {
            $prescription = Prescription::create([
                'episode_id' => $this->episode->id,
                'prescribed_by' => Auth::user()->id,
                'created_at' => now()->toDateString(),
            ]);
        } else {
            $prescription = Prescription::where('episode_id', $this->episode->id)->first();
        }

        // dd($this->prescriptions);
        try {

            foreach ($this->prescriptions as $prescribed) {
                
                $has_start_dose = $prescribed['start_dose']!=null? 1:0;

                $mdecation = PrescriptionItem::create([
                    'prescription_id' => $prescription->id,
                    'item_id' => $prescribed['medication'],
                    'dosage' => $prescribed['dosage'] ?? 'N/A',
                    'start_dose' => $prescribed['start_dose'] ?? 0,
                    'has_start_dose'=>$has_start_dose,
                    'frequency' => $prescribed['frequency'] ?? 'N/A',
                    'duration' => $prescribed['duration'] ?? 1
                ]);

                dd($mdecation);
            }
            $this->emit('prescriptionAdded');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.treatment-form');
    }
}
