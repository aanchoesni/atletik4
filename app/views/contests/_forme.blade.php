<div class="row">
    <div class="col-lg-12">
        <section class="panel">
			<header class="panel-heading">
			    Lomba
			</header>
			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('nocontest', 'Nomor Lomba', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('nocontest', null, array('class' => 'form-control', 'readonly')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('name', 'Nama Lengkap (Sesuai Harus Rapor)', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('name', null, array('class' => 'form-control','placeholder'=>'masukkan nama')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('nis', 'NIS', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('nis', null, array('class' => 'form-control','placeholder'=>'masukkan NIS')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('tmptlhr', 'Tempat Lahir', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('tmptlhr', null, array('class' => 'form-control','placeholder'=>'masukkan tempat lahir')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('tgllhr', 'Tanggal Lahir', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('tgllhr', null, array('class' => 'form-control form-control-inline input-medium default-date-picker','placeholder'=>'masukkan tanggal lahir')) }}<br>
						<span class="label label-danger">NOTE!</span>
	                 	<span>
		                 	@if(Sentry::getUser()->last_name == 'SMA')
		                 	Batas usia maksimum berusia 17 tahun
		                 	@endif
		                 	@if(Sentry::getUser()->last_name == 'SMP')
		                 	Batas usia maksimum berusia 14 tahun
		                 	@endif
		                 	@if(Sentry::getUser()->last_name == 'SD')
		                 	Batas usia maksimum berusia 11 tahun
		                 	@endif
	                 	</span>
					</div>
				</div>
                <div class="form-group">
                 	{{ Form::label('foto', 'Foto', array('class' => 'control-label col-lg-2')) }}
	              	<div class="col-lg-10">
	                	<div class="fileupload fileupload-exists" data-provides="fileupload">
	                    	<div class="fileupload-preview fileupload-exists thumbnail" style="width: 170px; height: 250px;">
	                        	{{ HTML::image('uploads/foto/' . $contest->foto,'alt') }}
	                      	</div>
	                      	<br>
	                      	{{-- <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 275px; line-height: 20px;"></div>
	                      	<div> --}}
	                       		<span class="btn btn-white btn-file">
	                       		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
	                       		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
	                       		{{ Form::file('foto', array('class'=>'default')) }}
	                       		</span>
	                        	{{-- <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> --}}
	                    	</div>
	                	</div>
	              	</div>
	          	</div>
	          	<div class="form-group">
                 	{{ Form::label('rapor', 'Scan Rapor', array('class' => 'control-label col-lg-2')) }}
	              	<div class="col-lg-10">
	                	<div class="fileupload fileupload-exists" data-provides="fileupload">
	                    	<div class="fileupload-preview fileupload-exists thumbnail" style="width: 50%; height: 50%;">
	                        	{{ HTML::image('uploads/rapor/' . $contest->rapor,'alt') }}
	                      	</div>
	                      	<br>
	                      	{{-- <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 275px; line-height: 20px;"></div>
	                      	<div> --}}
	                       		<span class="btn btn-white btn-file">
	                       		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
	                       		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
	                       		{{ Form::file('rapor', array('class'=>'default')) }}
	                       		</span>
	                        	{{-- <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> --}}
	                    	</div>
	                	</div>
	              	</div>
	          	</div>
				<div class="panel-body">
					<ul class="nav pull-right">
						<div class="box-footer col-lg-2">
							{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
						</ul>
					</div>
				</div>
			</div>
		</section>
    </div>
</div>
