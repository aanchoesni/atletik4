<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Ubah nomor dada
            </header>
            <div class="panel-body">
				<div class="form-group">
					{{ Form::label('jenjang', 'Jenjang', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('jenjang', null, array('class' => 'form-control', 'readonly')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('number', 'Nomor Dada', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('number', null, array('class' => 'form-control','placeholder'=>'masukkan nomor dada')) }}
					</div>
				</div>
				<div class="box-footer">
					{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
					<a href="{{ URL::to('admin/sequents') }}" class="btn btn-default" type="button">Batal</a>
				</div>
			</div>
        </section>
    </div>
</div>
