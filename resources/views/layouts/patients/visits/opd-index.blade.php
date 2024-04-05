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
                                    <a href="{{ route('patient.vitals.create', $episode->id) }}" title="Record Vitals"><i
                                            class="fas fa-heartbeat"></i></a>
                                @else
                                    <a href="{{ route('patient.vitals.show', $episode->id) }}" title="View Vitals"><i
                                            class="fas fa-heartbeat"></i></a>
                                @endif
                                &emsp;
                                <a href="{{ route('opd.consult', $episode->id) }}" title="Consult"><i
                                        class="fas fa-stethoscope"></i></a>&emsp;
                                <a href="{{ route('prescription.pdf', $episode->id) }}" target="_blank" title="Download Prescription"><i
                                        class="fas fa-prescription"></i>
                                </a>
                                &emsp;
                                <a href="#" title="Transfer Patient" data-toggle="modal"
                                    data-target="#transferPatientModal{{ $episode->id }}"><i
                                        class="fas fa-ambulance"></i></a>

                                <!-- Transfer Patient Modal -->
                                <div class="modal fade" id="transferPatientModal{{ $episode->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="transferPatientModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="transferPatientModalLabel">Transfer Patient</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Transferring this patient means concluding and discharging them from OPD.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="openDestinationModal({{ $episode->id }})">Proceed</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Transfer Patient Modal -->
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
        function openDestinationModal(episodeId) {
            $('#transferPatientModal'+episodeId).modal('hide');
            $('#destinationModal').modal('show');
            $('#episodeId').val(episodeId) ;
            // Additional logic to handle transfer to new destination
        }
    </script>

    <!-- Destination Selection Modal -->
    <div class="modal fade" id="destinationModal" tabindex="-1" role="dialog" aria-labelledby="destinationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destinationModalLabel">Select Destination</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('patient.transfer', $episode) }}">
                        @csrf
                        <input type="hidden" id="episodeId" name="episode_id" />
                        <div class="form-group">
                            <label for="destination_id">Select Destination</label>
                            <select class="form-control" id="destination_id" name="destination_id">
                                <option value="">-- Select Destination --</option>
                                @foreach ($designations as $destination)
                                    <option value="{{ $destination->name }}">{{ $destination->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ward">Select Ward</label>
                            <select class="form-control" id="ward" name="ward">
                                <option value="">-- Select Ward --</option>
                                @foreach ($wards as $ward)
                                    <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="reason">Reason for Transfer:</label>
                            <textarea id="reason" name="reason" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Destination Selection Modal -->

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('patientAddedToQueue', () => {
                window.location.reload();
            });

            Livewire.on('closeModal', () => {
                $('#addPatientModal').modal('hide');
            });
        });
    </script>
@endsection
