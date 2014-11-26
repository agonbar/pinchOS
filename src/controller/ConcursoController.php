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
  
  

  public function consultarConcurso() {
		
	$concu = $this->concurso->ver_datos();	
	
	if ($concu == NULL) {
	  throw new Exception("No existe ningun concurso para mostrar");
	}
	
	// put the Post object to the view
	$this->view->setVariable("concu", $concu);	
  
	$this->view->render("vistas", "consultaConcurso"); 
  }
  
  
  
  
  
  public function modificarConcurso() {
  
   $concu= new Concurso();
   
    if (isset($_POST["nombreC"])){ 
      
	  $existe=$concu->existConcurso();
	  
	  if(!$existe){
		 $errors = array();
		 $errors["nombreC"] = "Este concurso no existe, por lo que no se puede modificar";
		 $this->view->setVariable("errors", $errors);
		 
	  }else{
		  $concu->setIdC('1');
		  $concu->setNombreC($_POST["nombreC"]);
		  $concu->setBasesC($_POST["basesC"]);
		  $concu->setCiudadC($_POST["ciudadC"]);
		  $concu->setFechaC('12-12-2014');
		  $concu->setPremioC($_POST["premioC"]);
		 
		  try{
		 
			$concu->checkIsValidForRegister(); 
		
			  // guarda el objeto User en la base de datos
			  $concu->update();
			 
			  //$this->view->setFlash("Usuario ".$usuario->getNombreU()." corrrectamente añadido");
			  
			  // cabecera("Location: index.php?controller=users&action=login")
			  
			  $this->view->redirect("concurso", "consultarConcurso");	
			
			
		  }catch(ValidationException $ex) {
	
			$errors = $ex->getErrors();
			$this->view->setVariable("errors", $errors);
		  }
		}  
	}
  
	$concu = $this->concurso->ver_datos();	
	
	if ($concu == NULL) {
	  throw new Exception("No existe ningun concurso para mostrar");
	}
	
	// put the Post object to the view
	$this->view->setVariable("concu", $concu);
  
	$this->view->render("vistas", "modificacionConcurso"); 
  }
  
  
  
  public function registro() {
  
    $concu= new Concurso();
    if (isset($_POST["nombreC"])){ 
      
	  $existe=$concu->existConcurso();
	  
	  if($existe){
		 $errors = array();
		 $errors["nombreC"] = "Ya existe un concurso registrado, no puede haber más";
		 $this->view->setVariable("errors", $errors);
		 
	  }else{
		  $concu->setIdC('1');
		  $concu->setNombreC($_POST["nombreC"]);
		  $concu->setBasesC($_POST["basesC"]);
		  $concu->setCiudadC($_POST["ciudadC"]);
		  $concu->setFechaC('12-12-2014');
		  $concu->setPremioC($_POST["premioC"]);
		 
		  try{
		 
			$concu->checkIsValidForRegister(); 
		
			  // guarda el objeto User en la base de datos
			  $concu->save();
			 
			  //$this->view->setFlash("Usuario ".$usuario->getNombreU()." corrrectamente añadido");
			  
			  // cabecera("Location: index.php?controller=users&action=login")
			  
			  $this->view->redirect("concurso", "consultarConcurso");	
			
			
		  }catch(ValidationException $ex) {
	
			$errors = $ex->getErrors();
			$this->view->setVariable("errors", $errors);
		  }
		}  
   }
    // renderiza la vista (/view/users/registro.php)
    $this->view->render("vistas", "altaConcurso"); 
    
  }
  
  
  
 
 
 }