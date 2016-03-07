@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('asset')
    {{HTML::style("select2/select2-bootstrap.css")}}
    {{HTML::style("admin/assets/bootstrap-datepicker/css/datepicker.css")}}
    {{HTML::style("admin/assets/bootstrap-timepicker/compiled/timepicker.css")}}
    {{HTML::style("admin/assets/bootstrap-datetimepicker/css/datetimepicker.css")}}
    <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
    {{HTML::style("admin/assets/advanced-datatable/media/css/demo_page.css")}}
  	{{HTML::style("admin/assets/advanced-datatable/media/css/demo_table.css")}}
  	{{HTML::style("admin/assets/data-tables/DT_bootstrap.css")}}
@stop

@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <section class="panel">
	            <header class="panel-heading">
	                Nomor dada sesuai dengan jenjang
	            </header>
	            <div class="panel-body"  style:"overflow: scroll;">
	                  <div class="adv-table">
	                      <table  class="display table table-bordered table-striped" id="seq">
	                        <thead>
	                          <tr>
	                              <th style="text-align:center;" width="10%">No</th>
	                              <th style="text-align:center;" width="40%">Jenjang</th>
	                              <th style="text-align:center;" width="40%">Nomor</th>
	                              <th style="text-align:center;" width="10%">Aksi</th>
	                          </tr>
	                          </thead>
	                          <tbody>
	                          <?php $no = 1;?>
	                          @foreach($sequents as $value)
	                            <tr>
	                                <td style="text-align:center;"><?php echo $no ?></td>
	                                <td>{{{ $value->jenjang }}}</td>
	                                <td>{{{ $value->number }}}</td>
	                                <td style="text-align:center;">
	                                  <div class="btn-group">
	                                    <a href="{{ route('admin.sequents.edit', ['sequents'=>$value->id]) }}" class="btn btn-default btn-xs">Setting</i></a>
	                                  </div>
	                                </td>
	                            <?php $no++;?>
	                            </tr>
	                            @endforeach
	                          </tbody>
	                      </table>
	                  </div>
	            </div>
	        </section>
	    </div>
	</div>
	<div class="row">
	    <div class="col-lg-12">
	        <section class="panel">
	            <header class="panel-heading">
	                Seri Perlombaan <a class="btn btn-primary" href="{{URL::to('admin/seris/create')}}">Tambah</a>
	            </header>
	            <div class="panel-body"  style:"overflow: scroll;">
	                  <div class="adv-table">
	                      <table  class="display table table-bordered table-striped" id="seq">
	                        <thead>
	                          <tr>
	                              <th style="text-align:center;" width="10%">No</th>
	                              <th style="text-align:center;" width="40%">Seri</th>
	                              <th style="text-align:center;" width="10%">Aksi</th>
	                          </tr>
	                          </thead>
	                          <tbody>
	                          <?php $no = 1;?>
	                          @foreach($seris as $value)
	                            <tr>
	                                <td style="text-align:center;"><?php echo $no ?></td>
	                                <td>{{{ $value->name }}}</td>
	                                <td style="text-align:center;">
	                                  {{ Form::open(array('url'=>route('admin.seris.destroy',['seris'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
	                                  {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs')) }}
	                                  {{ Form::close() }}
	                                </td>
	                            <?php $no++;?>
	                            </tr>
	                            @endforeach
	                          </tbody>
	                      </table>
	                  </div>
	            </div>
	        </section>
	    </div>
	</div>
	{{ Form::model($settings, array('url' => route('admin.settings.update', ['settings'=>'1']), 'method' => 'put', 'id' => 'setting', 'class'=>'cmxform form-horizontal tasi-form' ))}}
		<div class="row">
		    <div class="col-lg-12">
		        <section class="panel">
		            <div class="panel-body alert-danger">
		            <div class="border-head">
		                <h3>Perhatian!!! </h3>
		            </div>
		              Format tanggal tahun-bulan-tanggal
		            </div>
		        </section>
			</div>
		</div>
		<div class="row">
		    <div class="col-lg-12">
		        <section class="panel">
					<header class="panel-heading">
					    Pengaturan Umum
					</header>
					<div class="panel-body">
						<div class="form-group">
							{{ Form::label('kejuaraan_ke', 'Kejuaraan ke', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('kejuaraan_ke', null, array('class' => 'form-control form-control-inline input-medium')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('bank', 'Nama Bank', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('bank', null, array('class' => 'form-control form-control-inline')) }}
							</div>
							{{ Form::label('norek', 'Nomor Rekening', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('norek', null, array('class' => 'form-control form-control-inline input-medium')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('kodebank', 'Kode Bank', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('kodebank', null, array('class' => 'form-control form-control-inline')) }}
							</div>
							{{ Form::label('an', 'Atas Nama', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('an', null, array('class' => 'form-control form-control-inline input-medium')) }}
							</div>
						</div>
					</div>
					<header class="panel-heading">
					    Pengaturan Person
					</header>
					<div class="panel-body">
						<div class="form-group">
							{{ Form::label('nmpembimbing', 'Pembimbing 1', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('nmpembimbing', null, array('class' => 'form-control form-control-inline')) }}
							</div>
							{{ Form::label('nopembimbing', 'HP', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('nopembimbing', null, array('class' => 'form-control form-control-inline')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('nmpembimbing1', 'Pembimbing 2', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('nmpembimbing1', null, array('class' => 'form-control form-control-inline')) }}
							</div>
							{{ Form::label('nopembimbing1', 'HP', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('nopembimbing1', null, array('class' => 'form-control form-control-inline')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('nmpembimbing2', 'Pembimbing 3', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('nmpembimbing2', null, array('class' => 'form-control form-control-inline')) }}
							</div>
							{{ Form::label('nopembimbing2', 'HP', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('nopembimbing2', null, array('class' => 'form-control form-control-inline')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('nmketua', 'Ketua Panitia', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('nmketua', null, array('class' => 'form-control form-control-inline')) }}
							</div>
							{{ Form::label('noketua', 'HP', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('noketua', null, array('class' => 'form-control form-control-inline')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('nmsek', 'Kesekretariatan', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('nmsek', null, array('class' => 'form-control form-control-inline')) }}
							</div>
							{{ Form::label('nosek', 'HP', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('nosek', null, array('class' => 'form-control form-control-inline')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('nmben', 'Bendahara', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('nmben', null, array('class' => 'form-control form-control-inline')) }}
							</div>
							{{ Form::label('noben', 'HP', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-4">
								{{ Form::text('noben', null, array('class' => 'form-control form-control-inline')) }}
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
					    Pengaturan Sosial Media
					</header>
					<div class="panel-body">
						<div class="form-group">
							{{ Form::label('facebook', 'Facebook', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('facebook', null, array('class' => 'form-control form-control-inline')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('twitter', 'Twitter', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('twitter', null, array('class' => 'form-control form-control-inline')) }}
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
					    Pengaturan Tanggal Pendaftaran
					</header>
					<div class="panel-body">
						<div class="form-group">
							{{ Form::label('startdayreg', 'Tanggal Mulai Pendaftaran', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('startdayreg', null, array('class' => 'form-control form-control-inline input-medium default-date-inseo', 'readonly')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('enddayreg', 'Tanggal Akhir Pendaftaran', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('enddayreg', null, array('class' => 'form-control form-control-inline input-medium default-date-inseo', 'readonly')) }}
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
					    Pengaturan Tanggal Pembayaran
					</header>
					<div class="panel-body">
						<div class="form-group">
							{{ Form::label('startdaypay', 'Tanggal Mulai Pembayaran', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('startdaypay', null, array('class' => 'form-control form-control-inline input-medium default-date-inseo', 'readonly')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('enddaypay', 'Tanggal Akhir Pembayaran', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('enddaypay', null, array('class' => 'form-control form-control-inline input-medium default-date-inseo', 'readonly')) }}
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
					    Pengaturan Technical Meeting (Pertemuan Teknik)
					</header>
					<div class="panel-body">
						<div class="form-group">
							{{ Form::label('tmday', 'Hari', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('tmday', null, array('class' => 'form-control form-control-inline')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('tmdate', 'Tanggal', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('tmdate', null, array('class' => 'form-control form-control-inline input-medium default-date-inseo', 'readonly')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('tmtime', 'Pukul', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('tmtime', null, array('class' => 'form-control form-control-inline input-medium')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('tmplace', 'Tempat', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-8">
								{{ Form::text('tmplace', null, array('class' => 'form-control form-control-inline')) }}
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
					    Pengaturan Pelaksanaan Lomba
					</header>
					<div class="panel-body">
						<div class="form-group">
							{{ Form::label('contestday', 'Hari', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('contestday', null, array('class' => 'form-control form-control-inline')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('contestdate', 'Tanggal', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('contestdate', null, array('class' => 'form-control form-control-inline input-medium default-date-inseo', 'readonly')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('contesttime', 'Pukul', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('contesttime', null, array('class' => 'form-control form-control-inline input-medium')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('contestplace', 'Tempat', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-8">
								{{ Form::text('contestplace', null, array('class' => 'form-control form-control-inline')) }}
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
					    Pengaturan Biaya
					</header>
					<div class="panel-body">
						<div class="form-group">
							{{ Form::label('moneyreg', 'Biaya per nomor perlombaan', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('moneyreg', null, array('class' => 'form-control form-control-inline')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('moneyregest', 'Biaya lari estafet', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('moneyregest', null, array('class' => 'form-control form-control-inline')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('moneysertatl', 'Biaya Sertifikat Atlit', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('moneysertatl', null, array('class' => 'form-control form-control-inline')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('moneysertoff', 'Biaya Sertifikat Petugas', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('moneysertoff', null, array('class' => 'form-control form-control-inline')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('moneydocbook', 'Biaya Buku Hasil', array('class' => 'control-label col-lg-2')) }}
							<div class="col-lg-2">
								{{ Form::text('moneydocbook', null, array('class' => 'form-control form-control-inline')) }}
							</div>
						</div>
					</div>
				</section>
		    </div>
		</div>
		<div class="row">
		    <div class="col-lg-12">
		        <section class="panel">
					<div class="panel-body">
						<div class="box-footer">
							{{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
							<a href="{{ URL::to('admin/admins') }}" class="btn btn-default" type="button">Batal</a>
						</div>
					</div>
				</section>
		    </div>
		</div>
	{{ Form::close() }}
@stop

@section('script')
	{{HTML::script('admin/js/jquery.js')}}
    {{HTML::script('admin/js/jquery.validate.min.js')}}
    <!--script for this page-->
    {{HTML::script('admin/js/form-validation-script.js')}}
    {{HTML::script('admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{HTML::script('admin/assets/bootstrap-timepicker/js/bootstrap-timepicker.js')}}
    {{HTML::script('admin/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}

    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#position_id").select2(); });
        $(document).ready(function() { $("#tahun").select2(); });
    </script>
    {{HTML::script('admin/js/advanced-form-components.js')}}
    {{HTML::script('admin/assets/bootstrap-inputmask/bootstrap-inputmask.min.js')}}
    {{-- {{HTML::script('admin/assets/advanced-datatable/media/js/jquery.js')}} --}}
    {{-- {{HTML::script('admin/assets/advanced-datatable/media/js/jquery.dataTables.js')}} --}}
    {{-- {{HTML::script('admin/assets/data-tables/DT_bootstrap.js')}} --}}
    <!--script type="text/javascript" charset="utf-8">
          $(document).ready(function() {
              $('#seq').dataTable();
          } );
    </script-->
@stop
