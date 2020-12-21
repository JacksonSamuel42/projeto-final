<?php
require_once "../../controllers/gestorProfessor.php";
//require_once"../../models/gestorProfessor.php";

	class Ajax{

	#SUBIR LA IMAGEN DEL ARTICULO
	#----------------------------------------------------------
		


	
	public $imagenTemporal;

	public function gestorArticulosAjax(){

		$datos = $this->imagenTemporal;

		$respuesta = controllersCadastro::mostrarImagenController($datos);

		echo $respuesta;

	}

}

       	# code...
      
	$a = new Ajax();
	$a -> imagenTemporal = $_FILES["imagen"]["tmp_name"];
	$a -> gestorArticulosAjax();
	 

