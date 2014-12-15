<?php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/ico/favicon.png">

  <title>Consurso de pinchos</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="./resources/css/styles.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/soon.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.js"></script>
  <script src="assets/js/respond.min.js"></script>
  <![endif]-->

  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>
<!-- START BODY -->
<body class="fondo">

  <!-- START HEADER -->
  <section id="header">

    <div class="login">
      <div class="btn-group" role="group" aria-label="...">
        <a href="index.php?controller=users&action=login" type="button" class="btn btn-info">Login</a>
        <a href="index.php?controller=users&action=registro" type="button" class="btn btn-info">Registro</a>
      </div>
    </div>

    <div class="container">
      <header>
        <!-- HEADLINE -->
        <h1 data-animated="GoIn"><b>CONCURSO DE PINCHOS</b></h1>
      </header>
      <!-- START TIMER -->
      <div id="timer" data-animated="FadeIn">
        <p id="message"></p>
        <div id="days" class="timer_box"></div>
        <div id="hours" class="timer_box"></div>
        <div id="minutes" class="timer_box"></div>
        <div id="seconds" class="timer_box"></div>
      </div>
      <!-- END TIMER -->
      <div class="row">
        <div class="col-md-4  text-center">
          <div class="featurette-item">
            <i class="icon-rocket">
              <a href="index.php?controller=pincho&action=listadoPincho">
                <img src="./resources/img/pinchos/pincho2.jpg" alt="Imgen de pinchos" class= "img-circle" width="190px" height="190px">
              </a>
            </i>
            <h3>Pinchos de consurso</h3>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="featurette-item">
            <i class="icon-magnet">
              <a href="index.php?controller=participante&action=listarParticipantes">
                <img src="./resources/img/portada/restaurante.jpg" alt="Imgen de un restaurante" class= "img-circle" width="190px" height="190px">
              </a>
            </i>
            <h3>Establecimientos participantes</h3>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="featurette-item">
            <i class="icon-shield">
              <a href="index.php?controller=concurso&action=consultarConcurso">
                <img src="./resources/img/portada/concurso.jpg" alt="Imgen de las bases del concurso" class= "img-circle" width="190px" height="190px">
              </a>
            </i>
            <h3>Bases de Concurso</h3>
          </div>
        </div>
      </div>
    </div>
    <!-- LAYER OVER THE SLIDER TO MAKE THE WHITE TEXTE READABLE -->
    <div id="layer"></div>
    <!-- END LAYER -->
    <!-- START SLIDER -->

    <!-- END SLIDER -->
  </section>

  <!-- END HEADER -->

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/soon/plugins.js"></script>
  <script src="assets/js/soon/jquery.themepunch.revolution.min.js"></script>
  <script src="assets/js/soon/custom.js"></script>
</body>
<!-- END BODY -->
</html>