<?php
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/CodVoto.php");
require_once(__DIR__."/../model/Pincho.php");
require_once(__DIR__."/../core/ViewManager.php");
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

	public function altaPincho(){
		$currentuser = $_SESSION["currentuser"];

		$ruta="../resources/img/pinchos/";//ruta carpeta donde queremos copiar las imagenes

		$pinchotemp = new Pincho();

		if (!isset($_POST["nombrePi"])){

			$numpincho = $pinchotemp->generateIdPi();//devuelve el id del pinchos

			$pinchotemp->setIdPi($numpincho);
			$pinchotemp->setNombrePi($_POST["nombrePi"]);
			$pinchotemp->setPrecioPi($_POST["precioPi"]);
			$pinchotemp->setIngredientesPi($_POST["ingredientesPi"]);
			$pinchotemp->setCocineroPi($_POST["cocineroPi"]);
			$pinchotemp->setFotoPi($ruta.$_FILES['fotoPi']['name'], $_FILES['fotoPi']['error']);
			$pinchotemp->setParticipanteEmail($currentuser->getEmailU());

			//Hace todas las coprobaciones a la informacion introducida por el usuario
			$pinchotemp->checkInfoIfNull();
			$pinchotemp->checkInfo();

			if ( ( !$pinchotemp->pinchoExist() ) ){
				//comprueba que no se haya producido ningun error
				if (!sizeof($errors)>0){
					/*Si no es asi, guarda las votaciones en la base de datos*/

					$fotoPiTemp = $_FILES['fotoPi']['tmp_name'];
					$fotoPi = $ruta.$_FILES['fotoPi']['name'];
					move_uploaded_file($fotoPiTemp,$fotoPi);//pasa
					$pinchotemp->numVotosPi = 0;//inicializa a 0 el numero de votos que se le dio a este pincho
					$pinchotemp->estadoPi = "1";//inicializa a true el estado del pincho
					$pinchotemp->numvotePi = $pinchotemp->countvotePi();//indica el numero de codigos de votos
					$codvoto->save4();//los codigos de votos de un pincho deben crearse ANTES que el pincho
					$pinchotemp->save();

					//mensaje de confirmación y redirige al metodo consultarPincho del controlador PinchoController
					echo "<script> alert('Pincho registrado correctamente'); </script>";
					echo "<script>window.location.replace('index.php?controller=pincho&action=consultaPincho');</script>";

				}else{ $this->view->setVariable("errors", $errors);}
			}
		}
		else{
			$error = array();
			$errors["nombrePi"] = "El nombre del pincho ya existe en la base de datos";
		}

		$pinchotemp = $this->pincho->showDates();

		// Guarda el valor de la variable $pincho en la variable pincho accesible desde la vista
		$this->view->setVariable("pincho", $pinchotemp);

		$this->view->render("vistas", "consultaBajaPincho");//te redirige para consultar el pincho
	}
	public function bajaPincho(){

	}
	public function validacionInfo(){

	}
	public function modificacionPincho(){

		$this->view->render("vistas", "modificacionPincho");
	}
	public function busquedaPincho(){
		$this->view->render("vistas", "buscarPinchos");
	}
	public function consultaPincho(){
		$pinchotemp = $this->pincho->showDates();
		$this->view->setVariable("pincho", $pinchotemp);
		$this->view->render("vistas", "consultaBajaPincho");
	}
	public function listadoPincho(){
		$this->view->render("vistas", "listaPinchos");
	}
	public function validarPincho(){
		$this->view->render("vistas", "validarPincho");
	}
}
?>
