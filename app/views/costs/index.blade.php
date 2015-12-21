@extends('layouts.masteruser')

@section('title')
	{{ $title }}
@stop

@section('asset')
{{HTML::style("select2/select2-bootstrap.css")}}
<link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
@stop

@section('content')
<!-- invoice start-->
<section>
    <div class="panel panel-primary">
        <!--<div class="panel-heading navyblue"> INVOICE</div>-->
        <div class="panel-body">
            <div class="text-center invoice-btn">
                @if(!$payment)
                    @if($jtotal>0)
                    <a href="{{ Route('user.payment.create') }}" class="btn btn-danger btn-lg"><i class="fa fa-check"></i> Konfirmasi Pembayaran </a>
                    @else
                    <a class="btn btn-danger btn-lg"><i class="fa fa-check"></i> Tidak Ada Pembayaran </a>
                    @endif
                @endif
                @if($payment)
                <a class="btn btn-info btn-lg"><i class="fa fa-print"></i> Download </a>
                @endif
            </div>
            <div class="row invoice-list">
                {{-- <div class="text-center corporate-id">
                    <img src="img/vector-lab.jpg" alt="">
                </div> --}}
                <div class="col-lg-4 col-sm-4">
                    <h4>ALAMAT SEKOLAH</h4>
                    <p>
                        {{$school->name}} <br>
                        {{$school->adstreet . ', ' . $school->advillage}} <br>
                        {{$school->addistricts . ', ' . $school->adcity}}<br>
                        Tlp: {{$school->adphone}} <br>
                    </p>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <h4>INVOICE INFO</h4>
                    <ul class="unstyled">
                        {{-- <li>Due Date      : {{date('Y-m-d', strtotime("+7 day"))}}</li> --}}
                        <li>_____________________</li>
                        <li>Tahun: {{date('Y')}}</li>
                        <li>Batas Pembayaran      : {{$cost->enddaypay}}</li>
                        @if($payment)
                        <li>Status Invoice    : <span style="color:ForestGreen; font-weight: bold;">Sudah Dibayar</span></li>
                        @else
                        <li>Status Invoice    : <span style="color:red; font-weight: bold;">Belum Dibayar</span></li>
                        @endif
                    </ul>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nomor Lomba</th>
                    <th class="">Biaya per lomba</th>
                    <th class="">Jumlah Atlit</th>
                    <th align="right">Total</th>
                </tr>
                </thead>
                <tbody>
                @if(Sentry::getUser()->last_name=='SMA')
                <tr>
                    <td>1</td>
                    <td>Lari 100m pa</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$runpas}}</td>
                    <td align="right">Rp {{number_format($jrunpas, 0)}}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Lari 100m pi</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$runpis}}</td>
                    <td align="right">Rp {{number_format($jrunpis, 0)}}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Lompat Jauh pa</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$ljpas}}</td>
                    <td align="right">Rp {{number_format($jljpas, 0)}}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Lompat Jauh pi</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$ljpis}}</td>
                    <td align="right">Rp {{number_format($jljpis, 0)}}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Tolak Peluru pa</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$tppas}}</td>
                    <td align="right">Rp {{number_format($jtppas, 0)}}</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Tolak Peluru pi</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$tppis}}</td>
                    <td align="right">Rp {{number_format($jtppis, 0)}}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Lompat Tinggi pa</td>
                    <td class="">Rp {{number_format($cost->moneyregest, 0)}}</td>
                    <td class="">{{$ltpas}}</td>
                    <td align="right">Rp {{number_format($jltpas, 0)}}</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Lompat Tinggi pi</td>
                    <td class="">Rp {{number_format($cost->moneyregest, 0)}}</td>
                    <td class="">{{$ltpis}}</td>
                    <td align="right">Rp {{number_format($jltpis, 0)}}</td>
                </tr>
                @endif
                @if(Sentry::getUser()->last_name=='SMP')
                <tr>
                    <td>1</td>
                    <td>Lari 50m pa</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$runpas}}</td>
                    <td align="right">Rp {{number_format($jrunpas, 0)}}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Lari 50m pi</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$runpis}}</td>
                    <td align="right">Rp {{number_format($jrunpis, 0)}}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Lompat Jauh pa</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$ljpas}}</td>
                    <td align="right">Rp {{number_format($jljpas, 0)}}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Lompat Jauh pi</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$ljpis}}</td>
                    <td align="right">Rp {{number_format($jljpis, 0)}}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Tolak Peluru pa</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$tppas}}</td>
                    <td align="right">Rp {{number_format($jtppas, 0)}}</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Tolak Peluru pi</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$tppis}}</td>
                    <td align="right">Rp {{number_format($jtppis, 0)}}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Lompat Tinggi pa</td>
                    <td class="">Rp {{number_format($cost->moneyregest, 0)}}</td>
                    <td class="">{{$ltpas}}</td>
                    <td align="right">Rp {{number_format($jltpas, 0)}}</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Lompat Tinggi pi</td>
                    <td class="">Rp {{number_format($cost->moneyregest, 0)}}</td>
                    <td class="">{{$ltpis}}</td>
                    <td align="right">Rp {{number_format($jltpis, 0)}}</td>
                </tr>
                @endif
                @if(Sentry::getUser()->last_name=='SD')
                <tr>
                    <td>1</td>
                    <td>Lari 50m pa</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$runpas}}</td>
                    <td align="right">Rp {{number_format($jrunpas, 0)}}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Lari 50m pi</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$runpis}}</td>
                    <td align="right">Rp {{number_format($jrunpis, 0)}}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Lompat Jauh pa</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$ljpas}}</td>
                    <td align="right">Rp {{number_format($jljpas, 0)}}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Lompat Jauh pi</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$ljpis}}</td>
                    <td align="right">Rp {{number_format($jljpis, 0)}}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Lempar Bola pa</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$lbpas}}</td>
                    <td align="right">Rp {{number_format($jlbpas, 0)}}</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Lempar Bola pi</td>
                    <td class="">Rp {{number_format($cost->moneyreg, 0)}}</td>
                    <td class="">{{$lbpis}}</td>
                    <td align="right">Rp {{number_format($jlbpis, 0)}}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Lari Estafet pa</td>
                    <td class="">Rp {{number_format($cost->moneyregest, 0)}}</td>
                    <td class="">{{$lespa}}</td>
                    <td align="right">Rp {{number_format($jlespa, 0)}}</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Lari Estafet pi</td>
                    <td class="">Rp {{number_format($cost->moneyregest, 0)}}</td>
                    <td class="">{{$lespi}}</td>
                    <td align="right">Rp {{number_format($jlespi, 0)}}</td>
                </tr>
                @endif
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-4 invoice-block pull-right">
                    <ul class="unstyled amounts">
                        <li><strong>Grand Total :</strong> Rp {{number_format($jtotal, 0)}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- invoice end-->
@stop

@section('script')
    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#tahun").select2(); });
    </script>
@stop
