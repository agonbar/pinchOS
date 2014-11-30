<?php
require_once(__DIR__."/../model/Pincho.php");
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class CodVoto {

  private $db;
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
  public function setPinchoId($pnchoId) {
    $this->nombrePi = $pinchoPi;
  }


  //Genera el un codigo de voto a partir del id de un pincho
  public function generateIdVote(){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT count(numvotePi) FROM pincho where idPi =?");
    $stmt->execute(array($this->pinchoId));
    $numvoto=1;//es el numero de votos que se han generado para un pincho

    if ($stmt->fetchColumn() > 0){
      $numvoto = $stmt+1;
    }
    return $this->pichoId.$numvoto;
  }

  /* Guarda el Codigo del voto ligado a un Pincho en la base de datos */
  public function save($idCVtemp) {
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("INSERT INTO codVoto values (?,?)");
    $stmt->execute(array($idCVtemp,$pinchoId));
  }

  //Genera y guarda los 4 primeros codigos de votos ligados a un pincho
  public function save4(){
    $idCV1 = generateIdVote();
    $idCV2 = generateIdVote();
    $idCV3 = generateIdVote();
    $idCV4 = generateIdVote();

    save($idCV1);
    save($idCV2);
    save($idCV3);
    save($idCV4);
  }
}
