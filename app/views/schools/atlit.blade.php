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
<div class="alert alert-danger fade in">
  <h4>PERINGATAN!!!</h4>
  1. Icon <span class="label label-success label-mini"><i class="fa fa-check"></i></span> pada kolom Status Verifikasi menandakan bahwa peserta <b>sudah</b> diverifikasi<br><br>
  2. Icon <span class="label label-danger label-mini"><i class="fa fa-times"></i></span> pada kolom Status Verifikasi menandakan bahwa peserta <b>belum</b> diverifikasi
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Daftar Atlit
            </header>
            <div class="panel-body" style="overflow: scroll;">
                  <div class="adv-table">
                      <table  class="display table table-bordered table-striped" id="hidden-table-info">
                        <thead>
                          <tr>
                              <th style="text-align:center;">No</th>
                              <th style="text-align:center;">Foto</th>
                              <th style="text-align:center;">Sekolah</th>
                              <th style="text-align:center;">Nama</th>
                              <th style="text-align:center;">NIS</th>
                              <th style="display:none;">Tempat Lahir</th>
                              <th style="display:none;">Tanggal Lahir</th>
                              <th style="display:none;">Rapor</th>
                              <th style="text-align:center;">No Lomba</th>
                              <th style="text-align:center;">No Dada</th>
                              <th style="text-align:center;">Status Verifikasi</th>
                              <th style="text-align:center;">Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $no = 1;?>
                          @foreach($atlits as $value)
                            <tr>
                                <td style="text-align:center;"><?php echo $no ?></td>
                                <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                                <td>{{{ $value->akun->first_name }}}</td>
                                <td>{{{ $value->name }}}</td>
                                <td>{{{ $value->nis }}}</td>
                                <td style="display:none;">{{{ $value->tmptlhr }}}</td>
                                <td style="display:none;">{{{ $value->tgllhr }}}</td>
                                <td style="display:none;">
                                  <a id="rapor" href="../uploads/rapor/{{ $value->rapor }}">Lihat Rapor</a>
                                </td>
                                <td>{{{ $value->nocontest }}}</td>
                                <td style="text-align:center;">{{{ $value->nodada }}}</td>
                                <td style="text-align:center;">
                                @if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                                @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                                <td style="text-align:center;">
                                  <div class="btn-group">
                                    @if ($value->verifikasi==1)
                                      {{ Form::open(array('url'=>route('admin.schools.notverifikasi',['contests'=>$value->id]),'method'=>'put', 'class'=>'col-md-1')) }}
                                      {{ Form::button('<i class="fa fa-times "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs')) }}
                                      {{ Form::close() }}
                                    @endif
                                    @if ($value->verifikasi==0)
                                      {{ Form::open(array('url'=>route('admin.schools.verifikasi',['contests'=>$value->id]),'method'=>'put', 'class'=>'col-md-1')) }}
                                      {{ Form::button('<i class="fa fa-check "></i>', array('type'=>'submit','class'=>'btn btn-primary btn-xs')) }}
                                      {{ Form::close() }}

                                      <span style="display:inline;" class="col-md-1"><a href="{{ URL::to('admin/contesta/delete',[$value->id]) }}" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash-o"></i></a>
                                      </span>
                                    @endif
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
  {{HTML::script('admin/js/jquery.pulsate.min.js')}}
  {{HTML::script('admin/assets/fancybox/source/jquery.fancybox.js')}}
  {{HTML::script('admin/js/pulstate.js')}}
  <!--script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#atlit').dataTable();
    } );
  </script-->
  <script type="text/javascript">
      /* Formating function for row details */
      function fnFormatDetails ( oTable, nTr )
      {
          var aData = oTable.fnGetData( nTr );
          var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
          sOut += '<tr><td>Tempat Lahir:</td><td>'+aData[6]+'</td></tr>';
          sOut += '<tr><td>Tanggal Lahir:</td><td>'+aData[7]+'</td></tr>';
          sOut += '<tr><td>Rapor:</td><td>'+aData[8]+'</td></tr>';
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
      $(document).ready(function() { $("#nocontest").select2({width: '200px'}); });
  </script>
@stop