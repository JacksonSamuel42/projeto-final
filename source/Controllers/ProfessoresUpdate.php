<?php

    include('../../database/db.config.php');

    $id = addslashes($_POST['id']);
    $nome_professor = addslashes($_POST['nome']);
    $turma = addslashes($_POST['turma']);
    $sala = addslashes($_POST['sala']);
    $classe = addslashes($_POST['classe']);
    $disciplina = addslashes($_POST['disciplina']);
    $turno = addslashes($_POST['turno']);
    $email = addslashes($_POST['email']);
    $formacao = addslashes($_POST['formacao']);
    $sexo = addslashes($_POST['sexo']);
    $curso = addslashes($_POST['curso']);
    $disciplina = addslashes($_POST['disciplina']);
    $desc = addslashes($_POST['desc']);
    $foto = addslashes($_FILES['foto']['name']);

    if(empty($nome_professor)){ $errors[] = 'nome do professor vazio';}
    elseif(strlen($nome_professor) < 4){ $errors[] = 'nome do professor não pode conter menos de 4 caracteres';}
    elseif(!preg_match('/^\D+$/i', $nome_professor)){ $errors[] = 'nome do professor não pode conter numero';}
    elseif(empty($turma)){ $errors[] = 'turma vazio'; }
    elseif(empty($sala)){ $errors[] = 'sala vazio'; }
    elseif(empty($turno)){ $errors[] = 'turno vazio'; }
    elseif(empty($classe)){ $errors[] = 'classe vazio'; }
    elseif(empty($formacao)){ $errors[] = 'formação vazio'; }
    elseif(!preg_match('/^\D+$/i', $formacao)){ $errors[] = 'formação não pode conter numero';}
    elseif(strlen($formacao) < 4){ $errors[] = 'formação não pode conter menos de 4 caracteres';}
    elseif(empty($email)){ $errors[] = 'email vazio'; }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){ $errors[] = 'formato do email invalido'; }
    elseif(strlen($email) > 64){ $errors[] = 'email não pode conter mais de 64 caracteres'; }
    elseif(empty($curso)){ $errors[] = 'curso vazio'; }
    elseif(strlen($curso) > 20){ $errors[] = 'curso não pode conter mais de 20 caracteres'; }
    elseif(empty($sexo)){ $errors[] = 'sexo vazio'; }
    elseif(empty($disciplina)){ $errors[] = 'disciplina vazio'; }
    elseif(empty($desc)){ $errors[] = 'desc vazio'; }
    elseif(strlen($desc) < 4){ $errors[] = 'desc não pode conter menos de 4 caracteres';}
    elseif(
        !empty($nome_professor) &&
        !empty($turma) &&
        !empty($sala) &&
        !empty($turno) &&
        !empty($classe) &&
        !empty($formacao) &&
        !empty($email) &&
        filter_var($email, FILTER_VALIDATE_EMAIL) &&
        strlen($email) <= 64 && 
        strlen($curso) <= 20 &&
        !empty($curso) &&
        !empty($sexo) &&
        !empty($disciplina) &&
        !empty($desc)
    ){

        $target = "../../view/admin/foto/professor/".basename($_FILES['foto']['name']);

        $validation_img_extension = $_FILES['foto']['type'] == "image/jpg" || 
        $_FILES['foto']['type'] == "image/png" ||
        $_FILES['foto']['type'] == "image/jpeg";

        if($validation_img_extension){

            $sql = "UPDATE professores SET nome_professor = :prof, turma = :turma, sala = :sala, classe = :classe, disciplina = :disc, 
            turno = :turno, curso = :curso, formacao = :formacao, email = :email, sexo = :sexo, descricao = :desc, foto = :foto, updated_at = NOW() WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(":id", $id);
            $stmt->bindValue(":prof", $nome_professor);
            $stmt->bindValue(":turma", $turma);
            $stmt->bindValue(":sala", $sala);
            $stmt->bindValue(":classe", $classe);
            $stmt->bindValue(":curso", $curso);
            $stmt->bindValue(":turno", $turno);
            $stmt->bindValue(":formacao", $formacao);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":sexo", $sexo);
            $stmt->bindValue(":disc", $disciplina);
            $stmt->bindValue(":desc", $desc);
            $stmt->bindValue(":foto", $foto);

            if($stmt->execute()){
                move_uploaded_file($_FILES["foto"]["tmp_name"], $target);
                $messages[] = "Atualizado com sucesso";
            }else{
                $errors[] = "professor não atualizado";
            }  
        }else{
            $errors[] = "apenas png, jpg e jpeg são permitidos";
        }

    }else{
        $errors[] = "Ocorreu um erro inesperado.";
    }

    if (isset($errors)){
    
        ?>
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Erro!</strong> 
                <?php
                    foreach ($errors as $error) {
                            echo $error;
                        }
                    ?>
        </div>
        <?php
    }
    if (isset($messages)){
        
        ?>
        <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Sucesso!</strong>
                <?php
                    foreach ($messages as $message) {
                            echo $message;
                        }
                    ?>
        </div>
        <?php
    }