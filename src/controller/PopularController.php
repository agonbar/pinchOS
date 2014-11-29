<?php
require_once(__DIR__."/../model/Voto.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../controller/DBController.php");
require_once(__DIR__."/../core/ViewManager.php");

class PopularController extends DBController {

  /*Variable que representa el objeto User*/
  private $user;
  /*Variable que representa el objeto Voto*/
  private $voto;

  /*Constructor*/
  public function __construct() {
    parent::__construct();

	//Inicializa las variables
    $this->user = new User();
    $this->voto = new Voto();
  }
  
  
  /*Este metodo permite la votacion del jurado popular*/
  public function votar() {
 
	$currentuser = $_SESSION["currentuser"];

    $votoPincho1= new Voto();
	$votoPincho2= new Voto();
	$votoPincho3= new Voto();
	
    if (isset($_POST["codigoP1"])){
		
	  /*Guarda los datos introducidos en el formulario en el objeto, más el 
	  email del usuario actual que es el que realiza la votacion*/
	  $votoPincho1->setUsuarioEmailU($currentuser->getEmailU());
	  $votoPincho1->setCodigoPinchoV($_POST["codigoP1"]);
	  $votoPincho1->setValoracionV($_POST["puntuacionP1"]);
	  
      $votoPincho2->setUsuarioEmailU($currentuser->getEmailU());
	  $votoPincho2->setCodigoPinchoV($_POST["codigoP2"]);
	  $votoPincho2->setValoracionV($_POST["puntuacionP2"]);
	  
	  $votoPincho3->setUsuarioEmailU($currentuser->getEmailU());
	  $votoPincho3->setCodigoPinchoV($_POST["codigoP3"]);
	  $votoPincho3->setValoracionV($_POST["puntuacionP3"]);
	
	  /*Comprueba si los codigos introducidos son correctos y los introduce en el objeto*/
	  if(!$votoPincho1->isCorrectCode()){
		 $errors["codigoP1"] = "El código introducido no pertenece a ningun pincho";
	  }
	  if(!$votoPincho2->isCorrectCode()){
		 $errors["codigoP2"] = "El código introducido no pertenece a ningun pincho";
	  }
	  if(!$votoPincho3->isCorrectCode()){
		 $errors["codigoP3"] = "El código introducido no pertenece a ningun pincho";
	  }
	  
	  /*Comprueba si los codigos introducidos corresponden a pinchos diferentes*/
	  if($votoPincho1->isPinchoEquals($votoPincho2)){
		 $errors["codigoP2"] = "Los codigos 1 y 2 no pueden ser sobre el mismo pincho";
	  }
	  if($votoPincho2->isPinchoEquals($votoPincho3)){
		 $errors["codigoP3"] = "Los codigos 3 y 2 no pueden ser sobre el mismo pincho";
	  }
	  if($votoPincho3->isPinchoEquals($votoPincho1)){
		 $errors["codigoP3"] = "Los codigos 1 y 3 no pueden ser sobre el mismo pincho";
	  }
	  
	  try{
		/*Comprueba si los datos introducidos son correctos*/
		$votoPincho1->checkIsValidForVoto();//mira que puntuacion no sea null
		$votoPincho2->checkIsValidForVoto();//mira que puntuacion no sea null
		$votoPincho3->checkIsValidForVoto();//mira que puntuacion no sea null

		// comprueba si el código del pincho introducido ya forma parte de un voto anterior
		if ((!$votoPincho1->votoExist()) and (!$votoPincho2->votoExist()) and (!$votoPincho2->votoExist())){
		
		  //continua solo si no se ha producido ningun error
		  if (!sizeof($errors)>0){
			  /*Si no es asi, guarda las votaciones en la base de datos*/
			  $votoPincho1->save();
			  $votoPincho2->save();
			  $votoPincho3->save();
			  
			  //Redirige al método verPerfil del PopularController.php
			  $this->view->redirect("popular", "verPerfil");
		  }
		  
		  /*Si ya existe en la base de datos muestra un mensaje de error*/
		  
		} else {
		  $errors = array();
		  if($votoPincho1->votoExist())$errors["codigoP1"] = "Este código no es válido";
		  if($votoPincho2->votoExist())$errors["codigoP2"] = "Este código no es válido";
		  if($votoPincho3->votoExist())$errors["codigoP3"] = "Este código no es válido";
		}
		
	  }catch(ValidationException $ex) {
		$errors = $ex->getErrors();
	  }
  
    }
	$this->view->setVariable("errors", $errors);
	
	/*Permite visualizar: view/vistas/votarJPopu.php */
    $this->view->render("vistas", "votarJPopu");
  }
  
  
  /*Este metodo permite desactivar la cuenta del usuario*/
  public function desactivarCuenta() {
  
	/*Recoge el usuario actual*/
	$currentuser = $_SESSION["currentuser"];
	
	//<script>alert('Esta seguro de borrar el usuario?'); </script>;
	//<script>window.location.replace('index.php');</script>;
	
	/*Actualiza el estado del usuario a inactivo=0 */
	$this->user->updateEstado($currentuser->getEmailU());
		
	//Redirige al método login del UsersController.php
	$this->view->redirect("users", "login");
	
	// renderiza la vista (/view/vistas/consultaJpopu.php)
	$this->view->render("vistas", "consultaJpopu"); 
  
 }
  
  /*Este metodo permite ver los datos del usuario actual, ademas de ver sus votos*/
  public function verPerfil(){
  /*
	$currentuser = $_SESSION["currentuser"];
	
	// find the Post object in the database
	$votos = $this->voto->getDatosVotos($currentuser->getEmailU());
	
	if ($votos == NULL) {
	  throw new Exception("Este usuario no tiene votos");
	}
	
	$this->view->setVariable("votos", $votos);
	
	$nombrePincho = array();
	foreach ($votos as $voto) {
		$nombrePincho_valor = $this->voto->getNombrePincho($voto);
		$nombrePincho[$voto->getCodigoPinchoV()] = $nombrePincho_valor;
	}
	$this->view->setVariable("nombrePincho", $nombrePincho);
*/
    $this->view->render("vistas", "consultaJPopu");

  }
  
  /*Este metodo permite modificar los datos del usuario*/
  public function verModificacion(){
  
	$currentuser = $_SESSION["currentuser"];
	$usuario= new User();

    if (isset($_POST["nombreU"])){

		/*Guarda en el objeto los datos introducidos*/
        $usuario->setContrasenaU($_POST["contrasenaU"]);
        $usuario->setNombreU($_POST["nombreU"]);

        try{
		  /*Comprueba que los datos introducidos son validos*/
          $usuario->checkIsValidForModificacionJPopu($_POST["contrasenaU2"]);
		  
          // gActualiza los datos en la base de datos
          $usuario->update($currentuser->getEmailU());
		  
		  //Actualiza la sesión con los datos modificados
		  $_SESSION["currentuser"] = $this->user->ver_datos($currentuser->getEmailU());

		  //Redirige al método verPerfil del PopularController.php
          $this->view->redirect("popular", "verPerfil");

        }catch(ValidationException $ex) {
          $errors = $ex->getErrors();
          $this->view->setVariable("errors", $errors);
        }
    }
	
	/*Recupera los datos del usuario*/
    $usuario = $this->user->ver_datos($currentuser->getEmailU());

    /* Guarda el valor de la variable $usuario en la variable user accesible
	desde la vista*/
    $this->view->setVariable("user", $usuario);

	/*Permite visualizar: view/vistas/modificacionJPopu.php */
    $this->view->render("vistas", "modificacionJPopu");
	
  }
  
  
   
  public function listarPremiados(){
    $this->view->render("vistas", "listarPrem");
  }
  
}
