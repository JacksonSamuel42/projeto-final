<?php
class Disciplina{
    private $disc;
    public function guardarDisciplina(){
        include('../../database/db.config.php');

        if(isset($_POST['inserir'])){
            // $id = addslashes($_POST['id']);
            $this->disc = addslashes($_POST['nome_disc']);
            if(!preg_match('/^\D+$/i',  $this->disc)){ echo "<div class='alert alert-danger'><h5> 
                Disciplina não pode conter numero</h5></div>";}
            elseif(strlen( $this->disc) < 3){ echo "<div class='alert alert-danger'><h5> Disciplina 
                não pode conter menos de 3 caracteres</h5></div>";}
            else{
                $sql = $pdo->prepare("select * from disciplina where nome_disciplina = :disciplina");
                $sql->bindValue(":disciplina",  $this->disc);
                $sql->execute();
                if($sql->rowCount()){
                    echo "<div class='alert alert-danger'><h5>disciplina já cadastrado</h5></div>";
                }else{
                    $query = "INSERT INTO disciplina (nome_disciplina, created_at, updated_at) VALUES (:disciplina, NOW(), NULL)";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindValue(":disciplina",  $this->disc);
        
                    if($stmt->execute()){
                        echo "<div class='alert alert-success'><h5>disciplina adicionada com sucesso</h5></div>";
                    }else{
                        echo "<div class='alert alert-danger'><h5>Erro ao adicionar disciplina</h5></div>";
                    }
                }
            }

    }
}
    public function buscarDisciplina(){
        include('../../database/db.config.php');
        $query = "SELECT * FROM disciplina";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            echo'
                <tr class="odd gradeX">
                    <td>'.$row['id'].'</td>
                    <td>'.$row['nome_disciplina'].'</td>
                    <td>
                        <button type="button" class="updatebtn btn btn-primary" >Editar</button>
                        <button type="button" class="deletebtn btn btn-danger" >Deletar</button>
                    </td>
                </tr>';
            # code...
        }

    }
    public function atualizarDisciplina(){
        include('../../database/db.config.php');
        if(isset($_POST['updatedata'])){
            $id = addslashes($_POST['update_id']);
            $this->disc = addslashes($_POST['update_disciplina']);
            
            if(!preg_match('/^\D+$/i',  $this->disc)){ echo "<div class='alert alert-success'><h5>
                 nome do aluno não pode conter numero</h5></div>";}
            else{
                $sql = "UPDATE disciplina SET nome_disciplina = :disciplina, updated_at =
                 NOW() WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":id", $id);
                $stmt->bindValue(":disciplina",  $this->disc);
                if($stmt->execute()){
                    echo "<div class='alert alert-success'><h5>atualizado com sucesso</h5></div>";
                    // echo $_FILES["img"]["tmp_name"], "upload/", $_FILES["img"]["name"];
                }else{
                    echo "<div class='alert alert-danger'><h5>erro ao atualizar</h5></div>";
                }
            }
        }

    }
    public function deletarDisciplina(){
        include('../../database/db.config.php');
        if(isset($_POST['deletedata'])){
            // $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $this->disc = addslashes($_POST['delete_id']);
            $query = "DELETE FROM disciplina WHERE id = ' $this->disc' ";
            $stmt = $pdo->prepare($query);
            if($stmt->execute()){
                echo "<div class='alert alert-success'><h5>Deletado com sucesso</h5></div>";
            }else{
                echo "<div class='alert alert-warning'><h5>Não Deletado</h5></div>";
            } 

    }
}
}


?>