<!DOCTYPE html>
<?php
include "inicio.php"
?>
<div class="margensup" >
	<div class="column col-lg-9 col-md-9 col-sm-12 col-xs-12 col-md-offset-2" >
		<div class="modalbox movedown">
			<div class="row" >
				<h2 class="alineado">Crear Concurso</h2>
			</div>
			<div class="row separacion">
				<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
					<form class="form-horizontal" role="form">
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Nombre</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="Introduce un Nombre...">
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Ciudad</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="Introduce una Ciudad...">
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Fecha</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" type="date">
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Premio</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="Introduce un Premio...">
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Patrocinador</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<input class="form-control" placeholder="Introduce un Patrocinador...">
							</div>
						</div>
						<div class="form-group separarformulario">
							<label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Bases</label>
							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
								<textarea class="form-control" rows="6" placeholder="Introduce las Bases..."></textarea>
								<input type="file" id="archivo_1">
							</div>
						</div>
						<button type="button" class="btn btn-primary col-md-offset-7" >Crear</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include "pie.php";
?>
