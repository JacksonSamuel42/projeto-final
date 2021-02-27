<?php
    $idCred = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE user_id = $idCred ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if(isset($_POST['editar'])){

        $id = addslashes($_POST['id']);
        $name = addslashes($_POST['name']);
        $email = addslashes($_POST['email']);
        $aPass = addslashes($_POST['aPass']);
        $nPass = addslashes($_POST['nPass']);
        $foto = addslashes($_FILES['foto']['name']) ? addslashes($_FILES['foto']['name']) : $data['foto'];

        $validation_img_extension = $_FILES['foto']['type'] == "image/jpg" || 
        $_FILES['foto']['type'] == "image/png" ||
        $_FILES['foto']['type'] == "image/jpeg";

        $target = __DIR__. "../../foto/professor/".basename($_FILES['foto']['name']);

        if($validation_img_extension || $validation_img_extension == null){
            $sql = "UPDATE users SET name = :name, email = :email, pass = :pass, foto = :foto WHERE user_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->bindValue(":name", $name);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":foto", $foto);
            $stmt->bindValue(":pass", md5($nPass));

            if($data['pass'] == md5($aPass)){
                if($stmt->execute()){
                    $_SESSION['user'] = $name;
                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target);
                    echo "<div class='alert alert-success'>atualizado com sucesso</div>";
                }else{
                    echo "<div class='alert alert-warning'>erro ao atualizar</div>";
                }
            }else{
                echo "<div class='alert alert-warning'>Senha incorreta</div>";
            }
    
        }else{
            echo "<div class='alert alert-warning'>apenas png, jpg e jpeg são permitidos</div>";
        }

    }


