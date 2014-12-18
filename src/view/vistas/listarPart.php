<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$participantes = $view->getVariable("participantes");
$errors = $view->getVariable("errors");
?>
<div class="margensup" >
  <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
    <div class="modalbox movedown">
      <div class="row">
        <h2 class="alineado">Listado de Participante</h2>
        <ul class= "list-inline ">
          <?php foreach ($participantes as $participante): ?>
            <li>
              <a href="index.php?controller=participante&action=consultaParticipante&id=<?=$participante["usuarioEmail"];?>">
                <img src="./resources/img/participantes/<?php echo $participante["fotoP"]; ?>.jpg" alt="./resources/img/participantes/<?php echo $participante["fotoP"]; ?>.jpg" class="img-thumbnail" height="200" width="200">
                <div class="caption">
                  <h4> <?php echo $participante["nombreLocalP"]; ?>
                  </h4>
                </div>
              </a>
            </li>
          <?php endforeach; ?><!-- fin while-->
        </ul>
      </div>
    </div>
  </div>
</div>
<?php
include(__DIR__."../../layouts/pie.php");
?>
