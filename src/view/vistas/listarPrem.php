<!DOCTYPE html>
<?php
include(__DIR__."/../layouts/inicio.php");
?>
<!--AQUI EMPIEZA LA VENTANA MODAL DE AÑADIR ALBUM -->
<div class="margensup" >
  <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
    <div class="modalbox movedown">
      <div class="row">
        <h2 class="alineado">Listado de Premiados</h2>
      </div>
      <ul class= "list-inline ">
        <?php //bucle que lista los participantes seleccionados
        $i=0;
        while ($i <= 2){?>
          <li>
            <img src="./resources/img/pincho.jpg" alt="./resources/img/pincho.jpg" class="img-thumbnail" height="200" width="200">
            <div class="caption">
              <h4>-Nombre del participante <?php echo $i;?>-</h4>
              <p>
                <a href="consultaPart.php" class="btn btn-primary col-md-offset-4" role="button">Consultar</a>
              </p>
            </div>
          </li>
          <?php $i++;}?><!-- fin while-->
        </ul>
      </div>
    </div>
  </div>
  <!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
  <?php
  include(__DIR__."/../layouts/pie.php");
  ?>
