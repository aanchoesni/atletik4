@extends('layouts.masteruser')

@section('title')
	{{ $title }}
@stop

@section('asset')
{{HTML::style("select2/select2-bootstrap.css")}}
<link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
                {{ Form::open(array('url' => route('user.contest.indexthn'), 'method' => 'get','class'=>'form-inline')) }}
                    <div class="form-group">
                        {{ Form::label('tahun', 'Tahun', array('class' => 'control-label')) }}
                        {{ Form::selectyear('tahun', 2015, 2020, $thn, array(
                        'id'=>'tahun',
                        'placeholder' => "Tahun",
                        'class' => 'form-control input-sm',
                        "onChange"=>"this.form.submit();")) }}
                    </div>
                    {{-- {{Form::submit('Cari', array('class'=>'btn btn-success'))}} --}}
                </form>

            </div>
        </section>

    </div>
</div>
<!-- page end-->
{{ Form::close() }}
@if(Sentry::getUser()->last_name=='SMA')
<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-warning">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lomba Lari 100m pa
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($runpas as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-warning">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lomba Lari 100m pi
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($runpis as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-danger">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lompot Jauh pa
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($ljpas as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-danger">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lompot Jauh pi
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($ljpis as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-success">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Tolak Peluru pa
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($tppas as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-success">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Tolak Peluru pi
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($tppis as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-info">
          <header class="panel-heading" style="font-weight:bold">
              <div>Daftar Lompat Tinggi pa</div>
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($ltpas as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->
<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-info">
          <header class="panel-heading" style="font-weight:bold">
              <div>Daftar Lompat Tinggi pi</div>
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($ltpis as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->
@endif

@if(Sentry::getUser()->last_name=='SMP')
<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-warning">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lomba Lari 100m pa
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($runpas as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-warning">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lomba Lari 100m pi
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($runpis as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-danger">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lompot Jauh pa
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($ljpas as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-danger">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lompot Jauh pi
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($ljpis as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-success">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Tolak Peluru pa
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($tppas as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-success">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Tolak Peluru pi
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($tppis as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-info">
          <header class="panel-heading" style="font-weight:bold">
              <div style="style=font-weight: bold">Daftar Lompat Tinggi pa</div>
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($ltpas as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->
<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-info">
          <header class="panel-heading" style="font-weight:bold">
              <div style="style=font-weight: bold">Daftar Lompat Tinggi pi</div>
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($ltpis as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->
@endif
@if(Sentry::getUser()->last_name=='SD')
<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-warning">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lomba Lari 50m pa
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($runpas as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-warning">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lomba Lari 50m pi
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($runpis as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-danger">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lompot Jauh pa
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($ljpas as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-danger">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lompot Jauh pi
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($ljpis as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-success">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lempar Bola pa
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($lbpas as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-success">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Lempar Bola pi
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($lbpis as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-info">
          <header class="panel-heading" style="font-weight:bold">
              <div style="style=font-weight: bold">Daftar Lari Estafet pa</div>
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
              	  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($lespa as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->

<div class="row">
  <div class="col-lg-12">
      <section class="panel panel-info">
          <header class="panel-heading" style="font-weight:bold">
              <div style="style=font-weight: bold">Daftar Lari Estafet pi</div>
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th style="width: 100px"><i class="fa fa-bullhorn"></i> No Dada</th>
                  <th><i class="fa fa-bullhorn"></i> Foto</th>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> NIS</th>
                  <th><i class="fa fa-bookmark"></i> Kota Lahir</th>
                  <th><i class=" fa fa-bookmark"></i> Tanggal Lahir</th>
                  <th><i class=" fa fa-edit"></i> Verifikasi</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($lespi as $value)
              <tr>
                  <td style="text-align: center">{{ $value->nodada }}</td>
                  <td height="75" width="50">{{ HTML::image('uploads/foto/' . $value->foto,'alt', array( 'width' => 50, 'height' => 75 ) ) }}</td>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->nis }}</td>
                  <td>{{ $value->tmptlhr }}</td>
                  <td>{{ $value->tgllhr }}</td>
                  <td>@if($value->verifikasi==1)<span class="label label-success label-mini"><i class="fa fa-check"></i></span>@endif
                  @if($value->verifikasi==0)<span class="label label-danger label-mini"><i class="fa fa-times"></i></span>@endif</td>
                  <td>
                      @if($value->verifikasi==0)
                      <a href="{{ route('user.contests.edit', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.contests.destroy',['contests'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs', 'title'=>'Hapus')) }}
                      {{ Form::close() }}
                      @endif
                      @if($value->verifikasi==1)
                      <a href="#myStatus" class="btn btn-default btn-xs" data-toggle="modal", title='Tidak bisa diubah'><i class="fa fa-pencil"></i></a>
                      <a href="#myStatusDel" class="btn btn-default btn-xs" data-toggle="modal", title="Tidak bisa dihapus"><i class="fa fa-trash-o"></i></a>
                      @endif
                      @if($spay && $value->nodada)
                      <a href="{{ route('user.contests.show', ['contests'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs" title="Print"><i class="fa fa-print"></i></a>
                      @endif
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->
@endif
<!-- Modal -->
<div class="modal fade" id="myStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Peringatan</h4>
            </div>
            <div class="modal-body">

                Data Atlit yang sudah diverifikasi, tidak dapat diubah.

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-danger" type="button"> Ok</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myStatusDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Peringatan</h4>
            </div>
            <div class="modal-body">

                Data Atlit yang sudah diverifikasi, tidak dapat dihapus.

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-danger" type="button"> Ok</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
@stop

@section('script')
    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#tahun").select2(); });
    </script>
@stop
