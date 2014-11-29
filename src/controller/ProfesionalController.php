<?php
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../controller/DBController.php");
require_once(__DIR__."/../core/ViewManager.php");

class ProfesionalController extends DBController {

  /*Variable que representa el objeto User*/
  private $user;

  /*Constructor*/
  public function __construct() {
    parent::__construct();

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

          //$this->view->setFlash("Usuario ".$usuario->getNombreU()." corrrectamente a�adido");

		  //Redirige al método consultarConcurso del ConcursoController.php
          $this->view->redirect("concurso", "consultarConcurso");
		  
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
    $this->view->render("vistas", "votarJProf");
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

		  //Redirige al método verPerfil del ProfesionalController.php
          $this->view->redirect("profesional", "verPerfil");

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
