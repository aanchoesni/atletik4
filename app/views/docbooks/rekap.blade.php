@extends('layouts.master')

@section('title')
  {{ $title }}
@stop

@section('asset')
  {{HTML::style("admin/assets/advanced-datatable/media/css/demo_page.css")}}
  {{HTML::style("admin/assets/advanced-datatable/media/css/demo_table.css")}}
  {{HTML::style("admin/assets/data-tables/DT_bootstrap.css")}}
  {{HTML::style("select2/select2-bootstrap.css")}}
  <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
@stop

@section('content')
<!-- page start-->

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Rekap Buku Dokumentasi
            </header>
            {{ Form::open(array('url' => route('admin.cetakdocbook'), 'method' => 'get','class'=>'form-inline', 'id' => 'cetakdocbook')) }}
            <div class="panel-body"  style:"overflow: scroll;">
              <div class="form-inline">
                <div class="form-group">
                    {{ Form::label('tahun', 'Tahun') }}
                    {{ Form::selectyear('tahun', 2015, 2020, date('Y'), array(
                    'id'=>'tahun',
                    'placeholder' => "Tahun",
                    'class' => 'form-control input-sm')) }}
                </div>
              </div>
              <br>
              <div class="form-group">
                {{ Form::button('Eksport', array('type'=>'submit','class'=>'btn btn-success')) }}
              </div>
            {{ Form::close() }}
        </section>
    </div>
</div>
@stop

@section('script')
  {{HTML::script('admin/js/jquery.js')}}
  <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
  <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
  <script type="text/javascript">
      $(document).ready(function() { $("#tahun").select2(); });
  </script>
  {{HTML::script('admin/js/jquery.validate.min.js')}}
    <!--script for this page-->
  {{HTML::script('admin/js/form-validation-script.js')}}
@stop
