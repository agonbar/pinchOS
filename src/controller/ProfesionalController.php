<?php
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/Voto.php");
require_once(__DIR__."/../controller/DBController.php");
require_once(__DIR__."/../core/ViewManager.php");

class ProfesionalController extends DBController {

  /*Variable que representa el objeto User*/
  private $user;

  /*Constructor*/
  public function __construct() {
    parent::__construct();
	
	if(!$_SESSION["currentuser"]){
		  echo "<script>window.location.replace('index.php?controller=users&action=login');</script>";
	}

	//Inicializa la variable
    $this->user = new User();
  }

/*
  public function generarContrasena(){

    $caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $longpalabra=8;
    for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) {
      $x = rand(0,$n);
      $pass.= $caracteres[$x];
    }
    echo 'Nuestra contrase�a obtenida es: ' . $pass;

    $this->view->setVariable("contrasenaGenerada", $pass);

    $this->view->redirect("profesional", "registrarProfesional");

  }*/

  
  /*Metodo que permite el registro del jurado profesional*/
  public function registrarProfesional() {

    $profesional= new User();

    if (isset($_POST["emailU"])){
		
		/*Guarda los datos introducidos en el objeto*/
      $profesional->setEmailU($_POST["emailU"]);
      $profesional->setContrasenaU($_POST["contrasenaU"]);
      $profesional->setTipoU('S');
      $profesional->setEstadoU('1');
      $profesional->setNombreU($_POST["nombreU"]);
      $profesional->setConcursoId('1');

      try{

	    /*Comprueba que los datos introducidos son validos*/
        $profesional->checkIsValidForRegisterProf();

        // comprueba si el correo ya existe en la base de datos
        if (!$profesional->usernameExists()){

          // guarda el objeto  en la base de datos
          $profesional->save();
		  
		  //mensaje de confirmación y redirige al metodo consultarConcurso del controlador ConcursoCotroller
		  echo "<script> alert('Usuario creado correctamente'); </script>";
		  echo "<script>window.location.replace('index.php?controller=concurso&action=consultarConcurso');</script>";
		  
		 //si el correo existe muestra un mensaje de error
        } else {
          $errors = array();
          $errors["emailU"] = "El email ya se encuentra registrado";
          $this->view->setVariable("errors", $errors);
        }
		
      }catch(ValidationException $ex) {

        $errors = $ex->getErrors();
        $this->view->setVariable("errors", $errors);
      }
    }
	/*Permite visualizar: view/vistas/altaJProf.php */
    $this->view->render("vistas", "altaJProf");

  }
  

  public function votar() {
  
  $currentuser = $_SESSION["currentuser"];
	
	$errors = array();

    $votoPincho= new Voto();
	
    if (isset($_POST["codigoP"])){
	
	  $votoPincho->checkIsValidForVoto();
		
	  /*Guarda los datos introducidos en el formulario en el objeto, más el 
	  email del usuario actual que es el que realiza la votacion*/
	  $votoPincho->setUsuarioEmailU($currentuser->getEmailU());
	  $votoPincho->setCodigoPinchoV($_POST["codigoP"]);
	  $votoPincho->setValoracionV($_POST["valoracionP"]);
	
	  /*Comprueba si los codigos introducidos son correctos y los introduce en el objeto*/
	  if(!$votoPincho->isCorrectCode()){
		 $errors["codigoP"] = "El código introducido no pertenece a ningun pincho";
	  }
	  
	  try{

		// comprueba si el código del pincho introducido ya forma parte de un voto anterior
		if ((!$votoPincho->votoExist())){
		
		  //continua solo si no se ha producido ningun error
		  if (!sizeof($errors)>0){
			  /*Si no es asi, guarda las votaciones en la base de datos*/
			  $votoPincho->save();
			  
			  //mensaje de confirmación y redirige al metodo verPerfil del controlador popularCotroller
			  echo "<script> alert('Voto registrado correctamente'); </script>";
			  echo "<script>window.location.replace('index.php?controller=profesional&action=verPerfil');</script>";
			  
		  }else{ $this->view->setVariable("errors", $errors);}
		  
		  /*Si ya existe en la base de datos muestra un mensaje de error*/
		  
		} else {
		  $errors["codigoP"] = "Este código ya esta registrado";
		  $this->view->setVariable("errors", $errors);
		}
		
	  }catch(ValidationException $ex) {
		$errors = $ex->getErrors();
	  }
  
    }
	
	/*Permite visualizar: view/vistas/votarJPopu.php */
    $this->view->render("vistas", "votarJProf");
  }
  
  
  
  /*Este metodo permite desactivar la cuenta del usuario*/
  public function desactivarCuenta() {
  
	/*Recoge el usuario actual*/
	$currentuser = $_SESSION["currentuser"];
		
	/*Actualiza el estado del usuario a inactivo=0 */
	$this->user->updateEstado($currentuser->getEmailU());
	
	//mensaje de confirmación y redirige al método login del UsersController.php
	echo "<script> alert('Cuenta eliminada correctamente'); </script>";
	echo "<script>window.location.replace('index.php?controller=users&action=login');</script>";
	
	// renderiza la vista (/view/vistas/consultaJprof.php)
	$this->view->render("vistas", "consultaJprof"); 
}
	
  /*Este metodo permite ver los datos del usuario actual, ademas de ver sus votos*/
  public function verPerfil(){
		$this->view->render("vistas", "consultaJProf");
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
		  
		  //mensaje de confirmación y redirige al método verPerfil del ProfesionalController.php
		  echo "<script> alert('Usuario modificado correctamente'); </script>";
		  echo "<script>window.location.replace('index.php?controller=profesional&action=verPerfil');</script>";

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

	/*Permite visualizar: view/vistas/modificacionJProf.php */
    $this->view->render("vistas", "modificacionJProf");
	
  }
}
