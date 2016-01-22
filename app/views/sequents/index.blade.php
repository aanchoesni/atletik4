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
                Nomor dada sesuai dengan jenjang
            </header>
            <div class="panel-body"  style:"overflow: scroll;">
                  <div class="adv-table">
                      <table  class="display table table-bordered table-striped" id="seq">
                        <thead>
                          <tr>
                              <th style="text-align:center;" width="10%">No</th>
                              <th style="text-align:center;" width="40%">Jenjang</th>
                              <th style="text-align:center;" width="40%">Nomor</th>
                              <th style="text-align:center;" width="10%">Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $no = 1;?>
                          @foreach($sequents as $value)
                            <tr>
                                <td style="text-align:center;"><?php echo $no ?></td>
                                <td>{{{ $value->jenjang }}}</td>
                                <td>{{{ $value->number }}}</td>
                                <td style="text-align:center;">
                                  <div class="btn-group">
                                    <a href="{{ route('admin.sequents.edit', ['sequents'=>$value->id]) }}" class="btn btn-default btn-xs">Setting</i></a>
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
            $('#seq').dataTable();
        } );
    </script>
@stop