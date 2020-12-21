<?php
require_once("conexao.php"); 
class cadastrar{
	
	 # code...
static public function cadastrarModels($dados,$tabela){
  $stmt = Conexao::conectar()->prepare("SELECT id FROM $tabela WHERE email =:email");
          $stmt->bindParam(":email",$dados["email"],PDO::PARAM_STR);
			$stmt->execute();
			$stmt->fetch(); 
			if ($stmt->rowCount() > 0){
				return false;
           
   	# csode...
   }

    else{
$stmt = Conexao::conectar()->prepare("INSERT INTO $tabela(email, nome, formacao, curso, disciplina, sexo, turno, turma, classe,descricao,photo ) VALUES 	 (:email,:nome,:formacao,:curso,:disciplina,:sexo,:turno,:turma,:classe,:descricao,:foto)");

			$stmt->bindParam(":email",$dados["email"],PDO::PARAM_STR);
            $stmt->bindParam(":nome",$dados["nome"],PDO::PARAM_STR);
			$stmt->bindParam(":formacao",$dados["formacao"],PDO::PARAM_STR);
			$stmt->bindParam(":curso",$dados["curso"],PDO::PARAM_STR);
			$stmt->bindParam(":disciplina",$dados["disciplina"],PDO::PARAM_STR);
			$stmt->bindParam(":sexo",$dados["sexo"],PDO::PARAM_STR);
			$stmt->bindParam(":turno",$dados["turno"],PDO::PARAM_STR);
			$stmt->bindParam(":turma",$dados["turma"],PDO::PARAM_STR);
            $stmt->bindParam(":classe",$dados["classe"],PDO::PARAM_STR);
            $stmt->bindParam(":descricao",$dados["descricao"],PDO::PARAM_STR);
            $stmt->bindParam(":foto",$dados["foto"],PDO::PARAM_STR);
     
			
			
	     $stmt->execute();
			return "ok";
	
	
 }

 }



public function professorLista($tabela){
$stmt = Conexao::conectar()->prepare("SELECT id,email,nome,formacao,curso,disciplina,sexo,turno,turma,classe,descricao ,data_cadastro FROM $tabela");
	$stmt->execute();
	return $stmt->fetchAll();
	$stmt->close();

   }

    public function apagarProfessorModels($dados,$tabela){
   	$stmt = Conexao::conectar()->prepare("DELETE FROM  $tabela WHERE id =:id");
   	$stmt -> bindParam(":id" ,$dados ,PDO::PARAM_INT);
   	  if ($stmt->execute()){
   	  	# code...
   	  	return "ok";

   	  }else{

   	  	return "error";
   	  	
   	  }
   }
}