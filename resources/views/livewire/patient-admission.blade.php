<!-- resources/views/livewire/patient-admission.blade.php -->

<div>
    <label for="patientName">Patient Name:</label>
    <input type="text" id="patientName" wire:model.debounce.3000ms="patientName">

    <div wire:loading wire:target="searchPatient">
        Loading...
    </div>

    @if ($patient)
        <div>
            <label for="surname">Surname:</label>
            <input type="text" id="surname" wire:model="surname" readonly>
        </div>

        <div>
            <label for="age">Age:</label>
            <input type="text" id="age" wire:model="age" readonly>
        </div>

        <div>
            <label for="dob">Date of Birth:</label>
            <input type="text" id="dob" wire:model="dob" readonly>
        </div>

        <div>
            <label for="gender">Gender:</label>
            <input type="text" id="gender" wire:model="gender" readonly>
        </div>
    @endif

    <button wire:click="addPatient">Add Patient</button>
</div>
