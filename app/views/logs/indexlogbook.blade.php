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
                Daftar Kegiatan Panitia
            </header>
            <div class="panel-body"  style:"overflow: scroll;">
                <div class="adv-table">
                  {{ Form::open(array('url' => route('admin.logbookso'), 'method' => 'get','class'=>'form-inline')) }}
                      <div class="form-group">
                          {{-- {{ Form::label('nama', 'Nama', array('class' => 'control-label')) }} --}}
                          {{ Form::select('nama', array(''=>'')+Admin::orderBy('name', 'asc')->lists('name','user_id'), Session::get('lgnama'), array(
                            'id'=>'nama',
                            'placeholder' => "Pilih nomor lomba",
                            'class'=>'form-control input-sm',
                            "onChange"=>"this.form.submit();")) }}
                      </div>
                      {{-- {{Form::submit('Cari', array('class'=>'btn btn-success'))}} --}}
                      <a href="{{ URL::to('admin/cetaklogbook') }}" class="btn btn-success">Eksport</a>
                  {{ Form::close() }}
                  <table  class="display table table-bordered table-striped" id="tbadmin">
                    <thead>
                      <tr>
                          <th style="text-align:center;" width="5%">No</th>
                          <th style="text-align:center;" width="5%">Hari</th>
                          <th style="text-align:center;" width="10%">Tanggal</th>
                          <th style="text-align:center;">Tempat</th>
                          <th style="text-align:center;">Kegiatan</th>
                          <th style="text-align:center;">Hasil</th>
                          <th style="text-align:center;" width="10%"></th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $no = 1;?>
                      @foreach($logs as $value)
                        <tr>
                            <td style="text-align:center;"><?php echo $no ?></td>
                            <td>{{{ $value->hari }}}</td>
                            <td>{{{ $value->tgl }}}</td>
                            <td>{{{ $value->tempat }}}</td>
                            <td>{{{ $value->kegiatan }}}</td>
                            <td>{{{ $value->hasil }}}</td>
                            <td style="text-align:center;">
                              <div class="btn-group">
                                <a href="{{ route('admin.logbooks.edit', ['logbooks'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                {{ Form::open(array('url'=>route('admin.logbooks.destroy',['logbooks'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                                {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs')) }}
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
  <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
  <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
  <script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#tbadmin').dataTable();
      } );
      $(document).ready(function() {
        $("#nama").select2({ width: 'resolve' });
      } );
  </script>
@stop