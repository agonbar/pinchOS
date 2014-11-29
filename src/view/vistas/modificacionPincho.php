<!DOCTYPE html>
<?php
include(__DIR__."/../layouts/inicio.php");
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
							<center><img src="./resources/img/pinchos/pincho.jpg" alt="Imagen del pincho" class="img-thumbnail" width= "20%" heigth= "20%">
								<input type="file" id="ejemplo_archivo_1" name="fotoPi">
								<p class="help-block">El tamano maximo permitido es de 3Mb</p></center>
							</div>
							<div class="form-group separarformulario">
								<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Nombre</label>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<input class="form-control" placeholder="Introduce un nombre..." name="nombrePi">
								</div>
							</div>
							<div class="form-group separarformulario">
								<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Precio</label>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<input class="form-control" placeholder="Introduce un precio..." name="precioPi">
								</div>
							</div>
							<div class="form-group separarformulario">
								<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Cocinero</label>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<input class="form-control" placeholder="Introduce un cocinero..." name="cocineroPi">
								</div>
							</div>
							<div class="form-group separarformulario">
								<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Ingredientes</label>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<textarea class="form-control" placeholder="Introduce algunos de los ingredientes..." rows="3" name="ingredientesPi"></textarea>
								</div>
							</div>
							<div class="form-group separarformulario">
								<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Contraseña</label>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<input class="form-control" placeholder="******" name="contrasenaPi">
								</div>
							</div>
							<div class="form-group separarformulario">
								<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Repetir Contraseña</label>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<input class="form-control" placeholder="******" name="contrasena2Pi">
								</div>
							</div>
							<button type="button" class="btn btn-primary col-md-offset-4" >Guardar modificación</button>
							<a href="index.php?controller=pincho&action=consultaPincho" type="button" class="btn btn-primary " >Cancelar</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include(__DIR__."../../layouts/pie.php");
	?>
