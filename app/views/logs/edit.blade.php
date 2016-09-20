@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('asset')
    {{HTML::style("admin/assets/bootstrap-datepicker/css/datepicker.css")}}
    {{HTML::style("admin/assets/bootstrap-timepicker/compiled/timepicker.css")}}
    {{HTML::style("admin/assets/bootstrap-datetimepicker/css/datetimepicker.css")}}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Ubah Kegiatan
            </header>
            <div class="panel-body">
        	{{ Form::model($log, array('url' => route('admin.logs.update', ['logs'=>$log->id]), 'method' => 'put', 'id' => 'logbook', 'class'=>'cmxform form-horizontal tasi-form')) }}
        		@include('logs._form')
        	{{ Form::close() }}
        	</div>
        </section>
    </div>
</div>
@stop

@section('script')
    {{HTML::script('admin/js/jquery.js')}}
    {{HTML::script('admin/js/jquery.validate.min.js')}}
    <!--script for this page-->
    {{HTML::script('admin/js/form-validation-script.js')}}
    {{HTML::script('admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{HTML::script('admin/assets/bootstrap-timepicker/js/bootstrap-timepicker.js')}}
    {{HTML::script('admin/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}

    {{HTML::script('admin/js/advanced-form-components.js')}}
    {{HTML::script('admin/assets/bootstrap-inputmask/bootstrap-inputmask.min.js')}}
@stop
