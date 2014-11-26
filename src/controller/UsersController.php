<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../controller/DBController.php");

class UsersController extends DBController {

  private $user;

  public function __construct() {
    parent::__construct();

    $this->user = new User();
     //$this->view->setLayout("welcome");
  }

  public function login() {

	$user_db= new User();

    if (isset($_POST["email"])){

	  if ($this->user->isValidUser($_POST["email"], $_POST["password"])) {

		$user_db=$this->user->ver_datos($_POST["email"]);

		$_SESSION["currentuser"]=$user_db;

		$this->view->setVariable("useractual", $user_db);

		// envia al usuario a una area restringida (su zona de usuario)
		$this->view->redirect("concurso", "consultarConcurso");  //falta poner bien

	  }else{
		$errors = array();
		$errors["email"] = "El email no se encuentra registrado";
		$this->view->setVariable("errors", $errors);
	  }
    }

    // renderiza la vista (/view/users/login.php)
    $this->view->render("vistas", "login");    //falta poner bien
  }
  
  public function votar(){
    $this->view->render("vistas", "votarJProf");
  }

  public function registro() {

    $usuario= new User();

    if (isset($_POST["emailU"])){

      $usuario->setEmailU($_POST["emailU"]);
      $usuario->setContrasenaU($_POST["contrasenaU"]);
	  $usuario->setTipoU($_POST["tipoU"]);
      $usuario->setEstadoU('1');
	  $usuario->setNombreU($_POST["nombreU"]);
      $usuario->setConcursoId('1');

      try{

		$usuario->checkIsValidForRegister($_POST["contrasenaU2"]);

		// comprueba si el correo ya existe en la base de datos
		if (!$usuario->usernameExists()){

		  // guarda el objeto User en la base de datos
		  $usuario->save();

		  //$this->view->setFlash("Usuario ".$usuario->getNombreU()." corrrectamente añadido");

		  // cabecera("Location: index.php?controller=users&action=login")

		  $this->view->redirect("users", "login");
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

    // renderiza la vista (/view/users/registro.php)
    $this->view->render("vistas", "registro");

  }


}
