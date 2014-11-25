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
  
   if (isset($_POST["email"])){ 
   
	  if ($this->user->isValidUser($_POST["email"], $_POST["password"])) {

		$user_db=$this->user->ver_datos($POST["email"]);
		$_SESSION["currentuser"]=$user_db;
		
		$this->view->setVariable("user", $user_db );
		
		// envia al usuario a una area restringida (su zona de usuario)
		$this->view->redirect("users", "inicio");  //falta poner bien
	
	  }else{
		$errors = array();
		$errors["general"] = "El email no se encuentra registrado";
		$this->view->setVariable("errors", $errors);
	  }
    }     
	
    // renderiza la vista (/view/users/login.php)
    $this->view->render("vistas", "login");    //falta poner bien
  }
  
  
  public function inicio() {
	$this->view->render("vistas", "consultaConcurso"); 
  }
  

  public function registro() {
    
    $user = new User();
    
    if (isset($_POST["emailU"])){ 
      
      $user->setEmailU($_POST["emailU"]);
      $user->setContrasenaU($_POST["contrasenaU"]);
	  $user->setTipoU($_POST["tipoU"]);
      $user->setEstadoU($_POST["estadoU"]);
	  $user->setNombreU($_POST["nombreU"]);
      $user->setConcurso_idC1($_POST["Concurso_idC1"]);
      
      try{
	$user->checkIsValidForRegister(); 
	
	// comprueba si el correo ya existe en la base de datos
	if (!$this->userMapper->usernameExists($_POST["emailU"])){
	
	  // guarda el objeto User en la base de datos
	  $this->userMapper->save($user);
	  
	  $this->view->setFlash("Usuario ".$userMapper->getNombreU()." corrrectamente añadido");
	  
	  // cabecera("Location: index.php?controller=users&action=login")
	  
	  $this->view->redirect("users", "login");	   //falta poner bien
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
    $this->view->setVariable("user", $user);  
   
    // renderiza la vista (/view/users/registro.php)
    $this->view->render("vistas", "registro"); 
    
  }

  
}
