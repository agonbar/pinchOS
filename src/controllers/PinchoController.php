<?php
	//include de la clase Pincho
	//include de la clase PDO(la que conecta con la base de datos)
	//include de la clase router(la que direcciona las paginas html)

class Pinchocontroller {

	private $nombrePi;
	private $idPi;
	private $descripcionPi;
	private $fotoPi;
	private $cocineroPi;
	private $numvotosPi;
	private $estadoPi;

	public function __construct($nombrePi,
															$idPi,
															$descripcionPi,
															$fotoPi,
															$cocineroPi,
															$numvotosPi,
															$estadoPi,) {
		$this->nombrePi = $username;
		$this->idPi = $idPi;
		$this->descripcionPi = $descripcionPi,
		$this->fotoPi = $fotoPi,
		$this->cocineroPi = $cocineroPi,
		$this->numvotosPi = $numvotosPi,
		$this->estadosPi = $estadoPi  
	}

	function altaPincho(){

	}
	function bajaPincho(){

	}
	function validacionInfo(){

	}
	function modificacionPincho(){

	}
	function busquedaPincho(){

	}
	function consultaPincho(){

	}
	function listadoPincho(){

	}
	function validacionPincho(){

	}
}
?>
