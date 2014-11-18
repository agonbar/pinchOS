<!DOCTYPE html>
<?php
include "cabecera.php";
include "inicio.php"
?>
<div class="margensup" >
  <div class="column col-lg-9 col-md-9 col-sm-12 col-xs-12 col-md-offset-2" >
    <div class="modalbox movedown">
      <div class="row" >
        <h2 class="alineado">Crear Participante</h2>
      </div>
      <div class="row separacion">
        <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
          <form class="form-horizontal" role="form">
            <div class="form-group separarformulario">
              <label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Email</label>
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <input class="form-control" placeholder="Introduce un email...">
              </div>
            </div>
            <div class="form-group separarformulario">
              <label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Nombre</label>
              <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <input class="form-control" placeholder="Introduce un Nombre...">
              </div>
            </div>
            <div class="form-group separarformulario">
              <label class="col-lg-2 col-md-2 col-sm-2 col-xs-12 control-label">Contraseña</label>
              <button type="button" class="btn btn-primary" >Generar contraseña</button>
              <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <input class="form-control" placeholder="Generar contraseña...">
              </div>
            </div>
            <button type="button" class="btn btn-primary col-md-offset-6" >Añadir</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include "pie.php";
?>
