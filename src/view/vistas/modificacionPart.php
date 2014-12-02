<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$participante = $view->getVariable("participante");
$errors = $view->getVariable("errors");
?>
<div class="margensup" >
  <div class="column col-lg-9 col-md-9 col-sm-12 col-xs-12 col-md-offset-2" >
    <div class="modalbox movedown">
      <div class="separa" >
        <h2 class="alineado">Modificar Participante</h2>
      </div>
      <div class="separacion">
        <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
          <form class="form-horizontal" role="form">
            <div class="form-group separarformulario">
              <label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Nombre</label>
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <input class="form-control" placeholder="Marta Perez Perez">
              </div>
            </div>
            <div class="form-group separarformulario">
              <label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Email</label>
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <input class="form-control" placeholder="<?=$participante[0]["usuarioEmail"]?>">
              </div>
            </div>
            <div class="form-group separarformulario">
              <label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Contraseña</label>
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <input class="form-control" placeholder="******">
              </div>
            </div>
            <div class="form-group separarformulario">
              <label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Repetir Contraseña</label>
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <input class="form-control" placeholder="******">
              </div>
            </div>
            <div class="form-group separarformulario">
              <label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Dirección</label>
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <input class="form-control" placeholder="<?=$participante[0]["direccionP"]?>">
              </div>
            </div>
            <div class="form-group separarformulario">
              <label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Telefono</label>
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <input class="form-control" placeholder="<?=$participante[0]["telefonoP"]?>">
              </div>
            </div>
            <div class="form-group separarformulario">
              <label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Nombre Local</label>
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <input class="form-control" placeholder="<?=$participante[0]["nombreLocalP"]?>">
              </div>
            </div>
            <div class="form-group separarformulario">
              <label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Horario</label>
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <input class="form-control" placeholder="<?=$participante[0]["horarioP"]?>">
              </div>
            </div>
            <div class="form-group separarformulario">
              <label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Pagina Web</label>
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <input class="form-control" placeholder="<?=$participante[0]["paginaWebP"]?>">
              </div>
            </div>
            <div class="form-group separarformulario">
              <h2 class="alineado"><div><img src="./resources/img/<?php echo $participante[0]["fotoP"]; ?>.jpg" alt="./resources/img/<?php echo $participante[0]["fotoP"]; ?>.jpg" class="img-thumbnail" height="200" width="200"></div></h2>
              <label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Foto</label>
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <input class="form-control" placeholder="<?=$participante[0]["fotoP"]?>">
              </div>
            </div>
            <button type="button" class="btn btn-primary col-md-offset-5" >Guardar modificación</button>
            <a href="index.php?controller=participante&action=consultar&id=<?=$participante[0]["usuarioEmail"];?>" type="button" class="btn btn-primary " >Cancelar</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include(__DIR__."../../layouts/pie.php");
?>
