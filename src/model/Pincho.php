<?php
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class Pincho {

  private $db;
  
   /* El id del Pincho */
   
  private $idPi;

  /* La nombre del Pincho */
  
  private $nombrePi;
  
  /* El precio del Pincho */
   
  private $precioPi;

  /* La descripcion del Pincho */
  
  private $descripcionPi;
  
  /* El cocinero del Pincho */
   
  private $cocineroPi;

  /* El numero de votos del Pincho */
  
  private $numVotosPi;
  
  /* La foto del Pincho */
  
  private $fotoPi;
  
  /* El estado del Pincho */
  
  private $estadoPi;
  
  /* El ParticipanteEmail del Pincho */
  
  private $ParticipanteEmail;
   
   public function __construct($idPi=NULL, $nombrePi=NULL, $precioPi=NULL, $descripcionPi=NULL, $cocineroPi=NULL, $numVotosPi=NULL, $fotoPi=NULL, $estadoPi=NULL, $ParticipanteEmail=NULL) {
	$this->db = PDOConnection::getInstance();
    $this->idPi = $idPi;
    $this->nombrePi = $nombrePi; 
	$this->precioPi = $precioPi;
    $this->descripcionPi = $descripcionPi; 
	$this->cocineroPi = $cocineroPi;
    $this->numVotosPi = $numVotosPi; 	
	$this->fotoPi = $fotoPi; 
	$this->estadoPi = $estadoPi;
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
  public function getParticipanteEmail() {
    return $this->ParticipanteEmail;
  }

  /* Pone el ParticipanteEmail del Pincho */  
  public function SetParticipanteEmail($ParticipanteEmail) {
    $this->ParticipanteEmail = $ParticipanteEmail;
  }
  
 /* Comprueba si el Pincho es válido para registrarse en la base de datos */  
  
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
    $stmt = $this->db->prepare("INSERT INTO pincho values (?,?,?,?,?,?,?,?,?)");
    $stmt->execute(array($this->idPi, $this->nombrePi, $this->precioPi, $this->descripcionPi, $this->cocineroPi, $this->numVotosPi, $this->fotoPi, $this->estadoPi, $this->ParticipanteEmail));  
  }
  
  /* Comprueba si el id xa existe en la base de datos */
  
  public function idExists() {
  
    $stmt = $this->db->prepare("SELECT count(idPi) FROM pincho where idPi=?");
    $stmt->execute(array($this->idPi));
    
    if ($stmt->fetchColumn() > 0) {   
      return true;
    } 
  }
}


