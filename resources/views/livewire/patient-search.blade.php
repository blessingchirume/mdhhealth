<div>
    <select wire:model="selectedPatientId" class="form-control" id="patientSearch" name='patient'>
        <option value="">Select a patient</option>
        @foreach ($patients as $patient)
            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
        @endforeach
    </select>
</div>



<script>
    $(document).ready(function() {
        $('#patientSearch').select2({
            placeholder: "Select Patient",
            allowClear: true,
            ajax: {
                url: '/appointments/patients',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        $('#patientSearch').on('change', function (e) {
            @this.set('selectedPatientId', e.target.value);
        });
    });
</script>
