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
            <input type="hidden" name="smarunpas" value="{{$runpas}}">
            <h1 class="smarunpas">
                0
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
            <input type="hidden" name="smarunpis" value="{{$runpis}}">
            <h1 class="smarunpis">
                0
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
            <input type="hidden" name="smaljpas" value="{{$ljpas}}">
            <h1 class="smaljpas">
                0
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
            <input type="hidden" name="smaljpis" value="{{$ljpis}}">
            <h1 class="smaljpis">
                0
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
            <input type="hidden" name="smatppas" value="{{$tppas}}">
            <h1 class="smatppas">
                0
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
            <input type="hidden" name="smatppis" value="{{$tppis}}">
            <h1 class="smatppis">
                0
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
            <input type="hidden" name="smaltpas" value="{{$ltpas}}">
            <h1 class="smaltpas">
                0
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
            <input type="hidden" name="smaltpis" value="{{$ltpis}}">
            <h1 class="smaltpis">
                0
            </h1>
            <p>Lompat Tinggi pi</p>
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
            <input type="hidden" name="smprunpas" value="{{$runpas}}">
            <h1 class="smprunpas">
                0
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
            <input type="hidden" name="smprunpis" value="{{$runpis}}">
            <h1 class="smprunpis">
                0
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
            <input type="hidden" name="smpljpas" value="{{$ljpas}}">
            <h1 class="smpljpas">
                0
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
            <input type="hidden" name="smpljpis" value="{{$ljpis}}">
            <h1 class="smpljpis">
                0
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
              <input type="hidden" name="smptppas" value="{{$tppas}}">
              <h1 class="smptppas">
                  0
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
            <input type="hidden" name="smptppis" value="{{$tppis}}">
            <h1 class="smptppis">
                0
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
            <input type="hidden" name="smpltpas" value="{{$ltpas}}">
            <h1 class="smpltpas">
                0
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
            <input type="hidden" name="smpltpis" value="{{$ltpis}}">
            <h1 class="smpltpis">
                0
            </h1>
            <p>Lompat Tinggi pi</p>
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
            <input type="hidden" name="sdrunpas" value="{{$runpas}}">
            <h1 class="sdrunpas">
                0
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
            <input type="hidden" name="sdrunpis" value="{{$runpis}}">
            <h1 class="sdrunpis">
                0
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
            <input type="hidden" name="sdljpas" value="{{$ljpas}}">
            <h1 class="sdljpas">
                0
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
            <input type="hidden" name="sdljpis" value="{{$ljpis}}">
            <h1 class="sdljpis">
                0
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
            <input type="hidden" name="sdlbpas" value="{{$lbpas}}">
            <h1 class="sdlbpas">
                0
            </h1>
            <p>Lempar Bola pa</p>
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
            <input type="hidden" name="sdlbpis" value="{{$lbpis}}">
            <h1 class="sdlbpis">
                0
            </h1>
            <p>Lempar Bola pi</p>
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
            <input type="hidden" name="sdlespa" value="{{$lespa}}">
            <h1 class="sdlespa">
                0
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
            <input type="hidden" name="sdlespi" value="{{$lespi}}">
            <h1 class="sdlespi">
                {{$lespi}}
            </h1>
            <p>Lari Estafet pi</p>
          </div>
      </section>
  </div>
</div>
@endif

<!--state overview end-->
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
            <input type="hidden" name="juma" value="{{$juma}}">
            <h1 class="juma">
                0
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
            <h1 class="jumpa">
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
            <h1 class="jumpi">
                0
            </h1>
            <p>Jumlah Atlit PI</p>
        </div>
      </section>
  </div>
</div>
<!-- page end-->
@stop

@section('script')
	{{HTML::script('admin/js/count.js')}}
@stop
