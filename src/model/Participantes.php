<?php
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

/**
 *
 * En esta clase se maneja todo lo relacionado con el participante
 *
 */
class Participantes {

/**
 *
 * Variables de un participante, por eliminar
 *
 */
  private $direccionP;
  private $telefonoP;
  private $nombreLocalP;
  private $horarioP;
  private $paginaWebP;
  private $fotoP;
  private $usuarioEmail;


  /**
  *
  * Por eliminar
  *
  */
  public function __construct($emailU=NULL) {

  }


  /**
  *
  * Devuelve un array con los datos necesarios al listar participantes
  * @return users_db array conteniendo el nombre, la url de la foto y el email
  * @access public
  *
  */

  public function listarParticipantes(){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT `participante`.`nombreLocalP`, `participante`.`fotoP`, `participante`.`usuarioEmail` FROM participante, usuario WHERE ((`participante`.`usuarioEmail` = `usuario`.`emailU`) AND (`usuario`.`estadoU` = 1))");
    $stmt->execute();
    $users_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users_db;
  }

  /**
  *
  * Devuelve un array con los datos necesarios al buscar participantes
  * @param data  Nombre del local para buscar
  * @return users_db array conteniendo el nombre, la url de la foto y el email
  * @access public
  *
  */

  public function busquedaParticipante(){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT `participante`.`nombreLocalP`, `participante`.`fotoP`, `participante`.`usuarioEmail` FROM participante, usuario WHERE ((`participante`.`usuarioEmail` = `usuario`.`emailU`) AND (`usuario`.`estadoU` = 1))");
    $stmt->execute();
    $users_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users_db;
  }

  /**
  *
  * Devuelve un array con los datos de un participante en específico
  * @param email Se buscará el usuario en la base de datos en base a su email
  * @return users_data  Array con todos los datos de todos los participantes
  * @access public
  *
  */

  public function consultaParticipante($email){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT `participante`.*, `usuario`.* FROM usuario, participante  WHERE ((`usuario`.`emailU` = `participante`.`usuarioEmail`) AND (`participante`.`usuarioEmail` = ?))");
    $stmt->execute(array($email));
    $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $user_data;
  }

  /**
  *
  * Devuelve un array con los pinchos asociados a un participante
  * @param email Se buscará el pincho con el email de su participante asociado
  * @return pincho_data  Array conteniendo todos los datos del pincho
  * @access public
  *
  */

  public function pinchosAsoc($email){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM pincho where participanteEmail=?");
    $stmt->execute(array($email));
    $pincho_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $pincho_data;
  }

  /**
  *
  * Modifica el estado de un participante a desactivado en base a su email
  * @param email Se buscará el participante a eliminar con este email
  * @access public
  *
  */

  public function bajaParticipante($email){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("UPDATE usuario SET estadoU='0' WHERE emailU=?");
    $stmt->execute(array($email));
  }

  /**
  *
  * Modifica los datos de un participante en base a su email
  * @param email Clave del usuario
  * @param direccion Direccion del local
  * @param telefono Numero del local
  * @param nombreLocal Nombre que tiene el local
  * @param horario Horario de apertura y cierre
  * @param paginaWeb Url con la página
  * @access public
  *
  */

  public function modificarParticipante($email,$direccion,$telefono,$nombreLocal,$horario,$paginaWeb){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("UPDATE participante SET direccionP=?, telefonoP=?, nombreLocalP=?, horarioP=?, paginaWebP=? WHERE usuarioEmail=?");
    $stmt->execute(array($direccion,$telefono,$nombreLocal,$horario,$paginaWeb,$email));
  }
}
