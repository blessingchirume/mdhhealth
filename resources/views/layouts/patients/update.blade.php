@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">patient &raquo; Edit</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{ route('patient.update', $patient) }}">
                    <section class="content">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-left btn-group btn-group-sm">
                                    <h4>Personal Details</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input class="form-control" name="name" type="text" placeholder="patient name" value="{{ $patient->name }}" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="surname">Surname</label>
                                            <input class="form-control" name="surname" type="text" placeholder="patient surname" value="{{ $patient->surname }}" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="dob">D.O.B</label>
                                            <input class="form-control" name="dob" type="date" placeholder="Date of birth" value="{{ $patient->dob }}" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <input class="form-control" name="gender" type="text" placeholder="Gender" value="{{ $patient->gender }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="national_id">National ID</label>
                                            <input class="form-control" name="national_id" type="text" placeholder="National ID" value="{{ $patient->national_id }}" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input class="form-control" name="phone" type="text" placeholder="Phone Numer" value="{{ $patient->phone }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" name="address" type="text" placeholder="Address" required>{{ $patient->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input class="form-control" name="email" type="text" placeholder="email" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="content">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-left btn-group btn-group-sm">
                                    <h4>Fees Guarantor Details</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input class="form-control" name="guarantor_name" type="text" placeholder="name" value="{{ $patient->guarantor->name }}" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="surname">Surname</label>
                                            <input class="form-control" name="guarantor_surname" type="text" placeholder="surname" value="{{ $patient->guarantor->surname }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input class="form-control" name="guarantor_phone" type="text" placeholder="Phone Numer" value="{{ $patient->guarantor->phone }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <input class="form-control" name="guarantor_gender" type="text" placeholder="Gender" value="{{ $patient->guarantor->gender }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="national_id">National ID</label>
                                            <input class="form-control" name="guarantor_national_id" type="text" placeholder="National ID" value="{{ $patient->guarantor->national_id }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" name="guarantor_address" type="text" placeholder="Address" required>{{ $patient->guarantor->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="national_id">Relationship</label>
                                            <input class="form-control" name="guarantor_relationship" type="text" placeholder="Relationship" value="{{ $patient->guarantor->relationship }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="content">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-left btn-group btn-group-sm">
                                    <h4>Medical Aid Details</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Medical Aid Provider</label>
                                            <input class="form-control" name="medical_aid_provider" type="text" placeholder="patient name" value="{{ $patient->medicalaid->package->partner->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="surname">Plan</label>
                                            <input class="form-control" name="package_id" type="text" placeholder="Plan" value="{{ $patient->medicalaid->package->name }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="dob">Member Name</label>
                                            <input class="form-control" name="member_name" type="text" placeholder="Member name" value="{{ $patient->medicalaid->member_name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="gender">Policy Number</label>
                                            <input class="form-control" name="policy_number" type="text" placeholder="Policy number" value="{{ $patient->medicalaid->policy_number }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="content">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-left btn-group btn-group-sm">
                                    <h4>Next Of Keen Details</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('patient.store') }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input class="form-control" name="next_of_keen_name" type="text" placeholder="patient name" value="{{ $patient->nextofkeen->next_of_keen_name }}" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="surname">Surname</label>
                                                <input class="form-control" name="next_of_keen_surname" type="text" placeholder="patient surname" value="{{ $patient->nextofkeen->next_of_keen_surname }}" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input class="form-control" name="next_of_keen_phone" type="text" placeholder="Phone Numer" value="{{ $patient->nextofkeen->next_of_keen_phone }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <input class="form-control" name="next_of_keen_gender" type="text" placeholder="Gender" value="{{ $patient->nextofkeen->next_of_keen_gender }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="national_id">National ID</label>
                                                <input class="form-control" name="next_of_keen_national_id" type="text" placeholder="National ID" value="{{ $patient->nextofkeen->next_of_keen_national_id }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea class="form-control" name="next_of_keen_address" type="text" placeholder="Address" required>{{ $patient->nextofkeen->next_of_keen_address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <div class="form-group pull-right">
                                    <button type="submit" class="btn btn-secondary float-right mr-2">Update Details</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
