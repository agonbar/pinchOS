<?php
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class Pincho {

  private $db;
  private $idPi;/* El id del Pincho */
  private $nombrePi;/* La nombre del Pincho */
  private $precioPi;/* El precio del Pincho */
  private $descripcionPi;/* La descripcion del Pincho */
  private $cocineroPi;/* El cocinero del Pincho */
  private $numVotosPi;/* El numero de votos del Pincho */
  private $fotoPi;/* La foto del Pincho */
  private $estadoPi;/* El estado del Pincho */
  private $numvotePi;/* Es el numero de votos creados para un Pincho*/
  private $ParticipanteEmail;/* El ParticipanteEmail del Pincho */

  public function __construct($idCV=NULL,$nombrePi=NULL) {
    $this->idPi = $idPi;
    $this->nombrePi = $nombrePi;
    $this->precioPi = $precioPi;
    $this->descripcionPi = $descripcionPi;
    $this->cocineroPi = $cocineroPi;
    $this->numVotosPi = $numVotosPi;
    $this->fotoPi = $fotoPi;
    $this->estadoPi = $estadoPi;
    $this->numvotePi = $lastvotePi;
    $this->ParticipanteEmail = $ParticipanteEmail;
  }


  /* Devuelve el id del Pincho */
  public function getIdPi() {
    return $this->idPi;
  }

  /* Pone el id del Pincho */
  public function setIdPi($idPi) {
    $this->idPi = $idPi;
  }

  /* Devuelve el nombre del Pincho */
  public function getNombrePi() {
    return $this->nombrePi;
  }

  /* Pone el nombre del Pincho */
  public function setNombrePi($nombrePi) {
    $this->nombrePi = $nombrePi;
  }

  /* Devuelve el precio del Pincho */
  public function getPrecioPi() {
    return $this->precioPi;
  }

  /* Pone el tipo del Pincho */
  public function setPrecioPi($precioPi) {
    $this->precioPi = $precioPi;
  }

  /* Devuelve la descripcion del Pincho */
  public function getDescripcionPi() {
    return $this->descripcionPi;
  }

  /* Pone la descripcion del Pincho */
  public function setDescripcionPi($descripcionPi) {
    $this->descripcionPi = $descripcionPi;
  }

  /* Devuelve el cocinero del Pincho */
  public function getCocineroPi() {
    return $this->cocineroPi;
  }

  /* Pone el cocinero del Pincho */
  public function setCocineroPi($cocineroPi) {
    $this->cocineroPi = $cocineroPi;
  }

  /* Devuelve el numero de votos del Pincho */
  public function getNumVotosPi() {
    return $this->numVotosPi;
  }

  /* Pone el numero de votos del Pincho */
  public function setNumVotosPi($numVotosPi) {
    $this->numVotosPi = $numVotosPi;
  }

  /* Devuelve la foto del Pincho */
  public function getFotoPi() {
    return $this->fotoPi;
  }

  /* Pone la foto del Pincho */
  public function setFotoPi($fotoPi) {
    $this->fotoPi = $fotoPi;
  }

  /* Devuelve el estado del Pincho */
  public function getEstadoPi() {
    return $this->estadoPi;
  }

  /* Pone el estado del Pincho */
  public function setEstadoPi($estadoPi) {
    $this->estadoPi = $estadoPi;
  }

  /* Devuelve el ParticipanteEmail del Pincho */
  public function getNumVotePi() {
    return $this->numvotePi;
  }

  /* Pone el ParticipanteEmail del Pincho */
  public function SetNumVotePi($numvotePi) {
    $this->numvotePi = $numvotePi;
  }
  /* Devuelve el ultimo codigo de voto asignado a un Pincho */
  public function getParticipanteEmail() {
    return $this->ParticipanteEmail;
  }

  /* Pone el ultimo codigo de voto asignado a un Pincho */
  public function SetParticipanteEmail($ParticipanteEmail) {
    $this->ParticipanteEmail = $ParticipanteEmail;
  }

  /* Comprueba si el Pincho es valido para registrarse en la base de datos */

  public function checkIsValidForRegister($idPi) {

    $errors = array();
    if (strlen($this->nombrePi) < 5) {
      $errors["nombrePi"] = "El nombre del pincho debe contener al menos 5 caracteres de longitud";
    }

    if (sizeof($errors)>0){
      throw new ValidationException($errors, "El pincho no es válido");
    }

  }

  /* Guarda el Pincho en la base de datos */

  public function save() {
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("INSERT INTO pincho values (?,?,?,?,?,?,?,?,?)");
    $stmt->execute(array($idCV,$pinchoId));
  }
}
