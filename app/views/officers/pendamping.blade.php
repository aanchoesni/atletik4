@extends('layouts.master')

@section('title')
  {{ $title }}
@stop

@section('asset')
  {{HTML::style("admin/assets/advanced-datatable/media/css/demo_page.css")}}
  {{HTML::style("admin/assets/advanced-datatable/media/css/demo_table.css")}}
  {{HTML::style("admin/assets/data-tables/DT_bootstrap.css")}}
  {{HTML::style("select2/select2-bootstrap.css")}}
  {{HTML::style("admin/assets/fancybox/source/jquery.fancybox.css")}}
  <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
@stop

@section('content')
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Daftar Guru pendamping dari <strong> {{$school->name}} </strong>
                <span class="pull-right">
                  <a href="{{ URL::to('admin/schools') }}"><i class="fa fa-times "></i></a>
                </span>
            </header>
            <div class="panel-body">
                  <div class="adv-table">
                      <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th><i class="fa fa-question-circle"></i> No Telepon</th>
                  <th><i class="fa fa-question-circle"></i> No Handphone</th>
                  <th><i class="fa fa-bookmark"></i> Tugas</th>
              </tr>
              </thead>
              <tbody>
              @foreach($officers as $value)
              <tr>
                  <td height="75" width="50">{{ HTML::image('uploads/fotopetugas/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->notlp }}</td>
                  <td>{{ $value->nohp }}</td>
                  <td>{{ $value->type }}</td>
              </tr>
              @endforeach
              </tbody>
          </table>
                  </div>
            </div>
        </section>
    </div>
</div>
<!-- page end-->
@stop

@section('script')
  {{HTML::script('admin/assets/advanced-datatable/media/js/jquery.js')}}
  {{HTML::script('admin/assets/advanced-datatable/media/js/jquery.dataTables.js')}}
  {{HTML::script('admin/assets/data-tables/DT_bootstrap.js')}}
  {{HTML::script('admin/js/jquery.pulsate.min.js')}}
  {{HTML::script('admin/assets/fancybox/source/jquery.fancybox.js')}}
  {{HTML::script('admin/js/pulstate.js')}}
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#atlit').dataTable();
    } );
  </script>
  <script type="text/javascript">
      $(document).ready(function() {
          $("#rapor").fancybox({
            openEffect  : 'elastic',
            closeEffect : 'elastic',

            helpers : {
              title : {
                type : 'inside'
              }
            }
          });
      } );
  </script>
  <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
  <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
  <script type="text/javascript">
      $(document).ready(function() { $("#nocontest").select2(); });
  </script>
@stop
