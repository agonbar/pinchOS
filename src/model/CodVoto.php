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

  /* Devuelve el id del Pincho */
  public function getIdCV() {
    return $this->idCV;
  }

  /* Pone el id del Pincho */
  public function setIdCV($idCV) {
    $this->idCV = $idCV;
  }

  /* Devuelve el nombre del Pincho */
  public function getPinchoId() {
    return $this->nombrePi;
  }

  /* Pone el nombre del Pincho */
  public function setPinchoId($pnchoId) {
    $this->nombrePi = $nombrePi;
  }

  /* Guarda el Pincho en la base de datos */

  public function save() {
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("INSERT INTO pincho values (?,?)");
    $stmt->execute(array($idCV,$pinchoId));
  }
}
