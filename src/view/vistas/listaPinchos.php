<!DOCTYPE html>
<?php
include(__DIR__."/../layouts/inicio.php");
include(__DIR__."/../layouts/cabecera.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$errors = $view->getVariable("errors");
?>
<!--AQUI EMPIEZA LA VENTANA MODAL DE AÑADIR ALBUM -->
<div class="margensup" >
	<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
		<div class="modalbox movedown">
			<div class="row">
				<h2 class="alineado">Listado de Pincho</h2>
			</div>
			<ul class= "list-inline ">
				<?php //bucle que lista los pinchos seleccionados
				$i=0;
				while ($i <= 12){?>
					<li class= "column col-lg-2 col-md-2 col-sm-4 col-xs-4 col-md-offset-1">

						<a href="index.php?controller=pincho&action=consultaPincho">
							<img src="./resources/img/pinchos/pincho.jpg" alt="Imagen del Pincho" class="img-thumbnail img-responsive">
						</a>
						<div class="caption">
							<h4>-Nombre del pincho -</h4>
						</div>
					</li>
					<?php $i++;}?><!-- fin while-->
				</ul>
			</div>
		</div>
	</div>
	<!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
	<?php
	include(__DIR__."../../layouts/pie.php");
	?>
