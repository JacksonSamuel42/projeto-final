<?php

  class Paginas{
  	
     static public function enlacesPaginasModel($enlace){


	if ($enlace == "dashboard" ||
		$enlace == "dashboard2" ||
		$enlace == "alunolista" ||
	    $enlace == "alunonovo" ||
	    $enlace == "alunoview" ||
	    $enlace == "login"||
	    $enlace == "sair"||
	    $enlace == "Professor"||
	    $enlace == "professornovo"||
	    $enlace == "visualizarProf"||
	    $enlace == "visualizarAluno"||
	    $enlace == "boletim"||
	    $enlace =="usuarios"||
	    $enlace =="professorview"||
	    $enlace =="perfil") {
	  	
		$modules = "../frontend/admin/" .$enlace. ".php";
		# code...
	}elseif ($enlace=="index") {

		$modules = "../frontend/admin/login.php";
		# code...
	}
	else{

		$modules = "404.html";


	}

	return $modules;
   }



}