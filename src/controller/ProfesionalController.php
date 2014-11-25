<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../controller/DBController.php");

class ProfesionalController extends DBController {
 
  private $user;    
  
  public function __construct() {    
    parent::__construct();
    
    $this->user = new User();
     //$this->view->setLayout("welcome"); 
  }