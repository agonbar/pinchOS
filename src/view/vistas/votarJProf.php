<!DOCTYPE html>
<?php
include(__DIR__."/../layouts/inicio.php");
?>
<div class="margensup" >
	<div class="column col-lg-9 col-md-9 col-sm-12 col-xs-12 col-md-offset-2" >
		<div class="modalbox movedown">
			<div class="row" >
				<h2 class="alineado">Votar Jurado Profesional</h2>
			</div>
			<div class="row separacion">
				<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
					<form class="form-horizontal" role="form">
						<div class="form-group separarformulario">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Código del pincho</label>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="Introduce un código...">
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Puntuación</label>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
								<select class="form-control">
									<option>Introduce la puntuación...</option>
									<option>0</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
								</select>
							</div>
						</div>

						<button type="button" class="btn btn-primary col-md-offset-5" >Guardar voto</button>
						<button type="button" class="btn btn-primary " >Cancelar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include(__DIR__."../../layouts/pie.php");
?>
