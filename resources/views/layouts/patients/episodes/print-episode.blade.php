<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Episode Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .confirmation {
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container">
        <h1>Patient Episode Details</h1>
        <table>
            <tr>
                <th>Patient Name:</th>
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
        </table>
        <div class="confirmation">
            <p>Consultation fee has been paid.</p>
            <p>Amount: ${{ $chargeSheetItems->where('is_consultation_fee', true)->sum('total_amount') }}</p>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chargeSheetItems as $item)
                    <tr>
                        <td>{{ $item->item->item_description }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->item->base_price }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
