<!DOCTYPE html>
<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$participantes = $view->getVariable("participantes");
$errors = $view->getVariable("errors");
?>
<!--AQUI EMPIEZA LA VENTANA MODAL DE AÑADIR ALBUM -->
<div class="margensup" >
  <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
    <div class="modalbox movedown">
      <div class="row">
        <h2 class="alineado">Participantes</h2>

        <ul>
          <div class="col-lg-12">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Introcuce filtro para la busqueda...">
              <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle"
                data-toggle="dropdown">
                Buscar <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right" role="menu">
                <li><a href="#">Buscar por nombre</a></li>
                <li><a href="#">Buscar por precio</a></li>
                <li><a href="#">Buscar por ingredientes</a></li>
              </ul>
            </div>
          </div>
        </div>
      </ul>
      <ul class= "list-inline ">
        <?php foreach ($participantes as $participante): ?>
          <li>
            <a href="index.php?controller=participante&action=consultar&id=<?=$participante["usuarioEmail"];?>">
              <div><img src="./resources/img/<?php echo $participante["fotoP"]; ?>.jpg" alt="./resources/img/<?php echo $participante["fotoP"]; ?>.jpg" class="img-thumbnail img-responsive" height="200" width="200"></div>
              <div class="caption">
                <h4> <?php echo $participante["nombreLocalP"]; ?>
                </h4>
              </a>
            </div>
          </li>
        <?php endforeach; ?><!-- fin while-->
      </ul>
    </div>
  </div>
</div>
</div>
<!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
<?php
include(__DIR__."../../layouts/pie.php");
?>
