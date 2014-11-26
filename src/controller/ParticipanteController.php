<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../controller/DBController.php");

class ParticipanteController extends DBController {

  private $user;

  public function __construct() {
    parent::__construct();

    $this->user = new User();
  }
  
   public function registrarParticipante() {

   $participante = new User();

    if (isset($_POST["emailU"])){

      $participante->setEmailU($_POST["emailU"]);
      $participante->setContrasenaU($_POST["contrasenaU"]);
    $participante->setTipoU('S');
      $participante->setEstadoU('1');
    $participante->setNombreU($_POST["nombreU"]);
      $participante->setConcursoId('1');

      try{

    $participante->checkIsValidForRegisterProf();

    if (!$participante->usernameExists()){

      $participante->save();

        $this->view->redirect("concurso", "consultarConcurso");
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

   $this->view->render("vistas", "altaPart");

   }
}
