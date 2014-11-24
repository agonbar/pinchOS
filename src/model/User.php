<?php

require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class User {

  private $db;
  
   /* El email del User */
   
  private $emailU;

  /* La contraseña del User */
  
  private $contrasenaU;
  
  /* El tipo del User */
   
  private $tipoU;

  /* La estado del User */
  
  private $estadoU;
  
  /* El nombre del User */
   
  private $nombreU;

  /* La concurso del User */
  
  private $Concurso_idC1;
   
   public function __construct($emailU=NULL, $contrasenaU=NULL, $tipoU=NULL, $estadoU=NULL, $nombreU=NULL, $Concurso_idC1=NULL) {
	$this->db = PDOConnection::getInstance();
    $this->emailU = $emailU;
    $this->contrasenaU = $contrasenaU; 
	$this->tipoU = $tipoU;
    $this->estadoU = $estadoU; 
	$this->nombreU = $nombreU;
    $this->Concurso_idC1 = $Concurso_idC1; 	
  }
  
  
    /* Devuelve el email del User */  
  public function getEmailU() {
    return $this->emailU;
  }

  /* Pone el email del User */  
  public function setEmailU($emailU) {
    $this->emailU = $emailU;
  }
  
   /* Devuelve la contraseña del User */  
  public function getContrasenaU() {
    return $this->contrasenaU;
  }

  /* Pone la contraseña del User */  
  public function setContrasenaU($contrasenaU) {
    $this->contrasenaU = $contrasenaU;
  }
  
   /* Devuelve el tipo del User */  
  public function getRipoU() {
    return $this->tipoU;
  }

  /* Pone el tipo del User */  
  public function setTipoU($tipoU) {
    $this->tipoU = $tipoU;
  }
  
   /* Devuelve el estado del User */  
  public function getEstadoU() {
    return $this->estadoU;
  }

  /* Pone el estado del User */  
  public function setEstadoU($estadoU) {
    $this->estadoU = $estadoU;
  }
  
   /* Devuelve el nombre del User */  
  public function getNombreU() {
    return $this->nombreU;
  }

  /* Pone el nombre del User */  
  public function setNombreU($nombreU) {
    $this->nombreU = $nombreU;
  }
  
   /* Devuelve el concurso del User */  
  public function getConcurso_idC1() {
    return $this->Concurso_idC1;
  }

  /* Pone el concurso del User */  
  public function setConcurso_idC1($Concurso_idC1) {
    $this->Concurso_idC1 = $Concurso_idC1;
  }
  
  /* Comprueba si el usuario actual es válido para registrarse en la base de datos */  
  
  public function checkIsValidForRegister() {
      $errors = array();
      if (strlen($this->emailU) < 5) {
	$errors["emailU"] = "El email debe contener al menos 5 caracteres de longitud";
      }
      if (strlen($this->contrasenaU) < 5) {
	$errors["contrasenaU"] = "LA contraseña debe contener al menos 5 caracteres de longitud";	
      }
      if (sizeof($errors)>0){
	throw new ValidationException($errors, "El usuario no es válido");
      }
  } 

  /* Guarda el User en la base de datos */    
  
  public function save($user) {
    $stmt = $this->db->prepare("INSERT INTO usuario values (?,?,?,?,?,?)");
    $stmt->execute(array($user->getEmailU(), $user->getContrasenaU(), $user->getTipoU(), $user->getEstadoU(), $user->getNombreU(), $user->getConcurso_idC1()));  
  }
  
  /* Comprueba si el email xa existe en la base de datos */
  
  public function usernameExists($emailU) {
    $stmt = $this->db->prepare("SELECT count(emailU) FROM usuario where emailU=?");
    $stmt->execute(array($emailU));
    
    if ($stmt->fetchColumn() > 0) {   
      return true;
    } 
  }
  
  /* Comprueba si el par of username/password existe en la base de datos */
   
  public function isValidUser($emailU, $contrasenaU) {
    $stmt = $this->db->prepare("SELECT count(emailU) FROM usuario where emailU=? and contrasenaU=?");
    $stmt->execute(array($emailU, $contrasenaU));
    
    if ($stmt->fetchColumn() > 0) {
      return true;        
    }
  }
  
  /* Muestra los datos del usuario actual */
  
  public function ver_datos($emailU) {
		$stmt = $this->db->prepare("SELECT * FROM usuario where emailU=?");
		$stmt->execute(array($emailU));
		$users_db=$stmt->fetch(PDO::FETCH_ASSOC);
		
		if(sizeof($users_db)==0){
			return null;
		}else{
			return new User(
			$users_db["emailU"],
			$users_db["contrasenaU"],
			$users_db["tipoU"],
			$users_db["estadoU"],
			$users_db["nombreU"],
			$users_db["Concurso_idC1"]
			);
		}
	}
}


