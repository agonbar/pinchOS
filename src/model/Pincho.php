<?php
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class Pincho {

  private $idPi;/* El id del Pincho */
  private $nombrePi;/* La nombre del Pincho */
  private $precioPi;/* El precio del Pincho */
  private $ingredientesPi;/* La ingredientes del Pincho */
  private $cocineroPi;/* El cocinero del Pincho */
  private $numVotosPi;/* El numero de veces que un picho ha sido votado */
  private $fotoPi;//guarda el directorio donde se almacenará la imagen
  private $fotoPiSize;//guarda el tamaño del la imagen
  private $estadoPi;/* El estado del Pincho */
  private $numvotePi;/* Es el numero de votos creados para un Pincho*/
  private $ParticipanteEmail;/* El ParticipanteEmail del Pincho */

  public function __construct($idPi=NULL,
  $nombrePi=NULL,
  $precioPi=NULL,
  $ingredientesPi=NULL,
  $cocineroPi=NULL,
  $numvotosPopPi=NULL,
  $numvotosProfPi=NULL,
  $fotoPi=NULL,
  $fotoPiSize=NULL,
  $estadoPi=NULL,
  $ParticipanteEmail=NULL,
  $numvotePi=NULL) {
    $this->idPi = $idPi;
    $this->nombrePi = $nombrePi;
    $this->precioPi = $precioPi;
    $this->ingredientesPi = $ingredientesPi;
    $this->cocineroPi = $cocineroPi;
    $this->numvotosPopPi = $numvotosPopPi;
    $this->numvotosProfPi = $numvotosProfPi;
    $this->fotoPi = $fotoPi;
    $this->fotoPiSize = $fotoPiSize;
    $this->estadoPi = $estadoPi;
    $this->numvotePi = $numvotePi;
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

  /* Devuelve la ingredientes del Pincho */
  public function getIngredientesPi() {
    return $this->ingredientesPi;
  }

  /* Pone la ingredientes del Pincho */
  public function setIngredientesPi($ingredientesPi) {
    $this->ingredientesPi = $ingredientesPi;
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
  public function getNumVotosPopPi() {
    return $this->numvotosPopPi;
  }

  /* Pone el numero de votos del Pincho */
  public function setNumVotosPopPi($numvotosPopPi) {
    $this->numvotosPopPi = $numvotosPopPi;
  }

  /* Devuelve el numero de votos del Pincho */
  public function getNumVotosProfPi() {
    return $this->numvotosProfPi;
  }

  /* Pone el numero de votos del Pincho */
  public function setNumVotosProfPi($numvotosProfPi) {
    $this->numvotosProfPi = $numvotosProfPi;
  }

  /* Devuelve la foto del Pincho */
  public function getFotoPi() {
    return $this->fotoPi;
  }

  /* Pone la foto del Pincho */
  public function setFotoPi($fotoPi,$fotoPiSize) {
    $this->fotoPi = $fotoPi;
    $this->fotoPiSize = $fotoPiSize;
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
  public function getNumVotePi() {
    return $this->numvotePi;
  }

  /* Pone el ParticipanteEmail del Pincho */
  public function setNumVotePi($numvotePi) {
    $this->numvotePi = $numvotePi;
  }
  /* Devuelve el ultimo codigo de voto asignado a un Pincho */
  public function getParticipanteEmail() {
    return $this->ParticipanteEmail;
  }

  /* Pone el ultimo codigo de voto asignado a un Pincho */
  public function setParticipanteEmail($ParticipanteEmail) {
    $this->ParticipanteEmail = $ParticipanteEmail;
  }

  /* Comprueba si el id ya existe en la base de datos */
  public function pinchoExists($Participante) {
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM pincho where ParticipanteEmail=?");
    $stmt->execute(array($Participante));

    if ($stmt->fetchColumn() > 0) {
      return true;
    }
  }

  /* Comprueba si alguno de los parametros es nulo o menor del tamaño esperado*/
  public function checkInfoIfNullPi(){

    $errors = array();
    if (strlen($this->nombrePi) < 1) {
      $errors["nombrePi"] = "El nombre debe contener al menos 1 caracteres de longitud";
    }
    if (strlen($this->ingredientesPi) < 5) {
      $errors["ingredientesPi"] = "Los ingredientes debe contener al menos 5 caracteres de longitud";
    }
    if (strlen($this->precioPi) < 1) {
      $errors["precioPi"] = "El precio NO puede ser NULO";
    }
    if (strlen($this->cocineroPi) < 1) {
      $errors["cocineroPi"] = "El nombre del cocinero/a debe contener al menos 1 caracteres de longitud";
    }
    if (sizeof($errors)>0){
      throw new ValidationException($errors, "El pincho no es válido");
    }
  }

  //Revisa la informacion introducida por el participante
  public function checkInfoPi(){

    $errors = array();

    if($this->fotoPiSize>(2048*1024)){//el archivo no puede ser mayor de 2MB
      $errors["fotoPi"] = "El tamaño de la imagen debe ser INFERIOR a 2MB";
    }
    if($this->precioPi < 1){//el archivo no puede ser mayor de 2MB
      $errors["precioPi"] = "El precio del pincho debe ser al menos de 1€";
    }
    if (sizeof($errors)>0){
      throw new ValidationException($errors, "El pincho no es válido");
    }
  }

  //Crea el codigo de un pincho
  public function generateIdPi(){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM pincho");
    $pcount=$stmt->rowCount();
    $numpinchos = 1;
    //print_r($pcount);die();
    if ($pcount > 0){
      $numpinchos = $stmt+1;
    }
    //print_r($numpinchos);die();
    return $numpinchos;
  }

  /* Guarda el Pincho en la base de datos */
  public function savePi() {
    $db = PDOConnection::getInstance();

    $stmt = $db->prepare("INSERT INTO pincho values (?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute(array($this->idPi,
    $this->nombrePi,
    $this->precioPi,
    $this->ingredientesPi,
    $this->cocineroPi,
    $this->numvotosPopPi,
    $this->numvotosProfPi,
    $this->fotoPi,
    $this->estadoPi,
    $this->ParticipanteEmail,
    $this->numvotePi));
  }

  public function showDatesPi(){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM pincho");
    $stmt->execute();
    $pincho_db=$stmt->fetch(PDO::FETCH_ASSOC);

    if(sizeof($pincho_db)==0){
      return null;
    }else{
      return new Pincho($pincho_db["idPi"],
      $pincho_db["nombrePi"],
      $pincho_db["precioPi"],
      $pincho_db["ingredientesPi"],
      $pincho_db["cocineroPi"],
      $pincho_db["numvotosPopPi"],
      $pincho_db["numvotosProfPi"],
      $pincho_db["fotoPi"],
      0,//indica si tiene errores la foto
      $pincho_db["estadoPi"],
      $pincho_db["participanteEmail"],
      $pincho_db["numvotePi"]);

    }
  }

  public function updatePi() {
    $db = PDOConnection::getInstance();
    //print_r($this->estadoPi);die();
    $stmt = $db->prepare("UPDATE pincho SET estadoPi=? where idPi=?");
    $stmt->execute(array($this->estadoPi, $this->idPi));
    //print_r($this->estadoPi);die();
  }

  public function listarPi(){
    $activo = "1";
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM pincho where estadoPi=?");
    $stmt->execute(array(($activo)));
    $pinchos_db=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $pinchos=array();

    foreach ($pinchos_db as $pincho) {
      array_push($pinchos, new Pincho($pincho["idPi"],
      $pincho["nombrePi"],
      $pincho["precioPi"],
      $pincho["ingredientesPi"],
      $pincho["cocineroPi"],
      $pincho["numvotosPopPi"],
      $pincho["numvotosProfPi"],
      $pincho["fotoPi"],
      0,//indica si tiene errores la foto
      $pincho["estadoPi"],
      $pincho["participanteEmail"],
      $pincho["numvotePi"]));
    }
    return $pinchos;
  }

  public function searchNamePi($nPi){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT * FROM pincho where nombrePi=?");
    $stmt->execute(array($nPi));
    $pinchos_db=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $pinchos=array();

    foreach ($pinchos_db as $pincho) {
      array_push($pinchos, new Pincho($pincho["idPi"],
      $pincho["nombrePi"],
      $pincho["precioPi"],
      $pincho["ingredientesPi"],
      $pincho["cocineroPi"],
      $pincho["numvotosPopPi"],
      $pincho["numvotosProfPi"],
      $pincho["fotoPi"],
      0,//indica si tiene errores la foto
      $pincho["estadoPi"],
      $pincho["participanteEmail"],
      $pincho["numvotePi"]));
    }
    return $pinchos;
  }

  public function listarPrem(){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT `pincho`.* FROM premiados, pincho WHERE (`premiados`.`idPrem` = `pincho`.`idPi`)");
    $stmt->execute();
    $premiados = $stmt->fetchAll(PDO::FETCH_BOTH);
    return $premiados;
  }

  public function crearFin(){
    $db = PDOConnection::getInstance();
    $stmt1 = $db->prepare("SELECT `pincho`.`idPi` FROM pincho ORDER BY `pincho`.`numvotosPopPi` DESC");
    $stmt1->execute();
    $premiados = $stmt1->fetchAll(PDO::FETCH_BOTH);
    $stmt2 = $db->prepare("DELETE FROM `premiados`");
    $stmt2->execute();
    foreach($premiados as $premiado){
      $stmt3 = $db->prepare("INSERT INTO `premiados`(`idPrem`, `ronda`) VALUES (?,'1')");
      $stmt3->execute(array($premiado['idPi']));
    }
    $stmt4 = $db->prepare("UPDATE `pincho` SET `numvotosPopPi`=0");
    $stmt4->execute();
  }
}
