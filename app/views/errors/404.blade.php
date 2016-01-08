<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>404</title>

    <!-- Bootstrap core CSS -->
    {{HTML::style("admin/css/bootstrap.min.css")}}
    {{HTML::style("admin/css/bootstrap-reset.css")}}
    <!--external css-->
    {{HTML::style("admin/assets/font-awesome/css/font-awesome.css")}}
    <!-- Custom styles for this template -->
    {{HTML::style("admin/css/style.css")}}
    {{HTML::style("admin/css/style-responsive.css")}}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="body-404">

    <div class="container">

      <section class="error-wrapper">
          <i class="icon-404"></i>
          <h1>404</h1>
          <h2>page not found</h2>
          <p class="page-404">Something went wrong or that page doesn’t exist yet. <a href="{{ URL::to('/') }}">Return Home</a></p>
      </section>

    </div>


  </body>
</html>
