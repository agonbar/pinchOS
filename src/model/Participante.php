<?php
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class Participante {

  private $emailU;
  private $contrasenaU;
  private $tipoU;
  private $estadoU;
  private $nombreU;
  private $concursoId;

  public function __construct($emailU=NULL, $contrasenaU=NULL, $tipoU=NULL, $estadoU=NULL, $nombreU=NULL, $concursoId=NULL) {

    $this->emailU = $emailU;
    $this->contrasenaU = $contrasenaU;
    $this->tipoU = $tipoU;
    $this->estadoU = $estadoU;
    $this->nombreU = $nombreU;
    $this->concursoId = $concursoId;
  }

  public function listar(){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM usuario where tipoU='P'");
    $stmt->execute();
    $users_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $participantes=array();
    foreach ($users_db as $participante) {
      array_push($participantes, new User($this->emailU, $this->contrasenaU, $this->tipoU, $this->nombreU, $this->concursoId));
    }

    return $participantes;
    }
  }
