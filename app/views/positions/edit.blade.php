@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Ubah Jabatan
            </header>
            <div class="panel-body">
        	{{ Form::model($position, array('url' => route('admin.positions.update', ['positions'=>$position->id]), 'method' => 'put')) }}
        		@include('positions._form')
        	{{ Form::close() }}
        	</div>
        </section>
    </div>
</div>
@stop

@section('script')
    {{HTML::script('admin/js/jquery.js')}}
@stop
