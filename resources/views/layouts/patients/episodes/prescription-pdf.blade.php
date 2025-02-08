<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
    <style>
        /* Define your CSS styles for the PDF here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            font-size: 14px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .patient-info {
            margin-bottom: 20px;
        }

        .prescription-date {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container pt-0 mt-0">

        <table class="table" width="100%">
            <tr><th colspan="2"><h2>MDH - Prescription</h2></th></tr>
            <tr>
                <td width="50%"><strong style="color:black;">Prescription No.:</strong><br>{{ $prescription_number }}</td>
                <td><strong>Prescription Date:</strong><br>{{ $prescription_date }}</td>
            </tr>
        </table>
        <hr>
        <table class="table " width="100%">
            <tr>
                <th colspan="2" style="text-align: left;">patient Information</th>
            </tr>

            <tr>
                <td width="50%"><strong>Name:</strong><br>{{ $patient_detail->name .' '.$patient_detail->surname}}</td>
                <td width="50%"><strong>Age:</strong><br>{{ $patient_detail->age??"N/A" }}</td>
            </tr>
            <tr>
                <td><strong>Phone Number:</strong><br>{{ $patient_detail->phone}}</td>
                <td><strong>D.O.B:</strong><br>{{ $patient_detail->dob??'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong><br>{{ $patient_detail->email}}</td>
                <td><strong>Gender:</strong><br>{{ $patient_detail->gender??'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Address:</strong><br>{{ $patient_detail->address}}</td>
                <td></td>
            </tr>
        </table>
        <hr>
        <table class="table table-striped" width="100%">
            <tr>
                <th colspan="2" style="text-align: left;">Prescribed Medication</th>
            </tr>
            <tr>
                <th style="text-align: left;">Medication</th>
                <th style="text-align: left;">Dosage</th>
                <th style="text-align: left;">Frequency</th>
                <th style="text-align: left;">Duration</th>
            </tr>
            @foreach ($prescriptions as $prescription)
                <tr class="row">
                    <td width="40%" align="left">
                        {{ $prescription['medication'] }}
                    </td>
                    <td width="25%" align="left">
                        {{ $prescription['dosage'] }}
                    </td>
                    <td width="25%" align="left">
                        {{ $prescription['frequency'] }}
                    </td>
                    <td align="left">
                        {{ $prescription['duration'] }}
                    </td>
                </tr>
            @endforeach
        </table>
        <br/>
        <table class="table mt-5" width="100%">
            <tr>
                <td><strong>Prescribed By:</strong><br>{{ $prescribed_by->name .' '.$prescribed_by->surname }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
