<html>
<style>
	body{
		font-family: verdana;
	}
	table{
		background-color: rgb(185,179,175);
	}
	.out{
		border: 1px solid black;
	}
	.identitas{
		padding-left: 0.5cm;
		font-size:large;
	}
</style>
<body style="background-image:front/img/idcard.jpg">
	<table class="out" width=350 height=500>
	<tr>
		<td>
			<center><h1>Panitia</h1></center>
			<p><center><h2>Atletik Unesa {{date('Y')}}</h2></center></p>
		</td>
	</tr>
	<tr>
	<td>
	<table class="identitas">
		<tr>
			<td style="padding-left: 0.5cm;">
				Nama
			</td>
			<td style="text-align:center">
				:
			</td>
			<td>
				{{$contest->name}}
			</td>
		</tr>
		<tr>
			<td style="padding-left: 0.5cm;">
				NIS
			</td>
			<td style="text-align:center">
				:
			</td>
			<td>
				{{$contest->nis}}
			</td>
		</tr>
		<tr>
			<td style="padding-left: 0.5cm;">
				Sekolah
			</td>
			<td style="text-align:center">
				:
			</td>
			<td>
				{{$contest->akun->first_name}}
			</td>
		</tr>
	</table></td>
	</tr>
	<tr>
		<td style="text-align:center">{{ HTML::image('uploads/foto/' . $contest->foto,'alt', array( 'width' => 100, 'height' => 'auto' )) }}</td>
	</tr>
	</table>
</body>
</html>
