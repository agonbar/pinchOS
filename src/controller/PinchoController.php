<?php
require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/Pincho.php");
require_once(__DIR__."/../controller/DBController.php");

class PinchoController extends DBController {

	private $pincho;
	private $codvoto;

	public function __construct() {
		parent::__construct();

		$this->pincho = new User();
		$this->codvoto = new CodVoto();
		//$this->view->setLayout("welcome");
	}

	$numpinchos =

	function altaPincho(){
		generateIdVote($this->pincho->getIdPi());

		$this->pincho->setIdPi('');
		$this->pincho->setNombrePi();
		$this->pincho->setPrecioPi();
		$this->pincho->setDescripcionPi();
		$this->pincho->setCocineroPi();
		$this->pincho->setNumVotosPi();
		$this->pincho->setFotoPi();
		$this->pincho->setEstadoPi();
		$this->pincho->setNumvotePi();
		$this->pincho->setParticipanteEmail();

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
