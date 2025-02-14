<div>
    <table class="table  nowrap align-middle">
        <thead>
            <tr>
                <th width="85%">Topic</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topics as $index => $topic)
                <tr>
                   <td>{{ $topic['topic'] }}<input type="hidden" name="topics[]" value="{{ $topic['topic'] }}" /></td>
                    <td><button wire:click.prevent="removeTopic({{ $index }})" class="btn btn-danger">Remove</button></td>
                </tr>
            @endforeach
        </tbody>

    <tbody>
        <form wire:submit.prevent="addTopic">
            <tr>
                <td>
                    <div class="form-group">
                        <input wire:model.defer="topic" type="text" class="form-control"/>
                        @error('topic') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </td>
                <td>
                    <button wire:click.prevent="addTopic" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
                </td>
            </tr>
        </form>
    </tbody>
</table>

</div>
