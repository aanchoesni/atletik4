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
                Daftar Documents
                {{ HTML::buttonAdd() }}
            </header>
            <div class="panel-body"  style:"overflow: scroll;">
                  <div class="adv-table">
                      <table  class="display table table-bordered table-striped" id="tbdocuments">
                        <thead>
                          <tr>
                              <th>No</th>
                              <th>Nomor Lomba</th>
                              <th>Nama</th>
                              <th>Satuan Pendidikan</th>
                              <th>Prestasi</th>
                              <th>Tahun</th>
                              <th>Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $no = 1;?>
                          @foreach($rekors as $value)
                            <tr>
                                <td><?php echo $no ?></td>
                                <td>{{$value->nolomba}}</td>
                                <td>{{$value->nama}}</td>
                                <td>{{$value->pendidikan}}</td>
                                <td>{{$value->prestasi}}</td>
                                <td>{{$value->tahun}}</td>
                                <td style="text-align:center;">
                                    <div class="btn-group">
                                      <a href="{{ route('admin.rekors.edit', ['rekors`'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
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
            $('#tbdocuments').dataTable();
        } );
    </script>
@stop
