<?php
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/Participante.php");
require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/DBController.php");

class ParticipanteController extends DBController {

  private $user;
  private $participante;

  public function __construct() {
    parent::__construct();
    $this->participante = new Participante();
    $this->user = new User();
  }

  public function listar(){
    $participantes_array = array();
    $participantes_array = $this->participante->listar();
    print_r($participantes_array);
    if ($participantes_array == NULL) {
      throw new Exception("No hay participantes");
    }
    $this->view->setVariable("participantes", $participantes_array);
    $this->view->render("vistas", "listarPart");
  }

  public function buscar(){
    $this->view->render("vistas", "buscarPart");
  }

  public function consultar(){
    if (isset($_GET["id"])){
      $userEmail = $_GET["id"];
    }
    $this->view->render("vistas", "consultaPart");
  }

  public function modificar(){
    $this->view->render("vistas", "modificacionPart");
  }
}
