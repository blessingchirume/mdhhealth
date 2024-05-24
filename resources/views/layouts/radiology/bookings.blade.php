@extends('layouts.app')

@section('content')
    <div class="card m-3">
        <div class="card-body">
            <h1>
                Radiology List
                <div class="float-right">
                    <a href="{{ route('radiology.index') }}" class="btn btn-primary">Back</a>
                </div>
            </h1>
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th>EpisodeCode</th>
                        <th>Patient Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        @if ($booking->scans->isNotEmpty())
                            <tr>
                                <td>{{ $booking->episode->episode_code }}</td>
                                <td>{{ $booking->episode->patient->name }} {{ $booking->episode->patient->surname }}</td>
                                <td>
                                    @if ($booking->status === 'Pending')
                                        <a href="#" data-toggle="modal" data-target="#destinationModal"
                                            onclick="setModalData({{ $booking->episode->id }}, {{ $booking->id }})"
                                            class="billScan">
                                            <i class="fa fa-dollar-sign"></i>
                                        </a>
                                    @elseif ($booking->status === 'In-Progress')
                                        <a href="{{ route('view-results', $booking->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('view-results', $booking->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Destination Selection Modal -->
    <div class="modal fade" id="destinationModal" tabindex="-1" role="dialog" aria-labelledby="destinationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destinationModalLabel">Add Payments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <livewire:radiology-bill />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Destination Selection Modal -->

    <script>
        function setModalData(episodeId, bookingId) {
            Livewire.emit('setEpisodeAndBooking', episodeId, bookingId);
        }
    </script>
@endsection

@push('scripts')
    @livewireScripts
@endpush

@push('styles')
    @livewireStyles
@endpush
