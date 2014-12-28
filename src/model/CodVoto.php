<?php
require_once(__DIR__."/../model/Pincho.php");
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class CodVoto {

  private $idCV;/* El id del Pincho */
  private $pinchoId;/* La nombre del Pincho */
  private $pincho;

  public function __construct($idCV=NULL,$pinchoId=NULL) {

    $this->idCV = $idCV;
    $this->pinchoId = $pinchoId;

    $this->pincho = new Pincho();
  }



  /* Devuelve el id del Codigo del Voto */
  public function getIdCV() {
    return $this->idCV;
  }

  /* Pone el id del Codigo del Voto */
  public function setIdCV($idCV) {
    $this->idCV = $idCV;
  }

  /* Devuelve el id del Pincho */
  public function getPinchoId() {
    return $this->pinchoPi;
  }

  /* Pone el id del Pincho */
  public function setPinchoId($pinchoId) {
    $this->nombrePi = $pinchoPi;
  }


  //

  /**
  *
  * Genera el un 4 codigos de voto a partir del id de un pincho y los introduce
  * en la base de datos.
  * @param string $tipob Tipo de parametro de busqueda. string $param.
  * Parametro de busqueda introducido por el usuario
  * @return $pinchos[][] array. Devuelve un array con los pinchos que
  * cumplen las condiciones de busqueda
  * @access public
  *
  */

  public function generateCodVote($IdPi){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT idCV FROM codVoto where pinchoId=?");//cuenta los codigos de voto de un pincho
    $stmt->execute(array($IdPi));
    $CV=$stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($vcount);die();
    for ($i = 1; $i <= 4; $i++) {
      $idCVtemp = sizeof($CV)+$i;
      $IdVoto = $IdPi.$idCVtemp;
      //print_r($IdVoto);die();
      $stmt = $db->prepare("INSERT INTO codVoto values (?,?)");
      $stmt->execute(array($IdVoto,$IdPi));

    }
    //print_r($IdPi);die();
  }

  public function generateMoreCV($IdPi, $numCV){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT idCV FROM codVoto where pinchoId=?");//cuenta los codigos de voto de un pincho
    $stmt->execute(array($IdPi));
    $CV=$stmt->fetch(PDO::FETCH_ASSOC);
    for ($i = 1; $i <= 4; $i++) {
      $idCVtemp = $numCV+$i;
      $IdVoto = $IdPi.$idCVtemp;
      //print_r($IdVoto);die();
      $stmt = $db->prepare("INSERT INTO codVoto values (?,?)");
      $stmt->execute(array($IdVoto,$IdPi));

    }
    //print_r($IdPi);die();
  }

}
