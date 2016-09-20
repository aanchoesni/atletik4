<div class="form-group">
	{{ Form::label('hari', 'Hari', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('hari', null, array('class' => 'form-control','placeholder'=>'masukkan hari')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('tgl', 'Tanggal', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-2">
		{{ Form::text('tgl', null, array('class' => 'form-control form-control-inline input-medium default-date-inseo', 'readonly')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('tempat', 'Tempat', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('tempat', null, array('class' => 'form-control','placeholder'=>'masukkan tempat')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('kegiatan', 'Kegiatan', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('kegiatan', null, array('class' => 'form-control','placeholder'=>'masukkan kegiatan')) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label('hasil', 'Hasil', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('hasil', null, array('class' => 'form-control','placeholder'=>'masukkan hasil')) }}
	</div>
</div>
<div class="box-footer">
	{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
	<a href="{{ URL::to('admin/logs') }}" class="btn btn-default" type="button">Batal</a>
</div>
