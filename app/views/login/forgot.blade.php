<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="INSEO">
  <meta name="keyword" content="Inseo, Atletik, Unesa">
  <link rel="shortcut icon" href="img/fav.png">

  <title>Forgot | Atletik Unesa</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-reset.css')}}" />
  <!--external css-->
  <link rel="stylesheet" href="{{ asset('admin/assets/font-awesome/css/font-awesome.css')}}" />
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}" />
  <link rel="stylesheet" href="{{ asset('admin/css/style-responsive.css')}}" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="login-body">
  <div class="container">
    {{-- {{ Form::open(array('url' => route('guest.sendresetcode'), 'method'=>'post')) }} --}}
    {{ Form::open(array('url' => route('sendresetcode'), 'method'=>'post', 'class' => 'form-signin')) }}
      <h2 class="form-signin-heading">Reset Password</h2>
      @include('layouts.partials.alert')
      <div class="login-wrap">
        {{ Form::text('email', null, array('class'=>'form-control','placeholder'=>'Masukkan Email', 'autofocus')) }}
        {{ Form::submit('Reset', array('class'=>'btn btn-lg btn-login btn-block')) }}
        <a href="{{ URL::to('/') }}" class="btn btn-lg btn-login btn-block" type="button"><i class="fa fa-home"></i>Home</a>
      </div>
   {{ Form::close() }}
  </div>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="admin/js/jquery.js"></script>
  <script src="admin/js/bootstrap.min.js"></script>

</body>
</html>
