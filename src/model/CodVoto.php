<?php
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class CodVoto {

  private $db;
  private $idCV;/* El id del Pincho */
  private $pinchoId;/* La nombre del Pincho */

  public function __construct($idCV=NULL,$nombrePi=NULL) {
    $this->idCV = $idCV;
    $this->pinchoId = $pinchoId;
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
    return $this->nombrePi;
  }

  /* Pone el id del Pincho */
  public function setPinchoId($pnchoId) {
    $this->nombrePi = $nombrePi;
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
    $this->numvotePi = $this->pichoId.$numvoto;
  }

  /* Guarda el Voto ligado a un Pincho en la base de datos */
  public function save($idCVtemp) {
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("INSERT INTO pincho values (?,?)");
    $stmt->execute(array($idCVtemp,$pinchoId));
  }

  //Genera los 4 primeros codigos de votos ligados a un pincho
  $idCV1 = generateIdVote();
  $idCV2 = generateIdVote();
  $idCV3 = generateIdVote();
  $idCV4 = generateIdVote();

  //Guarda los cuatro codigos de voto ligador a un pincho
  save($idCV1);
  save($idCV2);
  save($idCV3);
  save($idCV4);
}
