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
            @if (isset($chargeitems))
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th style="float:right">Base Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chargeitems as $items)
                        <?php $total = 0; ?>
                        @if($items->chargesheetitems->count() > 0)
                        @foreach ($items->chargesheetitems as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->item != null ?  $item->item->item_description : '' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td align="right">{{ number_format($item->item != null ?  $item->item->base_price : 0.0, 2) }}</td>
                        </tr>
                        <?php $total += $item->quantity * ($item->item != null ?  $item->item->base_price : 0.0); ?>
                        @endforeach
                        @endif
                        @endforeach
                        <tr>
                            <td colspan="3"><strong>Total</strong></td>
                            <td align="right"> <strong>{{ number_format($total, 2) }}</strong> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif
            <form method="post" action="{{ route('theatre.billables.add', $episode) }}">
                @csrf
                <div id="dynamic-inputs">
                    <div class="row">
                        @foreach ($itemgroups as $category)
                        <div class="form-group col-md-4">
                            <label for="item-category">{{ $category->name }}</label>
                            <select class="form-control" name="item[]" required>
                                <option value='0'>--Select Option--</option>
                                @foreach ($category->items as $item)
                                <option value="{{ $item->id }}">{{ $item->item_description }}</option>
                                @endforeach
                            </select>
                            <input type="text" name="quantity[]" placeholder="Quantity Administered To Patient in {{ $item->si_unit }}" class="form-control" @if (count($category->items) == 0) value="0"
                            disabled @endif>
                        </div>
                        @endforeach

                    </div>
                    <!--div class="row">
                                <div class="form-group col-md-4">
                                    <label for="bill_amount">Bill Amount</label>
                                    <input type="number" class="form-control" name="bill_amount" required>
                                </div>
                            </!--div-->
                </div>
                <!--button type="button" class="btn btn-secondary" id="add-input">Add Another Entry</!--button-->
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