<?php
ob_start();

class ingresso{
    public function IngressoController(){
        if(isset($_POST["usuarioIngresso"])) {

        if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngresso"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngresso"])){

            // $password = crypt(, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $dadosController = array("usuario"=>$_POST["usuarioIngresso"],
                                     "password"=>$_POST["passwordIngresso"]);

            $resposta = model::ingressoModel($dadosController,"usuario");

           
                # code...
            if($resposta["usuario"] == $_POST["usuarioIngresso"] && $resposta["password"] == $_POST["passwordIngresso"]){

                    if($resposta["permissao"] == 'admin'){
                        session_start();

                        $_SESSION["validar"] = true;
                        $_SESSION["usuario"] = $resposta["usuario"];
                         header("location: admin/dashboard");
                    }else if($resposta["permissao"] == 'moderador'){
                        session_start();

                        $_SESSION["validar"] = true;
                        $_SESSION["usuario"] = $resposta["usuario"];
                         header("location: dturma/dashboard");

                    }
                               # code...
                 }else{

                        echo'<div class="alert alert-danger text-center">Email ou senha incorreto</div>';  

                }


                        
            # code...
        }
        else{
           echo'<div class="alert alert-danger text-center">nao é permitido caracteres especiais</div>';  

          # code...
        }
      }

    }

}