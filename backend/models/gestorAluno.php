<?php
require_once("conexao.php"); 
class GuardarAluno{
	
static public function guardarAlunoModels($dados,$tabela){
  $stmt = Conexao::conectar()->prepare("SELECT id FROM $tabela WHERE email =:email");
          $stmt->bindParam(":email",$dados["email"],PDO::PARAM_STR);
			$stmt->execute();
			$stmt->fetch(); 
			if ($stmt->rowCount() > 0){
				return false;
           
   	# csode...
   }

    else{
$stmt = Conexao::conectar()->prepare("INSERT INTO $tabela(nome_aluno, sexo, turma, turno, classe, photo, nome_responsavel,disciplina, email,curso,descricao) VALUES (:nome_Aluno,:sexo,:turma,:turno,:classe,:foto,:nome_responsavel,
     :disciplina,:email,:curso,:descricao)");

$stmt->bindParam(":nome_Aluno",$dados["nome"],PDO::PARAM_STR);
$stmt->bindParam(":sexo",$dados["sexo"],PDO::PARAM_STR);
$stmt->bindParam(":turma",$dados["turma"],PDO::PARAM_STR);
$stmt->bindParam(":turno",$dados["turno"],PDO::PARAM_STR);
$stmt->bindParam(":classe",$dados["classe"],PDO::PARAM_STR);
$stmt->bindParam(":foto",$dados["foto"],PDO::PARAM_STR);
$stmt->bindParam(":nome_responsavel",$dados["nome_Responsavel"],PDO::PARAM_STR);
$stmt->bindParam(":disciplina",$dados["disciplina"],PDO::PARAM_STR);
$stmt->bindParam(":email",$dados["email"],PDO::PARAM_STR);
$stmt->bindParam(":curso",$dados["curso"],PDO::PARAM_STR);
$stmt->bindParam(":descricao",$dados["descricao"],PDO::PARAM_STR);
	
	     $stmt->execute();
			return "ok";
	
	
 }

 }
 public function listarAlunoModels($tabela){
 	$stmt = Conexao::conectar()->prepare("SELECT id_aluno, nome_aluno, sexo, turma, turno, classe, photo, nome_responsavel, disciplina, email, curso, descricao FROM $tabela");
 	$stmt->execute();
 	return $stmt->fetchAll();
 }
 public function apagarAlunoModels($dados,$tabela){
 	$stmt = Conexao::conectar()->prepare("DELETE FROM $tabela WHERE id_aluno =:id");
 	$stmt->bindParam(":id",$dados,PDO::PARAM_INT);

 	if ($stmt->execute()) {
 		return "ok";
 		# code...
 	}
 	else{
 		return "error";
 	}
 }
}