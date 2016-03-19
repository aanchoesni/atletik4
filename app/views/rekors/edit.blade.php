@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('content')
	{{ Form::model($rekor, array('url' => route('admin.rekors.update', ['rekors'=>$rekor->id]), 'method' => 'put', 'id' => 'rekor', 'class'=>'cmxform form-horizontal tasi-form' ))}}
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Ubah Rekor
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('nolomba', 'Nomor Lomba', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::text('nolomba', null, array('class' => 'form-control','placeholder'=>'masukkan nomor lomba', 'readonly')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('nama', 'Nama', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::text('nama', null, array('class' => 'form-control','placeholder'=>'masukkan nama')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('pendidikan', 'Pendidikan', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::text('pendidikan', null, array('class' => 'form-control','placeholder'=>'masukkan nama sekolah')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('prestasi', 'Prestasi', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::text('prestasi', null, array('class' => 'form-control','placeholder'=>'masukkan prestasi')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('tahun', 'Tahun', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::text('tahun', null, array('class' => 'form-control','placeholder'=>'masukkan tahun')) }}
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="box-footer">
                                {{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
                                <a href="{{ URL::to('admin/rekors') }}" class="btn btn-default" type="button">Batal</a>
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

    {{-- {{HTML::script('admin/js/common-scripts.js')}} --}}
@stop
