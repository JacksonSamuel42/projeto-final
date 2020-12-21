<?php

class Conexao{
	 static public function conectar(){

	$con = new PDO("mysql:dbname=escola_smart;host=localhost","root","");
	return $con;
    }

}