<div>
  
  <div class="row col-md-12">
    <label for="Patient">Select Patient</label>
    <select wire:model="selectedPatientId" class="form-control" id="patientSearch" name='patient'>
      <option value="">Select a patient</option>
      @foreach ($patients as $patient)
        <option value="{{ $patient->id }}">{{ $patient->name .' '.$patient->surname }}</option>
      @endforeach
    </select>
  </div>
  <div class="row col-md-12">
    <label for="selectedDoctor">Select Doctor:</label>
    <select wire:model="selectedDoctorId" class="form-control" id="doctorSearch" name='doctor'>
      <option value="">Select a doctor</option>
      @foreach ($doctors as $doctor)
        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
      @endforeach
    </select>
  </div>

  <script>
    $(document).ready(function() {
      $('#patientSearch').select2({
        placeholder: 'Select a patient'
      });

      $('#doctorSearch').select2({
        placeholder: 'Select a doctor'
      })
    });
  </script>
</div>
