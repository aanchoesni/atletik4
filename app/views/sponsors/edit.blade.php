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
	{{ Form::model($sponsor, array('url' => route('admin.sponsors.update', ['sponsors'=>$sponsor->id]), 'method' => 'put', 'id' => 'sponsor', 'class'=>'cmxform form-horizontal tasi-form', 'files' => 'true' ))}}
		@include('sponsors._form')
	{{ Form::close() }}
@stop

@section('script')
    {{HTML::script('admin/js/jquery.js')}}
    {{HTML::script('admin/js/jquery.validate.min.js')}}
    <!--script for this page-->
    {{HTML::script('admin/js/form-validation-script.js')}}
    {{HTML::script('admin/assets/bootstrap-fileupload/bootstrap-fileupload.js')}}
@stop
