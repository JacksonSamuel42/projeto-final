<?php
class Sala{
    private $cadstrar;
    private $busaca;
    private $atualizar;
    private $delete;
    public function CadastrarSalas(){
        if(isset($_POST['inserir'])){
    include('../../database/db.config.php');

            // $id = addslashes($_POST['id']);
            $this->cadstrar = addslashes($_POST['nome_sala']);
            if(!preg_match('/^\D/i', $this->cadstrar)){ echo "<div class='alert alert-danger'><h5> nome da sala não pode começar com numero</h5></div>";}
            elseif(strlen($this->cadstrar) < 3){ echo "<div class='alert alert-danger'><h5> nome da sala não pode conter menos de 3 caracteres</h5></div>";}
            else{
                $sql = $pdo->prepare("select * from salas where nome_sala = :name");
                $sql->bindValue(":name", $this->cadstrar);
                $sql->execute();
                if($sql->rowCount()){
                    echo "<div class='alert alert-danger'><h5>sala já cadastrado</h5></div>";
                }else{
                    $query = "INSERT INTO salas (nome_sala, created_at, updated_at) VALUES (:name, NOW(), NULL)";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindValue(":name", $this->cadstrar);
                
                    if($stmt->execute()){
                        echo "<div class='alert alert-success'><h5>Sala adicionada com sucesso</h5></div>";
                    }else{
                        echo "<div class='alert alert-danger'><h5>Erro ao adicionar salas</h5></div>";
                    }
                }
            }
        }

    }
public function listarDadosSalas(){
    include('../../database/db.config.php');
    $this->busaca = "SELECT * FROM salas";
    $stmt = $pdo->prepare(  $this->busaca);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $row) {
        echo'
            <tr class="odd gradeX">
                <td> '.$row['id'].'</td>
                <td >'.$row['nome_sala'].'</td>
                <td>
                    <button type="button" class="updatebtn btn btn-primary" >Editar</button>
                    <button type="button" class="deletebtn btn btn-danger" >Deletar</button>
                </td>';
        # code...
    }

    }
public function  atualizarSalas(){
    include('../../database/db.config.php');
if(isset($_POST['updatedata'])){
    $id = addslashes($_POST['update_id']);
    $this->atualizar= addslashes($_POST['update_sala']);
    if(!preg_match('/^\D/i',   $this->atualizar)){ echo "<div class='alert alert-danger'><h5>
         nome da sala não pode começar com numero</h5></div>";}
    elseif(strlen(  $this->atualizar) < 3){ echo "<div class='alert alert-danger'><h5> 
        nome da sala não pode conter menos de 3 caracteres</h5></div>";}
    else{
        $sql = "UPDATE salas SET nome_sala = :salas, updated_at = NOW() WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":salas", $this->atualizar);
        if($stmt->execute()){
            echo "<div class='alert alert-success'><h5>atualizado com sucesso</h5></div>";
            // echo $_FILES["img"]["tmp_name"], "upload/", $_FILES["img"]["name"];
        }else{
            echo "<div class='alert alert-danger'><h5>erro ao atualizar</h5></div>";
        }
      }
    }

}
public function deletarSalas(){
        include('../../database/db.config.php');
        if(isset($_POST['deletedata'])){
            // $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $this->delete = addslashes($_POST['delete_id']);
            $query = "DELETE FROM salas WHERE id = '$this->delete' ";
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