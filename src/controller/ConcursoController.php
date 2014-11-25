<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../model/Concurso.php");
require_once(__DIR__."/../controller/DBController.php");

class ConcursoController extends DBController {
 
  private $concurso;    
  
  public function __construct() {    
    parent::__construct();
    
    $this->concurso = new Concurso();
     //$this->view->setLayout("welcome"); 
  }