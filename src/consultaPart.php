<!DOCTYPE html>
<?php
include "cabecera.php";
include "inicio.php"
?>
<div class="margensup" >
  <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
    <div class="modalbox movedown">
      <div class="row">
        <h2 class="alineado">
          Local X
          <div><img src="./resources/img/participante.jpg" alt="./resources/img/participante.jpg" class="img-thumbnail" height="200" width="200"></div>
        </h2>
      </div>
      <div class="row separacion" >
        <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
          <form class="form-horizontal separarformulario" role="form">
            <div class="form-group alineado ">
              <label class="control-label">Calle: </label>
              <label class=" control-label">Jose Ramón Goteras, 23</label>
            </div>
            <div class="form-group alineado ">
              <label class="control-label">Email: </label>
              <label class=" control-label">somosunbarguay@gmail.com</label>
            </div>

          </form>
        </div>
      </div>
      <div class="row separartabla" >
        <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
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
            <a href="modificacionPart.php" class="btn btn-primary" role="button">Editar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include "pie.php";
?>
