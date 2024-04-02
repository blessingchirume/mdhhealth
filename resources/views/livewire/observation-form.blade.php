<div>
    <table class="table table-bordered table-striped">
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
                    <td>{{ $observation['complaints'] }}</td>
                    <td>{{ $observation['observation'] }}</td>
                    <td><button wire:click.prevent="removeObservation({{ $index }})" class="btn btn-danger">Remove</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form wire:submit.prevent="addObservation">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="complaints">Presentation of Complaints</label>
                    <input wire:model.defer="complaint" type="text" class="form-control">
                    @error('complaint') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <label for="observation">Observation</label>
                    <input wire:model.defer="observation" type="text" class="form-control"/>
                    @error('observation') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-2">
                <button wire:click.prevent="addObservation" class="btn btn-success mt-4"><i class="fa fa-plus"></i> Add
                    Observation</button>
            </div>
        </div>
    </form>


</div>
