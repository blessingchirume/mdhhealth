<style type="text/css">
    body {
        font-size: 12;
    }

    #t2 {
        margin-right: -100;
    }

    table {
        margin-left: -9.6px;
    }

    table td {

        font-size: 12;
        padding: 0;
        margin: 0;
    }

</style>
<body>


    <table>
        <tr>
            <td>@if ($partner->acronym!='BANKMED' || $partner->acronym!='CIMAS' || $partner->acronym!='ENG' ||$partner->acronym!='GENHEALTH' || $partner->acronym!='MASCA' || $partner->acronym!='MUN.BYO.' || $partner->acronym!='MUN.HRE.' || $partner->acronym!="N'THERN" || $partner->acronym!='RAILMED')
                <span style="margin-left:465px">X&nbsp;&nbsp;&nbsp;{{ $partner->acronym }}</span>
                @endif</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $episode->id }}</strong></td>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $member->member_name }}</td>
            <td></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $member->member_name }}</td>
            <td></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $member->member_name }}</td>
            <td></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;077200000</td>
            <td></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employer</td>
            <td></td>
        </tr>
    </table>

    <br>

    <table id="t2">
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $patient->name.' '.$patient->surname }}</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ 'relation' }}</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $member->policy_number }}</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $member->suffix_number }}</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $patient->dob }}</td>
        </tr>
    </table>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table>
    @foreach ($items as $item)
        @for($i = 0; $i < 10; $i++)
        <tr>
            <td>&nbsp;&nbsp;&nbsp;{{ $item->item->tariff_code??'' }}</td>
         </tr>
        @endfor
    @endforeach
    </table>


</body>
