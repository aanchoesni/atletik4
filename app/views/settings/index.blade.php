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
@stop

@section('content')
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
								{{ Form::text('tmtime', null, array('class' => 'form-control form-control-inline input-medium timepicker-24', 'readonly')) }}
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
								{{ Form::text('contesttime', null, array('class' => 'form-control form-control-inline input-medium timepicker-24', 'readonly')) }}
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
@stop