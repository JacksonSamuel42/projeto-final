<?php
 class Curso{
     private $curso;
     public function cadastrarCurso(){
        include('../../database/db.config.php');
        if(isset($_POST['inserir'])){
            // $id = addslashes($_POST['id']);
            $this->curso = addslashes($_POST['nome_curso']);
             if(!preg_match('/^\D+$/i',   $this->curso)){ echo "<div class='alert alert-danger'><h5>Curso não pode conter numero</h5></div>";}
            else{
                $sql = $pdo->prepare("SELECT * from curso where nome_curso = :curso");
                $sql->bindValue(":curso",  $this->curso);
                $sql->execute();
                if($sql->rowCount()){
                    echo "<div class='alert alert-danger'><h5>curso já cadastrado</h5></div>";
                }else{
                    $query = "INSERT INTO curso (nome_curso) VALUES 
                    (:curso)";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindValue(":curso",   $this->curso);
        
                    if($stmt->execute()){
                        echo "<div class='alert alert-success'><h5>Dados inseridos com sucesso</h5></div>";
                    }else{
                        echo "<div class='alert alert-danger'><h5>Erro</h5></div>";
                    }
                }
            }
        }
     }
     public function atualizarCursos(){
        include('../../database/db.config.php');
        if(isset($_POST['updatedata'])){
            $id = addslashes($_POST['update_id']);
             $this->curso = addslashes($_POST['curso']);
            if(!preg_match('/^\D+$/i',   $this->curso)){ echo "<div class='alert alert-danger'><h5>
                curso não pode conter numero</h5";}
            else{
                $sql = $pdo->prepare("select * from curso where nome_curso = :name");
                $sql->bindValue(":name",   $this->curso);
                $sql->execute();
                if($sql->rowCount()){
                    echo "<div class='alert alert-danger'><h5>curso já cadastrado</h5></div>";
                }else{
                    $sql = "UPDATE curso SET nome_curso = :curso, updated_at = NOW() WHERE id_curso = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(":id", $id);
                    $stmt->bindValue(":curso",   $this->curso);
        
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
     public function deletarCurso(){
        include('../../database/db.config.php');
        if(isset($_POST['deletedata'])){
            // $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $this->curso = addslashes($_POST['delete_id']);
            $query = "DELETE FROM curso WHERE id_curso = '$this->curso' ";
            $stmt = $pdo->prepare($query);
            if($stmt->execute()){
                echo "<div class='alert alert-success'><h5>Deletado com sucesso</h5></div>";
            }else{
                echo "<div class='alert alert-warning'><h5>Não Deletado</h5></div>";
            } 
        }

     }
     public function buscarCurso(){
        include('../../database/db.config.php');
           
        $query = "SELECT * FROM curso";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            echo '
                <tr class="odd gradeX">
                    <td >'.$row['id_curso'].'</td>
                    <td >'. $row['nome_curso'].'</td>
                    <td>
                        <button type="button" class="updatebtn btn btn-primary" >Editar</button>
                        <button type="button" class="deletebtn btn btn-danger" >Deletar</button>
                    </td>
                </tr>
            <?php';
            # code...
        }
     }
 }
?>