<div>
    <table class="table  nowrap align-middle">
        <thead>
            <tr>
                <th width="45%">Presentation of Complaints</th>
                <th width="45%">Observation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($observations as $index => $observation)
                <tr>
                    <td>{{ $observation['complaints'] }}<input type="hidden" name="complaints[]" value="{{ $observation['complaints'] }}" /></td>
                    <td>{{ $observation['observation'] }}<input type="hidden" name="observations[]" value="{{ $observation['observation'] }}" /></td>
                    <td><button wire:click.prevent="removeObservation({{ $index }})" class="btn btn-danger">Remove</button></td>
                </tr>
            @endforeach
        </tbody>

    <tbody>
        <form wire:submit.prevent="addObservation">
            <tr>
                <td>
                    <div class="form-group">
                        <input wire:model.defer="complaint" type="text" class="form-control">
                        @error('complaint') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </td>

                <td>
                    <div class="form-group">
                        <input wire:model.defer="observation" type="text" class="form-control"/>
                        @error('observation') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </td>
                <td>
                    <button wire:click.prevent="addObservation" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
                </td>
            </tr>
        </form>
    </tbody>
</table>

</div>
