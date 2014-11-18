<!DOCTYPE html>
<?php
	include "cabecera.php";
	include "inicio.php"
?>
				<div class="margensup" >
					<div class="column col-lg-9 col-md-9 col-sm-12 col-xs-12 col-md-offset-2" >
						<div class="modalbox movedown">
							<div class="row " >
								<h2 class="alineado">Modificar Pincho</h2>
							</div>
							<div class="row separacion">
								<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
									<form class="form-horizontal" role="form">
										<div class="form-group separarformulario">
											<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Nombre</label>
											<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
												<input class="form-control" placeholder="Introduce un nombre...">
											</div>
										</div>
										<div class="form-group separarformulario">
											<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Precio</label>
											<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
												<input class="form-control" placeholder="Introduce un precio...">
											</div>
										</div>
										<div class="form-group separarformulario">
											<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Cocinero</label>
											<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
												<input class="form-control" placeholder="Introduce un cocinero...">
											</div>
										</div>
										<div class="form-group separarformulario">
											<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Ingredientes</label>
											<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
												<textarea class="form-control" placeholder="Introduce algunos de los ingredientes..." rows="3"></textarea>
											</div>
										</div>
										<div class="form-group separarformulario">
											<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Fotografia</label>
											<input type="file" id="ejemplo_archivo_1">
    										<p class="help-block">El tamano maximo permitido es de 3Mb</p>
										</div>
										<div class="form-group separarformulario">
											<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Contraseña</label>
											<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
												<input class="form-control" placeholder="******">
											</div>
										</div>
										<div class="form-group separarformulario">
											<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Repetir Contraseña</label>
											<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
												<input class="form-control" placeholder="******">
											</div>
										</div>
										<button type="button" class="btn btn-primary col-md-offset-4" >Guardar modificación</button>
										<button type="button" class="btn btn-primary " >Cancelar</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
<?php
	include "pie.php";
?>
