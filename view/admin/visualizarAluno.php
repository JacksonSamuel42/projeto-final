<?php 
    session_start();
    include('../../database/db.config.php');
    include('../../config/isUser.php') 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="../../assets/css/apple/app.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="../../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" />
    <link href="../../assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="../../assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->
</head>

<?php include('./partials/header.php') ?>

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
                <ul class="nav nav-profile">
                    <li><a href="/SGN/view/usuario.php"><i class="ion-ios-cog"></i> Usuários do sistema</a></li>
                </ul>
            </li>
        </ul>

        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav nav1">
            <li class="nav-header">Navigation</li>
            <li class="has-sub">
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
                    <span>Turno e Turma</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="/SGN/view/turno.php"><i class="fas fa-tags"></i> Gerir Turnos</a></li>
                    <li class=""><a href="/SGN/view/turma.php"><i class="fas fa-tags"></i> Gerir Turma</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Professores</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="/SGN/view/prof/professor.php"><i class="fas fa-tags"></i>Cadastrar
                            professores</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-bars"></i>
                    <span>Disciplinas</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="/SGN/view/disciplina.php"><i class="fas fa-tags"></i> Gerir Disciplinas</a>
                    </li>
                </ul>
            </li>

            <li class="active has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Alunos</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="/SGN/view/aluno/aluno.php"><i class="fas fa-tags"></i> Cadastrar Aluno</a>
                    </li>
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
        <li class="breadcrumb-item"><a href="javascript:;">Aluno</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Detalhes Aluno</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Detalhes Aluno</small></h1>
    <!-- end page-header -->

    
    <?php 
        include('../../database/db.config.php');

        if(isset($_POST['updatedata'])){

            $id = addslashes($_POST['id']);
            $nome_professor = addslashes($_POST['nome']);
            $turma = addslashes($_POST['turma']);
            $sala = addslashes($_POST['sala']);
            $classe = addslashes($_POST['classe']);
            $turno = addslashes($_POST['turno']);
            $email = addslashes($_POST['email']);
            $responsavel = addslashes($_POST['responsavel']);
            $sexo = addslashes($_POST['sexo']);
            $curso = addslashes($_POST['curso']);
            $desc = addslashes($_POST['desc']);
            $foto = addslashes($_FILES['foto']['name']);

            $target = "../foto/aluno/".basename($_FILES['foto']['name']);

            $validation_img_extension = $_FILES['foto']['type'] == "image/jpg" || 
            $_FILES['foto']['type'] == "image/png" ||
            $_FILES['foto']['type'] == "image/jpeg";

            if($validation_img_extension){
                $sql = "UPDATE aluno SET nome_aluno = :prof, turma = :turma, sala = :sala, classe = :classe, turno = :turno,
                 curso = :curso, nome_responsavel = :responsavel, email = :email, sexo = :sexo, descricao = :desc, foto = :foto, updated_at = NOW() WHERE id = :id";
                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(":id", $id);
                $stmt->bindValue(":prof", $nome_professor);
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
                    echo "<div class='alert alert-success'><h5>atualizado com sucesso</h5></div>";
                    // header("Refresh: 5; url=professor.php");
                }else{
                    echo "<div class='alert alert-danger'><h5>erro ao atualizar</h5></div>";
                }    
            }else{
                echo "<div class='alert alert-warning'><h5>apenas png, jpg e jpeg são permitidos</h5></div>";
            }

        }

        $prof = filter_input(INPUT_GET, 'aluno', FILTER_SANITIZE_STRING);
        $query = "SELECT * FROM aluno WHERE nome_aluno = '$prof'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <?php
        $query = "SELECT * FROM turma";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $turma = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query2 = "SELECT * FROM disciplina";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute();
        $disciplina = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        $query3 = "SELECT * FROM turno";
        $stmt3 = $pdo->prepare($query3);
        $stmt3->execute();
        $turno = $stmt3->fetchAll(PDO::FETCH_ASSOC);

        $query4 = "SELECT * FROM classes";
        $stmt4 = $pdo->prepare($query4);
        $stmt4->execute();
        $classe = $stmt4->fetchAll(PDO::FETCH_ASSOC);

        $query5 = "SELECT * FROM salas";
        $stmt5 = $pdo->prepare($query5);
        $stmt5->execute();
        $sala = $stmt5->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!-- begin tabs -->
    <!-- begin col-6 -->
    <div class="">
        
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Editar Aluno</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= url('visualizarAluno') ?>?aluno=<?= $data['nome_aluno']?>" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" value="<?= $data['id']?>" name="id">
                                    <div class="col-lg-6">
                                        <label>Foto</label>
                                        <input type="file" name="foto" class="form-control mb-3">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Nome</label>
                                        <input required type="text" value="<?= $data['nome_aluno']?>" name="nome" class="form-control mb-3"
                                            placeholder="Nome do Aluno">
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Classe</label>
                                        <select class="form-control mb-3" name="classe" id="">
                                            <option value="<?= $data['classe']?>"><?= $data['classe']?></option>
                                            <?php
                                                foreach ($classe as $value) {?>
                                            <option value="<?= $value['classe']?>"><?= $value['classe']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-8">
                                        <label>Turno</label>
                                        <select class="form-control mb-3" name="turno" id="">
                                            <option value="<?= $data['turno']?>"><?= $data['turno']?></option>
                                            <?php
                                                foreach ($turno as $value) {?>
                                            <option value="<?= $value['nome_turno']?>"><?= $value['nome_turno']?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Turma</label>
                                        <select class="form-control mb-3" name="turma" id="">
                                            <option value="<?= $data['turma']?>"><?= $data['turma']?></option>
                                            <?php
                                                foreach ($turma as $value) {?>
                                            <option value="<?= $value['nome_turma']?>"><?= $value['nome_turma']?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Sala</label>
                                        <select class="form-control mb-3" name="sala" id="">
                                            <option value="<?= $data['sala']?>"><?= $data['sala']?></option>
                                            <?php
                                                foreach ($sala as $value) {?>
                                            <option value="<?= $value['nome_sala']?>"><?= $value['nome_sala']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="">Curso</label>
                                        <select class="form-control mb-3" name="curso" id="">
                                            <option value="<?= $data['curso']?>"><?= $data['curso']?></option>
                                            <option value="informática">Informática</option>
                                            <option value="eletrónica">Eletrónica</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="">Responsável</label>
                                        <input class="form-control" value="<?= $data['nome_responsavel']?>" type="text" name="responsavel" id=""
                                            placeholder="Responsável">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="">Email</label>
                                        <input class="form-control" value="<?= $data['email']?>" type="email" name="email" id="" placeholder="Email">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="">Sexo</label>
                                        <select class="form-control mb-3" name="sexo" id="">
                                            <option value="<?= $data['sexo']?>"><?= $data['sexo']?></option>
                                            <option value="masculino">Masculino</option>
                                            <option value="feminino">Feminino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- <label>About Me</label> -->
                                            <div class="form-group">
                                                <!-- <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so
                                                    thirsty, I'm in that two seat Lambo.</label> -->
                                                <textarea name="desc" class="form-control" rows="5"><?= $data['descricao']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button name="updatedata" type="submit" class="btn btn-primary pull-right">Atualizar Perfil</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-avatar mt-3">
                            <a href="javascript:;">
                                <img style="border-radius: 50%;" width="180" class="d-flex m-auto mt-3 img" src="./foto/aluno/<?= $data['foto']?>" />
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-gray"><?= $data['curso']?></h6>
                            <h4 class="card-title"><?= $data['nome_aluno']?></h4>
                            <p class="card-description">
                                <?= $data['descricao'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end col-6 -->
    <!-- end tabs -->
</div>
<!-- end #content -->



<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
        class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->

</div>
<!-- end panel -->
</div>
<!-- end #content -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"></script>
<script src="../../assets/js/app.min.js"></script>
<script src="../../assets/js/theme/apple.min.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../../assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="../../assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../assets/plugins/pdfmake/build/pdfmake.min.js"></script>
<script src="../../assets/plugins/pdfmake/build/vfs_fonts.js"></script>
<script src="../../assets/plugins/jszip/dist/jszip.min.js"></script>
<script src="../../assets/js/demo/table-manage-buttons.demo.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../../assets/plugins/ckeditor/ckeditor.js"></script>
<script src="../../assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../../assets/js/demo/form-wysiwyg.demo.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
</script>

</body>

</html>