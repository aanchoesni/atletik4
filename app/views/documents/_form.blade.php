@extends('layouts.masteruser')

@section('title')
	{{ $title }}
@stop

@section('asset')
    {{HTML::style("select2/select2-bootstrap.css")}}
    {{HTML::style("admin/assets/bootstrap-datepicker/css/datepicker.css")}}
    {{HTML::style("admin/assets/bootstrap-timepicker/compiled/timepicker.css")}}
    {{HTML::style("admin/assets/bootstrap-datetimepicker/css/datetimepicker.css")}}
    <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
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
                                {{ Form::text('name', null, array('class' => 'form-control','placeholder'=>'masukkan jumlah uang')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('file', 'Unggah Dokumen', array('class' => 'control-label col-lg-2') ) }}
                            <div class="col-lg-10">
                                {{ Form::file('attachment') }}
                                <p class="help-block">Upload dokumen.</p>
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
    {{HTML::script('admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{HTML::script('admin/assets/bootstrap-timepicker/js/bootstrap-timepicker.js')}}
    {{HTML::script('admin/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}

    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#type").select2(); });
        $(document).ready(function() { $("#method").select2(); });
    </script>
    {{-- {{HTML::script('admin/js/common-scripts.js')}} --}}
    {{HTML::script('admin/js/advanced-form-components.js')}}
@stop
