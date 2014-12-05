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
              <form class="form-horizontal" role="form" method="POST" action="index.php?controller=participante&action=busquedaParticipante">
                <div class="form-group separarformulario">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <input class="form-control" placeholder="Introduce nombre del participante..." name="datosBusqueda">
                  </div>
                </ul>
                <ul class= "list-inline ">
                  <?php
                  if ($participantes == NULL) {
                    echo "No hemos encontrado participantes para tu búsqueda";
                  }
                  foreach ($participantes as $participante): ?>
                    <li>
                      <a href="index.php?controller=participante&action=consultaParticipante&id=<?=$participante["usuarioEmail"];?>">
                        <div><img src="./resources/img/participantes/<?php echo md5($participante["nombreLocalP"]); ?>.jpg" alt="./resources/img/participantes/<?php echo md5($participante["nombreLocalP"]) ?>.jpg" class="img-thumbnail" height="200" width="200"></div>
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
        </ul>
      </div>
    </div>
  </div>
</div>
<!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
<?php
include(__DIR__."../../layouts/pie.php");
?>
