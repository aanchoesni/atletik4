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
                              <th width="30">No</th>
                              <th style="text-align:center;">Nama Document</th>
                              <th width="10%">Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $no = 1;?>
                          @foreach($documents as $value)
                            <tr>
                                <td><?php echo $no ?></td>
                                <td>{{ $value->name }}</td>
                                <td style="text-align:center;">
                                    <div class="btn-group">
                                      {{ Form::open(array('url'=>route('admin.documents.destroy',['documents'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
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
            $('#tbdocuments').dataTable();
        } );
    </script>
@stop
