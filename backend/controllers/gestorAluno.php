<?php
// classe do aluno
class GestorAluno{
 //listar as fotos
 public function subirImagemControllers($dados){
 	list($largura,$altura) = getimagesize($dados);
 	if ($largura < 1920 || $altura < 2880 ) {

 		echo 0;
 		# code...
 	}
 	else{
 		$aleatorio = mt_rand(100,999);
 		$ruta = "../../views/img/fotos/br".$aleatorio.".jpg";
 		$origem = imagecreatefromjpeg($dados);
 		$destino =imagecrop($origem,["x"=>0,"y"=>0, "width"=>1920, "height"=>2880]);
 		imagejpeg($destino,$ruta);
 		echo $ruta;
 	}
 }
 //guuardar conteudos dos alunos

public function GuardarAlunoControllers(){

  if (isset($_POST["nome_aluno"])){

  	$imagem =$_FILES["imagem"]["tmp_name"];

  	$borrar = glob("views/img/fotos/temp/*");
  	foreach ($borrar as $key ) {
  		unlink($key);
  		# code...
  	}
  	 $aleatorio = mt_rand(100,999);
  	 $ruta ="views/img/fotos/br".$aleatorio.".jpg";
  	 $origem = imagecreatefromjpeg($imagem);
  	 $destino =imagecrop($origem,["x"=>0,"y"=>0,"width"=>1920, "height"=>2880]);
  	 imagejpeg($destino,$ruta);

  	$DadosControllers = array("nome"=>$_POST["nome_aluno"],
                              "sexo"=>$_POST["sexo"],
                              "nome_Responsavel"=>$_POST["nome_responsavel"],
                              "turma"=>$_POST["turma"],
                              "turno"=>$_POST["turno"],
                              "classe"=>$_POST["classe"],
                              "curso"=>$_POST["curso"],
                              "disciplina"=>$_POST["disciplina"],
                              "email"=>$_POST["email"],
                              "descricao"=>$_POST["descricao"],
                              "foto"=>$ruta);
  	 $Resposta = GuardarAluno::guardarAlunoModels($DadosControllers,"aluno");
  	 if ($Resposta ==false) {
  	 	echo "email ja existe";
  	 	# code...
  	 }else{
  	 echo'<script>

          swal({
              title: "¡OK!",
              text: "¡ Arquivo foi  Guardado correctamenete",
              type: "success",
              confirmButtonText: "Inserrar",
              closeOnConfirm: false
          },

          function(isConfirm){
               if (isConfirm) {    
                  window.location = "alunonovo";
                } 
          });


        </script>';

  	 }
  	# code...
  }
}
public function listarAlunoControllers(){

  $resposta = GuardarAluno::listarAlunoModels("aluno");
  foreach ($resposta as $key => $value) {
    echo ' <tr class="odd gradeX">
                          
                            <td width="20%">'.$value["nome_aluno"].'</td>
                            <td width="20%">'.$value["sexo"].'</td>
                            <td width="20%">'.$value["turma"].'</td>
                            <td width="20%">'.$value["turno"].'</td>
                            <td width="10%">'.$value["classe"].'</td>
                            <td width="20%">'.$value["nome_responsavel"].'</td>
                            <td width="20%">'.$value["disciplina"].'</td>
                            <td width="20%">'.$value["email"].'</td>
                            <td width="10%">'.$value["curso"].'</td>
                            <td width="10%">'.$value["descricao"].'</td>
                            <td>
                                <a href="index.php?action=alunoview&idActualizar='.$value["id_aluno"].'" class="btn btn-primary"><i class="fa fa-eye"></i> Visualizar</a>
                              <a href="index.php?action=alunolista&idApagar='.$value["id_aluno"].'"> <button type="button" class="deletebtn btn btn-danger"><i class="fa fa-trash"></i> Deletar</button></a>
                            </td>
                        </tr>';

    # code...
  }
}
public function apagarAlunoControllers(){
  if (isset($_GET["idApagar"])) {

     $DadosControllers = $_GET["idApagar"];

     $resposta = GuardarAluno::apagarAlunoModels($DadosControllers,"aluno");
     if ($resposta =="ok"){
      echo'<script>

          swal({
              title: "¡OK!",
              text: "¡ Arquivo foi  apagado correctamenete",
              type: "success",
              confirmButtonText: "Incerrar",
              closeOnConfirm: false
          },

          function(isConfirm){
               if (isConfirm) {    
                  window.location = "alunolista";
                } 
          });


        </script>';

       # code...
     }else{
      echo $resposta;
     }

    # code...
  }

}



}