@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('asset')
    {{HTML::style("select2/select2-bootstrap.css")}}
    <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
    {{HTML::style("admin/assets/bootstrap-fileupload/bootstrap-fileupload.css")}}
@stop

@section('content')
	{{ Form::open(array('url' => route('admin.admins.store'), 'method' => 'post', 'id' => 'admin', 'class'=>'cmxform form-horizontal tasi-form', 'files'=>'true')) }}
		@include('admins._form')
	{{ Form::close() }}
@stop

@section('script')
    {{HTML::script('admin/js/jquery.js')}}
    {{HTML::script('admin/js/jquery.validate.min.js')}}
    <!--script for this page-->
    {{HTML::script('admin/js/form-validation-script.js')}}
    {{HTML::script('admin/assets/bootstrap-fileupload/bootstrap-fileupload.js')}}

    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#position_id").select2(); });
        $(document).ready(function() { $("#tahun").select2(); });
    </script>
@stop
