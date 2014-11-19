<!DOCTYPE html>
<html lang="en">
<?php
include "cabecera.php";
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
					<form class="form col-md-12 center-block">
						<div class="form-group">
							<input type="text" class="form-control input-lg" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" class="form-control input-lg" placeholder="Contraseña">
						</div>
						<div class="form-group">
							<a href="inicio.php"
							<input type="submit" class="btn btn-primary btn-lg btn-block" value="Entrar">
							Entrar
						</a>
						<span class="pull-right"><a href="registro.php">Registrate!</a></span>
					</div>
				</form>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
</body>
</html>
