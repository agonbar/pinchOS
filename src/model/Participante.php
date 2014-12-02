<?php
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class Participante {

  private $direccionP;
  private $telefonoP;
  private $nombreLocalP;
  private $horarioP;
  private $paginaWebP;
  private $fotoP;
  private $usuarioEmail;

  public function __construct($emailU=NULL) {

  }

  public function listar(){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM usuario where tipoU='P'");
    $stmt->execute();
    $users_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $users_db;
  }
  public function consultar($email){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM participante where usuarioEmail=?");
    $stmt->execute(array($email));
    $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($user_data);
    return $user_data;
  }
}
