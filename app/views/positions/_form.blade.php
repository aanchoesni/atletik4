<div class="form-group">
	{{ Form::label('name', 'Nama jabatan', array('class' => 'control-label col-lg-2')) }}
	<div class="col-lg-10">
		{{ Form::text('name', null, array('class' => 'form-control','placeholder'=>'masukkan nama jabatan')) }}
	</div>
</div>
<div class="box-footer">
	{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
	<a href="{{ URL::to('admin/positions') }}" class="btn btn-default" type="button">Batal</a>
</div>