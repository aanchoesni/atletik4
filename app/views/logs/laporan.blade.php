<!DOCTYPE html>
<html>
<head>
    <title>Log Book Atletik</title>
    {{-- {{HTML::style("assets/css/datatables/dataTables.bootstrap.css")}} --}}
    <!-- font Awesome -->
    {{-- {{HTML::style("assets/css/font-awesome.min.css")}} --}}
</head>
<body>
    <h1><center>DAFTAR LOG BOOK</center></h1>
    <h3><center>Atletik Unesa {{Date('Y')}}</center></h3>
    <hr>
    <table border=0px cellpadding="0" cellspacing="0" style="borderCollapse:collapse;">
    <tr>
        <td style="padding:1px 10px 5px 10px;">NIM</td>
        <td style="padding:1px 10px 5px 10px;">:</td>
        <td>{{ Sentry::getUser()->first_name }}</td>
    </tr>
    <tr>
        <td style="padding:1px 10px 5px 10px;">Nama</td>
        <td style="padding:1px 10px 5px 10px;">:</td>
        <td>{{ Session::get('mslognim') }}</td>
    </tr>
    <tr>
        <td style="padding:1px 10px 5px 10px;">Jabatan</td>
        <td style="padding:1px 10px 5px 10px;">:</td>
        <td>{{ Session::get('msjabatan') }}</td>
    </tr>
    </table>
    <hr>
	<table border=1px cellpadding="0" cellspacing="0" style="borderCollapse:collapse;" width="100%">
        <thead>
        <tr style="text-align:center;">
            <td width=3%>No</td>
            <td width=7%>Hari</td>
            <td width=10%>Tanggal</td>
            <td width=10%>Tempat</td>
            <td width=40%>Kegiatan</td>
            <td width=30%>Hasil</td>
        </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>
            @foreach($datas as $value)
            <tr>
                <td style="text-align:center;"><?php echo $no ?></td>
                <td style="padding:2px 10px 2px 10px; text-align:center;">{{ $value->hari }}</td>
                <td style="padding:2px 10px 2px 10px; text-align:center;">{{ date('d/m/Y', strtotime($value->tgl)) }}</td>
                <td style="padding:1px 10px 5px 10px; text-align:justify;">{{$value->tempat}}</td>
                <td style="padding:1px 10px 5px 10px; text-align:justify;">{{$value->kegiatan}}</td>
                <td style="padding:1px 10px 5px 10px; text-align:justify;">{{$value->hasil}}</td>
                <?php $no++;?>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table border=0px style="borderCollapse:collapse;" align="right">
        <tr>
            <td>Tanda tangan</td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td> </td>
        </tr>
        <tr>
            <td>{{ Sentry::getUser()->first_name }}</td>
        </tr>
    </table>
</body>
</html>
