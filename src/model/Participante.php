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
    $stmt = $db->prepare("SELECT `participante`.`nombreLocalP`, `participante`.`fotoP`, `participante`.`usuarioEmail` FROM participante, usuario WHERE ((`participante`.`usuarioEmail` = `usuario`.`emailU`) AND (`usuario`.`estadoU` = 1))");
    $stmt->execute();
    $users_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users_db;
  }
  public function consultar($email){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT `participante`.*, `usuario`.* FROM usuario, participante  WHERE ((`usuario`.`emailU` = `participante`.`usuarioEmail`) AND (`participante`.`usuarioEmail` = ?))");
    $stmt->execute(array($email));
    $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $user_data;
  }
  public function pinchosAsoc($email){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM pincho where participanteEmail=?");
    $stmt->execute(array($email));
    $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $user_data;
  }
  public function eliminar($email){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("UPDATE usuario SET estadoU='0' WHERE emailU=?");
    $stmt->execute(array($email));
  }
  public function actualizar($email,$direccion,$telefono,$nombreLocal,$horario,$paginaWeb){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("UPDATE participante SET direccionP=?, telefonoP=?, nombreLocalP=?, horarioP=?, paginaWebP=? WHERE usuarioEmail=?");
    $stmt->execute(array($direccion,$telefono,$nombreLocal,$horario,$paginaWeb,$email));
  }
}
