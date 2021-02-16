<?php
include('./database/db.config.php');
    
    if(isset($_POST['login_btn'])){
        $email = addslashes($_POST['email']);
        $pass = addslashes($_POST['pass']);

        if(!empty($email) && !empty($pass)){
            $sql = $pdo->prepare("select * from users where email = :e and pass = :p");
            $sql->bindValue(":e", $email);
            $sql->bindValue(":p", md5($pass));
            $sql->execute();
            $data = $sql->fetch();

            if($sql->rowCount() > 0){
                session_start();
                $_SESSION['user'] = $data['name'];
                $usertype = $data['usertype'];
                if($usertype == "Admin"){
                    header("location: /SGN/view/");
                }elseif($usertype == "DiretorTurma"){
                    echo $usertype;
                }
                // header("Location: ../admin/dashboard.php");
            }else{
                echo "<div class='mt-2 alert alert-danger'>email ou senha incorreto</div>";
            }
        }else{
            echo "<div class='mt-2 alert alert-danger'>Por favor preencha todos os campos</div>";
        }
    }
            
?>