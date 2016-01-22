@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('asset')
    {{HTML::style("select2/select2-bootstrap.css")}}
    <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
@stop

@section('content')
	{{ Form::model($admins, array('url' => route('admin.admins.update', ['admins'=>$admins->id]), 'method' => 'put', 'id' => 'admin', 'class'=>'cmxform form-horizontal tasi-form' ))}}
		@include('admins._forme')
	{{ Form::close() }}
@stop

@section('script')
    {{HTML::script('admin/js/jquery.js')}}
    {{HTML::script('admin/js/jquery.validate.min.js')}}
    <!--script for this page-->
    {{HTML::script('admin/js/form-validation-script.js')}}

    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#position_id").select2(); });
        $(document).ready(function() { $("#tahun").select2(); });
    </script>
@stop
