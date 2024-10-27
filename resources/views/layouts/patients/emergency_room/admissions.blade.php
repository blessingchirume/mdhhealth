@extends('layouts.app')

@section('content')
    <div class="card m-3">
        <div class="card-header">
            <h3 class="card-title">Emergency Room Admissions</h3>
            <a href="{{ route('patient.index')}}" class='float-right btn btn-primary'>Admit Existing</a>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('emergency-room-admissions.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">SurName:</label>
                            <input type="text" id="surname" name="surname" class="form-control">
                        </div>
                    </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="age">DOB:</label>
                        <input type="date" id="age" name="age" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="patcategory">In/Out Patient:</label>
                        <select type="text" id="patcategory" name="patcategory" class="form-control">
                            <option value="">-- Select --</option>
                            <option value="In-Patient">In-Patient</option>
                            <option value="Out-Patient">Out-Patient</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select type="text" id="gender" name="gender" class="form-control">
                            <option value="">-- Select --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">

                    <livewire:admission-selector />
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="medical_history">Medical History / Reason For Admission:</label>
                        <textarea id="medical_history" name="medical_history" class="form-control"></textarea>
                    </div>
                </div>
            </div>
                <button type="submit" class="btn btn-primary">Admit Patient</button>
            </form>
        </div>
    </div>
@endsection
