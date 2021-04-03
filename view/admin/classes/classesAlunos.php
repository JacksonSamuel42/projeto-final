 
 <?php
 class Aluno{
     
 private $cadastrarAl,$buscar,$atualizar,$deletar;

 public function guardarAluno (){
    include('../../database/db.config.php');
    // $id = addslashes($_POST['id']);
    $numero_de_bytes = 4; 
    $restultado_bytes = random_bytes($numero_de_bytes);
    $resultado_final = bin2hex($restultado_bytes);

    // $id = addslashes($_POST['id']);
    $nome_aluno = addslashes($_POST['nome_aluno']);
    $turma = addslashes($_POST['turma']);
    $classe = addslashes($_POST['classe']);
    $turno = addslashes($_POST['turno']);
    $sala = addslashes($_POST['sala']);
    $responsavel = addslashes($_POST['responsavel']);
    $email = addslashes($_POST['email']) ? $_POST['email'] : NULL;
    $sexo = addslashes($_POST['sexo']);
    $curso = addslashes($_POST['curso']);
    // $disciplina = addslashes($_POST['disciplina']);
    $desc = addslashes($_POST['desc']) ? $_POST['desc'] : NULL;
    $foto = addslashes($_FILES['foto']['name']);

    if(empty($nome_aluno)){ $errors[] = 'nome do aluno vazio';}
    elseif(strlen($nome_aluno) < 4){ $errors[] = 'nome do aluno não pode conter menos de 4 caracteres';}
    elseif(!preg_match('/^\D+$/i', $nome_aluno)){ $errors[] = 'nome do aluno não pode conter numero';}
    elseif(empty($turma)){ $errors[] = 'turma vazio'; }
    elseif(empty($sala)){ $errors[] = 'sala vazio'; }
    elseif(empty($turno)){ $errors[] = 'turno vazio'; }
    elseif(empty($classe)){ $errors[] = 'classe vazio'; }
    elseif(empty($responsavel)){ $errors[] = 'responsável vazio'; }
    elseif(!preg_match('/^\D+$/i', $responsavel)){ $errors[] = 'responsavel não pode conter numero';}
    elseif(strlen($responsavel) < 4){ $errors[] = 'responsavel não pode conter menos de 4 caracteres';}
    elseif(empty($email)){ $errors[] = 'email vazio'; }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){ $errors[] = 'formato do email invalido'; }
    elseif(strlen($email) > 64){ $errors[] = 'email não pode conter mais de 64 caracteres'; }
    elseif(empty($curso)){ $errors[] = 'curso vazio'; }
    elseif(strlen($curso) > 20){ $errors[] = 'curso não pode conter mais de 20 caracteres'; }
    elseif(empty($sexo)){ $errors[] = 'sexo vazio'; }
    elseif(empty($desc)){ $errors[] = 'desc vazio'; }
    elseif(strlen($desc) < 4){ $errors[] = 'desc não pode conter menos de 4 caracteres';}
    elseif(
        !empty($nome_aluno) &&
        !empty($turma) &&
        !empty($sala) &&
        !empty($turno) &&
        !empty($classe) &&
        !empty($responsavel) &&
        !empty($email) &&
        filter_var($email, FILTER_VALIDATE_EMAIL) &&
        strlen($email) <= 64 && 
        strlen($curso) <= 20 &&
        !empty($curso) &&
        !empty($sexo) &&
        !empty($desc)
    ){

        $target = "../../view/admin/foto/aluno/".basename($_FILES['foto']['name']);

        $validation_img_extension = $_FILES['foto']['type'] == "image/jpg" || 
        $_FILES['foto']['type'] == "image/png" ||
        $_FILES['foto']['type'] == "image/jpeg";

        if($validation_img_extension){

            $query = "SELECT * FROM `aluno` WHERE email = '$email' OR nome_aluno = '$nome_aluno'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            if($stmt->rowCount()){
                $errors[] = "email ou nome do aluno já existe";
            }else{
                $query = "INSERT INTO aluno (nome_aluno, turma, sala, classe, curso, codigo_aluno,
                 turno, nome_responsavel, email, sexo, descricao, foto, created_at, updated_at) 
                VALUES (:prof, :turma, :sala, :classe, :curso, :cod, :turno, :responsavel, :email,
                 :sexo, :desc, :foto, NOW(), NULL)";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(":prof", $nome_aluno);
                $stmt->bindValue(":turma", $turma);
                $stmt->bindValue(":sala", $sala);
                $stmt->bindValue(":classe", $classe);
                $stmt->bindValue(":curso", $curso);
                $stmt->bindValue(":cod", $resultado_final);
                $stmt->bindValue(":turno", $turno);
                $stmt->bindValue(":responsavel", $responsavel);
                $stmt->bindValue(":email", $email);
                $stmt->bindValue(":sexo", $sexo);
                $stmt->bindValue(":desc", $desc);
                $stmt->bindValue(":foto", $foto);

                if($stmt->execute()){
                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target);
                    $messages[] = "Inserido com sucesso";
                }else{
                    $errors[] = "aluno não cadastrado";
                }  
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
     
 }

 public function filtrarAluno(){
    include('../../database/db.config.php');
     
 $query = "SELECT * FROM aluno ORDER BY id DESC";
 $stmt = $pdo->prepare($query);
 $stmt->execute();
 $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
 

    if(isset($_POST['filter-aluno'])){
        $sala = addslashes($_POST['sala']);
        $curso = addslashes($_POST['curso']);
        $turma = addslashes($_POST['turma']);
        $classe = addslashes($_POST['classe']);
        $date = addslashes($_POST['data']);
        $query = "SELECT * FROM aluno WHERE (classe = '$classe' OR turma = '$turma' OR curso = '$curso' OR sala = '$sala' OR YEAR(created_at) = '$date') OR
        (classe = '$classe' AND turma = '$turma' AND curso = '$curso' AND sala = '$sala')";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $filtro = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($stmt->rowCount()){
            foreach ($filtro as $row) {?>
                <tr class="odd gradeX">
                    <td class="f-s-600 text-inverse"><?= $row['id']?></td>
                    <td><?= $row['nome_aluno']?></td>
                    <td><?= $row['email']?></td>
                    <td><?= $row['classe']?></td>
                    <td><?= $row['curso']?></td>
                    <td><?= $row['turma']?></td>
                    <td><?= $row['turno']?></td>
                    <td>
                        <a href="<?= url('visualizarAluno') ?>?aluno=<?= $row['id']?>"
                            class="btn btn-primary"><i class="fa fa-eye"></i></a>
                        <button type="button" class="deletebtn btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            <?php
            }
        }else{
            echo "<div class='alert alert-warning'>Nenhum aluno encontrado</div>";
        }
    }else{
        foreach($data as $row){?>
            <tr class="odd gradeX">
                <td class="f-s-600 text-inverse"><?= $row['id']?></td>
                <td><?= $row['nome_aluno']?></td>
                <td><?= $row['email']?></td>
                <td><?= $row['classe']?></td>
                <td><?= $row['curso']?></td>
                <td><?= $row['turma']?></td>
                <td><?= $row['turno']?></td>
                <td>
                    <a href="<?= url('visualizarAluno')?>?aluno=<?= $row['id']?>"
                        class="btn btn-primary"><i class="fa fa-eye"></i></a>
                    <a href="<?= url('visualizarAlunoD')?>?aluno=<?= $row['id']?>" class="btn btn-success">
                        <i class="">G</i>
                    </a>
         <button type="button" class="deletebtn btn btn-danger"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php
            }
        }
    
    }  
    public function listarAluno(){
        include('../../database/db.config.php');
        $query = "SELECT * FROM aluno ORDER BY id DESC";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
        return $data;
    }
    public function deletarAluno(){
        include('../../database/db.config.php');
        if(isset($_POST['deletedata'])){
            // $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $id = addslashes($_POST['delete_id']);
            $query = "DELETE FROM aluno WHERE id = '$id' ";
            $stmt = $pdo->prepare($query);
            if($stmt->execute()){
                echo "<div class='alert alert-success'><h5>Deletado com sucesso</h5></div>";
            }else{
                echo "<div class='alert alert-warning'><h5>Não Deletado</h5></div>";
            } 
        }
    }
    public function atualizarAluno(){
        include('../../database/db.config.php');
        // $id = addslashes($_POST['id']);
        $numero_de_bytes = 4; 
        $restultado_bytes = random_bytes($numero_de_bytes);
        $resultado_final = bin2hex($restultado_bytes);
        $id = addslashes($_POST['id']);
        $nome_aluno = addslashes($_POST['nome']);
        $turma = addslashes($_POST['turma']);
        $classe = addslashes($_POST['classe']);
        $turno = addslashes($_POST['turno']);
        $sala = addslashes($_POST['sala']);
        $responsavel = addslashes($_POST['responsavel']);
        $email = addslashes($_POST['email']) ? $_POST['email'] : NULL;
        $sexo = addslashes($_POST['sexo']);
        $curso = addslashes($_POST['curso']);
        // $disciplina = addslashes($_POST['disciplina']);
        $desc = addslashes($_POST['desc']) ? $_POST['desc'] : NULL;
        $foto = addslashes($_FILES['foto']['name']);
        if(empty($nome_aluno)){ $errors[] = 'nome do aluno vazio';}
        elseif(strlen($nome_aluno) < 4){ $errors[] = 'nome do aluno não pode conter menos de 4 caracteres';}
        elseif(!preg_match('/^\D+$/i', $nome_aluno)){ $errors[] = 'nome do aluno não pode conter numero';}
        elseif(empty($turma)){ $errors[] = 'turma vazio'; }
        elseif(empty($sala)){ $errors[] = 'sala vazio'; }
        elseif(empty($turno)){ $errors[] = 'turno vazio'; }
        elseif(empty($classe)){ $errors[] = 'classe vazio'; }
        elseif(empty($responsavel)){ $errors[] = 'responsável vazio'; }
        elseif(!preg_match('/^\D+$/i', $responsavel)){ $errors[] = 'responsavel não pode conter numero';}
        elseif(strlen($responsavel) < 4){ $errors[] = 'responsavel não pode conter menos de 4 caracteres';}
        elseif(empty($email)){ $errors[] = 'email vazio'; }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){ $errors[] = 'formato do email invalido'; }
        elseif(strlen($email) > 64){ $errors[] = 'email não pode conter mais de 64 caracteres'; }
        elseif(empty($curso)){ $errors[] = 'curso vazio'; }
        elseif(strlen($curso) > 20){ $errors[] = 'curso não pode conter mais de 20 caracteres'; }
        elseif(empty($sexo)){ $errors[] = 'sexo vazio'; }
        elseif(empty($desc)){ $errors[] = 'desc vazio'; }
        elseif(strlen($desc) < 4){ $errors[] = 'desc não pode conter menos de 4 caracteres';}
        elseif(
            !empty($nome_aluno) &&
            !empty($turma) &&
            !empty($sala) &&
            !empty($turno) &&
            !empty($classe) &&
            !empty($responsavel) &&
            !empty($email) &&
            filter_var($email, FILTER_VALIDATE_EMAIL) &&
            strlen($email) <= 64 && 
            strlen($curso) <= 20 &&
            !empty($curso) &&
            !empty($sexo) &&
            !empty($desc)
        ){
            $target = "../../view/admin/foto/aluno/".basename($_FILES['foto']['name']);
            $validation_img_extension = $_FILES['foto']['type'] == "image/jpg" || 
            $_FILES['foto']['type'] == "image/png" ||
            $_FILES['foto']['type'] == "image/jpeg";
            if($validation_img_extension){
                $sql = "UPDATE aluno SET nome_aluno = :nome, turma = :turma, 
                sala = :sala, classe = :classe, turno = :turno,
                    curso = :curso, nome_responsavel = :responsavel, 
                    email = :email, sexo = :sexo, 
                    descricao = :desc, foto = :foto, updated_at = NOW() WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":id", $id);
                $stmt->bindValue(":nome", $nome_aluno);
                $stmt->bindValue(":turma", $turma);
                $stmt->bindValue(":sala", $sala);
                $stmt->bindValue(":classe", $classe);
                $stmt->bindValue(":curso", $curso);
                $stmt->bindValue(":turno", $turno);
                $stmt->bindValue(":responsavel", $responsavel);
                $stmt->bindValue(":email", $email);
                $stmt->bindValue(":sexo", $sexo);
                $stmt->bindValue(":desc", $desc);
                $stmt->bindValue(":foto", $foto);
                if($stmt->execute()){
                    move_uploaded_file($_FILES["foto"]["tmp_name"], $target);
                    $messages[] = "dados do aluno atualizado com sucesso";
                }else{
                    $errors[] = "erro ao atualizar os dados do aluno por favor tente mais tarde";
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
    }

}
 ?>