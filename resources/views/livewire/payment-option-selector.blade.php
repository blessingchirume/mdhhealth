<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="name">Payment Method</label>
            <select wire:model.defer="paymentOption" name="paymentOption" class="form-control" style="padding: 6px 12px !important; width: 100% !important">
                @foreach($paymentOptions as $option)
                <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach            
            </select>
        </div>
    </div>
</div>
@if($paymentOption == 'Medical_aid')
<livewire:medical-aid />
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="dob">Member Name</label>
            <input class="form-control" name="member_name" type="text" placeholder="Member name" required>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="gender">Medical Aid suffix Number</label>
                    <input class="form-control" name="suffix_number" type="text" placeholder="Suffix Number" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="gender">Policy Number</label>
                    <input class="form-control" name="policy_number" type="text" placeholder="Policy Number" required>
                </div>
            </div>
        </div>
    </div>
</div>
@endif