<div class="modal-body">
    <ul class="nav nav-tabs" style="cursor:disabled;">
        <li class="nav-item">
            <a class="nav-link {{ $currentStage == 1 ? 'active' : '' }}">Patient Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentStage == 2 ? 'active' : '' }}">Payment Method</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentStage == 3 ? 'active' : '' }}">Payment
                Guarantor</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentStage == 4 ? 'active' : '' }}">Next of Kin</a>
        </li>
    </ul>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Your form and other HTML content here... -->

    <div class="tab-content mt-2">
        <div class="tab-pane fade {{ $currentStage == 1 ? 'show active' : '' }}" id="patient-details" role="tabpanel">
            <!-- Patient Details Form Section -->
            <form wire:submit.prevent="addPatient">
                <!-- Patient Details Form Fields -->
                <div class="form-group">
                    <label for="search">Search Patient</label>
                    <input type="text" class="form-control" wire:model.debounce.300ms="search" id="search">
                    <div class="mt-2">
                        @foreach ($existingPatients as $patient)
                            <div wire:click="selectPatient({{ $patient->id }})" class="cursor-pointer suggestion-item">
                                {{ $patient->name }} {{ $patient->surname }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" wire:model.defer="name" id="name">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" wire:model.defer="surname" id="surname">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="age">D.O.B</label>
                        <input type="date" class="form-control" wire:model.defer="dob" id="dob">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="gender">Gender</label>
                        <select class="form-control" wire:model.defer="gender" id="gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="id_number">National ID No.</label>
                        <input type="text" class="form-control" wire:model.defer="national_id" id="national_id">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" wire:model.defer="phone" id="phone">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" wire:model.defer="email" id="email">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="address">Address</label>
                        <textarea class="form-control" wire:model.defer="address" id="address"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="purpose">Purpose of Visit</label>
                        <select class="form-control" wire:model="visitPurpose" id="purpose">
                            <option value="">Select Purpose of Visit</option>
                            <option value="review">Review</option>
                            <option value="treatment">Treatment</option>
                            <option value="other">Other</option>
                        </select>
                        @if ($visitPurpose == 'other')
                            <div class="mt-2">
                                <input type="text" class="form-control" wire:model.defer="otherVisitPurpose"
                                    id="purpose-other" placeholder="Enter Purpose of Visit">
                            </div>
                        @else
                            &nbsp;
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ward">Ward</label>
                        <select class="form-control" wire:model="ward" id="ward">
                            <option value="">Select Ward</option>
                            @foreach ($wards as $ward)
                                <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
        <div class="tab-pane fade {{ $currentStage == 2 ? 'show active' : '' }}" id="payment-methods"
            role="tabpanel">
            <!-- Payment Methods Form Section -->
            <div class="form-group">
                <label for="payment-mode">Payment Mode</label>
                <select class="form-control" wire:model="paymentOption" id="payment-mode">
                    <option value="1">Cash</option>
                    <option value="2">Medical Aid</option>
                </select>
            </div>
            <form wire:submit.prevent="addMedicalAid">


                @if ($paymentOption == 2)
                    <!-- Medical Aid Form Fields -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="medical-aid-provider">Medical Aid Provider</label>
                            <select class="form-control" wire:model="medicalAidProvider" id="medical-aid-provider">
                                <option value="">Select Provider</option>
                                @foreach ($medicalAidProviders as $medicalAid)
                                    <option value="{{ $medicalAid->id }}">{{ $medicalAid->provider_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($medicalAidProvider && count($medicalAidPackages) > 0)
                            <div class="form-group col-md-6">
                                <label for="medical-aid-package">Medical Aid Package</label>
                                <select class="form-control" wire:model="medicalAidPackage" id="medical-aid-package">
                                    <option value="">Select Package</option>
                                    @foreach ($medicalAidPackages as $package)
                                        <option value="{{ $package->id }}">{{ $package->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="medical-aid-suffix">Suffix</label>
                                <input type="text" class="form-control" wire:model.defer="medicalAidSuffix"
                                    id="medical-aid-suffix">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="medical-aid-member-name">Member Name</label>
                                <input type="text" class="form-control" wire:model.defer="medicalAidMemberName"
                                    id="medical-aid-member-name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="medical-aid-policy-number">Policy Number</label>
                                <input type="text" class="form-control" wire:model.defer="medicalAidPolicyNumber"
                                    id="medical-aid-policy-number">
                            </div>
                    </div>
                @endif
                @endif
                <br />
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>

        <div class="tab-pane fade {{ $currentStage == 3 ? 'show active' : '' }}" id="payment-guarantor"
            role="tabpanel">
            <!-- Payment Guarantor Form Section -->
            <form wire:submit.prevent="addGuarantor">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="guarantor_name">Guarantor Name</label>
                        <input type="text" class="form-control" wire:model.defer="guarantorName"
                            id="guarantor_name">
                        @error('guarantor_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="surname">Surname</label>
                        <input type="surname" class="form-control" wire:model.defer="guarantorSurname"
                            id="surname">
                        @error('surname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" wire:model.defer="guarantorPhone" id="phone">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="national_id">National ID</label>
                        <input type="text" class="form-control" wire:model.defer="guarantorNationalId"
                            id="national_id">
                        @error('national_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="gender">Gender</label>
                        <select class="form-control" wire:model.defer="guarantorGender" id="gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="relationship">Relationship</label>
                        <input type="text" class="form-control" wire:model.defer="guarantorRelationship"
                            id="relationship">
                        @error('relationship')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-8">
                        <label for="address">Address</label>
                        <textarea class="form-control" wire:model.defer="guarantorAddress" id="address"></textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
        <div class="tab-pane fade {{ $currentStage == 4 ? 'show active' : '' }}" id="next-of-kin" role="tabpanel">
            <!-- Next of Kin Form Section -->
            <form wire:submit.prevent="addNextOfKin" class="row">
                <!-- Next of Kin Form Fields -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="next_of_keen_name">Name</label>
                        <input type="text" class="form-control" wire:model.defer="kinName"
                            id="next_of_keen_name">
                        @error('kinName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="next_of_keen_surname">Surname</label>
                        <input type="text" class="form-control" wire:model.defer="kinSurname"
                            id="next_of_keen_surname">
                        @error('kinSurname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="next_of_keen_phone">Phone</label>
                        <input type="text" class="form-control" wire:model.defer="kinPhone"
                            id="next_of_keen_phone">
                        @error('kinPhone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="next_of_keen_gender">Gender</label>
                        <select class="form-control" wire:model.defer="kinGender" id="next_of_keen_gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        @error('kinGender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="next_of_keen_national_id">National ID No.</label>
                        <input type="text" class="form-control" wire:model.defer="kinNationalId"
                            id="next_of_keen_national_id">
                        @error('kinNationalId')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="next_of_keen_relationship">Relationship</label>
                        <input type="text" class="form-control" wire:model.defer="kinRelation"
                            id="next_of_keen_relationship">
                        @error('kinRelation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="next_of_keen_address">Address</label>
                        <textarea type="text" class="form-control" wire:model.defer="kinAddress"
                            id="next_of_keen_address"></textarea>
                        @error('kinAddress')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Next of Kin Details -->
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Add Next of Kin</button>
                </div>
            </form>

        </div>
    </div>
    <div class="modal-footer">
        @if ($currentStage > 1)
            <button type="button" class="btn btn-secondary" wire:click="previousStage">Previous</button>
        @endif

        @if ($currentStage < 4)
            <button type="submit" class="btn btn-primary" wire:click="nextStage">Next</button>
            <button type="button" class="btn btn-secondary ml-2" wire:click="skipStage">Skip</button>
        @else
            <button type="button" class="btn btn-success" wire:click="queuePatient">Conclude</button>
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
<script>
    document.addEventListener('livewire:load', function() {
        // Add event listener to the "Next" button
        document.querySelector('.modal-footer button.btn-primary').addEventListener('click', function() {
            // Find the focused form and submit it
            const focusedForm = document.querySelector('form:focus');
            if (focusedForm) {
                focusedForm.submit();
            }
        });
    });
</script>
