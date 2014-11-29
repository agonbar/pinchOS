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

	$currentuser = $_SESSION["currentuser"];

	function altaPincho(){

		$ruta="../resources/img/pinchos/";//ruta carpeta donde queremos copiar las imagenes
		$fotoPiTemp=$_FILES['fotoPi']['tmp_name'];//guarda el directorio temporal en el que se sube la imagen
		$fotoPi=$ruta.$_FILES['fotoPi']['name'];//indica el directorio donde se guardaran las imagenes
		$fotoPiSize = $_FILES['fotoPi']['error'];//nos da el tamaño de la imagen

		$numvote =generateIdVote();//devuelve el id del voto ligado a un pincho
		$numpincho = generateIdPi();//devuelve el id del pinchos

		$this->pincho->setIdPi($numpincho);
		$this->pincho->setNombrePi($_POST["codigoP1"]);
		$this->pincho->setPrecioPi($_POST["codigoP1"]);
		$this->pincho->setDescripcionPi($_POST["codigoP1"]);
		$this->pincho->setCocineroPi($_POST["codigoP1"]);
		$this->pincho->setNumVotosPi();
		$this->pincho->setFotoPi($fotoPi,$fotoPiTemp,$fotoPiSize);
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
