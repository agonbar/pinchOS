<?php
include(__DIR__."/../layouts/inicio.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$errors = $view->getVariable("errors");
$premiados = $view->getVariable("premiados");
?>
<!--AQUI EMPIEZA LA VENTANA MODAL DE AÑADIR ALBUM -->
<div class="margensup" >
  <div class="column col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1" >
    <div class="modalbox movedown">
      <div class="row">
        <h2 class="alineado">Listado de Premiados</h2>
        <ul class= "list-inline ">
          <?php
          foreach ($premiados as $premiado){
            echo '<li class= "column col-lg-2 col-md-2 col-sm-4 col-xs-4 col-md-offset-1">';
              echo '<a href="index.php?controller=pincho&action=consultaPincho">';
                echo $premiado["idPrem"];
                echo $premiado["pos"];
                echo '</a>';
                echo '<div class="caption">';
                  echo '<h4>-Nombre del pincho -</h4>';
                  echo '</div>';
                  echo '</li>';
                }?><!-- fin while-->
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!--AQUI TERMINA LA VENTANA MODAL DE AÑADIR ALBUM -->
      <?php
      include(__DIR__."../../layouts/pie.php");
      ?>
