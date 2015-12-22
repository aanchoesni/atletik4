<div class="row">
    <div class="col-lg-12">
        <section class="panel">
			<header class="panel-heading">
			    Identitas Petugas Baru
			</header>
			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('name', 'Nama lengkap', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('name', null, array('class' => 'form-control','placeholder'=>'masukkan nama lengkap')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('notlp', 'No Telepon', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('notlp', null, array('class' => 'form-control','placeholder'=>'masukkan no telepon')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('nohp', 'No Handphone', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('nohp', null, array('class' => 'form-control','placeholder'=>'masukkan no handphone')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('type', 'Pilihan Petugas', array('class' => 'control-label col-lg-2') ) }}
					<div class="col-lg-10">
						{{ Form::select('type', array(''=>'', 'Petugas Pertemuan Teknik'=>'Petugas Pertemuan Teknik', 'Petugas Pendamping Lomba'=>'Petugas Pendamping Lomba'), null, array(
								'id'=>'type',
								'placeholder' => "Pilih Petugas",
								'class'=>'form-control input-sm')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('sertifikat', 'Cetak Sertifikat', array('class' => 'control-label col-lg-2') ) }}
					<div class="col-lg-10">
						{{ Form::checkbox('sertifikat', 1, true) }}
					</div>
				</div>
				<div class="panel-body">
					<div class="box-footer">
						{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
						<a href="{{ URL::to('user/officers') }}" class="btn btn-default" type="button">Batal</a>
					</div>
				</div>
			</div>
		</section>
    </div>
</div>
