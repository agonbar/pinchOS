<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$participante = $view->getVariable("participante");
$pinchos = $view->getVariable("participantePinchos");
$errors = $view->getVariable("errors");
?>
<div class="margensup" >
  <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
    <div class="modalbox movedown">
      <h2 class="alineado">
        <?php echo $participante[0]["nombreLocalP"]; ?>
        <div><img src="./resources/img/<?php echo $participante[0]["fotoP"]; ?>.jpg" alt="./resources/img/<?php echo $participante[0]["fotoP"]; ?>.jpg" class="img-thumbnail" height="200" width="200"></div>
      </h2>
      <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
        <form class="form-horizontal separarformulario" role="form">
          <div class="form-group alineado ">
            <label class="control-label">Dirección: </label>
            <label class=" control-label"><?php echo $participante[0]["direccionP"]; ?></label>
          </div>
          <div class="form-group alineado ">
            <label class="control-label">Email: </label>
            <label class=" control-label"> <?php echo $participante[0]["usuarioEmail"]; ?> </label>
          </div>
          <div class="form-group alineado ">
            <label class="control-label">Horario: </label>
            <label class=" control-label"><?php echo $participante[0]["horarioP"]; ?></label>
          </div>
          <div class="form-group alineado ">
            <label class="control-label">Telefono: </label>
            <label class=" control-label"><?php echo $participante[0]["telefonoP"]; ?></label>
          </div>
        </form>
        <table class="table alineado ">
          <!-- Aplicadas en las filas -->
          <tr class="activa">
            <td></td>
            <td>Pincho</td>
            <td>Precio</td>
            <td>Ingredientes</td>
            <td>Chef</td>
          </tr>
          <?php foreach ($pinchos as $pincho): ?>
            <a href="pincho.php">
              <tr class="tablehover">
                <td><img src="./resources/img/<?php echo $pincho["fotoPi"]; ?>.jpg" alt="./resources/img/<?php echo $pincho["fotoPi"]; ?>.jpg" class="img-thumbnail" height="50" width="50"></td>
                <td><?php echo $pincho["nombrePi"]; ?></td>
                <td><?php echo $pincho["precioPi"]; ?>€</td>
                <td><?php echo $pincho["ingredientesPi"]; ?></td>
                <td><?php echo $pincho["cocineroPi"]; ?></td>
              </tr>
            </a>
          </table>
        <?php endforeach; ?>
        <div class="modalbox movedown">
          <a href="index.php?controller=participante&action=bajaParticipante&id=<?=$participante[0]["usuarioEmail"]?>" class="btn btn-primary" role="button">Eliminar</a>
          <a href="index.php?controller=participante&action=modificarParticipante&id=<?=$participante[0]["usuarioEmail"]?>" class="btn btn-primary" role="button">Editar</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include(__DIR__."../../layouts/pie.php");
?>
