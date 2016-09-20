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
    {{ Form::model($admins, array('url' => route('admin.admins.updateprofile', ['admins'=>$admins->id]), 'method' => 'put', 'id' => 'admin', 'class'=>'cmxform form-horizontal tasi-form', 'files'=>'true' ))}}
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Profile
                        <a href="{{ route('admin.admins.show', ['admins'=>Crypt::encrypt($admins->id)]) }}" class="btn btn-info" type="button">Cetak</a>
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('noi', 'No Identitas', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::text('noi', null, array('class' => 'form-control','placeholder'=>'masukkan nomor identitas')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('name', 'Nama Lengap', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::text('name', null, array('class' => 'form-control','placeholder'=>'masukkan nama lengkap')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('position_id', 'Jabatan', array('class' => 'control-label col-lg-2') ) }}
                            <div class="col-lg-10">
                                {{ Form::select('position_id', array(''=>'')+Position::orderBy('name','ASC  ')->lists('name','id'), null, array(
                                        'id'=>'position_id',
                                        'placeholder' => "Pilih Jabatan",
                                        'class'=>'form-control input-sm')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('tahun', 'Tahun', array('class' => 'control-label col-lg-2') ) }}
                            <div class="col-lg-10">
                                {{ Form::selectyear('tahun', 2015, 2020, null, array(
                                    'id'=>'tahun',
                                    'placeholder' => "Pilih Tahun",
                                    'class' => 'form-control input-sm')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('nohp', 'Nomor HP', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::text('nohp', null, array('class' => 'form-control','placeholder'=>'masukkan nomor HP')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('sekolah', 'Sekolah', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::text('sekolah', null, array('class' => 'form-control','placeholder'=>'masukkan sekolah')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('foto', 'Foto', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                <div class="fileupload fileupload-exists" data-provides="fileupload">
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="width: 170px; height: 250px;">
                                        {{ HTML::image('uploads/fotopanitia/' . $admins->foto,'alt') }}
                                    </div>
                                    <br>
                                    {{-- <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 275px; line-height: 20px;"></div>
                                    <div> --}}
                                    <span class="btn btn-white btn-file">
                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                    {{ Form::file('foto', array('class'=>'default')) }}
                                    </span>
                                    {{-- <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Ubah Login Admin
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('email', 'Email', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::text('email', $admins->user->email, array('class' => 'form-control','placeholder'=>'masukkan email')) }}
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('info', 'Password hanya dapat diganti dengan fasilitas lupa password pada halaman login', array('class' => 'control-label col-lg-10', 'style' => 'color:red')) }}
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="box-footer">
                            {{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
                            <a href="{{ URL::to('dashboard') }}" class="btn btn-default" type="button">Batal</a>
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
    {{HTML::script('admin/assets/bootstrap-fileupload/bootstrap-fileupload.js')}}

    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#position_id").select2(); });
        $(document).ready(function() { $("#tahun").select2(); });
    </script>
@stop
