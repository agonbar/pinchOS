<?php
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../controller/DBController.php");
require_once(__DIR__."/../core/ViewManager.php");

class ProfesionalController extends DBController {

  private $user;

  public function __construct() {
    parent::__construct();

    $this->user = new User();
    //$this->view->setLayout("welcome");
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

  public function registrarProfesional() {

    $profesional= new User();

    if (isset($_POST["emailU"])){

      $profesional->setEmailU($_POST["emailU"]);
      $profesional->setContrasenaU($_POST["contrasenaU"]);
      $profesional->setTipoU('S');
      $profesional->setEstadoU('1');
      $profesional->setNombreU($_POST["nombreU"]);
      $profesional->setConcursoId('1');

      try{

        $profesional->checkIsValidForRegisterProf();

        // comprueba si el correo ya existe en la base de datos
        if (!$profesional->usernameExists()){

          // guarda el objeto User en la base de datos
          $profesional->save();

          //$this->view->setFlash("Usuario ".$usuario->getNombreU()." corrrectamente a�adido");

          // cabecera("Location: index.php?controller=users&action=login")

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

    $this->view->render("vistas", "altaJProf");

  }

  public function votar() {
    $this->view->render("vistas", "votarJProf");
  }
  
  public function verPerfil(){//esto luego se borra y se pone en users para que dependiendo del ususrio salga una pagina.
		$this->view->render("vistas", "consultaJProf");
  }
  
   public function verModificacion(){//esto luego se borra y se pone en users para que dependiendo del ususrio salga una pagina.
		$this->view->render("vistas", "modificacionJProf");
  }
}
