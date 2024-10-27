<div>
    @if($episode)
        <h4>Episode: {{ $episode->episode_code }}</h4>
        <h4>Total Amt Due : ${{ number_format($totalBasePrice, 2) }}</h4>
        <span>Tendered</span>
        <input type="text" name="amount_tendered" id="amountPaid" wire:model.defer="amountPaid" class="form-control" style="font-size:54pt; width:60%; height:58pt; float:right" placeholder="0.00" autofocus/>
        
        <table style="width:100%">
            <tr>
                <th>Code</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            @if($chargesheetItems)
                @foreach($chargesheetItems as $item)
                    <tr>
                        <td>{{ $item->item_code }}</td>
                        <td>{{ $item->item_description }}</td>
                        <td>${{ number_format($item->base_price, 2) }}</td>
                    </tr>
                @endforeach
            @else
                <li>No chargesheet items found.</li>
            @endif
        </table>
        
        <button wire:click="submitPayment" class="btn btn-success mt-3">Submit Payment</button>

        @if (session()->has('message'))
            <div class="alert alert-success mt-3">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

    @else
        <p>Select an episode to view its billing details.</p>
    @endif

    <input type="hidden" id="bookingId" wire:model="bookingId">
</div>
