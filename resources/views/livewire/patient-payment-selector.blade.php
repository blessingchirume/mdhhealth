<div>
    <form method="post" action="{{ route('payment.store') }}">
        {{ csrf_field() }}
        @if($patients)
        <div class="row">
            <div class="col-md-6">
                <label for="patient">Select patient:</label>
                <select wire:model="selectedPatient" class="form-control" id="patient" name="patient" required>
                    <option value="">Select patient</option>
                    @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="doctor">Select Currency</label>
                <select class="form-control" id="currency" name="currency" required>
                    <option>Select Curremcy</option>
                    @foreach ($currencies as $value)
                    <option value="{{ $value->name }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br />
        @if($episodes)
        <div class="row">
            <div class="col-md-3">
                <label for="episode">Select Episode:</label>
                <select class="form-control" id="episode" name="episode_id" wire:model="selectedEpisode" required>
                    <option value="">Select Episode</option>
                    @foreach ($episodes as $episode)
                    <option value="{{ $episode->id }}">{{ $episode->episode_code .'['. $episode->episode_entry.']' }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="theatre">Designation:</label>
                <input type="text" id="designation" name="designation" class="form-control" wire:model="designation" readonly>

            </div>

            <div class="col-md-3">
                <label for="date">Date:</label>
                <input type="text" id="date" name="date" class="form-control" wire:model="date" readonly>
            </div>
            <div class="col-md-3">
                <label for="time">Narration:</label>
                <input type="text" id="narration" name='narration' class="form-control" placeholder="Payment Narration">
            </div>
        </div>
        <br />
        <br />
        <h4>Prescribed Medicine</h4>
        @if($treatmentPlan && $treatmentPlan->count() > 0)
        @foreach($treatmentPlan as $index => $item)
        <div class="row">

            <div class="col-md-3">
                <label for="theatre">Item</label>
                <input type="test" id="itemCode" name='treatmentPlan[{{$index}}][medication]' class="form-control" value="{{$item->item->item_description}}" readonly>

            </div>

            <div class="col-md-3">
                <label for="date">Price:</label>
                <input type="number" id="price" name="treatmentPlan[{{$index}}][price]" class="form-control" value="{{$item->item->base_price}}">
            </div>
            <div class="col-md-3">
                <label for="time">Quantity:</label>
                <input type="number" id="quantity" name='treatmentPlan[{{$index}}][quantity]' class="form-control">
            </div>
            <div class="col-md-3">
                <label for="time">Action:</label>
                <input wire:click="removePrescriptionItem({{ $index }})" type="button" class="form-control btn btn-danger" value="Remove">
            </div>
        </div>
        @endforeach
        <br />
        @endif

        {{--<br />
        <br />
        <h4>Administered Items</h4>
        @if($treatmentPlan && $treatmentPlan->count() > 0)
        @foreach($treatmentPlan as $index => $item)
        <div class="row">

            <div class="col-md-3">
                <label for="theatre">Item</label>
                <input type="test" id="itemCode" name='treatmentPlan[{{$index}}][medication]' class="form-control" value="{{$item->item->item_description}}" readonly>

            </div>

            <div class="col-md-3">
                <label for="date">Price:</label>
                <input type="number" id="price" name="treatmentPlan[{{$index}}][price]" class="form-control" value="{{$item->item->base_price}}">
            </div>
            <div class="col-md-3">
                <label for="time">Quantity:</label>
                <input type="number" id="quantity" name='treatmentPlan[{{$index}}][quantity]' class="form-control">
            </div>
            <div class="col-md-3">
                <label for="time">Action:</label>
                <input wire:click="removePrescriptionItem({{ $index }})" type="button" class="form-control btn btn-danger" value="Remove">
            </div>
        </div>
        @endforeach
        <br />
        @endif--}}
        <button type="submit" class="btn btn-primary" id="sendToTheatreBtn">Confirm</button>
        @endif
        @endif
    </form>
</div>
