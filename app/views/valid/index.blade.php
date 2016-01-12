@extends('layouts.master')

@section('title')
  {{ $title }}
@stop

@section('asset')
  {{HTML::style("admin/assets/advanced-datatable/media/css/demo_page.css")}}
  {{HTML::style("admin/assets/advanced-datatable/media/css/demo_table.css")}}
  {{HTML::style("admin/assets/data-tables/DT_bootstrap.css")}}
  {{HTML::style("admin/assets/fancybox/source/jquery.fancybox.css")}}
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
                              <th style="text-align:center;">No Invoice</th>
                              <th style="text-align:center;">Jumlah Bayar</th>
                              <th style="text-align:center;">Validasi</th>
                              <th style="text-align:center;">Aksi</th>
                              <th style="display:none;">Metode</th>
                              <th style="display:none;">Tanggal Pembayaran</th>
                              <th style="display:none;">Pesan</th>
                              <th style="display:none;">Bukti</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $no = 1;?>
                          @foreach($payments as $value)
                            <tr>
                                <td style="text-align:center;"><?php echo $no ?></td>
                                <td>{{{ $value->school }}}</td>
                                <td style="text-align:center;">{{{ $value->noinvoice }}}</td>
                                <td style="text-align:right;">Rp {{number_format($value->amount, 0)}}</td>
                                <td style="text-align:center;">@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                                @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                                <td style="text-align:center;">
                                  <div class="btn-group">
                                    <span style="display:inline;">
                                    @if($value->verifikasi==1)
                                    <a href="{{URL::to('admin/notvalidasi/' . $value->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-thumbs-down"></i></a>
                                    </span>@endif
                                    @if($value->verifikasi==0)
                                    <a href="{{URL::to('admin/validasi/' . $value->id) }}" class="btn btn-success btn-xs"><i class="fa fa-thumbs-up"></i></a>
                                    </span>@endif
                                  </div>
                                </td>
                                <td style="display:none;">{{{ $value->method }}}</td>
                                <td style="display:none;">{{{ $value->paymentdate }}}</td>
                                <td style="display:none;">{{{ $value->message }}}</td>
                                <td style="display:none;">
                                <a id="pay" href="../uploads/payments/{{ $value->attachment }}">Lihat Bukti Pembayaran
                                </a>
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
  {{HTML::script('admin/assets/fancybox/source/jquery.fancybox.js')}}
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
          sOut += '<tr><td>Metode Pembayaran:</td><td>'+aData[7]+'</td></tr>';
          sOut += '<tr><td>Tanggal Pembayaran:</td><td>'+aData[8]+'</td></tr>';
          sOut += '<tr><td>Pesan:</td><td>'+aData[9]+'</td></tr>';
          sOut += '<tr><td>Bukti Pembayaran:</td><td>'+aData[10]+'</td></tr>';
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
          $("#pay").fancybox({
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
@stop