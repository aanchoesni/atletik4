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
                Daftar Sekolah
            </header>
            <div class="panel-body"  style:"overflow: scroll;">
                  <div class="adv-table">
                      <table  class="display table table-bordered table-striped" id="hidden-table-info">
                        <thead>
                          <tr>
                              <th style="text-align:center;">No</th>
                              <th style="text-align:center;" >Sekolah</th>
                              <th style="text-align:center;">Kota</th>
                              <th style="text-align:center;">Telepon</th>
                              <th style="text-align:center;">Aksi</th>
                              <th style="display:none;">Jalan</th>
                              <th style="display:none;">Desa</th>
                              <th style="display:none;">Kecamatan</th>
                              <th style="display:none;">Kabupaten/Kota</th>
                              <th style="display:none;">Kode Pos</th>
                              <th style="display:none;">Nama Kepala Sekolah</th>
                              <th style="display:none;">No Telepon Kepala Selolah</th>
                              <th style="display:none;">No HP Kepala Selolah</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $no = 1;?>
                          @foreach($schools as $value)
                            <tr>
                                <td style="text-align:center;"><?php echo $no ?></td>
                                <td>{{{ $value->name }}}</td>
                                <td>{{{ $value->adcity }}}</td>
                                <td>{{{ $value->adphone }}}</td>
                                <td style="text-align:center;">
                                  <div class="btn-group">
                                    <span style="display:inline;">
                                    <a href="{{URL::to('admin/schools/indexdetail/' . Crypt::encrypt($value->user_id)) }}" class="btn btn-primary btn-xs"><i class="fa fa-laptop"></i></a>
                                    </span>
                                    <span style="display:inline;">
                                    <a href="{{URL::to('admin/schools/pendamping/' . Crypt::encrypt($value->user_id)) }}" class="btn btn-primary btn-xs"><i class="fa fa-user"></i></a>
                                    </span>
                                    {{-- {{ Form::open(array('url'=>route('admin.positions.destroy',['positions'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }} --}}
                                    {{-- {{ Form::button('<i class="fa fa-thumbs-up"></i>', array('type'=>'submit','class'=>'btn btn-success btn-xs')) }} --}}
                                    {{-- {{ Form::close() }} --}}
                                    {{-- {{ Form::open(array('url'=>route('admin.positions.destroy',['positions'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }} --}}
                                    {{-- {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs')) }} --}}
                                    {{-- {{ Form::close() }} --}}
                                  </div>
                                </td>
                                <td style="display:none;">{{{ $value->adstreet }}}</td>
                                <td style="display:none;">{{{ $value->advillage }}}</td>
                                <td style="display:none;">{{{ $value->addistricts }}}</td>
                                <td style="display:none;">{{{ $value->adcity }}}</td>
                                <td style="display:none;">{{{ $value->adpostalcode }}}</td>
                                <td style="display:none;">{{{ $value->hmname }}}</td>
                                <td style="display:none;">{{{ $value->hmphone }}}</td>
                                <td style="display:none;">{{{ $value->hmmobile }}}</td>
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
  {{--<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#tbadmin').dataTable();
    } );
  </script>--}}
  <script type="text/javascript">
      /* Formating function for row details */
      function fnFormatDetails ( oTable, nTr )
      {
          var aData = oTable.fnGetData( nTr );
          var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
          sOut += '<tr><td>Jalan:</td><td>'+aData[6]+'</td></tr>';
          sOut += '<tr><td>Desa/Kelurahan:</td><td>'+aData[7]+'</td></tr>';
          sOut += '<tr><td>Kecamatan:</td><td>'+aData[8]+'</td></tr>';
          sOut += '<tr><td>Kabupaten/Kota:</td><td>'+aData[9]+'</td></tr>';
          sOut += '<tr><td>Kode Pos:</td><td>'+aData[10]+'</td></tr>';
          sOut += '<tr><td>Nama Kepsek:</td><td>'+aData[11]+'</td></tr>';
          sOut += '<tr><td>No Telepon Kepsek:</td><td>'+aData[12]+'</td></tr>';
          sOut += '<tr><td>No HP Kepsek:</td><td>'+aData[13]+'</td></tr>';
          sOut += '</table>';

          return sOut;
      }

      $(document).ready(function() {
          /*
           * Insert a 'details' column to the table
           */
          var nCloneTh = document.createElement( 'th' );
          var nCloneTd = document.createElement( 'td' );
          nCloneTd.innerHTML = '{{ HTML::image("admin/assets/advanced-datatable/examples/examples_support/details_open.png") }}';
          nCloneTd.className = "center";

          $('#hidden-table-info thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#hidden-table-info tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#hidden-table-info').dataTable( {
              "aoColumnDefs": [
                  { "bSortable": false, "aTargets": [ 0 ] }
              ],
              "aaSorting": [[1, 'asc']]
          });

          /* Add event listener for opening and closing details
           * Note that the indicator for showing which row is open is not controlled by DataTables,
           * rather it is done here
           */
          $('#hidden-table-info tbody td img').live('click', function () {
              var nTr = $(this).parents('tr')[0];
              if ( oTable.fnIsOpen(nTr) )
              {
                  /* This row is already open - close it */
                  this.src = "../admin/assets/advanced-datatable/examples/examples_support/details_open.png";
                  oTable.fnClose( nTr );
              }
              else
              {
                  /* Open this row */
                  this.src = "../admin/assets/advanced-datatable/examples/examples_support/details_close.png";
                  oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
              }
          } );
      } );
  </script>
@stop