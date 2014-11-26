<?php
require_once(__DIR__."/../model/Voto.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../controller/DBController.php");
require_once(__DIR__."/../core/ViewManager.php");

class PopularController extends DBController {
 
  private $user;    
  private $voto;    
  
  public function __construct() {    
    parent::__construct();
    
    $this->user = new User();
	$this->voto = new Voto();
     //$this->view->setLayout("welcome"); 
  }
  
   public function votar() {
	
	$usuario= new Voto();
    
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
   
   
   
   
	$this->view->render("vistas", "votarJPopu"); 
   }
  
  
 }
  