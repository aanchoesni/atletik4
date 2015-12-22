<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="inseo">
    <meta name="keyword" content="Atletik, Unesa">
    <link rel="shortcut icon" href="img/fav.png">

    <title>Invoice | Atletik Unesa</title>

    <!-- Bootstrap core CSS -->
    {{HTML::style("admin/css/bootstrap.min.css")}}
    {{HTML::style("admin/css/bootstrap-reset.css")}}
    <!--external css-->
    {{HTML::style("admin/assets/font-awesome/css/font-awesome.css")}}
    <!--<link href="css/navbar-fixed-top.css" rel="stylesheet">-->

      <!-- Custom styles for this template -->
    {{HTML::style("admin/css/style.css")}}
    {{HTML::style("admin/css/style-responsive.css")}}
    {{HTML::style("select2/select2-bootstrap.css")}}
    <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
  </head>
  <body class="full-width">
<!-- invoice start-->
<section>
    <div class="panel panel-primary">
        <!--<div class="panel-heading navyblue"> INVOICE</div>-->
        <div class="panel-body">
            {{-- <div class="text-center invoice-btn">
                <a href="{{ URL::to('user/invoice') }}" class="btn btn-info btn-lg"><i class="fa fa-print"></i> Download </a>
            </div> --}}
            <div class="row invoice-list">
                {{-- <div class="text-center corporate-id">
                    <img src="img/vector-lab.jpg" alt="">
                </div> --}}
                <center><h3>INVOICE ALTLETIK UNESA</h3></center>
                <div class="col-lg-4 col-sm-4">
                    <h4>SEKOLAH</h4>
                    <p>
                        {{$school->name}} <br>
                        {{$school->adstreet . ', ' . $school->advillage}} <br>
                        {{$school->addistricts . ', ' . $school->adcity}}<br>
                        Tlp: {{$school->adphone}} <br>
                        Tahun: {{date('Y')}}
                    </p>
                </div>
                <br>
                <div class="col-lg-4 col-sm-4">
                    <h4>INVOICE INFO</h4>
                        @if($payment)
                        Tanggal Pembayaran      : {{date('d-m-Y', strtotime($payment->paymentdate))}}<br>
                        @else
                        _____________________<br>
                        @endif
                        @if($payment)
                        Status Invoice    : <span style="color:ForestGreen; font-weight: bold;">Sudah Dibayar</span><br>
                        @else
                        Status Invoice    : <span style="color:red; font-weight: bold;">Belum Dibayar</span><br>
                        @endif
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
    {{HTML::script('admin/js/jquery.js')}}
    {{HTML::script('admin/js/bootstrap.min.js')}}
    {{HTML::script('admin/js/jquery.dcjqaccordion.2.7.js')}}
    {{HTML::script('admin/js/hover-dropdown.js')}}
    {{HTML::script('admin/js/jquery.scrollTo.min.js')}}
    {{HTML::script('admin/js/jquery.nicescroll.js')}}
    {{HTML::script('admin/js/respond.min.js')}}

    <!--common script for all pages-->
    {{HTML::script('admin/js/common-scripts.js')}}
    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#tahun").select2(); });
    </script>
</body>
