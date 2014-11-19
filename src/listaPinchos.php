<!DOCTYPE html>
<?php
include "inicio.php"
?>
<!--AQUI EMPIEZA LA VENTANA MODAL DE AÑADIR ALBUM -->
<div class="margensup" >
	<div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
		<div class="modalbox movedown">
			<div class="row">
				<h2 class="alineado">Listado de Pincho</h2>
			</div>
			<ul class= "list-inline ">
				<?php //bucle que lista los pinchos seleccionados
				$i=0;
				while ($i <= 12){?>
					<li>
						<img src="./resources/img/pincho.jpg" alt="Imagen del Pincho" class="img-thumbnail">
						<div class="caption">
							<h4>-Nombre del pincho -</h4><?php echo $i;?>
							<p>
								<a href="button" class="btn btn-primary col-md-offset-4" role="button">Consultar</a>
							</p>
						</div>
					</li>
					<?php $i++;}?><!-- fin while-->
				</ul>
			</div>
		</div>
	</div>
	<!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
	<?php
	include "pie.php";
	?>
