<?php



class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------



	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET["action"])){
			
			$enlaces = $_GET["action"];
		
		}

		else{

			$enlaces = "login";
		}

		$resposta = Paginas::enlacesPaginasModel($enlaces);

		include_once $resposta;

	   }
	}