<!DOCTYPE html>
<html lang="es">
<?php
include(__DIR__."/../layouts/cabecera.php");
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();
$errors = $view->getVariable("errors");
?>
<body>
  <!--login modal-->
  <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Login</h1>
        </div>
        <div class="modal-body">
          <form class="form col-md-12 center-block" method="POST" action="index.php?controller=users&action=login">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Email" name="email"> <?= isset($errors["email"])?$errors["email"]:"" ?><br>
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Contraseña" name="password">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-lg btn-block" value="Entrar">
              <span class="pull-right"><a href="index.php?controller=users&action=registro">Registrate!</a></span>
            </div>
          </form>
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
  </div>
</body>
</html>
