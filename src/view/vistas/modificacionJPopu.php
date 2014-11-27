<!DOCTYPE html>
<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$view->setVariable("title", "Login");
$errors = $view->getVariable("errors");
$currentuser = $view->getVariable("currentusername");
?>
<div class="margensup" >
	<div class="column col-lg-9 col-md-9 col-sm-12 col-xs-12 col-md-offset-2" >
		<div class="modalbox movedown">
			<div class="row " >
				<h2 class="alineado">Modificar Jurado Popular</h2>
			</div>
			<div class="row separacion">
				<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
					<form class="form-horizontal" method="POST" action="index.php?controller=popular&action=verModificacion">
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Nombre</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="<?=$currentuser->getNombreU()?>" name="nombreU">
								<?= isset($errors["nombreU"])?$errors["nombreU"]:"" ?><br>
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Contraseña</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="<?=$currentuser->getContrasenaU()?>" name="contrasenaU">
								<?= isset($errors["contrasenaU"])?$errors["contrasenaU"]:"" ?><br>
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Repetir Contraseña</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="<?=$currentuser->getContrasenaU()?>" name="contrasenaU2">
								<?= isset($errors["contrasenaU2"])?$errors["contrasenaU2"]:"" ?><br>
							</div>
						</div>
						 <input type="submit" class="btn btn-primary col-md-offset-5" value="Guardar modificación">
						<a href="index.php?controller=users&action=seleccionarPerfil"><button type="button" class="btn btn-primary " >Cancelar</button></a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include(__DIR__."../../layouts/pie.php");
?>
