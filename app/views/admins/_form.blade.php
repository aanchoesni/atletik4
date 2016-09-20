<div class="row">
    <div class="col-lg-12">
        <section class="panel">
			<header class="panel-heading">
			    Identitas Admin Baru
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
						{{ Form::selectyear('tahun', 2015, 2020, date('Y'), array(
							'id'=>'tahun',
							'placeholder' => "Pilih Tahun",
							'class' => 'form-control')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('nohp', 'Nomor HP', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('nohp', null, array('class' => 'form-control','placeholder'=>'masukkan nomor HP')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('sekolah', 'Sekolah', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('sekolah', null, array('class' => 'form-control','placeholder'=>'masukkan sekolah')) }}
					</div>
				</div>
				<div class="form-group">
                 	{{ Form::label('foto', 'Foto', array('class' => 'control-label col-lg-2')) }}
	              	<div class="col-lg-10">
	                	<div class="fileupload fileupload-new" data-provides="fileupload">
	                    	<div class="fileupload-new thumbnail" style="width: 200px; height: 275px;">
	                    		{{ HTML::image('http://www.placehold.it/200x275/EFEFEF/AAAAAA&amp;text=no+image','alt') }}
	                      	</div>
	                      	<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 40%; max-height: 40%; line-height: 20px;"></div>
	                      	<div>
	                       		<span class="btn btn-white btn-file">
	                       		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
	                       		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
	                       		{{ Form::file('foto', array('class'=>'default')) }}
	                       		</span>
	                    	</div>
	                	</div>
	                	<span class="label label-danger">NOTE!</span>
	                 	<span>
	                 	Ukuran file maksimal 512 Kb
	                 	</span>
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
			    Login Admin Baru
			</header>
			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('email', 'Email', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('email', null, array('class' => 'form-control','placeholder'=>'masukkan email')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('password', 'Password', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::password('password', array('class' => 'form-control','placeholder'=>'**********')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('password_confirmation', 'Ulangi Password', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::password('password_confirmation', array('class' => 'form-control','placeholder'=>'**********')) }}
					</div>
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
