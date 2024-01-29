<div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="admit_to">Send Patient To</label>
                <select wire:model="admitedTo" class="form-control" id="admit_to" name='admit_to'>
                    <option>-- Select Option --</option>
                    <option value="Maternity">Maternity</option>
                    <option value="ICU">ICU</option>
                    <option value="Theatre">Theatre</option>
                </select>
            </div>
        </div>
        @if ($admitedTo == 'Maternity')
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
        @elseif ($admitedTo == 'ICU')
        <div class="col-md-3">
            <label for="severity_score">Severity Score:</label>
            <input type="text" id="severity_score" name="severity_score" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="origin">Short/ Brief Description:</label>
            <input type="text" id="reason" name="reason_for_admission" class="form-control" placeholder="e.g Accident Victim/ Transfer Patient">
        </div>
        @elseif ($admitedTo == 'Theatre')
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
        @endif
    </div>
</div>
