@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Jabatan Baru
            </header>
            <div class="panel-body">
            	{{ Form::open(array('url' => route('admin.positions.store'), 'method' => 'post', 'id' => 'position', 'class'=>'cmxform form-horizontal tasi-form')) }}
            		@include('positions._form')
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
@stop
