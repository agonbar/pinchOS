<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$errors = $view->getVariable("errors");
?>
<div class="margensup" >
	<div class="column col-lg-9 col-md-9 col-sm-12 col-xs-12 col-md-offset-2" >
		<div class="modalbox movedown">
			<div class="row" >
				<h2 class="alineado">Crear Concurso</h2>
			</div>
			<div class="row separacion">
				<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
					<form class="form-horizontal" method="POST" action="index.php?controller=concurso&action=registro">
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Nombre</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input type="text" class="form-control" placeholder="Introduce un Nombre..." name="nombreC">
								<?= isset($errors["nombreC"])?$errors["nombreC"]:"" ?><br>
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Ciudad</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input type="text" class="form-control" placeholder="Introduce una Ciudad..." name="ciudadC">
								<?= isset($errors["ciudadC"])?$errors["ciudadC"]:"" ?><br>
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Fecha de Inicio</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" type="date" name="fechaInicioC">
								<?= isset($errors["fechaInicioC"])?$errors["fechaInicioC"]:"" ?><br>
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Fecha de Finalización</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" type="date" name="fechaFinalC">
								<?= isset($errors["fechaFinalC"])?$errors["fechaFinalC"]:"" ?><br>
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Fecha de Finalistas</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" type="date" name="fechaFinalistasC">
								<?= isset($errors["fechaFinalistasC"])?$errors["fechaFinalistasC"]:"" ?><br>
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Premio</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input type="text" class="form-control" placeholder="Introduce un Premio..." name="premioC">
								<?= isset($errors["premioC"])?$errors["premioC"]:"" ?><br>
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Patrocinador</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input type="text" class="form-control" placeholder="Introduce un Patrocinador..." name="patrocinadorC">
								<?= isset($errors["patrocinadorC"])?$errors["patrocinadorC"]:"" ?><br>
							</div>
						</div>
				<div class="form-group separarformulario">
					<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Bases</label>
					<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
						<textarea class="form-control" rows="6" placeholder="Introduce las Bases..." name="basesC"></textarea>
						<input type="file" id="archivo_1" name="basesC">
						<?= isset($errors["basesC"])?$errors["basesC"]:"" ?><br>
					</div>
				</div>
				<input type="submit" class="btn btn-primary col-md-offset-7" value="Crear">
			</form>
		</div>
	</div>
</div>
</div>
</div>
<?php
include(__DIR__."../../layouts/pie.php");
?>
