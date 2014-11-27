<?php
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class Voto {

  //private $db;

   /* El email del Usuario */

  private $usuarioEmailU;

  /* El Id del Pincho */

  private $pinchoIdPi;

  /* El codigo del Pincho */

  private $codigoPinchoV;

  /* La valoracion del Pincho */

  private $valoracionV;


   public function __construct($usuarioEmailU=NULL, $pinchoIdPi=NULL, $codigoPinchoV=NULL, $valoracionV=NULL) {

    $this->usuarioEmailU = $usuarioEmailU;
    $this->pinchoIdPi = $pinchoIdPi;
	$this->codigoPinchoV = $codigoPinchoV;
    $this->valoracionV = $valoracionV;
  }


    /* Devuelve el email del User */
  public function getUsuarioEmailU() {
    return $this->usuarioEmailU;
  }

  /* Pone el email del User */
  public function setUsuarioEmailU($usuarioEmailU) {
    $this->usuarioEmailU = $usuarioEmailU;
  }

   /* Devuelve el id del Pincho */
  public function getPinchoIdPi() {
    return $this->pinchoIdPi;
  }

  /* Pone el id del Pincho */
  public function setPinchoIdPi($pinchoIdPi) {
    $this->pinchoIdPi = $pinchoIdPi;
  }

   /* Devuelve el codigo del Pincho */
  public function getCodigoPinchoV() {
    return $this->codigoPinchoV;
  }

  /* Pone el codigo del Pincho */
  public function setCodigoPinchoV($codigoPinchoV) {
    $this->codigoPinchoV = $codigoPinchoV;
  }

   /* Devuelve la valoracion del Pincho */
  public function getValoracionV() {
    return $this->valoracionV;
  }

  /* Pone la valoracion del Pincho */
  public function setValoracionV($valoracionV) {
    $this->valoracionV = $valoracionV;
  }
  
  
  public function checkIsValidForVoto(){
	
	$errors = array();
	
    if ($this->valoracionV ==  'N') {
      $errors["valoracionV"] = "Se debe seleccionar una valoracion";
    }
    
    if (sizeof($errors)>0){
      throw new ValidationException($errors, "La votacion no es válida");
    }
	
  }
  
  
  public function save() {
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("INSERT INTO voto values (?,?,?,?)");
    $stmt->execute(array($this->usuarioEmailU, $this->pinchoIdPi, $this->codigoPinchoV, $this->valoracionV));
  }
  
  
  public function votoExist(){
  
	$db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT count(*) FROM voto where codigoPinchoV=?");
    $stmt->execute(array($this->codigoPinchoV));

    if ($stmt->fetchColumn() > 0) {
      return true;
    }else return false;
  }
  
  
  public function isCorrectCode(){
  
	$db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT pinchoId FROM codVoto where idCV=?");
    $stmt->execute(array($this->codigoPinchoV));
	$codigo=$stmt->fetch(PDO::FETCH_ASSOC);
	
    if (sizeof($codigo)==0) {
        return false;
    }else {
		$this->pinchoIdPi = $codigo["pinchoId"];
		return true;
	}
	
  }
  
  public function ver_datosVotos($emailU) {
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT p.nombreLocalP,v.* FROM participante p,voto v WHERE v.usuarioEmailU like ? ");
    $stmt->execute(array($emailU));
    $user_db=$stmt->fetch(PDO::FETCH_ASSOC);

    if(sizeof($user_db)==0){
      return null;

    }else{
      return new Datos(
      $user_db["usuarioEmailU"],
      $user_db["pinchoIdPi"],
      $user_db["valoracionV"]
      //$user_db["nombreLocalP"],
      );
    }
  }
  
  
  


}
