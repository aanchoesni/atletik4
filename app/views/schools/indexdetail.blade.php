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
          <div class="panel-body" id="pulsate-regular">
              {{ Form::open(array('url' => route('admin.schools.indexdetail',[Crypt::encrypt(Session::get('nocontest'))]), 'method' => 'get','class'=>'form-inline')) }}
                  <div class="form-group">
                      {{-- {{ Form::label('jenjang', 'Jenjang', array('class' => 'control-label')) }} --}}
                      {{ Form::select('nocontest', array(''=>'')+Menu::where('tipe',$jenjang)->lists('menu','menu'), $vcontests, array(
                        'id'=>'nocontest',
                        'placeholder' => "Pilih nomor lomba",
                        'class'=>'form-control input-sm',
                        "onChange"=>"this.form.submit();")) }}
                  </div>
                  {{-- {{Form::submit('Cari', array('class'=>'btn btn-success'))}} --}}
              {{ Form::close() }}
          </div>
      </section>
    </div>
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Daftar Atlit dari <strong> {{$school->name}} </strong>
                <span class="pull-right">
                  <a href="{{ URL::to('admin/schools') }}"><i class="fa fa-times "></i></a>
                </span>
            </header>
            <div class="panel-body" style="overflow: scroll;">
                  <div class="adv-table">
                      <table  class="display table table-bordered table-striped" id="atlit">
                        <thead>
                          <tr>
                              <th style="text-align:center;">No</th>
                              <th style="text-align:center;">Foto</th>
                              <th style="text-align:center;">Nama</th>
                              <th style="text-align:center;">NIS</th>
                              <th style="text-align:center;">Tempat Lahir</th>
                              <th style="text-align:center;">Tanggal Lahir</th>
                              <th style="text-align:center;">Rapor</th>
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
                                <td>{{{ $value->name }}}</td>
                                <td>{{{ $value->nis }}}</td>
                                <td>{{{ $value->tmptlhr }}}</td>
                                <td>{{{ $value->tgllhr }}}</td>
                                <td>
                                  <a id="rapor" href="../../../uploads/rapor/{{ $value->rapor }}">Lihat Rapor</a>
                                </td>
                                <td>{{{ $value->nocontest }}}</td>
                                <td>{{$value->nodada}}</td>
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

                                      <span style="display:inline;" class="col-md-1"><a href="{{ URL::to('admin/contest/delete',[$value->id]) }}" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash-o"></i></a>
                                      <a href=""></a></span>
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
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#atlit').dataTable();
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
      $(document).ready(function() { $("#nocontest").select2(); });
  </script>
@stop