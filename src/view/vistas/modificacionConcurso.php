<!DOCTYPE html>
<?php
 include(__DIR__."/../layouts/inicio.php");
 require_once(__DIR__."/../../core/ViewManager.php");
 $view = ViewManager::getInstance();
 $view->setVariable("title", "Login");
 $errors = $view->getVariable("errors");
 $concurso = $view->getVariable("concu");
?>
<div class="margensup" >
	<div class="column col-lg-9 col-md-9 col-sm-12 col-xs-12 col-md-offset-2" >
		<div class="modalbox movedown">
			<div class="row " >
				<h2 class="alineado">Modificar Concurso</h2>
			</div>
			<div class="row separacion">
				<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
					<form class="form-horizontal" method="POST" action="index.php?controller=concurso&action=modificarConcurso">
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Nombre</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="<?=$concurso->getNombreC()?>" name="nombreC">
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Ciudad</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="<?=$concurso->getCiudadC()?>" name="ciudadC">
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Fecha</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" type="date" name="fechaC">
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Premio</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="<?=$concurso->getPremioC()?>" name="premioC">
							</div>
						</div>
						<!--<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Patrocinador</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="Coca-Cola" name="">
							</div>
						</div>-->
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Bases</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<textarea class="form-control" rows="6" placeholder="<?=$concurso->getBasesC()?>" name="basesC"></textarea>
								<input type="file" id="archivo_1">
							</div>
						</div>
						<input type="submit" class="btn btn-primary col-md-offset-5" value="Guardar modificación">
						<a href="index.php?controller=concurso&action=consultarConcurso" type="button" class="btn btn-primary " >Cancelar</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include(__DIR__."../../layouts/pie.php");
?>
