<div class="modal-body">
    <form wire:submit.prevent="addPatient">
        <div class="form-group">
            <label for="search">Search Patient</label>
            <input type="text" class="form-control" wire:model.debounce.300ms="search" id="search">
            <div class="mt-2">
                @foreach($existingPatients as $patient)
                    <div wire:click="selectPatient({{ $patient->id }})" class="cursor-pointer">{{ $patient->name }} {{ $patient->surname }}</div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" wire:model.defer="name" id="name">
        </div>
        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" class="form-control" wire:model.defer="surname" id="surname">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" wire:model.defer="age" id="age">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" wire:model.defer="gender" id="gender">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Patient</button>
    </form>
</div>
