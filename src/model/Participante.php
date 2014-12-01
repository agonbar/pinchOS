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

  public function __construct($emailU=NULL) {

  }

  public function listar(){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM usuario where tipoU='P'");
    $stmt->execute();
    $users_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $users_db;
  }
  public function consultar($emailU){
    $emailU = "hector@gmail.com";
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM usuario where emailU=?");
    $stmt->execute(array($emailU));
    $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $user_data;
  }
}
