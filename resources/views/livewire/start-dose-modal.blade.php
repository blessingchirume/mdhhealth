<div>
    <!-- Modal Content -->
    <div class="modal fade" id="startDoseModal" tabindex="-1" role="dialog" aria-labelledby="startDoseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Start Dose for Medication</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="$emit('closeModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submit">
                        <div class="form-group">
                            <label for="startDose">Start Dose:</label>
                            <input type="text" class="form-control" id="startDose" name="startDose"
                                wire:model.defer="startDose">
                        </div>
                        <input type="hidden" wire:model="medicationId">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
