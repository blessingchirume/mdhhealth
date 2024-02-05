<?php

namespace App\Http\Livewire;

use App\Models\ICUAdmission;
use Livewire\Component;
use Livewire\WithPagination;

class IcuAdmissionsTable extends Component
{
    use WithPagination;

    public $search, $sort = 'id', $direction = 'asc', $admissionDateFrom, $admissionDateTo, $dischargeDateFrom, $dischargeDateTo, $status;

    protected $listeners = ['refreshTable'];
    protected $admissions;

    public function mount()
    {
        $this->admissions = ICUAdmission::with('admission.episode.patient', 'admission.episode.chargesheet')
            ->when($this->search, function ($query) {
                $query->where('admission.name', 'like', "%{$this->search}%")
                    ->orWhere('admission.episode.episode_code', 'like', "%{$this->search}%")
                    ->orWhereHas('admission.episode.patient', function ($query) {
                        $query->where('name', 'like', "%{$this->search}%");
                    });
            })
            ->when($this->admissionDateFrom, function ($query) {
                $query->whereHas('admission.episode.chargesheet', function ($query) {
                    $query->where('checkin', '>=', $this->admissionDateFrom);
                });
            })
            ->when($this->admissionDateTo, function ($query) {
                $query->whereHas('admission.episode.chargesheet', function ($query) {
                    $query->where('checkin', '<=', $this->admissionDateTo);
                });
            })
            ->when($this->dischargeDateFrom, function ($query) {
                $query->whereHas('admission.episode.chargesheet', function ($query) {
                    $query->where('checkout', '>=', $this->dischargeDateFrom);
                });
            })
            ->when($this->dischargeDateTo, function ($query) {
                $query->whereHas('admission.episode.chargesheet', function ($query) {
                    $query->where('checkout', '<=', $this->dischargeDateTo);
                });
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->orderBy($this->sort, $this->direction)
            ->paginate(15);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sort == $field) {
            $this->direction = $this->direction == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort = $field;
            $this->direction = 'asc';
        }
    }

    public function render()
    {
        return view('livewire.tables.icu-admissions-table', ['admissions' => $this->admissions]);

    }

    public function refreshTable()
    {
        $this->mount();
    }
}
