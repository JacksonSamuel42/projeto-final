<?php
class Turno{

public function cadastrarTurno(){
    include('../../database/db.config.php');
    if(isset($_POST['inserir'])){
        // $id = addslashes($_POST['id']);
        $name = addslashes($_POST['nome_turno']);
        if(!preg_match('/^\D+$/i', $name)){ echo "<div class='alert alert-danger'><h5>Turno não pode conter numero</h5></div>";}
        elseif(strlen($name) < 3){ echo "<div class='alert alert-danger'><h5>Turno não pode conter menos de 3 caracteres</h5></div>";}
        else{
            $sql = $pdo->prepare("select * from turno where nome_turno = :name");
            $sql->bindValue(":name", $name);
            $sql->execute();
            if($sql->rowCount()){
                echo "<div class='alert alert-danger'><h5>Turno já cadastrado</h5></div>";
            }else{
                $query = "INSERT INTO turno (nome_turno, created_at, updated_at) VALUES (:name, NOW(), NULL)";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(":name", $name);
    
                if($stmt->execute()){
                    echo "<div class='alert alert-success'><h5>turno adicionada com sucesso</h5></div>";
                }else{
                    echo "<div class='alert alert-danger'><h5>Erro ao adicionar turno</h5></div>";
                }
            }
        }
    }

}
    public function atualizarTurno(){
 
        include('../../database/db.config.php');
    if(isset($_POST['updatedata'])){
        $id = addslashes($_POST['update_id']);
        $turno = addslashes($_POST['update_turno']);
        if(!preg_match('/^\D+$/i', $turno)){ echo "
            <div class='alert alert-danger'><h5>Turno não pode conter numero</h5></div>";}
        elseif(strlen($turno) < 3){ echo "<div class='alert alert-danger'><h5>Turno não pode conter menos 
            de 3 caracteres</h5></div>";}
    
        else{
            $sql = "UPDATE turno SET nome_turno = :turno, updated_at = NOW() WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->bindValue(":turno", $turno);
    
            if($stmt->execute()){
                echo "<div class='alert alert-success'><h5>atualizado com sucesso</h5></div>";
                // echo $_FILES["img"]["tmp_name"], "upload/", $_FILES["img"]["name"];
            }else{
                echo "<div class='alert alert-danger'><h5>erro ao atualizar</h5></div>";
            }
        }
      }
    }
    public function apagarTurno(){
        include('../../database/db.config.php');
        if(isset($_POST['deletedata'])){
            // $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $id = addslashes($_POST['delete_id']);
            $query = "DELETE FROM turno WHERE id = '$id' ";
            $stmt = $pdo->prepare($query);
            if($stmt->execute()){
                echo "<div class='alert alert-success'><h5>Deletado com sucesso</h5></div>";
            }else{
                echo "<div class='alert alert-warning'><h5>Não Deletado</h5></div>";
            } 
        }
        
    }
    public function listarTurno(){
        include('../../database/db.config.php');
        $query = "SELECT * FROM turno";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            echo'  
                <tr class="odd gradeX">
                    <td >'. $row['id'].'</td>
                    <td >'.$row['nome_turno'].'</td>
                    <td>
                    <button type="button" class="updatebtn btn btn-primary" >Editar</button>
                    <button type="button" class="deletebtn btn btn-danger" >Deletar</button>
                   <td>
                   </tr>';
            # code...
        }
        
    }
}

?>