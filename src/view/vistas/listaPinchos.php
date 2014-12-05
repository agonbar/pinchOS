<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$view->setVariable("title", "Login");
$errors = $view->getVariable("errors");
$pinchos = $view->getVariable("pinchos");
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
				foreach ($pinchos as $pincho):?>
					<li class= "column col-lg-2 col-md-2 col-sm-4 col-xs-4 col-md-offset-1">

						<a href="index.php?controller=pincho&action=consultaPincho&idPi= <?=$pincho->getIdPi();?>">
							<img src= "<?=$pincho->getFotoPi()?>" alt="Imagen del Pincho" class="img-thumbnail img-responsive">
						</a>
						<div class="caption">
							<h5>- <?=$pincho->getNombrePi()?> -</h5>
						</div>
					</li>
				<?php endforeach;?><!-- fin foreach-->
				</ul>
			</div>
		</div>
	</div>
	<!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
	<?php
	include(__DIR__."../../layouts/pie.php");
	?>
