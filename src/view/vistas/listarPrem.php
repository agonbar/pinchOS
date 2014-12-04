<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$errors = $view->getVariable("errors");
$premiadosPop = $view->getVariable("premiadosPop");
$premiadosPro = $view->getVariable("premiadosPro");
?>
<!--AQUI EMPIEZA LA VENTANA MODAL DE AÑADIR ALBUM -->
<div class="margensup" >
  <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
    <div class="modalbox movedown">
      <div class="row">
        <h2 class="alineado">Listado de Premiados Populares</h2>
        <ul class= "list-inline ">
          <?php foreach ($premiadosPop as $premiado): ?>
            <li>
              <a href="index.php?controller=pincho&action=consultaPincho&id=<?=$premiado["idPi"];?>">
                <div><img src="<?php echo $premiado["fotoPi"]; ?>.jpg" alt="./resources/img/<?php echo $premiado["fotoPi"]; ?>.jpg" class="img-thumbnail" height="200" width="200"></div>
                <div class="caption">
                  <h4> <?php echo $premiado["nombrePi"]; ?>
                  </h4>
                </a>
              </div>
            </li>
          <?php endforeach; ?><!-- fin while-->
        </ul>
        <h2 class="alineado">Listado de Premiados Profesionales</h2>
        <ul class= "list-inline ">
          <?php foreach ($premiadosPro as $premiado): ?>
            <li>
              <a href="index.php?controller=pincho&action=consultaPincho&id=<?=$premiado["idPi"];?>">
                <div><img src="./resources/img/<?php echo $premiado["fotoPi"]; ?>.jpg" alt="./resources/img/<?php echo $premiado["fotoPi"]; ?>.jpg" class="img-thumbnail" height="200" width="200"></div>
                <div class="caption">
                  <h4> <?php echo $premiado["nombrePi"]; ?>
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
