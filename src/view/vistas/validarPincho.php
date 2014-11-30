<!DOCTYPE html>
<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$view->setVariable("title", "Login");
$errors = $view->getVariable("errors");
$pincho = $view->getVariable("concu");
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
							<center><img src="../../resources/img/pinchos/pincho.jpg" alt="Imagen del pincho" class="img-thumbnail" width= "20%" heigth= "0%"></center>
						</div>
						<div class="form-group alineado ">
							<label class="control-label">Nombre: </label>
							<label class=" control-label">Explosion de sabor</label>
						</div>
						<div class="form-group alineado ">
							<label class="control-label">Precio: </label>
							<label class=" control-label">2€</label>
						</div>
						<div class="form-group alineado ">
							<label class="control-label">Cocinero: </label>
							<label class=" control-label">Jorge Hernandez</label>
						</div>
						<div class="form-group alineado ">
							<label class="control-label">Ingredientes: </label>
							<label class=" control-label">pan, pimientos, queso parmellano</label>
						</div>
						<div class="form-group alineado ">
							<label class="control-label">Numero de votos: </label>
							<label class=" control-label">4</label>
						</div>
						<div class="form-group alineado ">
							<label class="control-label">Estado: </label>
							<label class=" control-label">activo</label>
						</div>
					</form>
				</div>
				<button type="button" class="btn btn-primary col-md-offset-3" >Eliminar pincho</button>
				<button type="button" class="btn btn-primary " >Modificar pincho</button>
				<button type="button" class="btn btn-primary " >Validar pincho</button>
			</div>
		</div>
	</div>
</div>
<!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
<?php
include(__DIR__."../../layouts/pie.php");
?>
