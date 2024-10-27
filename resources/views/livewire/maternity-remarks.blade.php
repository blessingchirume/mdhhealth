<div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="85%">Remarks / Treatment / Comment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($remarks as $index => $remark)
                <tr>
                   <td>{{ $remark['remark'] }}<input type="hidden" name="remarks[]" value="{{ $remark['remark'] }}" /></td>
                    <td><button wire:click.prevent="removeRemark({{ $index }})" class="btn btn-danger">Remove</button></td>
                </tr>
            @endforeach
        </tbody>

    <tbody>
        <form wire:submit.prevent="addRemark">
            <tr>
                <td>
                    <div class="form-group">
                        <input wire:model.defer="remark" type="text" class="form-control"/>
                        @error('remark') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </td>
                <td>
                    <button wire:click.prevent="addRemark" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
                </td>
            </tr>
        </form>
    </tbody>
</table>

</div>
