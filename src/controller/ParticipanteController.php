<?php
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/Participantes.php");
require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/DBController.php");

class ParticipanteController extends DBController {

  private $participante;

  public function __construct() {
    parent::__construct();
    $this->participante = new Participantes();
  }

  public function listarParticipantes(){
    $participantes_array = array();
    $participantes_array = $this->participante->listarParticipantes();
    if ($participantes_array == NULL) {
      throw new Exception("No hay participantes");
    }
    $this->view->setVariable("participantes", $participantes_array);
    $this->view->render("vistas", "listarPart");
  }

  public function busquedaParticipante(){
    $participantes_array = array();
    $participantes_array = $this->participante->busquedaParticipante();
    if ($participantes_array == NULL) {
      throw new Exception("No hay participantes");
    }
    $this->view->setVariable("participantes", $participantes_array);
    $this->view->render("vistas", "buscarPart");
  }

  public function consultaParticipante(){
    if (isset($_GET["id"])){
      $userEmail = $_GET["id"];
    }
    $participanteData = array();
    $participanteData = $this->participante->consultaParticipante($userEmail);
    if ($participanteData == NULL) {
      throw new Exception("No existe participante");
    }
    $participanteDataPinchos = array();
    $participanteDataPinchos = $this->participante->pinchosAsoc($userEmail);
    if ($participanteDataPinchos == NULL) {
      throw new Exception("No tienes pinchos aún");
    }
    $this->view->setVariable("participantePinchos", $participanteDataPinchos);
    $this->view->setVariable("participante", $participanteData);
    $this->view->render("vistas", "consultaPart");
  }

  public function modificarParticipante(){
    if (isset($_GET["id"])){
      $userEmail = $_GET["id"];
      $participanteData = array();
      $participanteData = $this->participante->consultaParticipante($userEmail);
      if ($participanteData == NULL) {
        throw new Exception("No existe participante");
      }
      $this->view->setVariable("participante", $participanteData);
      $this->view->render("vistas", "modificacionPart");
    }

    if (isset($_POST["nombreU"])){
      $usuario= new User();
      $participante = new Participantes();
      $usuario->setContrasenaU($_POST["contrasenaU"]);
      $usuario->setNombreU($_POST["nombreU"]);
      try{
        $usuario->checkIsValidForModificacionJPopu($_POST["contrasenaU2"]);
        $usuario->update($_POST["emailU"]);
        $participante->modificarParticipante($_POST["emailU"],$_POST["direccionP"],$_POST["telefonoP"],$_POST["nombreLocalP"],$_POST["horarioP"],$_POST["paginaWebP"]);

        $ruta="../src/resources/img/participantes/";//ruta carpeta donde queremos copiar las imagenes
        $fotoPSize = $_FILES['fotoP']['size'];
        $fotoP = $ruta.$_FILES['fotoP']['name'];
        $fotoPTemp = $_FILES['fotoP']['tmp_name'];
        move_uploaded_file($fotoPTemp,$fotoP);//pasa la foto de la carpeta temporal a la del servidor web

        echo "<script> alert('Usuario modificado correctamente'); </script>";
      }catch(ValidationException $ex) {
        $errors = $ex->getErrors();
        $this->view->setVariable("errors", $errors);
      }

      $participanteData = $this->participante->consultaParticipante($_POST["emailU"]);
      if ($participanteData == NULL) {
        throw new Exception("No existe participante");
      }
      $this->view->setVariable("participante", $participanteData);
      $this->view->render("vistas", "modificacionPart");
    }
  }

  public function bajaParticipante(){
    if (isset($_GET["id"])){
      $userEmail = $_GET["id"];
    }
    $this->participante->bajaParticipante($userEmail);
    $this->listarParticipantes();
  }

}
