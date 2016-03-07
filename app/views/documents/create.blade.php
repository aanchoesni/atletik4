@extends('layouts.master')

@section('title')
    {{ $title }}
@stop

@section('content')
    {{ Form::open(array('url' => route('admin.documents.store'), 'method' => 'post', 'id' => 'document', 'class'=>'cmxform form-horizontal tasi-form', 'files' => 'true')) }}
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Tambah Dokumen
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Nama Dokumen', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::text('name', null, array('class' => 'form-control','placeholder'=>'Nama dokumen')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('file', 'Unggah Dokumen', array('class' => 'control-label col-lg-2') ) }}
                            <div class="col-lg-10">
                                {{ Form::file('file') }}
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="box-footer">
                                {{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
                                <a href="{{ URL::to('admin/documents') }}" class="btn btn-default" type="button">Batal</a>
                            </div>
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
@stop
