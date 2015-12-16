@extends('layouts.masteruser')

@section('title')
	{{ $title }}
@stop

@section('asset')
    {{HTML::style("select2/select2-bootstrap.css")}}
    {{HTML::style("admin/assets/bootstrap-datepicker/css/datepicker.css")}}
    {{HTML::style("admin/assets/bootstrap-timepicker/compiled/timepicker.css")}}
    {{HTML::style("admin/assets/bootstrap-datetimepicker/css/datetimepicker.css")}}
    <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
@stop

@section('content')
	{{ Form::open(array('url' => route('user.payment.store'), 'method' => 'post', 'id' => 'payment', 'class'=>'cmxform form-horizontal tasi-form', 'files' => 'true')) }}
		<div class="row">
            <div class="col-lg-12">
                <section class="panel panel-danger">
                  <header class="panel-heading" style="font-weight:bold">
                      Cek kembali konfirmasi pembayaran!!! Pembayaran yang sudah dikonfirmasi tidak bisa di ubah.
                  </header>
                </section>
            </div>
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Konfirmasi Pembayaran
                    </header>
                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('method', 'Metode Pembayaran', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::select('method', array(''=>'','Setoran Tunai ke Rek BTN' => 'Setoran Tunai Ke Rek BTN', 'Transfer Antar Rekening BTN' => 'Transfer antar Rekening BTN', 'Transfer antar Bank ke Rek BTN' => 'Transfer antar Bank ke Rek BTN'), null, array('class'=>'form-control input-sm')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('paymentdate', 'Tanggal Pembayaran', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::text('paymentdate', null, array('class' => 'form-control form-control-inline input-medium default-date-inseo', 'readonly')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('amount', 'Jumlah uang', array('class' => 'control-label col-lg-2')) }}
                            <div class="col-lg-10">
                                {{ Form::text('amount', null, array('class' => 'form-control','placeholder'=>'masukkan jumlah uang')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('message', 'Pilihan Petugas', array('class' => 'control-label col-lg-2') ) }}
                            <div class="col-lg-10">
                                {{ Form::text('message', null, array('class' => 'form-control','placeholder'=>'masukkan pesan')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('attachment', 'Upload File', array('class' => 'control-label col-lg-2') ) }}
                            <div class="col-lg-10">
                                {{ Form::file('attachment') }}
                                <p class="help-block">Upload foto/scan bukti pembayaran.</p>
                                <span class="label label-danger">NOTE!</span>
                                <span>
                                Ukuran file maksimal 5  12 Kb
                                </span>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="box-footer">
                                {{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}
                                <a href="{{ URL::to('admin/admins') }}" class="btn btn-default" type="button">Batal</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
	{{ Form::close() }}
@stop

@section('script')
    {{HTML::script('admin/js/jquery.js')}}
    {{HTML::script('admin/js/jquery.validate.min.js')}}
    <!--script for this page-->
    {{HTML::script('admin/js/form-validation-script.js')}}
    {{HTML::script('admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{HTML::script('admin/assets/bootstrap-timepicker/js/bootstrap-timepicker.js')}}
    {{HTML::script('admin/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}

    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#type").select2(); });
        $(document).ready(function() { $("#method").select2(); });
    </script>
    {{-- {{HTML::script('admin/js/common-scripts.js')}} --}}
    {{HTML::script('admin/js/advanced-form-components.js')}}
@stop
