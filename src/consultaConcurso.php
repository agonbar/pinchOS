<!DOCTYPE html>
<?php
include "cabecera.php";
include "inicio.php"
?>
<!--AQUI EMPIEZA LA VENTANA MODAL DE AÑADIR ALBUM -->
<div class="margensup" >
	<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
		<div class="modalbox movedown">
			<div class="row">
				<h2 class="alineado">Concurso</h2>
			</div>
			<div class="row separacion" >
				<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
					<form class="form-horizontal separarformulario" role="form">
						<div class="form-group alineado ">
							<label class="control-label">Nombre: </label>
							<label class=" control-label">Concurso de Pinchos de Ourense</label>
						</div>
					</form>
					<form class="form-horizontal separarformulario" role="form">
						<div class="form-group alineado ">
							<label class="control-label">Ciudad: </label>
							<label class=" control-label">Ourense</label>
						</div>
					</form>
					<form class="form-horizontal separarformulario" role="form">
						<div class="form-group alineado ">
							<label class="control-label">Fecha: </label>
							<label class=" control-label">12-10-2014</label>
						</div>
					</form>
					<form class="form-horizontal separarformulario" role="form">
						<div class="form-group alineado ">
							<label class="control-label">Premio: </label>
							<label class=" control-label">1er premio 3000€ </label>
						</div>
					</form>
					<form class="form-horizontal separarformulario" role="form">
						<div class="form-group alineado ">
							<label class="control-label">Patrocinador: </label>
							<label class=" control-label">Coca-Cola</label>
						</div>
					</form>
					<form class="form-horizontal separarformulario" role="form">
						<div class="form-group alineado ">
							<label class="control-label">Bases: </label>
							<label class=" control-label">Los mejores pinchos del mundo</label>
						</div>
					</form>
				</div>
			</div>
			<button type="button" class="btn btn-primary col-md-offset-4" >Eliminar concurso</button>
			<button type="button" class="btn btn-primary " >Modificar concurso</button>
		</div>
	</div>
</div>
<!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
<?php
include "pie.php";
?>
