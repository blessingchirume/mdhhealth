<div>
    <form wire:submit.prevent="submit">
        <h4>Medication</h4>
        <!-- Your medication form structure -->
        <table class="table table-bordered table-striped">
            <!-- Table header -->
            <thead>
                <!-- Header row -->
                <tr>
                    <th width="33%">Medication</th>
                    <th>Dosage</th>
                    <th>Frequency</th>
                    <th>Duration</th>
                    <th width="5%"></th>
                </tr>
            </thead>
            <!-- Selected medications rows -->
            <tbody id="selected">
                <!-- Iterate through selected medications -->
                @foreach ($medications as $medication)
                    <tr>
                        <td>{{ $medication['medication'] }}</td>
                        <td>{{ $medication['dosage'] }}</td>
                        <td>{{ $medication['frequency'] }}</td>
                        <td>{{ $medication['duration'] }}</td>
                        <!-- Add button to remove row if needed -->
                        <td><a href="#" class="btn btn-danger">Remove</a></td>
                    </tr>
                @endforeach
            </tbody>
            <!-- Form row for adding new medication -->
            <tbody>
                <tr>
                    <!-- Medication select -->
                    <td>
                        <div class="form-group">
                            <select wire:model="medication" class="form-control" id="medication" wire:change="$refresh">
                                <option value="">Select Medication</option>
                                @foreach ($drugs as $id => $medication)
                                    <option value="{{ $id }}">{{ $medication }}</option>
                                @endforeach
                            </select>

                        </div>
                    </td>
                    <!-- Dosage select -->
                    <td>
                        <div class="form-group">
                            <select wire:model.lazy="dosage" class="form-control" id="dosage" wire:change="$refresh">
                                <option value="">Select Dosage</option>
                                @foreach ($dosages as $dosage)
                                    <option value="{{ $dosage }}">{{ $dosage }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <!-- Frequency select -->
                    <td>
                        <div class="form-group">
                            <select wire:model.lazy="frequency" class="form-control" id="frequency"
                                wire:change="$refresh">
                                <option value="">Select Frequency</option>
                                @foreach ($frequencies as $frequency)
                                    <option value="{{ $frequency }}">{{ $frequency }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <!-- Duration input -->
                    <td>
                        <div class="form-group">
                            <input wire:model.lazy="duration" class="form-control" id="duration" type="text">
                        </div>
                    </td>
                    <!-- Add button -->
                    <td>
                        <a wire:click.prevent="addMedication" href="#" class="btn btn-success"><i
                                class="fa fa-plus"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h4>Procedures / Services</h4>
        <table class="table table-bordered table-striped">
            <!-- Selected procedures rows -->
            <tbody>
                <!-- Iterate through selected procedures -->
                @foreach ($procedures as $index => $procedure)
                    <tr>
                        <td>{{ $procedure['procedure'] }}</td>
                        <td>
                            <!-- Button to remove procedure -->
                            <a wire:click.prevent="removeProcedure({{ $index }})" href="#"
                                class="btn btn-danger">
                                <i class="fa fa-minus"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <!-- Form row for adding new procedure -->
                <tr>
                    <td>
                        <div class="form-group">
                            <!-- Procedure select -->

                            <select wire:model.lazy="procedure" class="form-control" id="procedure"
                                wire:change="$refresh">
                                <option value="">Select Procedure / Service</option>
                                @foreach ($otherTreatments as $id => $option)
                                <option value="{{ $id }}">{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <!-- Add button -->
                    <td>
                        <!-- Button to add new procedure -->
                        <button wire:click.prevent="addProcedure" class="btn btn-success"><i class="fa fa-plus"></i> Add
                            Procedure</button>
                    </td>
                </tr>
            </tbody>

        </table>


        <button type="submit" class="btn btn-primary">Create Plan</button>
    </form>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        $('.select2').select2();

        Livewire.hook('message.processed', (message, component) => {
            $('.select2').select2(); // Re-initialize Select2 after Livewire update
        });
    });
</script>
