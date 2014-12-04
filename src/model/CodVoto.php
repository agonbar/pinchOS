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


  //Genera el un codigo de voto a partir del id de un pincho
  public function generateIdVote($IdPi){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM codVoto where pinchoId =?");//cuenta los codigos de voto de un pincho
    $stmt->execute(array($IdPi));
    $vcount=$stmt->rowCount();
    $numvoto=1;//es el numero de votos que se han generado para un pincho
    //print_r($vcount);die();
    if ($vcount > 0){
      $numvoto = $vcount+1;
    }
    $IdVoto = $this->pinchoId.$numvoto;
    return $IdVoto;
  }

  /* Guarda el Codigo del voto ligado a un Pincho en la base de datos */
  public function saveCV($idCVtemp) {
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("INSERT INTO codVoto values (?)");
    $stmt->execute(array($idCVtemp));
  }

  //Genera y guarda los 4 primeros codigos de votos ligados a un pincho
  public function genSaveCV($IdPi){
    $idCV1 = $this->generateIdVote($IdPi);
    $idCV2 = $this->generateIdVote($IdPi);
    $idCV3 = $this->generateIdVote($IdPi);
    $idCV4 = $this->generateIdVote($IdPi);
    //die();
    $this->saveCV($idCV1);
    $this->saveCV($idCV2);
    $this->saveCV($idCV3);
    $this->saveCV($idCV4);
  }
}
