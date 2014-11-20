<!DOCTYPE html>
<?php
include "inicio.php"
?>
<!--AQUI EMPIEZA LA VENTANA MODAL DE AÑADIR ALBUM -->
<div class="margensup" >
	<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
		<div class="modalbox movedown">
			<div class="row">
				<h2 class="alineado">Listado de Pincho</h2>
			</div>
			<ul>
				<div class="col-lg-12">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Introcuce filtro para la busqueda...">
						<div class="input-group-btn">
							<button type="button" class="btn btn-default dropdown-toggle"
							data-toggle="dropdown">
							Buscar <span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li><a href="#">Buscar por nombre</a></li>
							<li><a href="#">Buscar por precio</a></li>
							<li><a href="#">Buscar por ingredientes</a></li>
						</ul>
					</div>
				</div>
			</div>
		</ul>
		<ul class= "list-inline ">
			<?php for ($i = 1; $i <= 10; $i++)://bucle que lista los pinchos seleccionados?>
				<li class= "column col-lg-2 col-md-2 col-sm-4 col-xs-4 col-md-offset-1">
					<a href="validarPincho.php"><img src="./resources/img/pincho.jpg" alt="Imagen del pincho" class="img-thumbnail img-responsive"></a>
					<div class="caption">
						<h4>-Nombre del pincho-</h4>
					</div>
				</li>
			<?php endfor;?><!-- fin while-->
		</ul>
	</div>
</div>
</div>
<!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
<?php
include "pie.php";
?>
