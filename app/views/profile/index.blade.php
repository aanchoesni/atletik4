@extends('layouts.masteruser')

@section('title')
	{{ $title }}
@stop

@section('asset')
{{HTML::style("select2/select2-bootstrap.css")}}
<link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
@stop

@section('content')
{{ Form::model($profile, array('url' => route('user.profile.update', ['profile'=>$profile->id]), 'method' => 'put', 'id' => 'profile', 'class'=>'cmxform form-horizontal tasi-form' ))}}
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
      <header class="panel-heading">
          Profile Sekolah
      </header>
      <div class="panel-body">
        <div class="form-group">
          {{ Form::label('name', 'Nama Sekolah', array('class' => 'control-label col-lg-2')) }}
          <div class="col-lg-10">
            {{ Form::text('name', null, array('class' => 'form-control','placeholder'=>'masukkan nama lengkap', 'readonly')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('adstreet', 'Jalan', array('class' => 'control-label col-lg-2')) }}
          <div class="col-lg-10">
            {{ Form::text('adstreet', null, array('class'=>'form-control')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('advillage', 'Desa', array('class' => 'control-label col-lg-2')) }}
          <div class="col-lg-10">
            {{ Form::text('advillage', null, array('class'=>'form-control')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('addistricts', 'Kecamatan', array('class' => 'control-label col-lg-2') ) }}
          <div class="col-lg-10">
            {{ Form::text('addistricts', null, array('class'=>'form-control')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('adcity', 'Kota/Kabupaten', array('class' => 'control-label col-lg-2') ) }}
          <div class="col-lg-10">
            {{ Form::text('adcity', null, array('class'=>'form-control')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('adpostalcode', 'Kodepos', array('class' => 'control-label col-lg-2') ) }}
          <div class="col-lg-10">
            {{ Form::text('adpostalcode', null, array('class'=>'form-control')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('adphone', 'Nomor Telp', array('class' => 'control-label col-lg-2') ) }}
          <div class="col-lg-10">
            {{ Form::text('adphone', null, array('class'=>'form-control')) }}
          </div>
        </div>
    </section>
    </div>
    <div class="col-lg-12">
        <section class="panel">
      <header class="panel-heading">
          Profile Kepala Sekolah
      </header>
      <div class="panel-body">
        <div class="form-group">
          {{ Form::label('hmname', 'Nama Kepala Sekolah', array('class' => 'control-label col-lg-2')) }}
          <div class="col-lg-10">
            {{ Form::text('hmname', null, array('class' => 'form-control')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('hmphone', 'No. Telpon', array('class' => 'control-label col-lg-2') ) }}
          <div class="col-lg-10">
            {{ Form::text('hmphone', null, array('class'=>'form-control')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('hmmobile', 'No. HP', array('class' => 'control-label col-lg-2') ) }}
          <div class="col-lg-10">
            {{ Form::text('hmmobile', null, array('class'=>'form-control')) }}
          </div>
        </div>
    </section>
    </div>
    <div class="col-lg-12">
        <section class="panel">
        <div class="panel-body">
          <div class="box-footer">
            {{Form::submit('Ubah', array('class'=>'btn btn-danger'))}}
            <a href="{{ URL::to('dashboard') }}" class="btn btn-default" type="button">Batal</a>
          </div>
        </div>
      </div>
    </section>
    </div>
</div>
<!-- page end-->
{{ Form::close() }}
@stop

@section('script')
    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#tahun").select2(); });
    </script>
@stop
