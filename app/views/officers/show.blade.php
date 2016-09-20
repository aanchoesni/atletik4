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
			<center>Guru/ Pendamping Atlit</center>
			<center>Atletik Unesa {{date('Y')}}</center>
		</td>
	</tr>
	<tr>
		<td>
			<center><table>
				<tr>
					<td style="font-size: 20px; font-weight:bold;">
						<center>{{$officer->akun->first_name}}</center>
					</td>
				</tr>
				<tr>
					<td style="font-size: 20px; font-weight:bold;">
						<center>{{ $officer->type }}</center>
					</td>
				</tr>
			</table></center>
		</td>
	</tr>
	<tr>
		<td>
			<center><table>
				<tr>
					<td style="font-size: 20px; font-weight:bold;">
						<center>{{ $officer->name }}</center>
					</td>
				</tr>
			</table></center>
			<center><table>
				<tr>
					<td style="font-size: 20px; font-weight:bold;">
						<center>{{ $officer->nohp }}</center>
					</td>
				</tr>
			</table></center>
		</td>
	</tr>
	<tr>
		<td style="text-align:center">{{ HTML::image('uploads/fotopetugas/' . $officer->foto,'alt', array( 'width' => 100, 'height' => 'auto' )) }}</td>
	</tr>
	</table>
</body>
</html>
