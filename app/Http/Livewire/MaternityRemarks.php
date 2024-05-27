<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MaternityRemarks extends Component
{
    public $remarks = [];
    public $complaints =[];
    public $remark ='';
    public $complaint='';

    public function render()
    {
        return view('livewire.maternity-remarks');
    }

    public function addRemark()
    {
        $this->validate([
            'remark' => 'required',
            //'remark' => 'required',
        ]);

        $this->remarks[] = [
            //'complaint' => $this->complaint,
            'remark' => $this->remark
        ];

        // Reset form fields
       // $this->reset(['complaint', 'remark']);
        $this->reset(['remark']);
    }

    public function removeRemark($index)
    {
        unset($this->remarks[$index]);
    }
}
