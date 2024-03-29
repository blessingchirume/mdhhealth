<?php

namespace App\Http\Livewire;

use App\Models\PaymentOption;
use Livewire\Component;

class PaymentOptionSelector extends Component
{
    public $paymentOption;

    public $paymentOptions;

    public function mount()
    {
       $this->paymentOption = 'Medical_aid'; // Initialize selected patient

       $this->paymentOptions = PaymentOption::all();
    }

    public function render()
    {
        return view('livewire.payment-option-selector');
    }

    public function UpdatePaymentOption() {
        // dd($this->paymentOption);
    }
}
