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
              <form class="form" method="POST" action="index.php?controller=participante&action=buscarParticipante">
                <input class="form-control" value="<?= isset($_POST["datosBusqueda"])?$_POST["datosBusqueda"]:"Selecciona una opción..." ?>" name="datosBusqueda">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-default dropdown-toggle"
                  data-toggle="dropdown">
                  Buscar <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="index.php?controller=participante&action=busquedaParticipante">Buscar por nombre</a></li>
                  <li><a href="index.php?controller=participante&action=busquedaParticipante">Buscar por precio</a></li>
                  <li><a href="index.php?controller=participante&action=busquedaParticipante">Buscar por ingredientes</a></li>
                </form>
              </ul>
            </div>
          </div>
        </div>
      </ul>
      <ul class= "list-inline ">
        <?php foreach ($participantes as $participante): ?>
          <li>
            <a href="index.php?controller=participante&action=consultaParticipante&id=<?=$participante["usuarioEmail"];?>">
              <div><img src="./resources/img/<?php echo $participante["fotoP"]; ?>.jpg" alt="./resources/img/<?php echo $participante["fotoP"]; ?>.jpg" class="img-thumbnail" height="200" width="200"></div>
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
