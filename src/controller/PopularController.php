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
      $votoPincho1->setPinchoIdPi('1');//?????????????????????????????????????????????????????????
	  $votoPincho1->setCodigoPinchoV($_POST["codigoP1"]);
	  $votoPincho1->setValoracionV($_POST["puntuacionP1"]);
	  
      $votoPincho2->setUsuarioEmailU($currentuser->getEmailU());
      $votoPincho2->setPinchoIdPi('2');//?????????????????????????????????????????????????????????
	  $votoPincho2->setCodigoPinchoV($_POST["codigoP2"]);
	  $votoPincho2->setValoracionV($_POST["puntuacionP2"]);
	  
	  $votoPincho3->setUsuarioEmailU($currentuser->getEmailU());
      $votoPincho3->setPinchoIdPi('3');//?????????????????????????????????????????????????????????
	  $votoPincho3->setCodigoPinchoV($_POST["codigoP3"]);
	  $votoPincho3->setValoracionV($_POST["puntuacionP3"]);

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
  
  
  public function verPerfil(){//esto luego se borra y se pone en users para que dependiendo del ususrio salga una pagina.
		$this->view->render("vistas", "consultaJPopu");
  }


}
