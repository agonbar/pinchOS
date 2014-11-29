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

		if(!$_SESSION["currentuser"]){
			echo "<script>window.location.replace('index.php?controller=users&action=login');</script>";
		}

		$this->pincho = new Pincho();
		$this->codvoto = new CodVoto();

	}

	$currentuser = $_SESSION["currentuser"];

	function altaPincho(){

		$ruta="../resources/img/pinchos/";//ruta carpeta donde queremos copiar las imagenes
		$fotoPiTemp=$_FILES['fotoPi']['tmp_name'];//guarda el directorio temporal en el que se sube la imagen
		$fotoPi=$ruta.$_FILES['fotoPi']['name'];//indica el directorio donde se guardaran las imagenes
		$fotoPiSize = $_FILES['fotoPi']['error'];//nos da el tamaño de la imagen

		$numpincho = generateIdPi();//devuelve el id del pinchos

		$this->pincho->setIdPi($numpincho);
		$this->pincho->setNombrePi($_POST["nombrePi"]);
		$this->pincho->setPrecioPi($_POST["precioPi"]);
		$this->pincho->setIngredientesPi($_POST["ingredientesPi"]);
		$this->pincho->setCocineroPi($_POST["cocineroPi"]);
		$this->pincho->setFotoPi($fotoPi,$fotoPiTemp,$fotoPiSize);
		$this->pincho->setParticipanteEmail($currentuser->getEmailU());

		//Hace todas las coprobaciones a la informacion introducida por el usuario
		$pincho->checkInfoIfNull();
		$pincho->checkInfo();
		$pincho->idExists();

		if ( ( !$pincho->votoExist() ) ){
			//comprueba si no se haya producido ningun error
			if (!sizeof($errors)>0){
				/*Si no es asi, guarda las votaciones en la base de datos*/
				$codvoto->save4();//los codigos de votos de un pincho deben crearse ANTES que el pincho
				$pincho->save();

				//mensaje de confirmación y redirige al metodo consultarPincho del controlador PinchoController
				echo "<script> alert('Pincho registrado correctamente'); </script>";
				echo "<script>window.location.replace('index.php?controller=pincho&action=consultaPincho');</script>";

			}else{ $this->view->setVariable("errors", $errors);}
		}

		//te redirige para consultar el pincho
		$this->view->render("vistas", "consultaPincho");
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
