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
                    <a class="navbar-brand" href="{{ URL::to('/') }}">SIM Atletik <span>Unesa</span></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li><a href="{{ URL::to('login') }}">Login</a></li>
                        <li><a href="{{ URL::to('download') }}">Download</a></li>
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
                         Kejuaraan ini diselenggarakan untuk: <br>
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
                         PENDAFTARAN
                     </a>
                     @endif
                     @if($stat==0)
                     <a class="caption lfr btn yellow slide_btn"
                        data-x="670"
                        data-y="400"
                        data-speed="400"
                        data-start="3500"
                        data-easing="easeOutExpo">
                         PENDAFTARAN DITUTUP
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
                <p>Kejuaraan Atletik Unesa {{$limit->kejuaraan_ke . ' ' . date('Y')}}</p>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section>
                    <a href="#mySMA" data-toggle="modal", title='Lomba tingkat SMA'><div class="f-box">
                        <i class=" fa fa-trophy"></i>
                        <h2>Tingkat SMA</h2>
                    </div></a>
                </section>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section>
                  {{-- active --}}
                    <a href="#mySMP" data-toggle="modal", title='Lomba tingkat SMA'><div class="f-box">
                        <i class=" fa fa-trophy"></i>
                        <h2>Tingkat SMP</h2>
                    </div></a>
                </section>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section>
                    <a href="#mySD" data-toggle="modal", title='Lomba tingkat SMA'><div class="f-box">
                        <i class=" fa fa-trophy"></i>
                        <h2>Tingkat SD</h2>
                    </div></a>
                </section>
            </div>
            <!--feature end-->
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!--feature start-->
            <div class="text-center feature-head">
                <h1>PEMEGANG REKOR</h1>
                <p>KEJUARAAN ATLETIK UNESA SE JAWA TIMUR</p>
            </div>
            <div class="col-lg-12">
                <!--tab start-->
                <section class="panel tab">
                    <header class="panel-heading tab-bg-dark-navy-blue">
                        <ul class="nav nav-tabs nav-justified ">
                            <li class="active">
                                <a data-toggle="tab" href="#sma">
                                    Tingkat SMA
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#smp">
                                    Tingkat SMP
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#sd">
                                    Tingkat SD
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content tasi-tab">
                            <div id="sma" class="tab-pane active">
                              <table class="table table-striped table-advance table-hover">
                                  <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nomor Lomba</th>
                                      <th>Nama</th>
                                      <th>Satuan Pendidikan</th>
                                      <th>Prestasi</th>
                                      <th>Tahun</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php $no = 1;?>
                                  @foreach($sma as $value)
                                  <tr>
                                      <td><?php echo $no ?></td>
                                      <td>{{$value->nolomba}}</td>
                                      <td>{{$value->nama}}</td>
                                      <td>{{$value->pendidikan}}</td>
                                      <td>{{$value->prestasi}}</td>
                                      <td>{{$value->tahun}}</td>
                                  <?php $no++;?>
                                  </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                            </div>
                            <div id="smp" class="tab-pane">
                              <table class="table table-striped table-advance table-hover">
                                  <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nomor Lomba</th>
                                      <th>Nama</th>
                                      <th>Satuan Pendidikan</th>
                                      <th>Prestasi</th>
                                      <th>Tahun</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php $no = 1;?>
                                  @foreach($smp as $value)
                                  <tr>
                                      <td><?php echo $no ?></td>
                                      <td>{{$value->nolomba}}</td>
                                      <td>{{$value->nama}}</td>
                                      <td>{{$value->pendidikan}}</td>
                                      <td>{{$value->prestasi}}</td>
                                      <td>{{$value->tahun}}</td>
                                  <?php $no++;?>
                                  </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                            </div>
                            <div id="sd" class="tab-pane ">
                              <table class="table table-striped table-advance table-hover">
                                  <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nomor Lomba</th>
                                      <th>Nama</th>
                                      <th>Satuan Pendidikan</th>
                                      <th>Prestasi</th>
                                      <th>Tahun</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php $no = 1;?>
                                  @foreach($sd as $value)
                                  <tr>
                                      <td><?php echo $no ?></td>
                                      <td>{{$value->nolomba}}</td>
                                      <td>{{$value->nama}}</td>
                                      <td>{{$value->pendidikan}}</td>
                                      <td>{{$value->prestasi}}</td>
                                      <td>{{$value->tahun}}</td>
                                  <?php $no++;?>
                                  </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!--tab end-->
            </div>
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
                <div class="col-lg-3 col-sm-3">
                    <h1>SEKRETARIAT</h1>
                    <address>
                        <p>Kampus Lidah Wetan<br>
                        Gedung U2 Lt.1 FIK<br>
                        Universitas Negeri Surabaya</p>

                        Email : <a href="javascript:;">atletikunesa5@gmail.com</a></p>
                    </address>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h1>Pembimbing</h1>
                    <address>
                        <p>
                          1. {{$limit->nmpembimbing . ' ( ' . $limit->nopembimbing . ' )'}}<br>
                          2. {{$limit->nmpembimbing1 . ' ( ' . $limit->nopembimbing1 . ' )'}}<br>
                          3. {{$limit->nmpembimbing2 . ' ( ' . $limit->nopembimbing2 . ' )'}}
                        </p>
                    </address>
                </div>
                <div class="col-lg-3 col-sm-2">
                    <h1>Panitia</h1>
                    <address>
                        <p>
                          <b>Ketua</b><br>
                          {{$limit->nmketua . ' ( ' . $limit->noketua . ' )'}}<br>
                          <b>Sekretaris</b><br>
                          {{$limit->nmsek . ' ( ' . $limit->nosek . ' )'}}<br>
                          <b>Bendahara</b><br>
                          {{$limit->nmben . ' ( ' . $limit->noben . ' )'}}<br>
                        </p>
                    </address>
                </div>
                <div class="col-lg-2 col-sm-2 col-lg-offset-1">
                    <h1>stay connected</h1>
                    <ul class="social-link-footer list-unstyled">
                        <li><a href="http://facebook.com/{{$limit->facebook}}" target="blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="http://twitter.com/{{$limit->twitter}}" target="blank"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                    <address>
                      <p><!-- Histats.com  START (html only)-->
                        <a href="http://www.histats.com" alt="page hit counter" target="_blank" >
                        <embed src="http://s10.histats.com/335.swf"  flashvars="jver=1&acsid=3385459&domi=4"  quality="high"  width="112" height="62"name="335.swf"  align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"wmode="transparent" /></a>
                        <img  src="http://sstatic1.histats.com/0.gif?3385459&101" alt="" border="0">
                        <!-- Histats.com  END  --></p>
                    </address>
                </div>
            </div>
        </div>
    </footer>
    <!--footer end-->

    <!-- Modal -->
    <div class="modal fade" id="mySMA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Perlombaan Tingkat SMA</h4>
                </div>
                <div class="modal-body">
                    <b><li>Lari 100m pa dan pi</li>
                    <li>Lompat Jauh pa dan pi</li>
                    <li>Tolak Peluru pa dan pi</li>
                    <li>Lompat Tinggi pa dan pi</li></b>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger" type="button"> Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mySMP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Perlombaan Tingkat SMP</h4>
                </div>
                <div class="modal-body">
                    <b><li>Lari 60m pa dan pi</li>
                    <li>Lompat Jauh pa dan pi</li>
                    <li>Tolak Peluru pa dan pi</li>
                    <li>Lompat Tinggi pa dan pi</li></b>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger" type="button"> Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mySD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Perlombaan Tingkat SD</h4>
                </div>
                <div class="modal-body">
                    <b><li>Lari 50m pa dan pi</li>
                    <li>Lompat Jauh pa dan pi</li>
                    <li>Lempar Bola pa dan pi</li>
                    <li>Lari Estafet pa dan pi</li></b>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-danger" type="button"> Ok</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->

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
