<?php
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class User {

  //private $db;
  
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
  
  private $concursoId;
   
   public function __construct($emailU=NULL, $contrasenaU=NULL, $tipoU=NULL, $estadoU=NULL, $nombreU=NULL, $concursoId=NULL) {
	
    $this->emailU = $emailU;
    $this->contrasenaU = $contrasenaU; 
	$this->tipoU = $tipoU;
    $this->estadoU = $estadoU; 
	$this->nombreU = $nombreU;
    $this->concursoId = $concursoId; 	
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
  public function getTipoU() {
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
  public function getConcursoId() {
    return $this->concursoId;
  }

  /* Pone el concurso del User */  
  public function setConcursoId($concursoId) {
    $this->concursoId = $concursoId;
  }
  
  /* Comprueba si el usuario actual es válido para registrarse en la base de datos */  
  
  public function checkIsValidForRegister($contrasenaU2) {
  
      $errors = array();
      if (strlen($this->emailU) < 5) {
		$errors["emailU"] = "El email debe contener al menos 5 caracteres de longitud";
      }
	  if ($this->tipoU == 'N') {
		$errors["tipoU"] = "No has escogido el tipo de usuario";
      }
	  if (strlen($this->nombreU) < 5) {
		$errors["nombreU"] = "El nombre debe contener al menos 5 caracteres de longitud";
      }
      if (strlen($this->contrasenaU) < 5) {
		$errors["contrasenaU"] = "La contraseña debe contener al menos 5 caracteres de longitud";	
      }
	  
	  if ($this->contrasenaU != $contrasenaU2) {
		$errors["contrasenaU2"] = "Las contraseñas no coinciden";	
      }
      if (sizeof($errors)>0){
		throw new ValidationException($errors, "El usuario no es válido");
      }
	  
  }

  public function checkIsValidForRegisterProf(){
	$errors = array();
      if (strlen($this->emailU) < 5) {
		$errors["emailU"] = "El email debe contener al menos 5 caracteres de longitud";
      }
	  if (strlen($this->nombreU) < 5) {
		$errors["nombreU"] = "El nombre debe contener al menos 5 caracteres de longitud";
      }
	  if (strlen($this->contrasenaU) < 5) {
		$errors["contrasenaU"] = "La contraseña debe contener al menos 5 caracteres de longitud";	
      }
	  if (sizeof($errors)>0){
		throw new ValidationException($errors, "El usuario no es válido");
      }
  }

  /* Guarda el User en la base de datos */    
  
  public function save() {
  $db = PDOConnection::getInstance();
    $stmt = $db->prepare("INSERT INTO usuario values (?,?,?,?,?,?)");
    $stmt->execute(array($this->emailU, $this->contrasenaU, $this->tipoU, $this->estadoU, $this->nombreU, $this->concursoId));  
  }
  
  /* Comprueba si el email xa existe en la base de datos */
  
  public function usernameExists() {
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT count(emailU) FROM usuario where emailU=?");
    $stmt->execute(array($this->emailU));
    
    if ($stmt->fetchColumn() > 0) {   
      return true;
    } 
  }
  
  /* Comprueba si el par of username/password existe en la base de datos */
   
  public function isValidUser($emailU, $contrasenaU) {
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT count(emailU) FROM usuario where emailU=? and contrasenaU=?");
    $stmt->execute(array($emailU, $contrasenaU));
    
    if ($stmt->fetchColumn() > 0) {
      return true;        
    }
  }
  
  /* Muestra los datos del usuario actual */
  
  public function ver_datos($emailU) {
  $db = PDOConnection::getInstance();
		$stmt = $db->prepare("SELECT * FROM usuario where emailU=?");
		$stmt->execute(array($emailU));
		$user_db=$stmt->fetch(PDO::FETCH_ASSOC);
		
		if(sizeof($user_db)==0){
			return null;
			
		}else{
			return new User(
			$user_db["emailU"],
			$user_db["contrasenaU"],
			$user_db["tipoU"],
			$user_db["estadoU"],
			$user_db["nombreU"],
			$user_db["concursoId"]
			);
		}
	}
	
}


