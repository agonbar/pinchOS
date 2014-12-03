<?php
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/Participante.php");
require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/DBController.php");

class ParticipanteController extends DBController {

  private $participante;

  public function __construct() {
    parent::__construct();
    $this->participante = new Participante();
  }

  public function listar(){
    $participantes_array = array();
    $participantes_array = $this->participante->listar();
    if ($participantes_array == NULL) {
      throw new Exception("No hay participantes");
    }
    $this->view->setVariable("participantes", $participantes_array);
    $this->view->render("vistas", "listarPart");
  }

  public function buscar(){
    $participantes_array = array();
    $participantes_array = $this->participante->listar();
    if ($participantes_array == NULL) {
      throw new Exception("No hay participantes");
    }
    $this->view->setVariable("participantes", $participantes_array);
    $this->view->render("vistas", "buscarPart");
  }

  public function consultar(){
    if (isset($_GET["id"])){
      $userEmail = $_GET["id"];
    }
    $participanteData = array();
    $participanteData = $this->participante->consultar($userEmail);
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

  public function modificar(){
    if (isset($_GET["id"])){
      $userEmail = $_GET["id"];
      $participanteData = array();
      $participanteData = $this->participante->consultar($userEmail);
      if ($participanteData == NULL) {
        throw new Exception("No existe participante");
      }
      $this->view->setVariable("participante", $participanteData);
      $this->view->render("vistas", "modificacionPart");
    }

    if (isset($_POST["nombreU"])){
      $usuario= new User();
      $participante = new Participante();
      $usuario->setContrasenaU($_POST["contrasenaU"]);
      $usuario->setNombreU($_POST["nombreU"]);
      try{
        $usuario->checkIsValidForModificacionJPopu($_POST["contrasenaU2"]);
        $usuario->update($_POST["emailU"]);
        $participante->actualizar($_POST["emailU"],$_POST["direccionP"],$_POST["telefonoP"],$_POST["nombreLocalP"],$_POST["horarioP"],$_POST["paginaWebP"]);

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

      $participanteData = $this->participante->consultar($_POST["emailU"]);
      if ($participanteData == NULL) {
        throw new Exception("No existe participante");
      }
      $this->view->setVariable("participante", $participanteData);
      $this->view->render("vistas", "modificacionPart");
    }
  }

  public function eliminar(){
    if (isset($_GET["id"])){
      $userEmail = $_GET["id"];
    }
    $this->participante->eliminar($userEmail);
    $this->listar();
  }

}
