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
 
	$currentuser = $_SESSION["currentuser"];

    $votoPincho1= new Voto();
	$votoPincho2= new Voto();
	$votoPincho3= new Voto();
	
	//aki tenemos que sacar el pincho al que pertenece el voto introducido. Si no pertenece a ningun pincho, da error y ya no hace lo siguiente (devuelve un error)
	

    if (isset($_POST["codigoP1"])){
	
	  $votoPincho1->setUsuarioEmailU($currentuser->getEmailU());
	  $votoPincho1->setCodigoPinchoV($_POST["codigoP1"]);
	  $votoPincho1->setValoracionV($_POST["puntuacionP1"]);
	  
      $votoPincho2->setUsuarioEmailU($currentuser->getEmailU());
	  $votoPincho2->setCodigoPinchoV($_POST["codigoP2"]);
	  $votoPincho2->setValoracionV($_POST["puntuacionP2"]);
	  
	  $votoPincho3->setUsuarioEmailU($currentuser->getEmailU());
	  $votoPincho3->setCodigoPinchoV($_POST["codigoP3"]);
	  $votoPincho3->setValoracionV($_POST["puntuacionP3"]);
	
	  if(!$votoPincho1->isCorrectCode()){
		 $errors["codigoP1"] = "El código introducido no pertenece a ningun pincho";
	  }
	  if(!$votoPincho2->isCorrectCode()){
		 $errors["codigoP2"] = "El código introducido no pertenece a ningun pincho";
	  }
	  if(!$votoPincho3->isCorrectCode()){
		 $errors["codigoP3"] = "El código introducido no pertenece a ningun pincho";
	  }
	   
      try{

        $votoPincho1->checkIsValidForVoto();//mira que puntuacion no sea null
		$votoPincho2->checkIsValidForVoto();
		$votoPincho3->checkIsValidForVoto();

        // comprueba si el correo ya existe en la base de datos
        if ((!$votoPincho1->votoExist()) and (!$votoPincho2->votoExist()) and (!$votoPincho2->votoExist())){
		
          $votoPincho1->save();
		  $votoPincho2->save();
		  $votoPincho3->save();
		  
		  echo
          $this->view->redirect("popular", "verPerfil");
		  
        } else {
          $errors = array();
          if($votoPincho1->votoExist())$errors["codigoP1"] = "Este código no es válido";
		  if($votoPincho2->votoExist())$errors["codigoP2"] = "Este código no es válido";
		  if($votoPincho3->votoExist())$errors["codigoP3"] = "Este código no es válido";
		  
          $this->view->setVariable("errors", $errors);
        }
		
      }catch(ValidationException $ex) {

        $errors = $ex->getErrors();
        $this->view->setVariable("errors", $errors);
      }
    }

    $this->view->render("vistas", "votarJPopu");
  }
  
  
  public function desactivarCuenta() {
	
	$currentuser = $_SESSION["currentuser"];
	
	//<script>alert('Esta seguro de borrar el usuario?'); </script>;
	//<script>window.location.replace('index.php');</script>;
		
	$this->user->updateEstado($currentuser->getEmailU());
		
	$this->view->redirect("users", "login");
	
	// render the view (/view/users/login.php)
	$this->view->render("vistas", "consultaJpopu"); 
  
 }
  
  public function verPerfil(){//esto luego se borra y se pone en users para que dependiendo del ususrio salga una pagina.

    $this->view->render("vistas", "consultaJPopu");

  }
  
  
  public function listarPremiados(){
    $this->view->render("vistas", "listarPrem");
  }
	

  public function verModificacion(){//esto luego se borra y se pone en users para que dependiendo del ususrio salga una pagina.
	$currentuser = $_SESSION["currentuser"];
	
	$usuario= new User();

    if (isset($_POST["nombreU"])){

        $usuario->setEmailU($_POST["emailU"]);
        $usuario->setContrasenaU($_POST["contrasenaU"]);
        $usuario->setTipoU('J');
        $usuario->setEstadoU('1');
        $usuario->setNombreU($_POST["nombreU"]);
        $usuario->setConcursoId('1');

        try{

          $usuario->checkIsValidForRegister2($_POST["contrasenaU2"]);

          // guarda el objeto User en la base de datos
          $usuario->update();

          //$this->view->setFlash("Usuario ".$usuario->getNombreU()." corrrectamente añadido");

          // cabecera("Location: index.php?controller=users&action=login")

          $this->view->redirect("popular", "verPerfil");


        }catch(ValidationException $ex) {

          $errors = $ex->getErrors();
          $this->view->setVariable("errors", $errors);
        }
    }

    $usuario = $this->user->ver_datos($currentuser->getEmailU());

    // put the Post object to the view
    $this->view->setVariable("user", $usuario);

    $this->view->render("vistas", "modificacionJPopu");
	
	;
  }
  
}
