<?php

class Turma{

private $turma;

    public function guardarTurma(){
        include('../../database/db.config.php');

    if(isset($_POST['inserir'])){

        // $id = addslashes($_POST['id']);
        $this->turma = addslashes($_POST['nome_turma']);

        if(!preg_match('/^\D+$/i',   $this->turma))
        { echo "<div class='alert alert-danger'><h5>Turma não pode conter numero</h5></div>";}
       
        else{
            $sql = $pdo->prepare("SELECT * from turma where nome_turma = :turma");
            $sql->bindValue(":turma",   $this->turma);
            $sql->execute();

            if($sql->rowCount()){
                echo "<div class='alert alert-danger'><h5>Turno já cadastrado</h5></div>";
            }else{
                $query = "INSERT INTO turma (nome_turma, created_at, updated_at) VALUES (:turma, NOW(), NULL)";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(":turma",   $this->turma);
    
                if($stmt->execute()){
                    echo "<div class='alert alert-success'><h5>Dados inseridos com sucesso</h5></div>";
                }else{
                    echo "<div class='alert alert-danger'><h5>Erro</h5></div>";
                }
            }
        }

    }
}

public function buscarTurmas(){
    include('./../../database/db.config.php');

    $query = "SELECT * FROM turma";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $data1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data1 as $row) {
        # code...
   

     echo' <tr class="odd gradeX">
            <td >'.$row['id'].'</td>
           <td >'. $row['nome_turma'].'</td>
           <td>
          <button type="button" class="updatebtn btn btn-primary" >Editar</button>
          <button type="button" class="deletebtn btn btn-danger" >Deletar</button>
          </td>
          </tr>';
         }

     }
public function atualizarTurmas(){
        include('./../../database/db.config.php');

        if(isset($_POST['updatedata'])){

            $id = addslashes($_POST['update_id']);
            $nome_turma = addslashes($_POST['update_turma']);

            if(!preg_match('/^\D+$/i', $nome_turma)){ echo "<div class='alert alert-danger'><h5>Turma não pode conter numero</h5></div>";}
            else{
                $sql = $pdo->prepare("select * from turma where nome_turma = :name");
                $sql->bindValue(":name", $nome_turma);
                $sql->execute();

                if($sql->rowCount()){
                    echo "<div class='alert alert-danger'><h5>Turma já cadastrado</h5></div>";
                }else{
                    $sql = "UPDATE turma SET nome_turma = :turma, updated_at = NOW() WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(":id", $id);
                    $stmt->bindValue(":turma", $nome_turma);
        
                    if($stmt->execute()){
                        echo "<div class='alert alert-success'><h5>atualizado com sucesso</h5></div>";
                        // echo $_FILES["img"]["tmp_name"], "upload/", $_FILES["img"]["name"];
                    }else{
                        echo "<div class='alert alert-danger'><h5>erro ao atualizar</h5></div>";
                    }
                }

            }

        
        }
    }
    public function deletarTurmas(){
        include('./../../database/db.config.php');
     
        if(isset($_POST['deletedata'])){
            // $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $id = addslashes($_POST['delete_id']);
            $query = "DELETE FROM turma WHERE id = '$id'";
            $stmt = $pdo->prepare($query);
            if($stmt->execute()){
                echo "<div class='alert alert-success'><h5>Deletado com sucesso</h5></div>";
            }else{
                echo "<div class='alert alert-warning'><h5>Não Deletado</h5></div>";
            } 
        }
     
    }
}