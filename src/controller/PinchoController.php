<?php
require_once(__DIR__."/../model/Pincho.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/CodVoto.php");
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
		$codvototemp = new CodVoto();
		$currentuser = $_SESSION["currentuser"];

		if($currentuser){//commprueba que el usuario esta logeado

			if(isset($_POST["nombrePi"])) {
				$fotoPiSize = $_FILES['fotoPi']['size'];
				print_r($fotoPiSize);die();
				if(!$pinchotemp->pinchoExists($currentuser->getEmailU())){//compueba si este participante ya metio algun pincho
					//print_r($currentuser);die();
					$ruta="../src/resources/img/pinchos/";//ruta carpeta donde queremos copiar las imagenes
					$numpincho = $pinchotemp->generateIdPi();//devuelve el id del pinchos
					//print_r($numpincho);die();
					$fotoPiSize = $_FILES['fotoPi']['size'];
					print_r($fotoPiSize);die();
					$fotoPi = $ruta.$_FILES['fotoPi']['name'];
					$fotoPiTemp = $_FILES['fotoPi']['tmp_name'];
					move_uploaded_file($fotoPiTemp,$fotoPi);//pasa la foto de la carpeta temporal a la del servidor web

					$pinchotemp->setFotoPi($fotoPi, $fotoPiSize);
					$pinchotemp->setNumVotosPopPi(0);//inicializa a 0 el numero de votos dados por el JPopular
					$pinchotemp->setnumvotosProfPi(0);//inicializa a 0 el numero de votos dados por el JProfesional
					$pinchotemp->setEstadoPi("0");//inicializa a true el estado del pincho
					$pinchotemp->setNumVotePi($pinchotemp->countvotePi());//indica el numero de codigos de votos
					$pinchotemp->setIdPi($numpincho);
					$pinchotemp->setNombrePi($_POST["nombrePi"]);
					$pinchotemp->setPrecioPi($_POST["precioPi"]);
					$pinchotemp->setIngredientesPi($_POST["ingredientesPi"]);
					$pinchotemp->setCocineroPi($_POST["cocineroPi"]);
					$pinchotemp->setParticipanteEmail($currentuser->getEmailU());

					//Hace todas las coprobaciones a la informacion introducida por el usuario
					$pinchotemp->checkInfoIfNullPi();
					$pinchotemp->checkInfoPi();

					try{
						//die();
						$codvototemp->genSaveCV($numpincho);//los codigos de votos de un pincho deben crearse ANTES que el pincho

						$pinchotemp->savePi();

						//mensaje de confirmación y redirige al metodo consultarPincho del controlador PinchoController
						echo "<script> alert('Pincho registrado correctamente'); </script>";
						echo "<script>window.location.replace('index.php?controller=pincho&action=consultaPincho');</script>";
					}
					catch(ValidationException $ex){
						$errors = $ex->getErrors();
						$this->view->setVariable("errors", $errors);
					}

					$pinchotemp = $this->pincho->showDates();

					// Guarda el valor de la variable $pincho en la variable pincho accesible desde la vista
					$this->view->setVariable("pincho", $pinchotemp);
				}
				else{//si ya habia un pincho creado por ese participante
					echo "<script> alert('Ya has creado un pincho'); </script>";
					echo "<script>window.location.replace('index.php?controller=pincho&action=consultaPincho');</script>";
				}
			}

			$this->view->render("vistas", "altaPincho");//te redirige para consultar el pincho
		}
	}
	public function bajaPincho(){
		$pinchotemp = $this->pincho->showDatesPi();
		$this->view->setVariable("pincho", $pinchotemp);

		$currentuser = $_SESSION["currentuser"];

		echo "<script> confirmar=confirm('¿Esta seguro de que desea dar de BAJA este pincho?');
		if (confirmar)
		alert('El pincho se ha dado de BAJA correctamente');// si pulsamos en aceptar</script>";
		if($currentuser){//commprueba que el usuario esta logeado
			$pinchotemp->setEstadoPi("0");
			$pinchotemp->updatePi();
		}
		//echo "<script> alert('El pincho se ha dado de BAJA correctamente'); </script>";
		echo "<script> else
		alert('El pincho NO se ha dado de BAJA'); // si pulsamos en cancelar</script>";

		echo "<script>window.location.replace('index.php?controller=pincho&action=consultaPincho');</script>";
	}
	public function modificacionPincho(){

		$pinchotemp = $this->pincho->showDatesPi();
		$this->view->setVariable("pincho", $pinchotemp);
		$this->view->render("vistas", "modificacionPincho");
	}
	public function busquedaPincho(){

			print_r($bnombrePi);die();
			//$arrayPinchos = $this->pincho->searchPrize();
			//$arrayPinchos = $this->pincho->searchName();

		$arrayPinchos = $this->pincho->listarPi();

		$this->view->setVariable("pinchos", $arrayPinchos);
		$this->view->render("vistas", "buscarPinchos");
	}
	public function consultaPincho(){
		$pinchotemp = $this->pincho->showDatesPi();
		$this->view->setVariable("pincho", $pinchotemp);
		$this->view->render("vistas", "consultaBajaPincho");
	}
	public function listadoPincho(){
		$arrayPinchos = $this->pincho->listarPi();
		$this->view->setVariable("pinchos", $arrayPinchos);

		$this->view->render("vistas", "listaPinchos");
	}
	public function  listarPrem(){
		$premiadosPro = array();
		$premiadosPop = array();
		$premiadosPro = $this->pincho->listarPremPro();
		$premiadosPop = $this->pincho->listarPremPop();
		if ($premiadosPro == NULL) {
			if(true){
				throw new Exception("No hay premiados");
			} else {
				$this->pincho->crearFin();
				this->listarPrem();
			}
		}
		$this->view->setVariable("premiadosPro", $premiadosPro);
		$this->view->setVariable("premiadosPop", $premiadosPop);		
		$this->view->render("vistas", "listarPrem");
	}

	public function validarPincho(){
		$pinchotemp = $this->pincho->showDatesPi();
		$this->view->setVariable("pincho", $pinchotemp);

		$currentuser = $_SESSION["currentuser"];

		if($currentuser){//commprueba que el usuario esta logeado
			$pinchotemp->setEstadoPi("1");
			$pinchotemp->updatePi();
		}
		echo "<script> alert('El pincho se ha VALIDADO correctamente correctamente'); </script>";
		echo "<script>window.location.replace('index.php?controller=pincho&action=consultaPincho');</script>";
	}
}
?>
