@extends('layouts.app')

@section('content')
    <div class="card m-3">
        <div class="card-body">
            <h1>OPD Queue<span class="float-right"><button class="btn btn-primary" data-toggle="modal"
                        data-target="#addPatientModal"><i class="fa fa-plus"></i> Generate</button></span></h1>
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th>EpisodeCode</th>
                        <th>Patient Name</th>
                        <th>Visit Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($opdQueue as $episode)
                        <tr>
                            <td>{{ $episode->episode_code }}</td>
                            <td>{{ $episode->patient->name . ' ' . $episode->patient->surname }}</td>
                            <td>{{ $episode->visit_purpose }}</td>
                            <td>
                                @if ($episode->vitals->isEmpty())
                                    <a href="{{ route('patient.vitals.create', $episode->id) }}"><i
                                            class="fas fa-heartbeat"></i></a>
                                @else
                                &emsp;
                                    <a href="{{ route('patient.vitals.show', $episode->id) }}"><i
                                            class="fas fa-heartbeat"></i></a>
                                @endif
                                &emsp;
                                <a href="{{ route('opd.consult', $episode->id) }}"><i class="fas fa-stethoscope"></i></a>&emsp;
                                <a href="{{ route('prescription.pdf', $episode->id) }}" ><i class="fas fa-prescription"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addPatientModal" tabindex="-1" role="dialog" aria-labelledby="addPatientModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPatientModalLabel">Add New Patient to OPD Queue</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <livewire:add-patient-modal />
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('patientAddedToQueue', () => {
                window.location.reload();
            });

            Livewire.on('closeModal', () => {
                $('#addPatientModal').modal('hide');
            });
        });
    </script>
@endsection
