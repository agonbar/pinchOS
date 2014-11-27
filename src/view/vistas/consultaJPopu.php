<!DOCTYPE html>
<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$view->setVariable("title", "Login");
$errors = $view->getVariable("errors");
$currentuser = $view->getVariable("currentusername");
?>
<!--AQUI EMPIEZA LA VENTANA MODAL DE AÑADIR ALBUM -->
<div class="margensup" >
	<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
		<div class="modalbox movedown">
			<div class="row">
				<h2 class="alineado">Mi Perfil</h2>
			</div>
			<div class="row separacion" >
				<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
					<form class="form-horizontal separarformulario" role="form">
						<div class="form-group alineado ">
							<label class="control-label">Nombre: </label>
							<label class=" control-label"><?=$currentuser->getNombreU()?></label>
						</div>
						<div class="form-group alineado ">
							<label class="control-label">Email: </label>
							<label class=" control-label"><?=$currentuser->getEmailU()?></label>
						</div>

					</form>
				</div>
			</div>
			<div class="row separartabla" >
				<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
					<table class="table alineado ">
						<!-- Aplicadas en las filas -->
						<tr class="activa">
							<td>Pincho</td>
							<td>Código</td>
							<td>Puntuación</td>
							<td>Local</td>
						</tr>
						<tr class="tablehover">
							<td>De jamon</td>
							<td>445675</td>
							<td>5</td>
							<td>Graduado</td>
						</tr>
						<tr class="tablehover">
							<td>De queso</td>
							<td>773654</td>
							<td>3</td>
							<td>Cafetería Uni</td>
						</tr>
						<tr class="tablehover">
							<td>De pavo</td>
							<td>263748</td>
							<td>9</td>
							<td>escher</td>
						</tr>
					</table>
				</div>
			</div>
			<a href="index.php?controller=popular&action=desactivarCuenta"><button type="button" class="btn btn-primary col-md-offset-4" >Eliminar cuenta</button></a>
			<button type="button" class="btn btn-primary " >Modificar mi perfil</button>
		</div>
	</div>
</div>
<!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
<?php
include(__DIR__."../../layouts/pie.php");
?>

