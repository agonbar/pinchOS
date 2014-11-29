<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$view->setVariable("title", "Login");
$errors = $view->getVariable("errors");
$concurso = $view->getVariable("concu");
?>
<!--AQUI EMPIEZA LA VENTANA MODAL DE AÑADIR ALBUM -->
<div class="margensup" >
  <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
    <div class="modalbox movedown">
      <div class="row">
        <h2 class="alineado">Concurso</h2>
      </div>
      <div class="row separacion" >
        <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
          <form class="form-horizontal separarformulario" role="form">
            <div class="form-group alineado ">
              <label class="control-label">Nombre: </label>
              <label class=" control-label"><?=$concurso->getNombreC()?></label>
            </div>
          </form>
          <form class="form-horizontal separarformulario" role="form">
            <div class="form-group alineado ">
              <label class="control-label">Ciudad: </label>
              <label class=" control-label"><?=$concurso->getCiudadC()?></label>
            </div>
          </form>
          <form class="form-horizontal separarformulario" role="form">
            <div class="form-group alineado ">
              <label class="control-label">Fecha: </label>
              <label class=" control-label"><?=$concurso->getFechaC()?></label>
            </div>
          </form>
          <form class="form-horizontal separarformulario" role="form">
            <div class="form-group alineado ">
              <label class="control-label">Premio: </label>
              <label class=" control-label"><?=$concurso->getPremioC()?></label>
            </div>
          </form>
          <form class="form-horizontal separarformulario" role="form">
            <div class="form-group alineado ">
              <label class="control-label">Patrocinador: </label>
              <label class=" control-label">patrocinador</label>
            </div>
          </form>
          <form class="form-horizontal separarformulario" role="form">
            <div class="form-group alineado ">
              <label class="control-label">Bases: </label>
              <label class=" control-label"><?=$concurso->getBasesC()?></label>
            </div>
          </form>
        </div>
      </div>
      <a href="index.php?controller=concurso&action=modificarConcurso" type="button" class="btn btn-primary col-md-offset-5" >Modificar concurso</a>
    </div>
  </div>
</div>
<!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
<?php

include(__DIR__."../../layouts/pie.php");

?>
