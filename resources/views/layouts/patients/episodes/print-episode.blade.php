<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            text-align: left;
            background-color: #f2f2f2;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .mt-5 {
            margin-top: 50px;
        }

    </style>
</head>
<body onblur="window.close()">
    <div class="container">
        <h1>patient Episode Details</h1>
        <table class="table table-borderless">
            <tr>
                <th width="20%">patient Name:</th>
                <td>{{ $episode->patient->name }} {{ $episode->patient->surname }}</td>
            </tr>
            <tr>
                <th>Episode Code:</th>
                <td>{{ $episode->episode_code }}</td>
            </tr>
            <tr>
                <th>Date:</th>
                <td>{{ $episode->date }}</td>
            </tr>
            <tr>
                <th>Purpose of Visit:</th>
                <td>{{ $episode->visit_purpose }}</td>
            </tr>
            <tr>
                <th>Complaints:</th>
                <td>{{ $observations->complaints }}</td>
            </tr>
            <tr>
                <th>Observations:</th>
                <td>{{ $observations->observation }}</td>
            </tr>
        </table>

        <table class="table  nowrap align-middle mt-5">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3">Consultation Fee</td>
                    <td>Paid</td>
                </tr>

                @foreach ($chargeSheetItems as $item)
                @if (isset($item->item))
                <tr>
                    <td>{{ $item->item->item_description }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->item->base_price, 2) }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
                @endif
                @endforeach

            </tbody>
        </table>

    </div>
</body>
<script>
    // Add event listener for 'afterprint' event
    window.addEventListener('afterprint', function() {
        // Close the window after printing
        window.close();
    });

    // Trigger the print dialog
    window.print();

    // Check if the print dialog is still open after 5 seconds
    setTimeout(function() {
        // If the print dialog is still open after 5 seconds, close the window
        if (!window.matchMedia('print').matches) {
            window.close();
        }
    }, 5000); // Adjust the duration as needed

</script>
</html>
