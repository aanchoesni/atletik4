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
                Daftar Sponsor
                {{ HTML::buttonAdd() }}
            </header>
            <div class="panel-body"  style:"overflow: scroll;">
                  <div class="adv-table">
                      <table  class="display table table-bordered table-striped" id="tbadmin">
                        <thead>
                          <tr>
                              <th>Logo</th>
                              <th>Nama</th>
                              <th>URL</th>
                              <th width="10%">Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($sponsors as $value)
                            <tr>
                                <td><center>{{ HTML::image('uploads/sponsor/' . $value->logo,'alt', array( 'width' => 120, 'height' => 'auto' ) ) }}</center></td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->url }}</td>
                                <td style="text-align:center;">
                                    <div class="btn-group">
                                      {{-- <a href="{{ route('admin.sponsors.edit', ['sponsors'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a> --}}
                                      {{ Form::open(array('url'=>route('admin.sponsors.destroy',['sponsors'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs')) }}
                                      {{ Form::close() }}
                                    </div>
                                </td>
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
