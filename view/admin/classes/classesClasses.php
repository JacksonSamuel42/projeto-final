<?php
class Classes{

private $classe;

    public function cadastrarClasse(){
        include('../../database/db.config.php');
        if(isset($_POST['inserir'])){
            // $id = addslashes($_POST['id']);
            $this->classe = addslashes($_POST['classe']);
            if(!preg_match('/^\S+$/i',  $this->classe))
            { echo "<div class='alert alert-danger'><h5>classe não pode conter espaço</h5></div>";}
            else{
                $sql = $pdo->prepare("SELECT * from classes where classe = :classe");
                $sql->bindValue(":classe", $this->classe);
                $sql->execute();
                if($sql->rowCount()){
                    echo "<div class='alert alert-danger'><h5>classe já cadastrado</h5></div>";
                }else{
                    $query = "INSERT INTO classes (classe, created_at, updated_at) VALUES
                     (:classe, NOW(), NULL)";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindValue(":classe", $this->classe);
                
                    if($stmt->execute()){
                        echo "<div class='alert alert-success'><h5>Dado inserido com sucesso</h5></div>";
                    }else{
                        echo "<div class='alert alert-danger'><h5>Erro</h5></div>";
                    }
                }
            }
        }
    }
    public function atualizarClasses(){
  
        include('../../database/db.config.php');
        if(isset($_POST['updatedata'])){
            $id = addslashes($_POST['update_id']);
            $this->classe = addslashes($_POST['update_classe']);
            if(!preg_match('/^\S+$/i',    $this->classe)){ echo "
                <div class='alert alert-danger'><h5>classe não pode conter espaço";}
            else{
                $sql = $pdo->prepare("select * from classe where classe = :name");
                $sql->bindValue(":name",    $this->classe);
                $sql->execute();
                if($sql->rowCount()){
                    echo "<div class='alert alert-danger'><h5>Classe já cadastrada</h5></div>";
                }else{
                    $sql = "UPDATE classes SET classe = :classe, updated_at = NOW() WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(":id", $id);
                    $stmt->bindValue(":classe",   $this->classe);
        
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
    public function deletarClasses(){

     include('../../database/db.config.php');
   
     if(isset($_POST['deletedata'])){
         // $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
         $this->classe = addslashes($_POST['delete_id']);
         $query = "DELETE FROM classes WHERE id = '$this->classe' ";
         $stmt = $pdo->prepare($query);
         if($stmt->execute()){
             echo "<div class='alert alert-success'><h5>Deletado com sucesso</h5></div>";
         }else{
             echo "<div class='alert alert-warning'><h5>Não Deletado</h5></div>";
          } 
       }
     
    } 
    public function listarClasses(){
        include('../../database/db.config.php');
        $query = "SELECT * FROM classes";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $row) {
            echo' 
           
                <tr class="odd gradeX">
                    <td >'.$row['id'].'</td>
                    <td >'.$row['classe'].'</td>  
                    <td>
                        <button type="button" class="updatebtn btn btn-primary" >Editar</button>
                        <button type="button" class="deletebtn btn btn-danger" >Deletar</button>
                    </td>
                </tr>';
            # code...
        }
    }
}

?>