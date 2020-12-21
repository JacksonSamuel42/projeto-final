<?php
class controllersCadastro{
    #------------------------------------------------------------
  public function mostrarImagenController($datos){

    list($ancho, $alto) = getimagesize($datos);

    if($ancho < 1920 || $alto < 2880){

      echo 0;

    }

    else{

      $aleatorio = mt_rand(100, 999);
      $ruta = "../../views/img/fotos/br".$aleatorio.".jpg";
      $origen = imagecreatefromjpeg($datos);
      $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1920, "height"=>2880]);
      imagejpeg($destino, $ruta);

      echo $ruta;
    }

  }

  public function cadastrarControllers(){

    if (isset($_POST["email"])) {

      
      
      $imagen = $_FILES["imagen"]["tmp_name"];

      $borrar = glob("views/img/fotos/temp/*");

      foreach($borrar as $file){

        unlink($file);

      }

      $aleatorio = mt_rand(100, 999);

      $ruta = "views/img/fotos/br".$aleatorio.".jpg";

      $origen = imagecreatefromjpeg($imagen);

      $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>1920, "height"=>2880]);

      imagejpeg($destino, $ruta);

      
      
  //$password = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
             
      $dados = array("email" =>$_POST["email"],
                       "nome"=>$_POST["nome"],
                        "formacao" =>$_POST["formacao"],
                         "curso" =>$_POST["curso"],
                          "disciplina" =>$_POST["disciplina"],
                           "sexo"=>$_POST["sexo"],
                             "turno" =>$_POST["turno"],
                              "turma" =>$_POST["turma"],
                                "classe"=>$_POST["classe"],
                                 "descricao"=>$_POST["desc"],
                                  "foto"=>$ruta);


  
      $resposta = cadastrar::cadastrarModels($dados,"professor");

       if ($resposta ==false){
        # code...
        echo '<div class="alert alert-danger text-center"> email ja existe</div>';
       }else{
      echo'<script>

          swal({
              title: "¡OK!",
              text: "¡ Arquivo foi criado correctamenete",
              type: "success",
              confirmButtonText: "Inserrar",
              closeOnConfirm: false
          },

          function(isConfirm){
               if (isConfirm) {    
                  window.location = "professornovo";
                } 
          });


        </script>';

      

       }
     
      # code...
    }
  }
  public function professorListarControllers(){

    $resposta = cadastrar::professorLista("professor");

    foreach ($resposta as $key => $value) {

      echo '<tr class="odd gradeX" >
                            <td width="1%" class="f-s-600 text-inverse">'.$value["email"].'</td>
                             <td >'.$value["nome"].'</td>
                              <td width="20%">'.$value["formacao"].'</td>
                               <td width="20%">'.$value["curso"].'</td>
                                <td width="20%">'.$value["disciplina"].'</td>
                                 <td width="20%">'.$value["sexo"].'</td>
                                  <td width="20%">'.$value["turno"].'</td>
                                   <td width="20%">'.$value["turma"].'</td>
                                    <td width="20%">'.$value["descricao"].'</td>
                                    <td width="20%">'.$value["data_cadastro"].'</td>
                                      <td>
                                
                              <a href="index.php?action=professorview&='.$value["id"].'" class="btn btn-primary"><i class="fa fa-eye"></i> Visualizar</a>
                                <a href="index.php?action=Professor&idBorrar='.$value["id"].'"><button class="btn btn-danger"><i class="fa fa-eye "></i> Deletar</button></a>  
                             

                            
                            </td>
                                 </tr>';
      # code...
    }
  }
  public function apagarProfessorControllers(){



    if (isset($_GET["idBorrar"])) {
      # code...
  
    $datosController = $_GET["idBorrar"];

        # code...
    $resposta = cadastrar::apagarProfessorModels($datosController, "professor");

   if ($resposta == "ok") {


           echo'<script>

          swal({
              title: "¡OK!",
              text: "¡ Arquivo foi apagado correctamente",
              type: "success",
              confirmButtonText: "Inserrar",
              closeOnConfirm: false
          },

          function(isConfirm){
               if (isConfirm) {    
                  window.location = "Professor";
                } 
          });


        </script>';

      
       }
       else{
        echo $resposta;
       

           }

  }
  
}
}