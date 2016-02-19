<div class="row">
    <div class="col-lg-12">
        <section class="panel">
			<header class="panel-heading">
			    Lomba
			</header>
			<div class="panel-body">
				<div class="form-group">
					{{ Form::label('name', 'Nama Sponsor', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('name', null, array('class' => 'form-control','placeholder'=>'masukkan nama sponsor')) }}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('url', 'URL', array('class' => 'control-label col-lg-2')) }}
					<div class="col-lg-10">
						{{ Form::text('url', null, array('class' => 'form-control','placeholder'=>'masukkan url')) }}
						<span class="label label-danger">Ex</span>
						<span>
	                 	atletik.unesa.ac.id
	                 	</span>
					</div>
				</div>
                <div class="form-group">
                 	{{ Form::label('logo', 'logo', array('class' => 'control-label col-lg-2')) }}
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
	                       		{{ Form::file('logo', array('class'=>'default')) }}
	                       		</span>
	                        	{{-- <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> --}}
	                    	</div>
	                	</div>
	                	<span class="label label-danger">NOTE!</span>
	                 	<span>
	                 	Ukuran file maksimal 1024 Kb
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
