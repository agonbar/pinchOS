<!DOCTYPE html>
<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
//$participantes = $view->getVariable("participantes");
?>
<!--AQUI EMPIEZA LA VENTANA MODAL DE AÑADIR ALBUM -->
<div class="margensup" >
  <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
    <div class="modalbox movedown">
      <div class="row">
        <h2 class="alineado">Listado de Participante</h2>
      </div>
      <ul class= "list-inline ">
        <?php
        while ($participantes as $participante){ ?>
          <li>
            <a href="index.php?controller=participante&action=consultar"?> <!--&id=<?=$participante->getEmail()?>"> -->
              <img src="./resources/img/participante.jpg" alt="./resources/img/participante.jpg" class="img-thumbnail" height="200" width="200">
              <div class="caption">
                <h4><!--<? $participante->getEmail() ?> -->-</h4>
              </a>
            </div>
          </li>
          <? } ?><!-- fin while-->
        </ul>
      </div>
    </div>
  </div>
  <!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
  <?php
  include(__DIR__."../../layouts/pie.php");
  ?>
