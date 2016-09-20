@extends('layouts.master')

@section('title')
  {{ $title }}
@stop

@section('asset')
  {{HTML::style("admin/assets/advanced-datatable/media/css/demo_page.css")}}
  {{HTML::style("admin/assets/advanced-datatable/media/css/demo_table.css")}}
  {{HTML::style("admin/assets/data-tables/DT_bootstrap.css")}}
@stop

@section('content')
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Daftar Kegiatan
                {{ HTML::buttonAdd() }}
                <a class="btn btn-warning" href="{{ URL::to('admin/mahasiswacetaklogbook') }}">Eksport</a>
            </header>
            <div class="panel-body"  style:"overflow: scroll;">
                  <div class="adv-table">
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
                                    <a href="{{ route('admin.logs.edit', ['logs'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                    {{ Form::open(array('url'=>route('admin.logs.destroy',['logs'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
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
  <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#tbadmin').dataTable();
        } );
    </script>
@stop