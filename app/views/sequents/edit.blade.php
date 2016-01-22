@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('content')
{{ Form::model($sequent, array('url' => route('admin.sequents.update', ['sequents'=>$sequent->id]), 'method' => 'put', 'class'=>'cmxform form-horizontal tasi-form')) }}
	@include('sequents._form')
{{ Form::close() }}
@stop

@section('script')
    {{HTML::script('admin/js/jquery.js')}}
@stop
