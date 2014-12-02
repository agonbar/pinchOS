<!DOCTYPE html>
<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$participante = $view->getVariable("participante");
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
              <td>Pincho</td>
              <td>Ingredientes</td>
              <td>Chef</td>
            </tr>
            <tr class="tablehover">
              <td>Bocadito de cielo</td>
              <td>Jamon</td>
              <td>Otilio Manuel</td>
            </tr>
          </table>
          <div class="modalbox movedown">
            <button type="button" class="btn btn-primary col-md-offset-4" >Eliminar</button>
            <a href="index.php?controller=participante&action=modificar&id=<?=$participante[0]["usuarioEmail"]?>" class="btn btn-primary" role="button">Editar</a>
          </div>
      </div>
    </div>
  </div>
</div>
<?php
include(__DIR__."../../layouts/pie.php");
?>
