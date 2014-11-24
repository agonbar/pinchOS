<?php
require_once(__DIR__."/../core/ViewManager.php");
//require_once(__DIR__."/../model/User.php");
//require_once(__DIR__."/../model/UserMapper.php");
require_once(__DIR__."/../controller/DBController.php");
/**
 * Class UsersController
 * 
 * Controller to login, logout and user registration
 * 
 * @author lipido <lipido@gmail.com>
 */
class UsersController extends DBController {
  
  /**
   * Reference to the UserMapper to interact
   * with the database
   * 
   * @var UserMapper
   */  
  private $userMapper;    
  
  public function __construct() {    
    parent::__construct();
    
    //$this->userMapper = new UserMapper();
    // Users controller operates in a "welcome" layout
    // different to the "default" layout where the internal
    // menu is displayed
    //$this->view->setLayout("welcome");     
  }

  
  public function login() {
     
    // render the view (/view/users/login.php)
    $this->view->render("vistas", "login");    
  }
  
   public function registro() {
     
    // render the view (/view/users/login.php)
    $this->view->render("vistas", "registro");    
  }
  
 
  
}