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
                Rekap Pendamping
            </header>
            {{ Form::open(array('url' => route('admin.cetakrekappendamping'), 'method' => 'get','class'=>'form-inline', 'id' => 'cetakrekappendamping')) }}
            <div class="panel-body"  style:"overflow: scroll;">
              <div class="form-inline">
                <div class="form-group">
                    {{ Form::label('tahun', 'Tahun') }}
                    {{ Form::selectyear('tahun', 2015, 2020, date('Y'), array(
                    'id'=>'tahun',
                    'placeholder' => "Tahun",
                    'class' => 'form-control input-sm')) }}
                </div>
                {{-- <div class="form-group">
                {{ Form::label('jenjang', 'Jenjang') }}
                {{ Form::select('jenjang', array(''=>'', 'SD'=>'SD', 'SMP'=>'SMP', 'SMA'=>'SMA'), null, array(
                        'id'=>'jenjang',
                        'placeholder' => "Pilih Jenjang",
                        'class'=>'form-control input-sm')) }}
                </div> --}}
                <div class="form-group">
                {{ Form::label('pilihan', 'Pilihan') }}
                {{ Form::select('pilihan', array(''=>'', 'Daftar'=>'Daftar', 'Sertifikat'=>'Sertifikat'), null, array(
                        'id'=>'pilihan',
                        'placeholder' => "Pilih pilihan",
                        'class'=>'form-control input-sm')) }}
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
      $(document).ready(function() { $("#pilihan").select2(); });
      $(document).ready(function() { $("#jenjang").select2(); });
  </script>
  {{HTML::script('admin/js/jquery.validate.min.js')}}
    <!--script for this page-->
  {{HTML::script('admin/js/form-validation-script.js')}}
  <script type="text/javascript">
  $(document).ready(function() {
    $('#jenjang').on('change', function(){
        $('#nocontest').select2("val","");
        $.post('{{ URL::to('admin/nocontestdata') }}', {type: 'nocontest', id: $('#jenjang').val()}, function(e){
            $('#nocontest').html(e);
        });
    });
  });
  </script>
@stop
