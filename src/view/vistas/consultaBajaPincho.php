<!DOCTYPE html>
<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$view->setVariable("title", "Login");
$errors = $view->getVariable("errors");
$pincho = $view->getVariable("pincho");
?>
<!--AQUI EMPIEZA LA VENTANA MODAL DE AÑADIR ALBUM -->
<div class="margensup" >
	<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
		<div class="modalbox movedown">
			<div class="row">
				<h2 class="alineado">Consulta de Pincho</h2>
			</div>
			<div class="row separacion" >
				<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
					<form class="form-horizontal separarformulario" role="form">
						<div class="form-group alineado ">
							<center><img src= <?=$pincho->getFotoPi()?> alt="Imagen del pincho" class="img-thumbnail" width= "20%" heigth= "20%"></center>
						</div>
						<div class="form-group alineado ">
							<label class="control-label">Nombre: </label>
							<label class=" control-label"><?=$pincho->getNombrePi()?></label>
						</div>
						<div class="form-group alineado ">
							<label class="control-label">Precio: </label>
							<label class=" control-label"><?=$pincho->getPrecioPi()?></label>
						</div>
						<div class="form-group alineado ">
							<label class="control-label">Cocinero: </label>
							<label class=" control-label"><?=$pincho->getCocineroPi()?></label>
						</div>
						<div class="form-group alineado ">
							<label class="control-label">Ingredientes: </label>
							<label class=" control-label"><?=$pincho->getIngredientesPi()?></label>
						</div>
						<div class="form-group alineado ">
							<label class="control-label">Numero de votos: </label>
							<label class=" control-label"><?=$pincho->getNumVotosPi()?></label>
						</div>
						<div class="form-group alineado ">
							<label class="control-label">Estado: </label>
							<label class=" control-label"><?=$pincho->getEstadoPi()?></label>
						</div>
					</form>
				</div>
			</div>

			<button type="button" class="btn btn-primary col-md-offset-4" >Eliminar pincho</button>
			<a href="index.php?controller=pincho&action=modificacionPincho" type="button" class="btn btn-primary " >Modificar pincho</a>
		</div>
	</div>
</div>
<!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
<?php
include(__DIR__."../../layouts/pie.php");
?>
