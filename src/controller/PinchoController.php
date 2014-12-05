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

	/**
	*
	* Funcion que da de alta un pincho solo si el usuario que realiza esta accion
	* es un participante. Si el participante ya introdujo un pincho y está
	* confirmado no permite el alta de otro. Además realiza las comprobaciones
	* necesarias de los datos introducidos.
	* @access public
	*
	*/

	public function altaPincho(){

		$pinchotemp = new Pincho();
		$codvototemp = new CodVoto();
		$currentuser = $_SESSION["currentuser"];

		if($currentuser->getTipoU()=="P"){//commprueba que el usuario esta logeado

			if(isset($_POST["nombrePi"])) {

				if(!$pinchotemp->pinchoExistsAct($currentuser->getEmailU())){//compueba si este participante ya metio algun pincho
					//print_r($currentuser);die();
					$ruta="../src/resources/img/pinchos/";//ruta carpeta donde queremos copiar las imagenes
					$idpincho = $pinchotemp->generarIdPi($currentuser->getEmailU());//devuelve el id del pinchos
					// //print_r($numpincho);die();
					$fotoPiSize = $_FILES['fotoPi']['size'];
					 //print_r($fotoPiSize);die();
					$fotoPi = $ruta.$_FILES['fotoPi']['name'];
					 $fotoPiTemp = $_FILES['fotoPi']['tmp_name'];
					move_uploaded_file($fotoPiTemp,$fotoPi);//pasa la foto de la carpeta temporal a la del servidor web

					$fotoPi="./resources/img/pinchos/".$_FILES['fotoPi']['name'];
					//$fotoPiSize="2";
					$pinchotemp->setFotoPi($fotoPi, $fotoPiSize);
					$pinchotemp->setNumVotosPopPi("0");//inicializa a 0 el numero de votos dados por el JPopular
					$pinchotemp->setnumvotosProfPi("0");//inicializa a 0 el numero de votos dados por el JProfesional
					$pinchotemp->setEstadoPi("0");//inicializa a true el estado del pincho
					$pinchotemp->setNumVotePi("4");//indica el numero de codigos de votos
					$pinchotemp->setIdPi($idpincho);
					$pinchotemp->setNombrePi($_POST["nombrePi"]);
					$pinchotemp->setPrecioPi($_POST["precioPi"]);
					$pinchotemp->setIngredientesPi($_POST["ingredientesPi"]);
					$pinchotemp->setCocineroPi($_POST["cocineroPi"]);
					$pinchotemp->setParticipanteEmail($currentuser->getEmailU());
					//print_r($currentuser->getEmailU());die();

					try{
						//Hace todas las coprobaciones a la informacion introducida por el usuario
						$pinchotemp->checkInfoIfNullPi();
						$pinchotemp->checkInfoPi();

						//die();
						//print_r($idpincho);die();
						$pinchotemp->savePi();//die();

						$codvototemp->generateCodVote($idpincho);//los codigos de votos de un pincho deben crearse DESPUES que el pincho

						//mensaje de confirmación y redirige al metodo consultarPincho del controlador PinchoController
						echo "<script> alert('Pincho registrado correctamente'); </script>";
						echo "<script>window.location.replace('index.php?controller=pincho&action=listadoPincho');</script>";
					}
					catch(ValidationException $ex){
						$errors = $ex->getErrors();
						$this->view->setVariable("errors", $errors);
						$this->view->render("vistas", "altaPincho");//te muestra el formulario la primera vez
					}
					// Guarda el valor de la variable $pincho en la variable pincho accesible desde la vista
				}
				else{//si ya habia un pincho creado por ese participante
					echo "<script> alert('Ya has creado un pincho'); </script>";
					echo "<script>window.location.replace('index.php?controller=pincho&action=listadoPincho');</script>";
				}
			}else{
				$this->view->render("vistas", "altaPincho");//te muestra el formulario la primera vez
			}
		}else{
			echo "<script> alert('NO eres un Participante, NO puedes dar de alta un pincho'); </script>";
			echo "<script>window.location.replace('index.php?controller=pincho&action=listadoPincho');</script>";
		}

	}

	/**
	*
	* Funcion que da debaja un pincho. La baja es solo cambiar el estado del
	* pincho de activo a inactivo.
	* @access public
	*
	*/

	public function bajaPincho(){
		if(isset($_GET["idPi"])){
			$idPi = $_GET["idPi"];
		}
		$pinchotemp = $this->pincho->showDatesPi($idPi);
		$this->view->setVariable("pincho", $pinchotemp);

		$currentuser = $_SESSION["currentuser"];

		if($currentuser){//commprueba que el usuario esta logeado
			$pinchotemp->setEstadoPi("0");
			$pinchotemp->updatePi($idPi);
		}
		echo "<script> alert('El pincho se ha dado de BAJA correctamente'); </script>";
		echo "<script>window.location.replace('index.php?controller=pincho&action=listadoPincho');</script>";
	}

	/**
	*
	* Funcion que da modifica la informacion de un pincho solo si el usuario que
	* realiza esta accion es un participante. Si el pincho no existe no permite
	* la modificación. Además realiza las comprobaciones necesarias de los datos
	* introducidos.
	* @access public
	*
	*/

	public function modificacionPincho(){
		$pinchotemp = new Pincho();
		$codvototemp = new CodVoto();
		$currentuser = $_SESSION["currentuser"];

		if(isset($_GET["idPi"])){
			$idPi = $_GET["idPi"];
		}

		if($currentuser->getTipoU()=="P"){//commprueba que el usuario esta logeado

			if(isset($_POST["nombrePi"])){
				if($pinchotemp->pinchoExists($currentuser->getEmailU())){//compueba si este participante ya metio algun pincho
					$ruta="../src/resources/img/pinchos/";//ruta carpeta donde queremos copiar las imagenes
					$idpincho = $pinchotemp->generarIdPi($currentuser->getEmailU());//devuelve el id del pinchos
					$fotoPiSize = $_FILES['fotoPi']['size'];
					$fotoPi = $ruta.$_FILES['fotoPi']['name'];
					$fotoPiTemp = $_FILES['fotoPi']['tmp_name'];
					move_uploaded_file($fotoPiTemp,$fotoPi);//pasa la foto de la carpeta temporal a la del servidor web

					$fotoPi="./resources/img/pinchos/".$_FILES['fotoPi']['name'];
					$pinchotemp->setFotoPi($fotoPi, $fotoPiSize);
					$pinchotemp->setNombrePi($_POST["nombrePi"]);
					$pinchotemp->setPrecioPi($_POST["precioPi"]);
					$pinchotemp->setIngredientesPi($_POST["ingredientesPi"]);
					$pinchotemp->setCocineroPi($_POST["cocineroPi"]);

					try{
						//Hace todas las coprobaciones a la informacion introducida por el usuario
						$pinchotemp->checkInfoPi();
						//print_r($pinchotemp->getIdPi());die();
						$pinchotemp->updatePi($idPi);//die();

						//mensaje de confirmación y redirige al metodo consultarPincho del controlador PinchoController
						echo "<script> alert('Pincho modificado correctamente'); </script>";
						echo "<script>window.location.replace('index.php?controller=pincho&action=listadoPincho');</script>";
					}
					catch(ValidationException $ex){
						$errors = $ex->getErrors();
						$this->view->setVariable("errors", $errors);
						$pinchotemp = $this->pincho->showDatesPi($idPi);
						$this->view->setVariable("pincho", $pinchotemp);
						$this->view->render("vistas", "modificacionPincho");//te muestra el formulario la primera vez
					}
					// Guarda el valor de la variable $pincho en la variable pincho accesible desde la vista
				}
				else{//si ya habia un pincho creado por ese participante
					echo "<script> alert('No has subido ningun pincho'); </script>";
					echo "<script>window.location.replace('index.php?controller=pincho&action=listadoPincho');</script>";
				}
			}else{
				$pinchotemp = $this->pincho->showDatesPi($idPi);
				$this->view->setVariable("pincho", $pinchotemp);
				$this->view->render("vistas", "modificacionPincho");//te muestra el formulario la primera vez
			}
		}else{
			echo "<script> alert('NO eres un Participante, NO puedes dar de modificar un pincho'); </script>";
			echo "<script>window.location.replace('index.php?controller=pincho&action=listadoPincho');</script>";
		}
	}

	/**
	*
	* Función que devuelve los pinchos buscado por el usuario
	* @access public
	*
	*/

	public function busquedaPincho(){

	 	if(isset($_POST["parametro"])){
		 	$parametro = $_POST["parametro"];
		 	$tipo = $_POST["tipo"];
			$arrayPinchos = $this->pincho->searchPi($tipo,$parametro);
			$this->view->setVariable("pinchos", $arrayPinchos);
			$this->view->render("vistas", "buscarPinchos");
	 	}else{
			$arrayPinchos = $this->pincho->listarPi();
			$this->view->setVariable("pinchos", $arrayPinchos);
			$this->view->render("vistas", "buscarPinchos");
		}
	}

	/**
	*
	* Funcion que devuelve la infromación referente a un picho consultado
	* @access public
	*
	*/

	public function consultaPincho(){
		if(isset($_GET["idPi"])){
			$idPi = $_GET["idPi"];
			//print_r("que esta pasando");die();
		}
		$pinchotemp = $this->pincho->showDatesPi($idPi);
		$this->view->setVariable("pincho", $pinchotemp);
		$this->view->render("vistas", "consultaBajaPincho");
	}

	/**
	*
	* Funcion que devuelve el listado de todos los pichos. Si el usuario es el
	* administrador muestra todos los pinchos y si es cualquier otro usuario
	* lista solo los que tenga el estado activo
	* @access public
	*
	*/

	public function listadoPincho(){
		$currentuser = $_SESSION["currentuser"];
		//print_r($currentuser->getTipoU());die();
		if($currentuser->getTipoU() == "A"){
			$arrayPinchos = $this->pincho->listarPi();
			$this->view->setVariable("pinchos", $arrayPinchos);
		}else if ($currentuser->getTipoU() == "P"){
			$arrayPinchos = $this->pincho->listarPiPart();
			$this->view->setVariable("pinchos", $arrayPinchos);
		}else{
			$arrayPinchos = $this->pincho->listarPiActivos();
			$this->view->setVariable("pinchos", $arrayPinchos);
		}
		$this->view->render("vistas", "listaPinchos");
	}

	/**
	*
	* Llama a listar los premiados del jurado profesional y a los del popular
	* y los devuelve a la vista
	* @access public
	*
	*/

	public function  listarPrem(){
		$premiadosPop = array();
		$premiadosPro = array();
		$premiadosPro = $this->pincho->listarPremPro();
		$premiadosPop = $this->pincho->listarPremPop();
		if ($premiadosPro == NULL) {
			throw new Exception("El cocurso aún no ha finalizado");
		}
		$this->view->setVariable("premiadosPop", $premiadosPop);
		$this->view->setVariable("premiadosPro", $premiadosPro);
		$this->view->render("vistas", "listarPrem");
	}

	/**
	*
	* Fucnión que cierra la votación
	* @access public
	*
	*/

	public function cerrarVotacion(){
		$this->pincho->crearFin();
		$this-> listarPrem();
	}

	/**
	*
	* Funcion que valida un pincho. Cambia el estado de inactivo a activo. Solo
	* puede hacerlo el administrado
	* @access public
	*
	*/

	public function validarPincho(){
		if(isset($_GET["idPi"])){
			$idPi = $_GET["idPi"];
		}
		$pinchotemp = $this->pincho->showDatesPi($idPi);
		$this->view->setVariable("pincho", $pinchotemp);

		$currentuser = $_SESSION["currentuser"];

		if($currentuser){//commprueba que el usuario esta logeado
			$pinchotemp->setEstadoPi("1");
			$pinchotemp->updatePi($idPi);
		}
		echo "<script> alert('El pincho se ha VALIDADO correctamente correctamente'); </script>";
		echo "<script>window.location.replace('index.php?controller=pincho&action=listadoPincho');</script>";
	}
}
?>
