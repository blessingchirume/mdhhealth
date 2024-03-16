@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Theatre Billables</h2>
        <div class="card m-3">
            <div class="card-header">
                <h3 class="card-title">Add Theatre Billables</h3>
                <div class="float-right"><a href="{{ route('theatre.index') }}">Back</a></div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('theatre.billables.add', $episode) }}">
                    @csrf
                    <div id="dynamic-inputs">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="procedure">Procedure</label>
                                <input type="text" class="form-control" name="procedures[]" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="sundries">Sundries</label>
                                <input type="text" class="form-control" name="sundries[]" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="other_items">Other Items</label>
                                <input type="text" class="form-control" name="other_items[]" required>
                            </div>
                        </div>
                        <!--div class="row">
                            <div class="form-group col-md-4">
                                <label for="bill_amount">Bill Amount</label>
                                <input type="number" class="form-control" name="bill_amount" required>
                            </div>
                        </!--div-->
                    </div>
                    <button type="button" class="btn btn-secondary" id="add-input">Add Another Entry</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add-input').addEventListener('click', function() {
                var dynamicInputs = document.getElementById('dynamic-inputs');

                var row = document.createElement('div');
                row.classList.add('row');

                var div = document.createElement('div');
                div.classList.add('form-group');
                div.classList.add('col-md-4');

                var labels = ['Procedure', 'Sundries', 'Other Items'];

                labels.forEach(function(label) {
                    var input = document.createElement('input');
                    input.type = 'text';
                    input.classList.add('form-control');
                    input.name = label.toLowerCase().replace(' ', '_') + '[]';
                    input.required = true;

                    var labelElement = document.createElement('label');
                    labelElement.htmlFor = label.toLowerCase().replace(' ', '_');
                    labelElement.textContent = label;

                    div.appendChild(labelElement);
                    div.appendChild(input);
                });

                row.appendChild(div);
                dynamicInputs.appendChild(row);
            });
        });
    </script>
@endsection
