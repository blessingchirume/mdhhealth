<?php

namespace App\Http\Livewire;

use App\Models\ChargeSheet;
use App\Models\ChargeSheetItem;
use App\Models\Episode;
use App\Models\Item;
use App\Models\RadiologyBooking;
use Livewire\Component;

class RadiologyBill extends Component
{
    public $bookingId;
    public $episodeId;
    public $chargesheetItems = [];
    public $totalBasePrice = 0;
    public $amountPaid = 0;
    public $paidItem=0;
    public $chargeSheet;

    protected $listeners = ['setEpisodeAndBooking'];

    public function setEpisodeAndBooking($episodeId, $bookingId)
    {
        $this->episodeId = $episodeId;
        $this->bookingId = $bookingId;
        $this->fetchChargeSheetItems();
    }

    public function fetchChargeSheetItems()
    {
        $this->chargeSheet = ChargeSheet::where('episode_id', $this->episodeId)
            ->first();
        if ($this->chargeSheet) {
            $this->chargesheetItems = $this->chargeSheet->items;
            
            $this->calculateTotalBasePrice();
        } else {
            $this->chargesheetItems = [];
            $this->totalBasePrice = 0;
        }
    }

    public function calculateTotalBasePrice()
    {
        $this->paidItem =0;
        foreach ($this->chargeSheet->chargesheetitems as $item) {
            if ($item->status == 'Paid' && $item->item!=NULL) {
                $product = Item::find($item->item_id);
                $this->paidItem += $product->base_price;
            }
        } 
        $this->totalBasePrice = $this->chargesheetItems->sum('base_price') - $this->paidItem;
    }

    public function submitPayment()
    {
        // Validate that the amount paid covers the total base price
        if ($this->amountPaid >= $this->totalBasePrice) {
            // Update the status of each chargesheet item to "paid"
            $chargeSheet = ChargeSheet::with('chargesheetitems')
                ->where('episode_id', $this->episodeId)
                ->first();
            $chargesheetItems = $chargeSheet->chargesheetitems;
            
            foreach ($chargesheetItems as $item) {
                $item->update(['status' => 'Paid']);
            }
            $booking = RadiologyBooking::find($this->bookingId);
            $booking->update(['status'=>'In-Progress']);
            $this->amountPaid = 0;
            session()->flash('message', 'Payment successfully submitted and chargesheet items updated.');
        } else {
            session()->flash('error', 'The amount paid is less than the total amount due.');
        }
    }

    public function render()
    {
        $episode = Episode::find($this->episodeId);
        return view('livewire.radiology-bill', compact('episode'));
    }
}
