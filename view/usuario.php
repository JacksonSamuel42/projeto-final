<?php include('../config/isUser.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="../assets/css/apple/app.min.css" rel="stylesheet" />
    <link href="../assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css" rel="stylesheet" />

    <!-- ================== END PAGE LEVEL STYLE ================== -->
</head>

<?php include('../view/partials/header.php') ?>

<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image image-icon bg-black text-grey-darker">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="info">
                        <b class="caret"></b>
                        <?php echo $_SESSION['user']?>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile active">
                    <li><a href="/SGN/view/usuario.php"><i class="ion-ios-cog"></i>Usuários do sistema</a></li>
                </ul>
            </li>
        </ul>

        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav nav1">
			<li class="nav-header">Navigation</li>
			<li class=" has-sub">
				<a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
				</a>
				<ul class="sub-menu">
					<li class=""><a href="/SGN/index.php"><i class="fas fa-home"></i><span>Home</span></a></li>
				</ul>
			</li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-copy"></i>
                    <span>Turno/Turma/Classe</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="/SGN/view/turno.php"><i class="fas fa-tags"></i> Gerir Turno</a></li>
                    <li class=""><a href="/SGN/view/turma.php"><i class="fas fa-tags"></i> Gerir Turma</a></li>
                    <li class=""><a href="/SGN/view/classe.php"><i class="fas fa-tags"></i> Gerir Classe</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Professores</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="/SGN/view/prof/professor.php"><i class="fas fa-tags"></i>Cadastrar professores</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-bars"></i>
                    <span>Salas</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="/SGN/view/salas.php"><i class="fas fa-tags"></i> Cadastrar Sala</a>
                    </li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-bars"></i>
                    <span>Disciplinas</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="/SGN/view/disciplina.php"><i class="fas fa-tags"></i> Gerir Disciplinas</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Alunos</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="/SGN/view/aluno/aluno.php"><i class="fas fa-tags"></i> Cadastrar
                            Alunos</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-print"></i>
                    <span>Relatórios</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="/SGN/view/boletim.php"><i class="fas fa-tags"></i> Boletim</a></li>
                </ul>
            </li>

            <li class="">
                <a href="javascript:;">
                    <i class="fas fa-chart-pie"></i>
                    <span>Desempenho</span>
                </a>
            </li>

            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                        class="ion-ios-arrow-back"></i> <span>Collapse</span></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->


<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/SGN/admin/">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Turno</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Usuarios</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Usuarios</small></h1>

    <!-- {% if app.session.get('success') %}
        <h4 class="alert alert-success">{{success}}</h4>
    {% endif %} -->

    <!-- end page-header -->
    <?php 
        include('../database/db.config.php');

        if(isset($_POST['updatedata'])){

            $id = addslashes($_POST['update_id']);
            $nome = addslashes($_POST['update_nome']);
            $email = addslashes($_POST['update_email']);
            $senha = addslashes($_POST['update_senha']);
            $ut = addslashes($_POST['update_userType']);

            $sql = "UPDATE users SET name = :nome, email = :email, pass = :senha, usertype = :ut WHERE user_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":senha", md5($senha));
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":ut", $ut);

            if($stmt->execute()){
                echo "<div class='alert alert-success'><h5>atualizado com sucesso</h5></div>";
                // echo $_FILES["img"]["tmp_name"], "upload/", $_FILES["img"]["name"];
            }else{
                echo "<div class='alert alert-danger'><h5>erro ao atualizar</h5></div>";
            }

        }

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
                echo "<div class='alert alert-danger'><h5>Turno já cadastrado</h5></div>";
            }else{
                $query = "INSERT INTO users (name, email, pass, usertype) VALUES (:nome, :email, :senha, :ut)";
                $stmt = $pdo->prepare($query);
                $stmt->bindValue(":nome", $nome);
                $stmt->bindValue(":email", $email);
                $stmt->bindValue(":senha", md5($senha));
                $stmt->bindValue(":ut", $ut);
    
                if($stmt->execute()){
                    echo "<div class='alert alert-success'><h5>usuário adicionada com sucesso</h5></div>";
                }else{
                    echo "<div class='alert alert-danger'><h5>Erro ao adicionar usuário</h5></div>";
                }
            }

        }

        if(isset($_POST['deletedata'])){
            // $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $id = addslashes($_POST['delete_id']);

            $query = "DELETE FROM users WHERE user_id = '$id' ";
            $stmt = $pdo->prepare($query);

            if($stmt->execute()){
                echo "<div class='alert alert-success'><h5>Deletado com sucesso</h5></div>";
            }else{
                echo "<div class='alert alert-warning'><h5>Não Deletado</h5></div>";
            } 
        }
        
        $query = "SELECT * FROM users";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    ?>

    
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Usuarios</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                    data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="panel-body">

            <!-- Modal -->
            <div class="modal fade" id="Inserir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Turma</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/SGN/view/usuario.php" method="POST">
                            <div class="modal-body">
                                <div style="max-width: 400px;margin: auto;display: flex;flex-direction: column;justify-content: center;">
                                    <label for="">Nome</label>
                                    <input required type="text" name="nome" class="form-control mb-3" value=""  placeholder="nome">
                                    
                                    <label for="">Email</label>
                                    <input required type="email" name="email" class="form-control mb-3" value=""  placeholder="email">
                                    
                                    <label for="">Senha</label>
                                    <input required type="password" name="senha" class="form-control mb-3" value=""  placeholder="senha">
                                    
                                    <label for="">Tipo de Permissão</label>
                                    <select name="userType" id="" class="form-control">
                                        <option value="">selecionar</option>
                                        <option value="Admin">Administrador</option>
                                        <option value="DiretorTurma">Diretor de Turma</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" name="inserir" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <table id="data-table-autofill" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">id</th>
                        <th class="text-nowrap">Nome</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Senha</th>
                        <th class="text-nowrap">Tipo de Permissão</th>
                        <th class="text-nowrap">Comandos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($data as $row) {?>
                            <tr class="odd gradeX">
                                <td ><?= $row['user_id']?></td>
                                <td ><?= $row['name']?></td>
                                <td ><?= $row['email']?></td>
                                <td ><?= $row['pass']?></td>
                                <td ><?= $row['usertype']?></td>
                                <td>
                                    <!-- <a class="updatebtn btn btn-primary text-white" href="/SGN/view/turno.php?id=<?= $row['id']?>">Editar</a> -->
                                    <button type="button" class="updatebtn btn btn-primary">Editar</button>
                                    <button type="button" class="deletebtn btn btn-danger">Deletar</button>
                                    <!-- <a data-toggle="modal" data-target="#delete" class="text-white btn btn-danger" href="/SGN/view/turno.php?id=<?= $row['id']?>">Eliminar</a> -->
                                </td>
                            </tr>
                        <?php
                        }
                    ?>
                </tbody>
            </table>

            <!-------------------------------------- Modal Editar ----------------------------->
            
            <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Turma</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/SGN/view/usuario.php" method="POST">
                            <div class="modal-body">
                                <div style="max-width: 400px;margin: auto;display: flex;flex-direction: column;justify-content: center;">
                                    
                                    <input type="hidden" name="update_id" id="update_id" class="form-control mb-3" >
                                    
                                    <label for="">Nome</label>
                                    <input required type="text" name="update_nome" id="update_nome" class="form-control mb-3"  placeholder="Nome do Turno">
                                    
                                    <label for="">Email</label>
                                    <input required type="email" name="update_email" id="update_email" class="form-control mb-3"  placeholder="Nome do Turno">
                                    
                                    <label for="">Senha</label>
                                    <input required type="password" name="update_senha" id="update_senha" class="form-control mb-3"  placeholder="Nome do Turno">
                                    
                                    <label for="">Tipo de Permissão</label>
                                    <select name="update_userType"  class="form-control" id="update_userType">
                                        <option value="">selecionar</option>
                                        <option value="Admin">Administrador</option>
                                        <option value="DiretorTurma">Diretor de Turma</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" name="updatedata" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!---------------------------------- end Modal editar ------------------------------->

            <!-------------------------------- Modal Deletar ------------------------------------>
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title text-danger" id="exampleModalLabel">Deletar Turma</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center text-danger">
                                <i class="fas fa-exclamation-circle fa-4x mb-3 animated rotateIn"></i>
                                <h3 class="">
                                    Você esta prestes a deletar um Usuário <br>
                                    tem a certeza que deseja deletar?
                                </h3>
                            </div>
                        </div>
                        <form action="/SGN/view/usuario.php" method="POST">
                            <div class="modal-body">
                                <div style="max-width: 400px;margin: auto;display: flex;flex-direction: column;justify-content: center; align-items: center;">
                                    <input required type="hidden" name="delete_id" id="delete_id" class="form-control mb-3" >
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" name="deletedata" class="btn btn-danger">Deletar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!----------------------------------- end Modal Deletar --------------------------->

        </div>
    </div>
    <!-- end panel -->
         <!-- Button trigger modal -->
    <button type="button" class="float-right btn btn-primary mb-4" data-toggle="modal" data-target="#Inserir">
        Adicionar Usuário
    </button>


</div>
<!-- end #content -->

<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
    data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->


</div>
<!-- end panel -->
</div>
<!-- end #content -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="../assets/js/app.min.js"></script>
<script src="../assets/js/theme/apple.min.js"></script>
<!-- ================== END BASE JS ================== -->
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables.net-autofill/js/dataTables.autofill.min.js"></script>
<script src="../assets/plugins/datatables.net-autofill-bs4/js/autofill.bootstrap4.min.js"></script>
<script src="../assets/js/demo/table-manage-autofill.demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- <script src="../assets/js/activelink.js"></script> -->
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
    $(document).ready(function(){
        $('.updatebtn').on('click', function(){
           $('#update').modal('show');
           $tr = $(this).closest('tr');

           let data = $tr.children('td').map(function(){
            return $(this).text();
           }).get();

           $('#update_id').val(data[0]);
           $('#update_nome').val(data[1]);
           $('#update_email').val(data[2]);
           $('#update_senha').val(data[3]);
           $('#update_userType').val(data[4]);
        });

        $('.deletebtn').on('click', function(){
           $('#delete').modal('show');
           $tr = $(this).closest('tr');

           let data = $tr.children('td').map(function(){
            return $(this).text();
           }).get();

           $('#delete_id').val(data[0]);
        });
    });
</script>

</body>

</html>