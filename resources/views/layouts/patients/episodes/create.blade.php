@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Episode &raquo; Create</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{ route('patient.episode.store', $patient) }}">
                    {{ csrf_field() }}
                    <section class="content">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-left btn-group btn-group-sm">
                                    <h4>Episode Details</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Designation</label>
                                            <input class="form-control" name="ward" type="text" placeholder="ward" required>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Attendee</label>
                                            <select name="attendee" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                                <option value="Blessing Chirume" selected="selected">Blessing Chirume</option>
                                                <option value="Evelyn Jeke" selected="selected">Evelyn Jeke</option>
                                                <option value="Tendai Chidawanyika" selected="selected">Tendai Chidawanyika</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">patient Group</label>
                                            <select name="patient_type" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                                <option value="InPatient" selected="selected">In patient</option>
                                                <option value="OutPatient" selected="selected">Out patient</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Payment Method</label>
                                            <select name="" class="form-control js-example-basic-single form-control multiple" style="padding: 6px 12px !important; width: 100% !important">
                                                <option value="Cash" selected="selected">Cash</option>
                                                <option value="Medical_aid">Medica Aid</option>
                                            </select>
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
                                            <input class="form-control" name="guarantor_name" type="text" placeholder="name" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="surname">Surname</label>
                                            <input class="form-control" name="guarantor_surname" type="text" placeholder="surname" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input class="form-control" name="guarantor_phone" type="text" placeholder="Phone Numer" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <input class="form-control" name="guarantor_gender" type="text" placeholder="Gender" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="national_id">National ID</label>
                                            <input class="form-control" name="guarantor_national_id" type="text" placeholder="National ID" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" name="guarantor_address" type="text" placeholder="Address" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="national_id">Relationship</label>
                                            <input class="form-control" name="guarantor_relationship" type="text" placeholder="Relationship" required>
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
                                    <h4>Payment Details</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <livewire:payment-option-selector />
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
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input class="form-control" name="next_of_keen_name" type="text" placeholder="name" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="surname">Surname</label>
                                            <input class="form-control" name="next_of_keen_surname" type="text" placeholder="surname" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input class="form-control" name="next_of_keen_phone" type="text" placeholder="Phone Numer" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <input class="form-control" name="next_of_keen_gender" type="text" placeholder="Gender" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="national_id">National ID</label>
                                            <input class="form-control" name="next_of_keen_national_id" type="text" placeholder="National ID" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" name="next_of_keen_address" type="text" placeholder="Address" required></textarea>
                                        </div>
                                    </div>
                                </div>
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
