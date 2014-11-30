<?php
require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/CodVoto.php");
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

		$pincho = new Pincho();
		$codvoto = new CodVoto();

	}

	public function altaPincho(){
		$currentuser = $_SESSION["currentuser"];

		$ruta="../resources/img/pinchos/";//ruta carpeta donde queremos copiar las imagenes
		//$fotoPiTemp= ;//guarda el directorio temporal en el que se sube la imagen
		//$fotoPi=;//indica el directorio donde se guardaran las imagenes
		//$fotoPiSize =;//nos da el tamaño de la imagen

		$pinchotemp = new Pincho();

		if (isset($_POST["nombrePi"])){

			$numpincho = $pinchotemp->generateIdPi();//devuelve el id del pinchos

			$pinchotemp->setIdPi($numpincho);
			$pinchotemp->setNombrePi($_POST["nombrePi"]);
			$pinchotemp->setPrecioPi($_POST["precioPi"]);
			$pinchotemp->setIngredientesPi($_POST["ingredientesPi"]);
			$pinchotemp->setCocineroPi($_POST["cocineroPi"]);
			$pinchotemp->setFotoPi($ruta.$_FILES['fotoPi']['name'],$_FILES['fotoPi']['tmp_name'], $_FILES['fotoPi']['error']);
			$pinchotemp->setParticipanteEmail($currentuser->getEmailU());

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
		}
		//te redirige para consultar el pincho
		$this->view->render("vistas", "consultaPincho");
	}
	public function bajaPincho(){

	}
	public function validacionInfo(){

	}
	public function modificacionPincho(){

		$this->view->render("vistas", "modificacionPincho");
	}
	public function busquedaPincho(){

	}
	public function consultaPincho(){
		$this->view->render("vistas", "consulta_bajaPincho");
	}
	public function listadoPincho(){
		$this->view->render("vistas", "listaPinchos");
	}
	public function validarPincho(){
		$this->view->render("vistas", "validarPincho");
	}
}
?>
