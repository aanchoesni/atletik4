<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="cyber campus-inseo">
    <meta name="keyword" content="atletik">
    <link rel="shortcut icon" href="front/img/fav.png">

    <title>Pendaftaran Atletik Unesa</title>

    <!-- Bootstrap core CSS -->
    <link href="front/css/bootstrap.min.css" rel="stylesheet">
    <link href="front/css/theme.css" rel="stylesheet">
    <link href="front/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="front/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="front/css/flexslider.css"/>
    <link href="front/assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link href="front/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />

    <link rel="stylesheet" href="front/assets/revolution_slider/css/rs-style.css" media="screen">
    <link rel="stylesheet" href="front/assets/revolution_slider/rs-plugin/css/settings.css" media="screen">

    <!-- Custom styles for this template -->
    <link href="front/css/style.css" rel="stylesheet">
    <link href="front/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!--header start-->
    <header class="header-frontend">
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">SIM Atletik <span>Unesa</span></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li><a href="{{ URL::to('login') }}">Login</a></li>
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Pengumuman <b class=" fa fa-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">SMA</a></li>
                                <li><a href="#">SMP</a></li>
                                <li><a href="#">SD</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Bantuan</a></li>
                        <li><input type="text" placeholder=" Search" class="form-control search"></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--header end-->

     <!-- revolution slider start -->
     <div class="fullwidthbanner-container main-slider">
         <div class="fullwidthabnner">
             <ul id="revolutionul" style="display:none;">
                 <!-- 1st slide -->
                 <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="">
                     <div class="caption lfl slide_item_left"
                          data-x="10"
                          data-y="70"
                          data-speed="400"
                          data-start="1500"
                          data-easing="easeOutBack">
                         <img src="front/img/banner/ban2.png" alt="Image 1">
                     </div>
                     <div class="caption lfr slide_title"
                          data-x="670"
                          data-y="120"
                          data-speed="400"
                          data-start="1000"
                          data-easing="easeOutExpo">
                          ATLETIK UNESA {{$limit->kejuaraan_ke . ' ' . date('Y')}}
                     </div>

                     <!--div class="caption lfr slide_subtitle dark-text"
                          data-x="670"
                          data-y="190"
                          data-speed="400"
                          data-start="2000"
                          data-easing="easeOutExpo">

                     </div-->
                     <div class="caption lfr slide_desc"
                          data-x="670"
                          {{-- data-y="250" --}}
                          data-y="190"
                          data-speed="400"
                          data-start="2500"
                          data-easing="easeOutExpo">
                         Sejak tahun 2006 kejuaraan ini diselenggarakan untuk: <br>
                         1. Antar SMA/MA/SMK se Jawa Timur (Sesi I) Sabtu, 14 Mei 2016 Pagi<br>
                         2. Antar SMP/MTs se Jawa Timur (Sesi II) Sabtu, 14 Mei 2016 Sore<br>
                         3. Antar SD/MI se Jawa Timur (Sesi III) Minggu, 15 Mei 2016 Pagi<br>
                     </div>
                     <div class="caption lfr slide_desc"
                          data-x="670"
                          {{-- data-y="380" --}}
                          data-y="330"
                          data-speed="400"
                          data-start="3000"
                          data-easing="easeOutExpo">
                         <b>Pendaftaran {{date("d F Y", strtotime($limit->startdayreg)) .' s/d ' . date("d F Y", strtotime($limit->enddayreg))}}</b>
                     </div>
                     @if($stat==1)
                     <a class="caption lfr btn yellow slide_btn" href="{{ URL::to('registrasi') }}"
                        data-x="670"
                        data-y="400"
                        data-speed="400"
                        data-start="3500"
                        data-easing="easeOutExpo">
                         Daftar Sekarang
                     </a>
                     @endif
                     @if($stat==0)
                     <a class="caption lfr btn yellow slide_btn"
                        data-x="670"
                        data-y="400"
                        data-speed="400"
                        data-start="3500"
                        data-easing="easeOutExpo">
                         Pendaftaran Ditutup
                     </a>
                     @endif
                 </li>
             </ul>
            <div class="tp-bannertimer tp-top"></div>
         </div>
     </div>
     <!-- revolution slider end -->

    <!--container start-->
    <div class="container">
        <div class="row">
            <!--feature start-->
            <div class="text-center feature-head">
                <h1>Selamat Datang di Official Wesite & SIM</h1>
                <p>Kejuaraan Atletik Unesa XI 2016</p>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section>
                    <div class="f-box">
                        <i class=" fa fa-trophy"></i>
                        <h2>Tingkat SMA</h2>
                    </div>
                    <div class="col-lg-8 col-sm-6">
                        <ol>
                            <li>Lari 100m pa dan pi</li>
                            <li>Lompat Jauh pa dan pi</li>
                            <li>Tolak Peluru pa dan pi</li>
                            <li>Lompat Tinggi pa dan pi</li>
                        </ol>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section>
                  {{-- active --}}
                    <div class="f-box">
                        <i class=" fa fa-trophy"></i>
                        <h2>Tingkat SMP</h2>
                    </div>
                    <div class="col-lg-8 col-sm-6">
                        <ol>
                            <li>Lari 60m pa dan pi</li>
                            <li>Lompat Jauh pa dan pi</li>
                            <li>Tolak Peluru pa dan pi</li>
                            <li>Lompat Tinggi pa dan pi</li>
                        </ol>
                    </div>
                </section>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section>
                    <div class="f-box">
                        <i class="fa fa-trophy"></i>
                        <h2>Tingakt SD</h2>
                    </div>
                    <div class="col-lg-8 col-sm-6">
                        <ol>
                            <li>Lari 50m pa dan pi</li>
                            <li>Lompat Jauh pa dan pi</li>
                            <li>Lempar Bola pa dan pi</li>
                            <li>Lari Estafet pa dan pi</li>
                        </ol>
                    </div>
                </section>
            </div>
            <!--feature end-->
        </div>
    </div>

     <div class="container">
        <div class="container">
         <!--clients start-->
         <div class="clients">
            <center><h2 class="r-work">Didukung oleh:</h2></center>
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12 text-center">
                         <ul class="list-unstyled">
                          @foreach($sponsors as $value)
                             <li><a href="{{ $value->url }}" target="blank">{{ HTML::image('uploads/sponsor/' . $value->logo,$value->name, array( 'height' => 120, 'width' => 'auto', 'title' => $value->name) ) }}</a></li>
                          @endforeach
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
         <!--clients end-->
        </div>
     </div>

    <!--footer start-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>contact info</h1>
                    <address>
                        <p>Kampus Lidah Wetan<br>
                        Gedung U2 Lt.1 FIK<br>
                        Universitas Negeri Surabaya</p>

                        Email : <a href="javascript:;">atletikunesa5@gmail.com</a></p>
                    </address>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <address>
                        <p>
                          <b>Pembimbing</b><br>
                          {{$limit->nmpembimbing . ' ( ' . $limit->nopembimbing . ' )'}}</p>
                        <p>
                          <b>Ketua</b><br>
                          {{$limit->nmketua . ' ( ' . $limit->noketua . ' )'}}<br>
                          <b>Kesekretariatan</b><br>
                          {{$limit->nmsek . ' ( ' . $limit->nosek . ' )'}}<br>
                          <b>Bendahara</b><br>
                          {{$limit->nmben . ' ( ' . $limit->noben . ' )'}}<br>
                        </p>
                    </address>
                </div>
                <div class="col-lg-5 col-sm-5">
                    {{-- <h1>latest tweet</h1>
                    <div class="tweet-box">
                        <i class="fa fa-twitter"></i>
                        <em>Please follow <a href="javascript:;">@nettus</a> for all future updates of us! <a href="javascript:;">twitter.com/vectorlab</a></em>
                    </div> --}}
                </div>
                <div class="col-lg-3 col-sm-3 col-lg-offset-1">
                    <h1>stay connected</h1>
                    <ul class="social-link-footer list-unstyled">
                        <li><a href="http://facebook.com/{{$limit->facebook}}" target="blank"><i class="fa fa-facebook"></i></a></li>
                        {{-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> --}}
                        {{-- <li><a href="#"><i class="fa fa-dribbble"></i></a></li> --}}
                        {{-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li> --}}
                        <li><a href="http://twitter.com/{{$limit->twitter}}" target="blank"><i class="fa fa-twitter"></i></a></li>
                        {{-- <li><a href="#"><i class="fa fa-skype"></i></a></li> --}}
                        {{-- <li><a href="#"><i class="fa fa-github"></i></a></li> --}}
                        {{-- <li><a href="#"><i class="fa fa-youtube"></i></a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--footer end-->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="front/js/jquery.js"></script>
    <script src="front/js/jquery-1.8.3.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="front/js/hover-dropdown.js"></script>
    <script defer src="front/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="front/assets/bxslider/jquery.bxslider.js"></script>

    <script type="text/javascript" src="front/js/jquery.parallax-1.1.3.js"></script>

    <script src="front/js/jquery.easing.min.js"></script>
    <script src="front/js/link-hover.js"></script>

    <script src="front/assets/fancybox/source/jquery.fancybox.pack.js"></script>

    <script type="text/javascript" src="front/assets/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="front/assets/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!--common script for all pages-->
    <script src="front/js/common-scripts.js"></script>

    <script src="front/js/revulation-slide.js"></script>

  <script>
      RevSlide.initRevolutionSlider();

      $(window).load(function() {
          $('[data-zlname = reverse-effect]').mateHover({
              position: 'y-reverse',
              overlayStyle: 'rolling',
              overlayBg: '#fff',
              overlayOpacity: 0.7,
              overlayEasing: 'easeOutCirc',
              rollingPosition: 'top',
              popupEasing: 'easeOutBack',
              popup2Easing: 'easeOutBack'
          });
      });

      $(window).load(function() {
          $('.flexslider').flexslider({
              animation: "slide",
              start: function(slider) {
                  $('body').removeClass('loading');
              }
          });
      });

      //    fancybox
      jQuery(".fancybox").fancybox();
  </script>
  </body>
</html>
