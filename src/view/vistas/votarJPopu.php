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
				<h2 class="alineado">Votar Jurado Popular</h2>
			</div>
			<div class="row separacion">
				<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
					<form class="form-horizontal" method="POST"  href="index.php?controller=popular&action=votar">
						<div class="form-group separarformulario">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Código del pincho 1</label>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="Introduce un código..." name="codigoP1">
								<?= isset($errors["codigoP1"])?$errors["codigoP1"]:"" ?><br>
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Puntuación del pincho 1</label>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
								<select class="form-control" name="puntuacionP1">
									<option value="N">Introduce la puntuación...</option>
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<?= isset($errors["valoracionV"])?$errors["valoracionV"]:"" ?><br>
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Código del pincho 2</label>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="Introduce un código..." name="codigoP2">
								<?= isset($errors["codigoP2"])?$errors["codigoP2"]:"" ?><br>
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Puntuación del pincho 2</label>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
								<select class="form-control" name="puntuacionP2">
									<option value="N">Introduce la puntuación...</option>
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<?= isset($errors["valoracionV"])?$errors["valoracionV"]:"" ?><br>
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Código del pincho 3</label>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="Introduce un código..." name="codigoP3">
								<?= isset($errors["codigoP3"])?$errors["codigoP3"]:"" ?><br>
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Puntuación del pincho 3</label>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
								<select class="form-control" name="puntuacionP3">
									<option value="N">Introduce la puntuación...</option>
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<?= isset($errors["valoracionV"])?$errors["valoracionV"]:"" ?><br>
							</div>
						</div>

						<input type="submit" class="btn btn-primary col-md-offset-5" value="Guardar votos" >
						<a href="index.php?controller=concurso&action=consultarConcurso" type="button" class="btn btn-primary " >Cancelar</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include(__DIR__."/../layouts/pie.php");
?>
