@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Seri Baru
            </header>
            <div class="panel-body">
            	{{ Form::open(array('url' => route('admin.seris.store'), 'method' => 'post', 'id' => 'seri', 'class'=>'cmxform form-horizontal tasi-form')) }}
            		<div class="form-group">
                        {{ Form::label('name', 'Nama Seri', array('class' => 'control-label col-lg-2')) }}
                        <div class="col-lg-10">
                            {{ Form::text('name', null, array('class' => 'form-control','placeholder'=>'masukkan nama seri')) }}
                        </div>
                    </div>
                    <div class="box-footer">
                        {{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
                        <a href="{{ URL::to('admin/settings') }}" class="btn btn-default" type="button">Batal</a>
                    </div>
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
