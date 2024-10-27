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
                <td width="50%"><strong style="color:black;">Prescription No.:</strong><br>00001</td>
                <td><strong>Prescription Date:</strong><br>2024-05-28</td>
            </tr>
        </table>
        <hr>
        <table class="table " width="100%">
            <tr>
                <th colspan="2" style="text-align: left;">Patient Information</th>
            </tr>

            <tr>
                <td width="50%"><strong>Name:</strong><br>Albert Ukama</td>
                <td width="50%"><strong>Age:</strong><br>28 Years</td>
            </tr>
            <tr>
                <td><strong>Phone Number:</strong><br>+263 78 702 9955</td>
                <td><strong>D.O.B:</strong><br>26-06-1996</td>
            </tr>
            <tr>
                <td><strong>Email:</strong><br>N/A</td>
                <td><strong>Gender:</strong><br>Male</td>
            </tr>
            <tr>
                <td><strong>Address:</strong><br>20385 Solomio Park Ruwa</td>
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
            {{--@foreach ($prescriptions as $prescription)
                <tr class="row">
                    <td width="40%" align="left">
                        Paracetamol Influx Industries
                    </td>
                    <td width="25%" align="left">
                        10mg
                    </td>
                    <td width="25%" align="left">
                        twice a day
                    </td>
                    <td align="left">
                        1 week
                    </td>
                </tr>
            @endforeach--}}
        </table>
        <br/>
        <table class="table mt-5" width="100%">
            <tr>
                <td><strong>Prescribed By:</strong><br>Blessing Chirume</td>
            </tr>
        </table>
    </div>
</body>

</html>
