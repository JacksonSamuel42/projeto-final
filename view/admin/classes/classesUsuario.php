<?php
class Usuario{

private $inserir,$buscar,$apagar;
public function guardarUsuarios(){
    include("../../database/db.config.php");
    if(isset($_POST['inserir'])){

        // $id = addslashes($_POST['id']);
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $ut = addslashes($_POST['userType']);

        $sql = $pdo->prepare("select * from users where email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount()){
            echo "<div class='alert alert-warning'><h5>Usuário já cadastrado</h5></div>";
        }else{
            $query = "INSERT INTO users (name, email, pass, usertype, status_email) VALUES (:nome, :email, :senha, :ut, :ste)";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":senha", md5($senha));
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":ste", $email);
            $stmt->bindValue(":ut", $ut);
            
            if($stmt->execute()){
                echo "<div class='alert alert-success'><h5>usuário adicionada com sucesso</h5></div>";
            }else{
                echo "<div class='alert alert-danger'><h5>Erro ao adicionar usuário</h5></div>";
            }
        }

    }
}
public function listarUsuarios(){
    include('../../database/db.config.php');


    $this->buscar = "SELECT * FROM users";
    $stmt = $pdo->prepare($this->buscar);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $row) {
        echo'<?php
        foreach ($data as $row) {?>
            <tr class="odd gradeX">
                <td > '.$row['user_id'] .'</td>
                <td > '.$row['name']    .'</td>
                <td > '.$row['email']   .' </td>
                <td > '.$row['usertype'].' </td>
                <td>
                    <button type="button" class="updatebtn btn btn-primary">Editar</button>
                    <button type="button" class="deletebtn btn btn-danger">Deletar</button>
                </td>
            </tr>';
        # code...
    }

}
public function atualizarUsuarios(){
    include('../../database/db.config.php');
    if(isset($_POST['updatedata'])){
        $id = addslashes($_POST['update_id']);
        $nome = addslashes($_POST['update_nome']);
        $email = addslashes($_POST['update_email']);
        $senha = addslashes($_POST['update_senha']);
        $ut = addslashes($_POST['update_userType']);
        $sql = "UPDATE users SET
         name = :nome, email = :email, status_email = :ste, pass = :senha, usertype = :ut WHERE user_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":senha", md5($senha));
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":ste", $email);
        $stmt->bindValue(":ut", $ut);
        if($stmt->execute()){
            $_SESSION['user'] = $nome;
            echo "<div class='alert alert-success'><h5>atualizado com sucesso</h5></div>";
            // echo $_FILES["img"]["tmp_name"], "upload/", $_FILES["img"]["name"];
        }else{
            echo "<div class='alert alert-danger'><h5>erro ao atualizar</h5></div>";
        }
    }
    

}
public function deletarUsuarios(){
    include("../../database/db.config.php");
    if(isset($_POST['deletedata'])){
        // $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $this->apagar = addslashes($_POST['delete_id']);
        $query = "DELETE FROM users WHERE user_id = '  $this->apagar' ";
        $stmt = $pdo->prepare($query);
        if($stmt->execute()){
            echo "<div class='alert alert-success'><h5>Deletado com sucesso</h5></div>";
        }else{
            echo "<div class='alert alert-warning'><h5>Não Deletado</h5></div>";
        } 
    }
    

}

public function autenticarUsuario(){
    
    include('./database/db.config.php');

    if(isset($_POST['login_btn'])){
        $email = addslashes($_POST['email']);
        $pass = addslashes($_POST['pass']);
        
        if(!empty($email) && !empty($pass)){
            $sql = $pdo->prepare("select * from users where email = :e and pass = :p");
            $sql->bindValue(":e", $email);
            $sql->bindValue(":p", $pass);
            $sql->execute();
            $data = $sql->fetch();
            
            if($sql->rowCount() > 0){
                session_start();
                $_SESSION['user'] = $data['name'];
                $_SESSION['status_email'] = $data['status_email'];
                $_SESSION['user_id'] = $data['user_id'];
                
                $usertype = $data['usertype'];
                if($usertype == "Admin"){
                    header("location: /VB/view/admin/");
                }elseif($usertype == "DiretorTurma"){
                    header("location: /VB/view/professor/");
                }
                // header("Location: ../admin/dashboard.php");
            }else{
                echo "<div class='mt-2 alert alert-danger'>email ou senha incorreto</div>";
            }
        }else{
            echo "<div class='mt-2 alert alert-danger'>Por favor preencha todos os campos</div>";
        }
    }
    
 }
}


?>