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
    <div class="col-lg-3">
      <section class="panel panel-danger">
        <header class="panel-heading" style="font-weight:bold">
            Pertemuan Teknik
        </header>
        <table class="table">
        <tr>
              <td>Hari</td>
              <td>:</td>
              <td>{{$announcement->tmday}}, {{date("d M Y", strtotime($announcement->tmdate))}}</td>
        </tr>
        <tr>
              <td>Pukul</td>
              <td>:</td>
              <td>{{$announcement->tmtime}}</td>
        </tr>
        <tr>
              <td>Tempat</td>
              <td>:</td>
              <td>{{$announcement->tmplace}}</td>
        </tr>
        </table>
      </section>
      <section class="panel panel-success">
        <header class="panel-heading" style="font-weight:bold">
            Pelaksanaan Lomba
        </header>
        <table class="table">
        <tr>
              <td>Hari</td>
              <td>:</td>
              <td>{{$announcement->contestday}}, {{date("d M Y", strtotime($announcement->contestdate))}}</td>
        </tr>
        <tr>
              <td>Pukul</td>
              <td>:</td>
              <td>{{$announcement->contesttime}}</td>
        </tr>
        <tr>
              <td>Tempat</td>
              <td>:</td>
              <td>{{$announcement->contestplace}}</td>
        </tr>
        </table>
      </section>
    </div>

    <div class="col-lg-9">
        <section class="panel">
            <div class="panel-body">
                {{ Form::open(array('url' => route('user.officer.indexthn'), 'method' => 'get','class'=>'form-inline')) }}
                    <div class="form-group">
                        {{ Form::label('tahun', 'Tahun', array('class' => 'control-label')) }}
                        {{ Form::selectyear('tahun', 2015, 2020, $thn, array(
                        'id'=>'tahun',
                        'placeholder' => "Tahun",
                        'class' => 'form-control input-sm',
                        "onChange"=>"this.form.submit();")) }}
                    </div>
                    {{-- {{Form::submit('Cari', array('class'=>'btn btn-success'))}} --}}
                {{ Form::close() }}
            </div>
        </section>

    </div>
  <!-- page end-->
  <div class="col-lg-9">
      <section class="panel panel-warning">
          <header class="panel-heading" style="font-weight:bold">
              Daftar Petugas
              {{ HTML::buttonAdd() }}
          </header>
          <table class="table table-striped table-advance table-hover">
              <thead>
              <tr>
                  <th><i class="fa fa-bullhorn"></i> Nama</th>
                  <th><i class="fa fa-question-circle"></i> No Telepon</th>
                  <th><i class="fa fa-question-circle"></i> No Handphone</th>
                  <th><i class="fa fa-bookmark"></i> Petugas</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              @foreach($officers as $value)
              <tr>
                  <td class="hidden-phone">{{ $value->name }}</td>
                  <td>{{ $value->notlp }}</td>
                  <td>{{ $value->nohp }}</td>
                  <td>{{ $value->type }}</td>
                  <td>
                      <a href="{{ route('user.officers.edit', ['officers'=>Crypt::encrypt($value->id)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(array('url'=>route('user.officers.destroy',['officers'=>$value->id]),'method'=>'delete', 'style'=>'display:inline;')) }}
                      {{ Form::button('<i class="fa fa-trash-o "></i>', array('type'=>'submit','class'=>'btn btn-danger btn-xs')) }}
                      {{ Form::close() }}
                  </td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </section>
  </div>
</div>
<!-- page end-->
@stop

@section('script')
    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#tahun").select2(); });
    </script>
@stop
