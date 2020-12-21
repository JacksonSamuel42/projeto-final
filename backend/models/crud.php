<?php
include_once"conexao.php";
class Inserir{
	 static public function insertModels($dados,$tabela){
		$stmt = Conexao::conectar()->prepare("INSERT INTO $tabela(nome_turno) VALUES(:nome_turno)");
		$stmt -> bindParam(":nome_turno",$dados["turno"],PDO::PARAM_STR);

		if ($stmt->execute()){

			return "ok";
			# code...
		}
		else{

			return "error";
		}
	}
	 static public function selecionarModels($tabela){
		$stmt = Conexao::conectar()->prepare("SELECT nome_turno,created_at FROM $tabela");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}



}