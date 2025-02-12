<div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="admit_to">Send patient To</label>
                <select wire:model="admitedTo" class="form-control" id="admit_to" name='admit_to'>
                    <option>-- Select Option --</option>
                    @foreach ( $wards as $ward )
                    <option value="{{ $ward->id }}">{{ $ward->name }}</option>

                    @endforeach
                </select>
            </div>
        </div>
        @if ($selectedWard)
        <div class="col-md-12">
            <h4>Admitted to: {{ $selectedWard->name }}</h4>
            @if ($selectedWard->name == 'Maternity')
            <div class="row">
                <div class="col-md-3">
                    <label for="gestational_age">Gestational Age:</label>
                    <input type="text" name="gestational_age" id="gestation" class="form-control" />
                </div>
                <div class="col-md-3">
                    <label for="theatre">Est. Delivery Date:</label>
                    <input type="date" name="estimated_delivery_date" class="form-control" />
                </div>
                <div class="col-md-3">
                    <label for="prenatal_care_provider">Prenatal Care Provider:</label>
                    <input type="text" id="prenatal_care_provider" name="prenatal_care_provider" class="form-control">
                </div>
            </div>
            @elseif ($selectedWard->name == 'ICU')
            <div class="row">
                <div class="col-md-3">
                    <label for="severity_score">Severity Score:</label>
                    <input type="text" id="severity_score" name="severity_score" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="origin">Short/ Brief Description:</label>
                    <input type="text" id="reason" name="reason_for_admission" class="form-control" placeholder="e.g Accident Victim/ Transfer patient">
                </div>
            </div>
            @elseif ($selectedWard->name == 'Theatre')
            <div class="row">
                <div class="col-md-3">
                    <label for="theatre">Select Theatre [Room]:</label>
                    <select class="form-control" id="theatre" name="room" wire:model="selectedTheatre">
                        <option value="">Select Theatre </option>
                        @foreach ($theatres as $theatre)
                        <option value="{{ $theatre->id }}">{{ $theatre->room }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" class="form-control" wire:model="date">
                </div>
                <div class="col-md-3">
                    <label for="time">Time:</label>
                    <input type="time" id="time" name='time' class="form-control" wire:model="time">
                </div>
            </div>
            @endif
        </div>
        @endif
    </div>
</div>
