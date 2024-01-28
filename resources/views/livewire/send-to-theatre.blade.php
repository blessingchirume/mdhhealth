<div>
    @if($patients)
        <div  class="row">
            <div class="col-md-6">
                <label for="patient">Select Patient:</label>
                <select wire:model="selectedPatient" class="form-control" id="patient" name="patient">
                    <option value="">Select Patient</option>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="doctor">Select Surgeon</label>
                <select wire:model="selectedDoctor" class="form-control" id="doctor" name="doctor">
                    <option value="">Select Surgeon</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br/>
        @if($episodes)
        <div class="row">
            <div class="col-md-3">
                <label for="episode">Select Episode:</label>
                <select class="form-control" id="episode" name="episode_id" wire:model="selectedEpisode">
                    <option value="">Select Episode</option>
                    @foreach ($episodes as $episode)
                        <option value="{{ $episode->id }}">{{ $episode->episode_code .'['. $episode->episode_entry.']' }}</option>
                    @endforeach
                </select>
            </div>
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
            <br/>
            <button wire:click="sendToTheatre($selectedEpisode)" class="btn btn-primary" id="sendToTheatreBtn">Send to Theatre</button>
        @endif
    @endif
</div>
