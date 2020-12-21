<?php
require_once("../../controllers/gestorAluno.php");
class Ajax{
	public $imagem;
	public function SubirImagemAjax(){
		 $Dados = $this->imagem;

		 $resposta = GestorAluno::subirImagemControllers($Dados);
		 echo $resposta;
	}
}
$ajax = new Ajax();
$ajax->imagem = $_FILES["imagem"]["tmp_name"];
$ajax->SubirImagemAjax();