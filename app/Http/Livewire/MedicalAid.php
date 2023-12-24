<?php

namespace App\Http\Livewire;

use App\Models\MedicalAid as ModelsMedicalAid;
use App\Models\Package;
use App\Models\Partner;
use Livewire\Component;

class MedicalAid extends Component
{
    public $providers = [];

    public $provider = 1;

    public $packages = [];

    public function render()
    {
        return view('livewire.medical-aid');
    }

    public function mount(){

        // dd($this->provider);
        $this->providers = Partner::all();
        $this->packages = Package::where('partner_id',$this->provider)->get();
    }

    public function updateProvider(){
        // dd($this->provider);

        $this->packages = Package::where('partner_id',$this->provider)->get();
    }

    
}
