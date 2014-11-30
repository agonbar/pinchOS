<?php
require_once(__DIR__."/../core/PDOConnection.php");
require_once(__DIR__."/../core/ValidationException.php");

class Pincho {

  private $db;
  private $idPi;/* El id del Pincho */
  private $nombrePi;/* La nombre del Pincho */
  private $precioPi;/* El precio del Pincho */
  private $ingredientesPi;/* La ingredientes del Pincho */
  private $cocineroPi;/* El cocinero del Pincho */
  private $numVotosPi;/* El numero de veces que un picho ha sido votado */
  private $fotoPi;//guarda el directorio donde se almacenará la imagen
  private $fotoPiTemp;//guarda el directorio temporal donde esta la imagen
  private $fotoPiSize;//guarda el tamaño del la imagen
  private $estadoPi;/* El estado del Pincho */
  private $numvotePi;/* Es el numero de votos creados para un Pincho*/
  private $ParticipanteEmail;/* El ParticipanteEmail del Pincho */

  public function __construct($idPi=NULL,
                              $nombrePi=NULL,
                              $precioPi=NULL,
                              $ingredientesPi=NULL,
                              $cocineroPi=NULL,
                              $numVotosPi=NULL,
                              $fotoPi=NULL,
                              $fotoPiSize=NULL,
                              $estadoPi=NULL,
                              $numvotePi=NULL,
                              $ParticipanteEmail=NULL) {
    $this->idPi = $idPi;
    $this->nombrePi = $nombrePi;
    $this->precioPi = $precioPi;
    $this->ingredientesPi = $ingredientesPi;
    $this->cocineroPi = $cocineroPi;
    $this->numVotosPi = $numVotosPi;
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
  public function getNumVotosPi() {
    return $this->numVotosPi;
  }

  /* Pone el numero de votos del Pincho */
  public function setNumVotosPi($numVotosPi) {
    $this->numVotosPi = $numVotosPi;
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

  /* Comprueba si el Pincho es valido para registrarse en la base de datos */

  public function checkIsValidForRegister($idPi) {

    $errors = array();
    if (strlen($this->nombrePi) < 5) {
      $errors["nombrePi"] = "El nombre del pincho debe contener al menos 5 caracteres de longitud";
    }

    if (sizeof($errors)>0){
      throw new ValidationException($errors, "El pincho no es válido");
    }

  }

  /* Comprueba si el id ya existe en la base de datos */
  public function pinchoExists() {
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT count(idPi) FROM pincho where idPi=?");
    $stmt->execute(array($this->idPi));

    if ($stmt->fetchColumn() > 0) {
      return true;
    }
  }

  /* Comprueba si alguno de los parametros es nulo o menor del tamaño esperado*/
  public function checkInfoIfNull(){

    $errors = array();
    if (strlen($this->nombrePi) < 5) {
      $errors["nombrePi"] = "El nombre debe contener al menos 5 caracteres de longitud";
    }
    if (strlen($this->ingredientesPi) < 10) {
      $errors["ingredientesPi"] = "Los ingredientes debe contener al menos 10 caracteres de longitud";
    }
    if (strlen($this->precioPi) < 1) {
      $errors["cocineroPi"] = "El precio NO puede ser NULO";
    }
    if (strlen($this->cocineroPi) < 5) {
      $errors["cocineroPi"] = "El nombre del cocinero/a debe contener al menos 5 caracteres de longitud";
    }
  }

  //Revisa la informacion introducida por el participante
  public function checkInfo(){

    $errors = array();

    if($fotoPiSize>(2048*1024)){//el archivo no puede ser mayor de 2MB
      $errors["fotoPi"] = "El tamaño de la imagen debe ser INFERIOR a 2MB";
    }
    if($fotoPiSize>1){//el archivo no puede ser mayor de 2MB
      $errors["fotoPi"] = "El precio del pincho debe ser al menos de 1€";
    }
  }

  //Crea el codigo de un pincho
  public function generateIdPi(){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT count(idPi) FROM pincho");
    $stmt->execute(array($this->idPi));
    $numpinchos = 1;

    if ($stmt->fetchColumn() > 0){
      $numpinchos = $stmt+1;
    }
    return $numpinchos;
  }

  //Cuenta el numero de codigo de voto asociados a un Pincho
  public function countvotePi(){
    $db = PDOConnection::getInstance();
    $stmt = $db->prepare("SELECT count(idCV) FROM codVoto");
    $stmt->execute(array($this->idPi));
    return $stmt;
  }

  /* Guarda el Pincho en la base de datos */
  public function save() {
    $db = PDOConnection::getInstance();

    $stmt = $db->prepare("INSERT INTO pincho values (?,?,?,?,?,?,?,?,?)");
    $stmt->execute(array($this->idPi,
                         $this->nombrePi,
                         $this->precioPi,
                         $this->ingredientesPi,
                         $this->cocineroPi,
                         $this->numVotosPi,
                         $this->fotoPi,
                         $this->estadoPi,
                         $this->numvotePi,
                         $this->ParticipanteEmail));
  }

  public function showDates(){
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
                        $pincho_db["numVotosPi"],
                        $pincho_db["fotoPi"],
                        $pincho_db["fotoSizePi"],
                        $pincho_db["estadoPi"],
                        $pincho_db["numvotePi"],
                        $pincho_db["ParticipanteEmail"]);
    }
  }

  public function update() {
    $db = PDOConnection::getInstance();

    $stmt = $db->prepare("INSERT INTO pincho values (?,?,?,?,?,?,?,?,?)");
    $stmt->execute(array($this->idPi,
                         $this->nombrePi,
                         $this->precioPi,
                         $this->ingredientesPi,
                         $this->cocineroPi,
                         $this->numVotosPi,
                         $this->fotoPi,
                         $this->estadoPi,
                         $this->numvotePi,
                         $this->ParticipanteEmail));
  }

}
