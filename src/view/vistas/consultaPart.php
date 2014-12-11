<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$participante = $view->getVariable("participante");
$pinchos = $view->getVariable("participantePinchos");
$errors = $view->getVariable("errors");
$currentuser = $view->getVariable("currentusername");
?>
<div class="margensup" >
  <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
    <div class="modalbox movedown">
      <h2 class="alineado">
        <?php echo $participante[0]["nombreLocalP"]; ?>
        <div><img src="./resources/img/participantes/<?php echo md5($participante[0]["nombreLocalP"]); ?>.jpg" alt="./resources/img/participantes/<?php echo md5($participante[0]["nombreLocalP"]); ?>.jpg" class="img-thumbnail" height="200" width="200"></div>
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
          <div class="form-group alineado ">
            <label class="control-label">Web: </label>
            <label class=" control-label"><?php echo $participante[0]["paginaWebP"]; ?></label>
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
          <?php
          if($pinchos==null){echo"no tienes pinchos";}else{
          foreach ($pinchos as $pincho): ?>
            <a href="pincho.php">
              <tr class="tablehover">
                <td><img src="<?php echo $pincho["fotoPi"]; ?>" alt="./resources/img/participantes/<?php echo $pincho["fotoPi"]; ?>.jpg" class="img-thumbnail" height="50" width="50"></td>
                <td><?php echo $pincho["nombrePi"]; ?></td>
                <td><?php echo $pincho["precioPi"]; ?>€</td>
                <td><?php echo $pincho["ingredientesPi"]; ?></td>
                <td><?php echo $pincho["cocineroPi"]; ?></td>
              </tr>
            </a>
        <?php endforeach; }?>
      </table>
        <?php if ($currentuser->getEmailU() == $participante[0]["usuarioEmail"]) { ?>
          <div class="modalbox movedown">
            <a href="index.php?controller=participante&action=bajaParticipante&id=<?=$participante[0]["usuarioEmail"]?>" class="btn btn-primary" role="button">Eliminar</a>
            <a href="index.php?controller=participante&action=modificarParticipante&id=<?=$participante[0]["usuarioEmail"]?>" class="btn btn-primary" role="button">Editar</a>
            <a href="index.php?controller=pincho&action=altaPincho" class="btn btn-primary" role="button">Crear Pincho</a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include(__DIR__."../../layouts/pie.php");
?>
