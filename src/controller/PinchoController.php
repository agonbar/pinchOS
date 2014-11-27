<?php
require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/Pincho.php");
require_once(__DIR__."/../controller/DBController.php");

class PinchoController extends DBController {

	function altaPincho(){

	}
	function bajaPincho(){

	}
	function validacionInfo(){

	}
	function modificacionPincho(){

		$this->view->render("vistas", "modificacionPincho");
	}
	function busquedaPincho(){

	}
	function consultaPincho(){
		$this->view->render("vistas", "consulta_bajaPincho");
	}
	function listadoPincho(){
		$this->view->render("vistas", "listaPinchos");
	}
	function validarPincho(){
		$this->view->render("vistas", "validarPincho");
	}
}
?>
