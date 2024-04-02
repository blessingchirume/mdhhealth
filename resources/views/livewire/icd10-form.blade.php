<div class="card-body">
    <form wire:submit.prevent="assignIcd10Codes">
        <div class="form-group">
            <label for="icd10_codes">Select ICD-10 Codes:</label>
            <select wire:model="selectedIcd10Codes" id="selectedIcd10Codes" name="selectedIcd10Codes" class="form-control select2" style="width: 100%" multiple="multiple">
                <option>Select ICD10 Code(s)</option>
                @foreach ($icd10codes as $icd10code)
                    <option value="{{ $icd10code->id }}">{{ $icd10code->code }} | {{ $icd10code->description }}</option>
                @endforeach
            </select>
            @error('selectedIcd10Codes') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Assign Codes</button>
    </form>
</div>
