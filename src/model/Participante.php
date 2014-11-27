<?php
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class Participante {

  public function __construct() {
  }

  public function listar(){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM usuario where tipoU='P'");
    $stmt->execute();
    $users_db = $stmt->fetch_all(PDO::FETCH_ASSOC);

    if(empty($user_db)){
      return null;
    }else{
      return $users_db;
    }
  }
}
