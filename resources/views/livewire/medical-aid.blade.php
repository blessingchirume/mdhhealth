<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="name">Medical Aid Provider</label>
            <select name="medical_aid_provider" class="form-control" wire:model="provider" wire:change="updateProvider">
                @foreach($providers as $index => $value)
                <option value="{{ $value->id }}" selected="selected">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="surname">Plan</label>
            <select name="package_id" class="form-control" wire:model="packages">
                @foreach($packages as $index => $value)
                <option value="{{ $value->id }}" selected="selected">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>