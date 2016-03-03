<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="INSEO">
  <meta name="keyword" content="Inseo, Atletik, Unesa">
  <link rel="shortcut icon" href="img/fav.png">

  <title>Registrasi | Atletik Unesa</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-reset.css')}}" />
  <!--external css-->
  <link rel="stylesheet" href="{{ asset('admin/assets/font-awesome/css/font-awesome.css')}}" />
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}" />
  <link rel="stylesheet" href="{{ asset('admin/css/style-responsive.css')}}" />

  {{HTML::style("select2/select2-bootstrap.css")}}
  <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="login-body">
  <div class="container">
    {{ Form::open(array('url' => 'register', 'method' => 'post', 'id' => 'regis', 'class' => 'form-signin form-horizontal cmxform tasi-form')) }}
      <h2 class="form-signin-heading">Daftar Sekarang</h2>
      @include('layouts.partials.alert')
      @include('layouts.partials.validation')
      <div class="login-wrap">
        <p>Masukkan data sekolah</p>
        <div class="form-group">
          {{ Form::select('jenjang', array(''=>'','SD'=>'SD','SMP'=>'SMP','SMA'=>'SMA'), null, array(
                'id'=>'jenjang',
                'placeholder' => "Pilih Jenjang Pendidikan",
                'class'=>'form-control input-sm')) }}
            <br>
          {{ Form::text('name', null, array('class'=>'form-control','placeholder'=>'Nama Sekolah', 'autofocus')) }}
          <br><label for="alamat">Alamat</label>
          {{ Form::text('adstreet', null, array('class'=>'form-control','placeholder'=>'Nama Jalan/Dusun', 'autofocus')) }}
          {{ Form::text('advillage', null, array('class'=>'form-control','placeholder'=>'Nama Desa/Kelurahan', 'autofocus')) }}
          {{ Form::text('addistricts', null, array('class'=>'form-control','placeholder'=>'Nama Kabupaten', 'autofocus')) }}
          {{ Form::select('adcity', array(''=>'')+Kabupaten::lists('name','name'), null, array(
                  'id'=>'adcity',
                  'placeholder' => "Pilih Kabupaten",
                  'class'=>'form-control input-sm')) }}
          <br>
          {{-- {{ Form::text('adcity', null, array('class'=>'form-control','placeholder'=>'Nama Kota/Kabupaten', 'autofocus')) }} --}}
          {{ Form::text('adpostalcode', null, array('class'=>'form-control','placeholder'=>'Kode Pos', 'autofocus')) }}
          {{ Form::text('adphone', null, array('class'=>'form-control','placeholder'=>'Nomor Telepon', 'autofocus')) }}
            <label for="alamat">Informasi Kepala Sekolah</label>
          {{ Form::text('hmname', null, array('class'=>'form-control','placeholder'=>'Nama Kepala Sekolah', 'autofocus')) }}
          {{ Form::text('hmphone', null, array('class'=>'form-control','placeholder'=>'Nomor Telepon Kepala Sekolah', 'autofocus')) }}
          {{ Form::text('hmmobile', null, array('class'=>'form-control','placeholder'=>'Nomor Handphone Kepala Sekolah', 'autofocus')) }}
        </div>

        <p> Masukkan data login</p>
        <div class="form-group">
          {{ Form::text('email', null, array('class' => 'form-control','placeholder'=>'Masukkan Email')) }}
          {{ Form::password('password', array('class' => 'form-control','placeholder'=>'******')) }}
          {{ Form::password('password_confirmation', array('class' => 'form-control','placeholder'=>'******')) }}
          <label class="checkbox">
              <input type="checkbox" name="syarat"> Terima persyaratan dan ketentuan
          </label>
        </div>
        <div class="form-group">
          {{ Form::captcha() }}
        </div>
        {{Form::submit('Simpan', array('class'=>'btn btn-danger'))}}

        <div class="registration">
            Sudah terdaftar.
            <a class="" href="{{ URL::to('login') }}">
                Login
            </a>
        </div>
        </div>
   {{ Form::close() }}
  </div>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="admin/js/jquery.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>

  {{HTML::script('admin/js/jquery.validate.min.js')}}
  <!--script for this page-->
  {{HTML::script('admin/js/form-validation-script.js')}}

  <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
  <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
  <script type="text/javascript">
      $(document).ready(function() { $("#jenjang").select2(); });
      $(document).ready(function() { $("#adcity").select2(); });
  </script>
</body>
</html>
