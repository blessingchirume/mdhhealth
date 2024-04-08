@extends('layouts.app')

@section('content_header')
    <h1>Record Patients Vitals</h1>
@stop

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h4 class="float-left">Vitals</h4>
                        </div>
                        <section class="content p-4">
                            <form role="form" method="post" action="{{ route('episode.record-vital', $episode) }}">
                                @csrf
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="blood_pressure">Blood Pressure</label>
                                                <input type="text" class="form-control" id="blood_pressure"
                                                    name="blood_pressure" placeholder="Blood Pressure" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="heart_rate">Heart Rate</label>
                                                <input type="text" class="form-control" id="heart_rate" name="heart_rate"
                                                    placeholder="Heart Rate" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="temperature">Temperature</label>
                                                <input type="text" class="form-control" id="temperature"
                                                    name="temperature" placeholder="Temperature" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="weight">Weight (kg)</label>
                                                <input type="text" class="form-control" id="weight" name="weight"
                                                    placeholder="Weight" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="respiratory_rate">Respiratory Rate</label>
                                                <input type="text" class="form-control" id="respiratory_rate"
                                                    name="respiratory_rate" placeholder="Respiratory Rate" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="oxygen_saturation">Oxygen Saturation</label>
                                                <input type="text" class="form-control" id="oxygen_saturation"
                                                    name="oxygen_saturation" placeholder="Oxygen Saturation" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="blood_sugar">Blood Sugar</label>
                                                <input type="text" class="form-control" id="blood_sugar"
                                                    name="blood_sugar" placeholder="Blood Sugar" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pain_level">Pain Level</label>
                                                <select class="form-control" id="pain_level" name="pain_level" required>
                                                    <option value="acute">Acute</option>
                                                    <option value="severe">Severe</option>
                                                    <option value="mild">Mild</option>
                                                    <option value="moderate">Moderate</option>
                                                    <option value="chronic">Chronic</option>
                                                    <option value="persistent">Persistent</option>
                                                    <option value="intermittent">Intermittent</option>
                                                    <option value="dull">Dull</option>
                                                    <option value="sharp">Sharp</option>
                                                    <option value="throbbing">Throbbing</option>
                                                    <option value="stabbing">Stabbing</option>
                                                    <option value="burning">Burning</option>
                                                    <option value="shooting">Shooting</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="height">Height (m)</label>
                                                <input type="text" class="form-control" id="height" name="height"
                                                    placeholder="Height" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="complaints">Presentation Of Complaints</label>
                                                <textarea class="form-control" id="complaints" name="complaints" placeholder="Complaints"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="observation">Nurses Review/Observations</label>
                                                <textarea class="form-control" id="observation" name="observation" placeholder="Observation"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="bmi">BMI</label>
                                                <input type="text" class="form-control" id="bmi" name="bmi" placeholder="BMI" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Calculate BMI when weight and height are provided
        function calculateBMI() {
            var weight = parseFloat(document.getElementById('weight').value);
            var height = parseFloat(document.getElementById('height').value);

            if (!isNaN(weight) && !isNaN(height) && height > 0) {
                var bmi = weight / (height * height);
                document.getElementById('bmi').value = bmi.toFixed(2);
            } else {
                document.getElementById('bmi').value = '';
            }
        }

        // Attach event listeners to weight and height inputs
        document.getElementById('weight').addEventListener('input', calculateBMI);
        document.getElementById('height').addEventListener('input', calculateBMI);
    </script>
@endsection
