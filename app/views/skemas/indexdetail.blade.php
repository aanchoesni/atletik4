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
                Daftar Skema - <b>{{ Session::get('sklomba') }}</b> - {{ Session::get('sktahun') }}
                <span class="pull-right">
                  <a href="{{ URL::to('admin/skema') }}"><i class="fa fa-times "></i></a>
                </span>
            </header>
            <div class="panel-body"  style:"overflow: scroll;">
              {{ Form::open(array('url' => route('admin.skema.store'), 'method' => 'post', 'id' => 'skema')) }}
              <div class="form-inline">
                <div class="form-group">
                {{ Form::label('seri', 'Seri') }}
                {{ Form::select('seri', array(''=>'')+Seri::lists('name','name'), null, array(
                        'id'=>'seri',
                        'placeholder' => "Pilih seri",
                        'class'=>'form-control input-sm')) }}
                </div>
                <div class="form-group">
                {{ Form::label('nolint', 'No Lint/No Urut') }}
                {{ Form::selectRange('nolint', 1, 10, null, array(
                        'id'=>'nolint',
                        'class'=>'form-control input-sm')) }}
                </div>
                <br>
                <div class="form-group">
                {{ Form::label('nodada', 'Nomor Dada') }}
                {{ Form::select('nodada', array(''=>'')+Contest::where('nocontest',Session::get('sklomba'))->where('verifikasi','1')->whereNotNull('nodada')->lists('nodada','id'), null, array(
                        'id'=>'nodada',
                        'placeholder' => "Pilih No Dada",
                        'class'=>'form-control input-sm')) }}
                </div>
                <div class="form-group">
                <br>
                {{ Form::button('Tambah', array('type'=>'submit','class'=>'btn btn-success')) }}
                </div>
              </div>
              {{ Form::close() }}
              <div class="adv-table">
                  <table  class="display table table-bordered table-striped" id="tbadmin">
                    <thead>
                      <tr>
                          <th style="text-align:center;" width="5%">No</th>
                          <th style="text-align:center;" width="10%">Seri</th>
                          <th style="text-align:center;" width="10%">No Dada</th>
                          <th style="text-align:center;" width="30%">Nama</th>
                          <th style="text-align:center;" width="35%">Asal sekolah</th>
                          <th style="text-align:center;" width="10%">Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $no = 1;?>
                        @foreach($skemas as $value)
                        <tr>
                            <td style="text-align:center;"><?php echo $no ?></td>
                            <td style="text-align:center;">{{{ $value->seri }}}</td>
                            <td>{{{ $value->contest->nodada }}}</td>
                            <td>{{{ $value->contest->name }}}</td>
                            <td>{{{ $value->contest->akun->first_name }}}</td>
                            <td style="text-align:center;">
                              <div class="btn-group">
                                {{ Form::open(array('url'=>route('admin.skema.destroy',['skemas'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                                {{ Form::button('<i class="fa fa-times "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs')) }}
                                {{ Form::close() }}
                              </div>
                            </td>
                        <?php $no++;?>
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
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#tbadmin').dataTable();
    } );
  </script>
  <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
  <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
  <script type="text/javascript">
      $(document).ready(function() { $("#tahun").select2(); });
      $(document).ready(function() { $("#nolint").select2(); });
      $(document).ready(function() { $("#nocontest").select2({ dropdownAutoWidth : true }); });
      $(document).ready(function() { $("#seri").select2({ dropdownAutoWidth : true }); });
      $(document).ready(function() { $("#nodada").select2({ dropdownAutoWidth : true }); });
  </script>
  {{HTML::script('admin/js/jquery.validate.min.js')}}
    <!--script for this page-->
  {{HTML::script('admin/js/form-validation-script.js')}}
@stop