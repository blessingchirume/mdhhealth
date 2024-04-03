<div class="modal-body">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ $currentStage == 1 ? 'active' : '' }}" wire:click="switchStage(1)">Patient Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentStage == 2 ? 'active' : '' }}" wire:click="switchStage(2)">Medical Aid</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentStage == 3 ? 'active' : '' }}" wire:click="switchStage(3)">Payment Guarantor</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentStage == 4 ? 'active' : '' }}" wire:click="switchStage(4)">Next of Kin</a>
        </li>
    </ul>
    <div class="tab-content mt-2">
        <div class="tab-pane fade {{ $currentStage == 1 ? 'show active' : '' }}" id="patient-details" role="tabpanel">
            <!-- Patient Details Form Section -->
            <form wire:submit.prevent="nextStage">
                <!-- Patient Details Form Fields -->
                <div class="form-group">
                    <label for="search">Search Patient</label>
                    <input type="text" class="form-control" wire:model.debounce.300ms="search" id="search">
                    <div class="mt-2">
                        @foreach($existingPatients as $patient)
                            <div
                                wire:click="selectPatient({{ $patient->id }})"
                                class="cursor-pointer suggestion-item"
                            >
                                {{ $patient->name }} {{ $patient->surname }}
                            </div>
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
                    <label for="age">D.O.B</label>
                    <input type="number" class="form-control" wire:model.defer="dob" id="dob">
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
                <button type="submit" class="btn btn-primary">Next</button>

            </form>
        </div>
        <div class="tab-pane fade {{ $currentStage == 2 ? 'show active' : '' }}" id="medical-aid" role="tabpanel">
            <!-- Medical Aid Form Section -->
            <form wire:submit.prevent="nextStage">
                <!-- Medical Aid Form Fields -->
                <!-- Medical Aid Details -->
                <!-- Submit Button -->
            </form>
        </div>
        <div class="tab-pane fade {{ $currentStage == 3 ? 'show active' : '' }}" id="payment-guarantor" role="tabpanel">
            <!-- Payment Guarantor Form Section -->
            <form wire:submit.prevent="nextStage">
                <!-- Payment Guarantor Form Fields -->
                <!-- Payment Guarantor Details -->
                <!-- Submit Button -->
            </form>
        </div>
        <div class="tab-pane fade {{ $currentStage == 4 ? 'show active' : '' }}" id="next-of-kin" role="tabpanel">
            <!-- Next of Kin Form Section -->
            <form wire:submit.prevent="addPatient">
                <!-- Next of Kin Form Fields -->
                <!-- Next of Kin Details -->
                <!-- Submit Button -->
            </form>
        </div>
    </div>
    <div class="modal-footer">
        @if ($currentStage > 1)
            <button type="button" class="btn btn-secondary" wire:click="previousStage">Previous</button>
        @endif

        @if ($currentStage < 4)
            <button type="button" class="btn btn-primary" wire:click="nextStage">Next</button>
            <button type="button" class="btn btn-secondary ml-2" wire:click="skipStage">Skip</button>
        @else
            <button type="button" class="btn btn-primary" wire:click="addPatient">Add Patient</button>
        @endif
    </div>
</div>

<style>
    .suggestion-item {
    padding: 8px 12px;
    cursor: pointer;
}

.suggestion-item:hover {
    background-color: #f0f0f0;
}

</style>
