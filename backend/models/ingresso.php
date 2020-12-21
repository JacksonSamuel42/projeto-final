<?php

require_once"conexao.php";

class model{

static public function ingressoModel($dados,$tabela){
$stmt = Conexao::conectar()->prepare("SELECT usuario, password, permissao FROM $tabela WHERE usuario = :usuario ");
	$stmt->bindParam(":usuario", $dados["usuario"], PDO::PARAM_STR);

	$stmt->execute();

	return $stmt->fetch();
	$stmt->close();

}
     


}