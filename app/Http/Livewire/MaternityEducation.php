<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MaternityEducation extends Component
{
    public $topics = [];
    public $complaints =[];
    public $topic ='';
    public $complaint='';

    public function render()
    {
        return view('livewire.maternity-education');
    }

    public function addTopic()
    {
        $this->validate([
            'topic' => 'required',
            //'topic' => 'required',
        ]);

        $this->topics[] = [
            //'complaint' => $this->complaint,
            'topic' => $this->topic
        ];

        // Reset form fields
       // $this->reset(['complaint', 'topic']);
        $this->reset(['topic']);
    }

    public function removeTopic($index)
    {
        unset($this->topics[$index]);
    }
}
