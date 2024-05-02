<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim Form</title>
    <style>
        /* Define your CSS styles for the PDF here */
        @page {
            margin-top: 1mm;
            /* Set top margin */
            margin-bottom: 1mm;
            /* Set bottom margin */
            margin-left: 1mm;
            /* Set left margin */
            margin-right: 1mm;
            /* Set right margin */
        }

        body {
            font-family: Arial, sans-serif;
            /*line-height: 1.6;*/
            font-size: 14px;
        }

        .container {
            max-width: 1200px;
            margin: 0;
            padding: 0px;
        }

        h2 {
            text-align: center;
        }

        div .box {
            width: 30px;
            /* Set width */
            height: 35px;
            /* Set height */
            background-color: #FFFFFF;
            /* Set background color */
            border: .45px solid red;
            /* Add border */
            margin-left: 5px;
            /* Add margin for spacing */
            padding-left: 5px;
            /* Add padding inside the box */
            box-sizing: border-box;
            /* Include border and padding in the total width/height */
            align-content: center;
        }

        .med-aid {
            float: left;
            margin-right: 7px;
            text-align: center;
            font-size: 6pt;
            position: fixed;
        }

        .p-1 {
            padding: 10px;
        }

    </style>
</head>

<body>
    <div class="container pt-0 mt-0">
        <h2>NATIONAL MEDICAL AID CLAIM FORM</h2>
        <div style="color:red; border: .5px solid red; font-size:7pt; width:80%">
            <div class="table" width="100%">
                <div class="row">
                    <div align="center"><strong>MEMBER/PATIENT TO COMPLETE ALL RED SECTIONS</strong></div>
                </div>
                <div class="row">
                    <div>PLEASE INDICATE MEDICAL AID SOCIETY WITH AN "X"</div>
                </div>
                <div class="row">
                    <div colspan="2">
                        <span class="med-aid">
                            <span class="box"></span>BANKMED
                        </span>
                        <span class="med-aid">
                            <span class="box"></span>CIMAS
                        </span>
                        <span class="med-aid">
                            <span class="box"></span>ENG
                        </span>
                        <span class="med-aid">
                            <span class="box"></span>GENHEALTH
                        </span>
                        <span class="med-aid">
                            <span class="box"></span>MASCA
                        </span>
                        <span class="med-aid">
                            <span class="box"></span>MUN. BYO
                        </span>
                        <span class="med-aid">
                            <span class="box"></span>MUN. HRE
                        </span>
                        <span class="med-aid">
                            <span class="box"></span>N'THERN
                        </span>
                        <span class="med-aid">
                            <span class="box"></span>RAILMED
                        </span>
                        <span class="med-aid">
                            <span class="box"></span>OTHER - SPECIFY
                        </span>
                    </div>
                </div><br />
                <div class="row p-1">
                    <div>PLEASE PRINT<br />MEMBER'S NAME</div>
                    <div class=""></div>
                </div>
                <div class="row p-1">
                    <div>POSTAL ADDRESS</div>
                    <div class=""></div>
                </div>
                <div class="row p-1">
                    <div>CONTACT TEL. NO.</div>
                    <div class=""></div>
                </div>
                <div class="row p-1">
                    <div>NAME OF EMPLOYER/GOVT. DEPT</div>
                    <div class=""></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
