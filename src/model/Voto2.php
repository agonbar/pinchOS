<?php
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
  

}


