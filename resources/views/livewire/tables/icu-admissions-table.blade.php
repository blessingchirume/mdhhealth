<div>
    <div class="card">
        <div class="card-header">
            <h2>ICU Patients List</h2>
            <div class="row">
                <div class="col-md-6">
                    <input wire:model="search" type="text" class="form-control" placeholder="Search...">
                </div>
                <div class="col-md-3">
                    <label for="admission_date_from">Admission Date From:</label>
                    <input wire:model="admissionDateFrom" type="date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="admission_date_to">Admission Date To:</label>
                    <input wire:model="admissionDateTo" type="date" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <label for="discharge_date_from">Discharge Date From:</label>
                    <input wire:model="dischargeDateFrom" type="date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="discharge_date_to">Discharge Date To:</label>
                    <input wire:model="dischargeDateTo" type="date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="status">Status:</label>
                    <select wire:model="status" class="form-control">
                        <option value="">All</option>
                        @foreach (App\Models\ICUAdmission::STATUSES as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mt-2">
                    <a href="#" wire:click="sortBy('id')"
                        class="btn btn-sm {{ $sort == 'id' ? ($direction == 'asc' ? 'btn-primary' : 'btn-info') : 'btn-light' }}">
                        # &nbsp;
                        @if ($sort == 'id')
                            <i class="fas fa-sort-{{ $direction }}"></i>
                        @endif
                    </a>
                    <a href="#" wire:click="sortBy('admission.name')"
                        class="btn btn-sm {{ $sort == 'admission.name' ? ($direction == 'asc' ? 'btn-primary' : 'btn-info') : 'btn-light' }}">
                        patient &nbsp;
                        @if ($sort == 'admission.name')
                            <i class="fas fa-sort-{{ $direction }}"></i>
                        @endif
                    </a>
                    <a href="#" wire:click="sortBy('admission.episode.episode_code')"
                        class="btn btn-sm {{ $sort == 'admission.episode.episode_code' ? ($direction == 'asc' ? 'btn-primary' : 'btn-info') : 'btn-light' }}">
                        Episode Code &nbsp;
                        @if ($sort == 'admission.episode.episode_code')
                            <i class="fas fa-sort-{{ $direction }}"></i>
                        @endif
                    </a>
                    <a href="#" wire:click="sortBy('admission.episode.chargesheet.checkin')"
                        class="btn btn-sm {{ $sort == 'admission.episode.chargesheet.checkin' ? ($direction == 'asc' ? 'btn-primary' : 'btn-info') : 'btn-light' }}">
                        Admission Date &nbsp;
                        @if ($sort == 'admission.episode.chargesheet.checkin')
                            <i class="fas fa-sort-{{ $direction }}"></i>
                        @endif
                    </a>
                    <a href="#" wire:click="sortBy('admission.episode.chargesheet.checkout')"
                        class="btn btn-sm {{ $sort == 'admission.episode.chargesheet.checkout' ? ($direction == 'asc' ? 'btn-primary' : 'btn-info') : 'btn-light' }}">
                        Discharge Date &nbsp;
                        @if ($sort == 'admission.episode.chargesheet.checkout')
                            <i class="fas fa-sort-{{ $direction }}"></i>

                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Episode Code</th>
                        <th>patient</th>
                        <th>Admission Date</th>
                        <th>Discharge Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admissions as $admission)
                        <tr>
                            <td>{{ $admission->id }}</td>
                            <td>{{ $admission->admission->episode->episode_code }}</td>
                            <td>{{ $admission->admission->name }}</td>
                            <td>{{ $admission->episode->chargesheet->checkin ??null }}</td>
                            <td>{{ $admission->episode->chargesheet->checkout ?? null }}</td>
                            <td>{{ $admission->status }}</td>
                            <td>
                                <a href="{{ route('icu.show', $admission->id) }}"><i class="fa fa-eye success"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $admissions->links() }}
        </div>
        <div class="card-footer">
            <button wire:click="refreshTable" class="btn btn-primary btn-sm">Refresh</button>
        </div>
    </div>
</div>

</div>
