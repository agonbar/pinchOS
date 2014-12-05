<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$view->setVariable("title", "Login");
$errors = $view->getVariable("errors");
$pincho = $view->getVariable("pincho");
?>
<div class="margensup" >
	<div class="column col-lg-9 col-md-9 col-sm-12 col-xs-12 col-md-offset-2" >
		<div class="modalbox movedown">
			<div class="row " >
				<h2 class="alineado">Modificar Pincho</h2>
			</div>
			<div class="row separacion">
				<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
					<form class="form-horizontal" role="form" method="POST" action="index.php?controller=pincho&action=modificacionPincho">
						<div class="form-group separarformulario">
							<center><img src= "<?=$pincho->getFotoPi()?>" alt="Imagen del pincho" class="img-thumbnail" width= "20%" heigth= "20%"></center>
								<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Fotografia</label>
								<input type="file" id="ejemplo_archivo_1"
								value="<?= isset($_POST["fotoPi"])?$_POST["fotoPi"]:$pincho->getFotoPi() ?>" name="fotoPi">
								<?= isset($errors["fotoPi"])?$errors["fotoPi"]:"" ?><br>
								<p class="help-block">El tamano maximo permitido es de 3Mb</p></center>
							</div>
							<div class="form-group separarformulario">
								<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Nombre</label>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<input class="form-control" placeholder="<?=$pincho->getNombrePi()?>"
									value="<?= isset($_POST["nombrePi"])?$_POST["nombrePi"]:$pincho->getNombrePi() ?>" name="nombrePi">
									<?= isset($errors["nombrePi"])?$errors["nombrePi"]:"" ?><br>
								</div>
							</div>
							<div class="form-group separarformulario">
								<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Precio</label>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<input class="form-control" placeholder="<?=$pincho->getPrecioPi()?>"
									value="<?= isset($_POST["precioPi"])?$_POST["precioPi"]:$pincho->getPrecioPi() ?>" name="precioPi">
									<?= isset($errors["precioPi"])?$errors["precioPi"]:"" ?><br>
								</div>
							</div>
							<div class="form-group separarformulario">
								<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Cocinero</label>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<input class="form-control" placeholder="<?=$pincho->getCocineroPi()?>"
									value="<?= isset($_POST["cocineroPi"])?$_POST["cocineroPi"]:$pincho->getCocineroPi() ?>" name="cocineroPi">
									<?= isset($errors["cocineroPi"])?$errors["cocineroPi"]:"" ?><br>
								</div>
							</div>
							<div class="form-group separarformulario">
								<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Ingredientes</label>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<textarea class="form-control" placeholder="<?=$pincho->getIngredientesPi()?>"
										value="<?= isset($_POST["ingredientesPi"])?$_POST["ingredientesPi"]:$pincho->getIngredientesPi() ?>" rows="3" name="ingredientesPi"></textarea>
									<?= isset($errors["ingredientesPi"])?$errors["ingredientesPi"]:"" ?><br>
								</div>
							</div>
							<input type="submit" class="btn btn-primary col-md-offset-3" value = "Guardar modificación">
							<a href="index.php?controller=pincho&action=consultaPincho&idPi= <?=$pincho->getIdPi();?>" type="button" class="btn btn-primary col-md-offset-2">Cancelar</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include(__DIR__."../../layouts/pie.php");
	?>
