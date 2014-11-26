<?php
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class Concurso {

  private $db;

  /* El id del Concurso */

  private $idC;

  /* El nombre del Concurso */

  private $nombreC;

  /* Las bases del Concurso */

  private $basesC;

  /* La ciudad del Concurso */

  private $ciudadC;

  /* La fecha del Concurso */

  private $fechaC;

  /* El premio del Concurso */

  private $premioC;

  public function __construct($idC=NULL, $nombreC=NULL, $basesC=NULL, $ciudadC=NULL, $fechaC=NULL, $premioC=NULL) {
    $this->db = PDOConnection::getInstance();
    $this->idC = $idC;
    $this->nombreC = $nombreC;
    $this->basesC = $basesC;
    $this->ciudadC = $ciudadC;
    $this->fechaC = $fechaC;
    $this->premioC = $premioC;
  }


  /* Devuelve el id del Concurso */
  public function getIdC() {
    return $this->idC;
  }

  /* Pone el id del Concurso */
  public function setIdC($idC) {
    $this->idC = $idC;
  }

  /* Devuelve la contraseña del Concurso */
  public function getNombreC() {
    return $this->nombreC;
  }

  /* Pone la contraseña del Concurso */
  public function setNombreC($nombreC) {
    $this->nombreC = $nombreC;
  }

  /* Devuelve las bases del Concurso */
  public function getBasesC() {
    return $this->basesC;
  }

  /* Pone las bases del Concurso */
  public function setBasesC($basesC) {
    $this->basesC = $basesC;
  }

  /* Devuelve la ciudad del Concurso */
  public function getCiudadC() {
    return $this->ciudadC;
  }

  /* Pone la fecha del Concurso */
  public function setCiudadC($ciudadC) {
    $this->ciudadC = $ciudadC;
  }

  /* Devuelve la fecha del Concurso */
  public function getFechaC() {
    return $this->fechaC;
  }

  /* Pone la fecha del Concurso */
  public function setFechaC($fechaC) {
    $this->fechaC = $fechaC;
  }

  /* Devuelve el premio del Concurso */
  public function getPremioC() {
    return $this->premioC;
  }

  /* Pone el premio del Concurso */
  public function setPremioC($premioC) {
    $this->premioC = $premioC;
  }

  /* Comprueba si el Concurso es válido para registrarse en la base de datos */

  public function checkIsValidForRegister() {

    $errors = array();
    if (strlen($this->nombreC) < 4) {
      $errors["nombreC"] = "El nombre debe contener al menos 4 caracteres de longitud";
    }
    if (strlen($this->ciudadC) < 2) {
      $errors["ciudadC"] = "La ciudad debe contener al menos 2 caracteres de longitud";
    }
    if (strlen($this->basesC) < 10) {
      $errors["basesC"] = "Las bases no son correctas";
    }
    if (strlen($this->premioC) < 2) {
      $errors["premioC"] = "El valor del premio no es correcto";
    }
    if (sizeof($errors)>0){
      throw new ValidationException($errors, "El concurso no es válido");
    }

  }

  /* Guarda el Concurso en la base de datos */

  public function save() {
    $stmt = $this->db->prepare("INSERT INTO concurso values (?,?,?,?,?,?)");
    $stmt->execute(array($this->idC, $this->nombreC, $this->basesC, $this->ciudadC, $this->fechaC, $this->premioC));
  }

  /* Guarda el Concurso en la base de datos */

  public function update() {
    $stmt = $this->db->prepare("UPDATE concurso SET idC=?, nombreC=?, basesC=?, ciudadC=?, fechaC=?, premioC=?");
    $stmt->execute(array($this->idC, $this->nombreC, $this->basesC, $this->ciudadC, $this->fechaC, $this->premioC));
  }

  public function existConcurso(){
    $stmt = $this->db->prepare("SELECT count(idC) FROM concurso");
    $stmt->execute();

    if ($stmt->fetchColumn() > 0) {
      return true;
    }else return false;
  }

  /* Comprueba si el id xa existe en la base de datos */
  /*
  public function idExists() {

  $stmt = $this->db->prepare("SELECT count(idC) FROM concurso where idC=?");
  $stmt->execute(array($this->idC));

  if ($stmt->fetchColumn() > 0) {
  return true;
}
}
*/
public function ver_datos() {
  $stmt = $this->db->prepare("SELECT * FROM concurso");
  $stmt->execute();
  $concursos_db=$stmt->fetch(PDO::FETCH_ASSOC);

  if(sizeof($concursos_db)==0){
    return null;
  }else{
    return new Concurso(
    $concursos_db["idC"],
    $concursos_db["nombreC"],
    $concursos_db["basesC"],
    $concursos_db["ciudadC"],
    $concursos_db["fechaC"],
    $concursos_db["premioC"]
  );
}
}

}
