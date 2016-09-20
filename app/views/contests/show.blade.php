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
		<td style="font-size: 20px; font-weight:bold;">
			@if($contest->jenjang == 'SD')
				<center>Peserta SD/ MI</center>
			@endif
			@if($contest->jenjang == 'SMP')
				<center>Peserta SMP Sederajat</center>
			@endif
			@if($contest->jenjang == 'SMA')
				<center>Peserta SMA/ SMK</center>
			@endif
			<center>Atletik Unesa {{date('Y')}}</center>
		</td>
	</tr>
	<tr>
		<td>
			<center><table>
				<tr>
					<td style="font-size: 20px; font-weight:bold;">
						<center>{{$contest->nocontest}}</center>
					</td>
				</tr>
				<tr>
					<td style="font-size: 30px; font-weight:bold;">
						<center>{{$contest->nodada}}</center>
					</td>
				</tr>
			</table></center>
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
			</table>
		</td>
	</tr>
	<tr>
		<td style="text-align:center">{{ HTML::image('uploads/foto/' . $contest->foto,'alt', array( 'width' => 100, 'height' => 'auto' )) }}</td>
	</tr>
	</table>
</body>
</html>
