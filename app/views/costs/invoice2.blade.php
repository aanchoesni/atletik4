<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Invoice | Atletik Unesa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{HTML::style("invoice/invoice.css")}}
  </head>
  <body class="financial_document" cz-shortcut-listen="true" style="">
    <div class="invoice">
  <div class="invoice__header">
  {{-- <div class="invoice__envato-logo">
    <img alt="Envato_market" class="envato-logo--screen" src="./Envato Market Invoice_files/envato_market-dee06317dbf75d406e29e1cd82fab4dd.svg">
    <img alt="Envato_market_black" class="envato-logo--print" src="./Envato Market Invoice_files/envato_market_black-6adc182b529d58ce51a74c61e0aebc50.svg">
  </div> --}}
  <div class="invoice__envato-logo">
    Altetik UNESA
  </div>

  <div class="invoice__document-title">
    Invoice
  </div>
  </div>

  <div class="invoice__details">
  <table class="h-pull-right">
    <tbody>
      <tr class="invoice__date">
        <td class="invoice__details-label">Tanggal</td>
        <td>:</td>
        <td>{{date('d M Y', strtotime($payment->paymentdate))}}</td>
      </tr>
      <tr class="invoice__number">
        <td class="invoice__details-label">Invoice No</td>
        <td>:</td>
        <td>{{$payment->noinvoice}}</td>
      </tr>
    </tbody>
  </table>
  </div>

<div class="invoice__details">
  <div class="invoice__column -span-50">
    <div class="invoice__buyer">
      <strong>Sekolah:</strong><br>
      {{$school->name}}
      <br>
     {{$school->adstreet . ', ' . $school->advillage}} <br> {{$school->addistricts . ', ' . $school->adcity}} <br> {{$school->adphone}} <br>
    </div>
  </div>

  <div class="invoice__column -span-50 -last">
    <div class="invoice__seller">
      <strong>Penyelenggara:</strong><br>
        <a href="{{ URL::to('/') }}">Atletik Unesa</a>
      <br>
      Kampus Lidah Wetan <br> Gedung U2 Lt.1 FIK <br> Universitas Negeri Surabaya
    </div>
  </div>
</div>

  <div class="invoice__lines">
    <div class="invoice__item-container">
      <table>
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
                {{-- <tr>
                    <td>9</td>
                    <td>Sertifikat Atlit</td>
                    <td class="">Rp {{number_format($cost->moneysertoff, 0)}}</td>
                    <td class="">0</td>
                    <td align="right">Rp {{number_format(0, 0)}}</td>
                </tr> --}}
                <tr>
                    <td>9</td>
                    <td>Sertifikat Pendamping</td>
                    <td class="">Rp {{number_format($cost->moneysertoff, 0)}}</td>
                    <td class="">0</td>
                    <td align="right">Rp {{number_format(0, 0)}}</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Buku Hasil</td>
                    <td class="">Rp {{number_format($cost->moneydocbook, 0)}}</td>
                    <td class="">0</td>
                    <td align="right">Rp {{number_format(0, 0)}}</td>
                </tr>
                </tbody>
            </table>
      <div class="invoice__total">
        Invoice Total: Rp {{number_format($jtotal, 0)}}
      </div>
      <div class="invoice__payment-method">
        Pembayaran via {{$payment->method}}
      </div>
    </div>
  </div>

  <div class="invoice__footnotes">
    <div class="invoice__notice -margin-bottom">
      Terima kasih atas partisipasi dalam kejuaraan Atletik UNESA
    </div>

  <div class="invoice__notice">
    Panitia Atletik UNESA.
  </div>
</div>
</div>
</body></html>
