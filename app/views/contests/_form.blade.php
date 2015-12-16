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
						{{ Form::text('nocontest', $menus->menu, array('class' => 'form-control', 'readonly')) }}
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
						{{ Form::text('tgllhr', null, array('class' => 'form-control form-control-inline input-medium default-date-picker','placeholder'=>'masukkan tanggal lahir')) }}
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
	                        	{{-- <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> --}}
	                    	</div>
	                	</div>
	                	<span class="label label-danger">NOTE!</span>
	                 	<span>
	                 	Ukuran file maksimal 512 Kb
	                 	</span>
	              	</div>
	          	</div>
	          	<div class="form-group">
                 	{{ Form::label('rapor', 'Halaman depan rapor', array('class' => 'control-label col-lg-2')) }}
	              	<div class="col-lg-10">
	                	<div class="fileupload fileupload-new" data-provides="fileupload">
	                    	<div class="fileupload-new thumbnail" style="width: 200px; height: 275px;">
	                        	<img src="http://www.placehold.it/200x275/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
	                      	</div>
	                      	<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 40%; max-height: 40%; line-height: 20px;"></div>
	                      	<div>
	                       		<span class="btn btn-white btn-file">
	                       		<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
	                       		<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
	                       		{{ Form::file('rapor', array('class'=>'default')) }}
	                       		</span>
	                        	{{-- <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> --}}
	                    	</div>
	                	</div>
	                  	<span class="label label-danger">NOTE!</span>
	                 	<span>
	                 	Ukuran file maksimal 1 Mb
	                 	</span>
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
