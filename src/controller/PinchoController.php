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

		$pinchotemp = new Pincho();
		$currentuser = $_SESSION["currentuser"];

		if($currentuser){//commprueba que el usuario esta logeado
		$ruta="../resources/img/pinchos/";//ruta carpeta donde queremos copiar las imagenes
		$numpincho = $pinchotemp->generateIdPi();//devuelve el id del pinchos
		$nombrePi = $_POST["nombrePi"];
		$fotoPiTemp = $_FILES['fotoPi']['tmp_name'];
		$fotoPi = $ruta.$_FILES['fotoPi']['name'];

		$pinchotemp->setIdPi($numpincho);
		$pinchotemp->setNombrePi($nombrePi);
		$pinchotemp->setPrecioPi($_POST["precioPi"]);
		$pinchotemp->setIngredientesPi($_POST["ingredientesPi"]);
		$pinchotemp->setCocineroPi($_POST["cocineroPi"]);
		$pinchotemp->setFotoPi($fotoPi, $fotoPiTemp);
		$pinchotemp->setParticipanteEmail($currentuser->getEmailU());

		try{
			//Hace todas las coprobaciones a la informacion introducida por el usuario
			$pinchotemp->checkInfoIfNull();
			$pinchotemp->checkInfo();

			if ( ( !$pinchotemp->pinchoExists() ) ){
				//comprueba que no se haya producido ningun error
				if (!sizeof($errors)>0){
					/*Si no es asi, guarda las votaciones en la base de datos*/

					move_uploaded_file($fotoPiTemp,$fotoPi);//pasa
					$pinchotemp->numvotosPopPi = 0;//inicializa a 0 el numero de votos dados por el JPopular
					$pinchotemp->numvotosProfPi = 0;//inicializa a 0 el numero de votos dados por el JProfesional
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
		catch(ValidationException $ex){
			$errors = $ex->getErrors();
			$this->view->setVariable("errors", $errors);
		}

		$pinchotemp = $this->pincho->showDates();

		// Guarda el valor de la variable $pincho en la variable pincho accesible desde la vista
		$this->view->setVariable("pincho", $pinchotemp);

		$this->view->render("vistas", "consultaBajaPincho");//te redirige para consultar el pincho
	}
	}
	public function bajaPincho(){

	}
	public function validacionInfo(){

	}
	public function modificacionPincho(){
		$pinchotemp = $this->pincho->showDates();
		$this->view->setVariable("pincho", $pinchotemp);
		$this->view->render("vistas", "modificacionPincho");
	}
	public function busquedaPincho(){
		$pinchotemp = $this->pincho->showDates();
		$this->view->setVariable("pincho", $pinchotemp);
		$this->view->render("vistas", "buscarPinchos");
	}
	public function consultaPincho(){
		$pinchotemp = $this->pincho->showDates();
		$this->view->setVariable("pincho", $pinchotemp);
		$this->view->render("vistas", "consultaBajaPincho");
	}
	public function listadoPincho(){
		$arrayPinchos = $this->pincho->list();
		while ($i <= 12){
			
			$i++;
		}
		$pinchotemp = $this->pincho->showDates();
		$this->view->setVariable("pincho", $pinchotemp);
		$this->view->render("vistas", "listaPinchos");
	}
	public function consultaPremiados(){
		$pinchotemp = $this->pincho->listarPrem();
		$this->view->setVariable("premiados", $pinchotemp);
		$this->view->render("vistas", "listarPrem");
	}
	public function validarPincho(){
		$pinchotemp = $this->pincho->showDates();
		$this->view->setVariable("pincho", $pinchotemp);
		$this->view->render("vistas", "validarPincho");
	}
}
?>
