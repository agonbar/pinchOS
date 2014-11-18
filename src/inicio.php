<!DOCTYPE html>
<html lang="en">

<?php
	include "cabecera.php";
?>
<body>
<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">


            <!-- sidebar -->
            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">

              	<ul class="nav">
          			<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
            	</ul>

                <ul class="nav hidden-xs" id="lg-menu">

					<div class="nombreuser">--Nombre de usuario--</div>

					<li class="nav-header"><a href="#" data-toggle="collapse" data-target="#menu1">
					  <h5>Concurso <i class="glyphicon glyphicon-plus"></i></h5>
					  </a>
						<ul class="list-unstyled collapse" id="menu1">
							<li class="desplegable "><a href="#">Consultar bases</a></li>
							<li class="desplegable"><a href="#">Modificar concurso</a></li>
						</ul>
					</li>

					<li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2">
					  <h5>Participantes <i class="glyphicon glyphicon-plus"></i></h5>
					  </a>
						<ul class="list-unstyled collapse" id="menu2">
							<li class="desplegable"><a href="listarPart.php">Lista de participantes</a></li>
							<li class="desplegable"><a href="bajaPart.php">Baja</a></li>
							<li class="desplegable"><a href="modificacionPart.php">Modificacion</a></li>
							<li class="desplegable"><a href="consultaPart.php">Consulta</a></li>
						</ul>
					</li>

					<li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu3">
					  <h5>Pinchos <i class="glyphicon glyphicon-plus"></i></h5>
					  </a>
						<ul class="list-unstyled collapse" id="menu3">
							<li class="desplegable"><a href="listaPinchos.php">Lista de pinchos</a></li>
							<li class="desplegable"><a href="bajaPincho.php">Baja</a></li>
							<li class="desplegable"><a href="modificacionPincho.php">Modificacion</a></li>
							<li class="desplegable"><a href="validarPincho.php">Consulta</a></li>
						</ul>
					</li>

                </ul>

            </div>
            <!-- /sidebar -->

            <!-- main right col -->
            <div class="column col-sm-10 col-xs-11" id="main">

                <!-- top nav -->
              	<div class="navbar navbar-blue navbar-static-top">
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
          				<span class="icon-bar"></span>
          				<span class="icon-bar"></span>
                      </button>
                      <a href="inicio.php" class="navbar-brand logo">P</a>
                  	</div>
                  	<nav class="collapse navbar-collapse" role="navigation">
                    <form class="navbar-form navbar-left">
                        <div class="input-group input-group-sm" style="max-width:360px;">
                          <input type="text" class="form-control" placeholder="Buscar" name="srch-term" id="srch-term">
                          <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="#"><i class="glyphicon glyphicon-plus"></i> Premiados</a>
                      </li>
                      <li>
                        <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Votar</a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i></a>
                        <ul class="dropdown-menu">
                          <li><a href="">Mi perfil</a></li>
                          <li><a href="">Modificar mi perfil</a></li>
                          <li><a href="">Salir</a></li>
                        </ul>
                      </li>
                    </ul>
                  	</nav>
                </div>
                <!-- /top nav -->
