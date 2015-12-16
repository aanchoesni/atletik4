<div class="row">
    <div class="col-lg-12">
        <section class="panel">
			<header class="panel-heading">
			    Ubah Identitas Admin
			</header>
			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('noi', 'No Identitas', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('noi', null, array('class' => 'form-control','placeholder'=>'masukkan nomor identitas')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('name', 'Nama Lengap', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('name', null, array('class' => 'form-control','placeholder'=>'masukkan nama lengkap')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('position_id', 'Jabatan', array('class' => 'control-label col-lg-2') ) }}
					<div class="col-lg-10">
						{{ Form::select('position_id', array(''=>'')+Position::orderBy('name','ASC	')->lists('name','id'), null, array(
								'id'=>'position_id',
								'placeholder' => "Pilih Jabatan",				
								'class'=>'form-control input-sm')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('tahun', 'Tahun', array('class' => 'control-label col-lg-2') ) }}
					<div class="col-lg-10">
						{{ Form::selectyear('tahun', 2015, 2020, 2015, array(
							'id'=>'tahun',
							'placeholder' => "Pilih Tahun",
							'class' => 'form-control input-sm')) }}
					</div>
				</div>
			</div>
		</section>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
			<header class="panel-heading">
			    Ubah Login Admin
			</header>
			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('email', 'Email', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('email', $admins->user->email, array('class' => 'form-control','placeholder'=>'masukkan email')) }}
					</div>	
				</div>
			</div>
			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('info', 'Password hanya dapat diganti dengan fasilitas lupa password pada halaman login', array('class' => 'control-label col-lg-10', 'style' => 'color:red')) }}
				</div>
			</div>
			<div class="panel-body">
				<div class="box-footer">
					{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
					<a href="{{ URL::to('admin/admins') }}" class="btn btn-default" type="button">Batal</a>
				</div>
			</div>
		</section>
    </div>
</div>