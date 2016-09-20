<!DOCTYPE html>
<html>
<head>
    <title>Kejuaraan Atletik</title>
    {{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}}
    <!-- font Awesome -->
    {{HTML::style("assets/css/font-awesome.min.css")}}
    <style>
        h1{
            font-family: Arial, Helvetica, sans-serif;
            font-size: small;
            font-weight: bold;
        }

        h2{
            font-family: Arial, Helvetica, sans-serif;
            font-size: small;
        }

        table, th, td{
            font-family: Arial, Helvetica, sans-serif;
            font-size: small;
        }
    </style>
</head>
<body>
    <h1><center>URUTAN ACARA TINGKAT
        @if(Session::get('atjenjang')=='SD')
            SD SEDERAJAT
        @endif
        @if(Session::get('atjenjang')=='SMP')
            SMP SEDERAJAT
        @endif
        @if(Session::get('atjenjang')=='SMA')
            SMA SEDERAJAT
        @endif
        </center>
    <center>KEJUARAAN ATLETIK UNESA TAHUN {{Session::get('attahun')}}</center></h1>

    <br>
    <table border=1px cellpadding="0" cellspacing="0" style="borderCollapse:collapse;" width="100%">
        <thead>
        <tr style="text-align:center;">
            <td width=10%>No. Lomba</td>
            <td width=10%>No. Dada</td>
            <td width=25%>Nama Siswa</td>
            <td width=10%>Tahun</td>
            <td width=15%>Asal Sekolah</td>
            <td width=10%>Kabupaten</td>
            <td width=10%>Hasil</td>
            <td width=10%>Urutan</td>
        </tr>
        </thead>
        <tbody>
            @foreach($datas as $value)
            <tr>
                <td style="padding:1px 10px 5px 10px; text-align:justify;">{{$value->nocontest}}</td>
                <td style="text-align:center;">{{$value->nodada}}</td>
                <td style="padding:1px 10px 5px 10px; text-align:justify;">{{$value->name}}</td>
                <td style="text-align:center;">{{date('Y', strtotime($value->tgllhr))}}</td>
                <td style="padding:1px 10px 5px 10px; text-align:justify;">{{$value->akun->first_name}}</td>
                {{-- <td style="padding:1px 10px 5px 10px; text-align:justify;">{{$value->sekolah->adcity}}</td> --}}
                <td style="text-align:center;">________</td>
                <td style='text-align:center;'>________</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
