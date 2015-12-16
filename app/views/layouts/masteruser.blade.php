<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="inseo">
    <meta name="keyword" content="Atletik, Unesa">
    <link rel="shortcut icon" href="img/fav.png">

    <title>@yield('title') | Atletik Unesa</title>

    <!-- Bootstrap core CSS -->
    {{HTML::style("admin/css/bootstrap.min.css")}}
    {{HTML::style("admin/css/bootstrap-reset.css")}}
    <!--external css-->
    {{HTML::style("admin/assets/font-awesome/css/font-awesome.css")}}
    <!--<link href="css/navbar-fixed-top.css" rel="stylesheet">-->

      <!-- Custom styles for this template -->
    {{HTML::style("admin/css/style.css")}}
    {{HTML::style("admin/css/style-responsive.css")}}
    @yield('asset')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="full-width">

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="fa fa-bar"></span>
                  <span class="fa fa-bar"></span>
                  <span class="fa fa-bar"></span>
              </button>

              <!--logo start-->
              <a href="{{ URL::to('dashboard') }}" class="logo" >Atletik <span>Unesa</span></a>
              <!--logo end-->
              <div class="horizontal-menu navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                  <li><a href="{{ URL::to('dashboard') }}">Dashboard</a></li>
                  <li class="dropdown">
                      <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">Formulir <b class=" fa fa-angle-down"></b></a>
                      <ul class="dropdown-menu">
                      @foreach ($menu as $data)
                          <li><a href="{{ URL::to('user/contest/createf/' . $data->id) }}">{{$data->menu}}</a></li>
                      @endforeach
                      </ul>
                  </li>
                  <li><a href="{{ URL::to('user/contests') }}">List Lomba</a></li>
                  <li><a href="{{ URL::to('user/officers') }}">Petugas</a></li>
                  <li><a href="{{ URL::to('user/cost') }}">Biaya</a></li>
                </ul>
              </div>
              <div class="top-nav ">
                  <ul class="nav pull-right top-menu">
                      <li>
                          <input type="text" class="form-control search" placeholder=" Search">
                      </li>
                      <!-- user login dropdown start-->
                      <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                              {{-- <img alt="" src="admin/img/avatar1_small.jpg"> --}}
                              <span class="username">{{ Sentry::getUser()->first_name . ' - ' . Sentry::getUser()->last_name }}</span>
                              <b class="caret"></b>
                          </a>
                          <ul class="dropdown-menu extended logout">
                              <div class="log-arrow-up"></div>
                              <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                              <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                              <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                              <li><a href="{{ URL::to('logout') }}"><i class="fa fa-key"></i> Log Out</a></li>
                          </ul>
                      </li>
                      <!-- user login dropdown end -->
                  </ul>
              </div>

          </div>

      </header>
      <!--header end-->
      <!--sidebar start-->

      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              @include('layouts.partials.alert')
              @include('layouts.partials.validation')
              <!-- page start-->
              @yield('content')
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 &copy; cyber campus unesa - inseo.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>
    <!-- js placed at the end of the document so the pages load faster -->
    {{HTML::script('admin/js/jquery.js')}}
    {{HTML::script('admin/js/bootstrap.min.js')}}
    {{HTML::script('admin/js/jquery.dcjqaccordion.2.7.js')}}
    {{HTML::script('admin/js/hover-dropdown.js')}}
    {{HTML::script('admin/js/jquery.scrollTo.min.js')}}
    {{HTML::script('admin/js/jquery.nicescroll.js')}}
    {{HTML::script('admin/js/respond.min.js')}}

    <!--common script for all pages-->
    {{HTML::script('admin/js/common-scripts.js')}}
    @yield('script')
  </body>
</html>
