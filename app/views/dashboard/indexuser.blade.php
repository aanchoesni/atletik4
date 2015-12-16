@extends('layouts.masteruser')

@section('title')
  {{ $title }}
@stop

@section('content')
{{-- <div class="row">
    <div class="col-lg-12">
      <div style="font-family:'Lato'; text-align:center; font-size:65px;">Dashboard SIM Atletik</div><br>
    </div>
</div> --}}
<!-- page start-->
@if(Sentry::getUser()->last_name=='SMA')
<!--state overview start-->
<div class="row state-overview">
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
      	  @if($runpas)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$runpas}}
              </h1>
              <p>Lari 100m pa</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($runpis)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$runpis}}
              </h1>
              <p>Lari 100m pi</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($ljpas)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$ljpas}}
              </h1>
              <p>Lompat Jauh pa</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($ljpis)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$ljpis}}
              </h1>
              <p>Lompat Jauh pi</p>
          </div>
      </section>
  </div>
</div>
<div class="row state-overview">
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
           @if($tppas)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$tppas}}
              </h1>
              <p>Tolak Peluru pa</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
           @if($tppis)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$tppis}}
              </h1>
              <p>Tolak Peluru pi</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($ltpas)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$ltpas}}
              </h1>
              <p>Lompat Tinggi pa</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($ltpis)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$ltpis}}
              </h1>
              <p>Lompat Tinggi pi</p>
          </div>
      </section>
  </div>
</div>

<div class="border-head">
    <h3>Jumlah Atlit</h3>
</div>
<div class="row state-overview">
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
        <div class="symbol terques">
            <i class="fa fa-users"></i>
        </div>
        <div class="value">
            <h1>
                {{$juma}}
            </h1>
            <p>Jumlah Atlit</p>
        </div>
      </section>
  </div>

  <div class="col-lg-3 col-sm-6">
      <section class="panel">
        <div class="symbol blue">
            <i class="fa fa-male"></i>
        </div>
        <div class="value">
            <h1>
                {{$jumpa}}
            </h1>
            <p>Jumlah Atlit PA</p>
        </div>
      </section>
  </div>

  <div class="col-lg-3 col-sm-6">
      <section class="panel">
        <div class="symbol yellow">
            <i class="fa fa-female"></i>
        </div>
        <div class="value">
            <h1>
                {{$jumpi}}
            </h1>
            <p>Jumlah Atlit PA</p>
        </div>
      </section>
  </div>
</div>
@endif

@if(Sentry::getUser()->last_name=='SMP')
<!--state overview start-->
<div class="row state-overview">
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($runpas)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$runpas}}
              </h1>
              <p>Lari 60m pa</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($runpis)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$runpis}}
              </h1>
              <p>Lari 60m pi</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($ljpas)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$ljpas}}
              </h1>
              <p>Lompat Jauh pa</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($ljpis)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$ljpis}}
              </h1>
              <p>Lompat Jauh pi</p>
          </div>
      </section>
  </div>
</div>
<div class="row state-overview">
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($tppas)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$tppas}}
              </h1>
              <p>Tolak Peluru pa</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($tppis)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$tppis}}
              </h1>
              <p>Tolak Peluru pi</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($ltpas)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$ltpas}}
              </h1>
              <p>Lompat Tinggi pa</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($ltpis)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$ltpis}}
              </h1>
              <p>Lompat Tinggi pi</p>
          </div>
      </section>
  </div>
</div>

<div class="border-head">
    <h3>Jumlah Atlit</h3>
</div>
<div class="row state-overview">
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
        <div class="symbol terques">
            <i class="fa fa-users"></i>
        </div>
        <div class="value">
            <h1>
                {{$juma}}
            </h1>
            <p>Jumlah Atlit</p>
        </div>
      </section>
  </div>

  <div class="col-lg-3 col-sm-6">
      <section class="panel">
        <div class="symbol blue">
            <i class="fa fa-male"></i>
        </div>
        <div class="value">
            <h1>
                {{$jumpa}}
            </h1>
            <p>Jumlah Atlit PA</p>
        </div>
      </section>
  </div>

  <div class="col-lg-3 col-sm-6">
      <section class="panel">
        <div class="symbol yellow">
            <i class="fa fa-female"></i>
        </div>
        <div class="value">
            <h1>
                {{$jumpi}}
            </h1>
            <p>Jumlah Atlit PA</p>
        </div>
      </section>
  </div>
</div>
@endif

@if(Sentry::getUser()->last_name=='SD')
<!--state overview start-->
<div class="border-head">
    <h3>Jumlah Atlit masing-masing nomor lomba</h3>
</div>
<div class="row state-overview">
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($runpas)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$runpas}}
              </h1>
              <p>Lari 50m pa</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($runpis)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$runpis}}
              </h1>
              <p>Lari 50m pi</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($ljpas)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$ljpas}}
              </h1>
              <p>Lompat Jauh pa</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($ljpis)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$ljpis}}
              </h1>
              <p>Lompat Jauh pi</p>
          </div>
      </section>
  </div>
</div>
<div class="row state-overview">
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($lbpas)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$lbpas}}
              </h1>
              <p>Tolak Peluru pa</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($lbpis)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$lbpis}}
              </h1>
              <p>Tolak Peluru pi</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($lespa)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$lespa}}
              </h1>
              <p>Lari Estafet pa</p>
          </div>
      </section>
  </div>
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
          @if($lespi)
          <div class="symbol terques">
              <i class="fa fa-check"></i>
          </div>
          @else
          <div class="symbol red">
              <i class="fa fa-times"></i>
          </div>
          @endif
          <div class="value">
              <h1>
                  {{$lespi}}
              </h1>
              <p>Lari Estafet pi</p>
          </div>
      </section>
  </div>
</div>

<div class="border-head">
    <h3>Jumlah Atlit</h3>
</div>
<div class="row state-overview">
  <div class="col-lg-3 col-sm-6">
      <section class="panel">
        <div class="symbol terques">
            <i class="fa fa-users"></i>
        </div>
        <div class="value">
            <h1>
                {{$juma}}
            </h1>
            <p>Jumlah Atlit</p>
        </div>
      </section>
  </div>

  <div class="col-lg-3 col-sm-6">
      <section class="panel">
        <div class="symbol blue">
            <i class="fa fa-male"></i>
        </div>
        <div class="value">
            <input type="hidden" name="jumpa" value="{{$jumpa}}">
            <h1 class="count2">
                0
            </h1>
            <p>Jumlah Atlit PA</p>
        </div>
      </section>
  </div>

  <div class="col-lg-3 col-sm-6">
      <section class="panel">
        <div class="symbol yellow">
            <i class="fa fa-female"></i>
        </div>
        <div class="value">
            <input type="hidden" name="jumpi" value="{{$jumpi}}">
            <h1 class="count">
                0
            </h1>
            <p>Jumlah Atlit PI</p>
        </div>
      </section>
  </div>
</div>
@endif
<!--state overview end-->
<!-- page end-->
@stop

@section('script')
	{{HTML::script('admin/js/count.js')}}
@stop
