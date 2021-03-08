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
                    <li class="active"><a href="<?= url('usuario') ?>"><i class="ion-ios-cog"></i>Usuários do sistema</a></li>
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
					<li class=""><a href="<?= url('index') ?>"><i class="fas fa-home"></i><span>Home</span></a></li>
				</ul>
			</li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-copy"></i>
                    <span>Turno/Turma/Classe</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="<?= url('turno') ?>"><i class="fas fa-tags"></i> Gerir Turno</a></li>
                    <li class=""><a href="<?= url('turma') ?>"><i class="fas fa-tags"></i> Gerir Turma</a></li>
                    <li class=""><a href="<?= url('classe') ?>"><i class="fas fa-tags"></i> Gerir Classe</a></li>
                </ul>
            </li>

            <li class="active has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Professores</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="<?= url('professor') ?>"><i class="fas fa-tags"></i>Cadastrar professores</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-bars"></i>
                    <span>Salas</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="<?= url('salas') ?>"><i class="fas fa-tags"></i> Cadastrar Sala</a>
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
                    <li class=""><a href="<?= url('disciplina') ?>"><i class="fas fa-tags"></i> Gerir Disciplinas</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Alunos</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="<?= url('aluno') ?>"><i class="fas fa-tags"></i> Cadastrar
                            Alunos</a></li>
                </ul>
            </li>

            <li class="has-sub">
				<a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Boletins</span>
				</a>
				<ul class="sub-menu">
					<li class=""><a href="<?= url('boletim-1') ?>"><i class="fas fa-tags"></i><span>I-Trimestre</span></a></li>
					<li class=""><a href="<?= url('boletim-2') ?>"><i class="fas fa-tags"></i><span>II-Trimestre</span></a></li>
					<li class=""><a href="<?= url('boletim-3') ?>"><i class="fas fa-tags"></i><span>III-Trimestre</span></a></li>
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
        <li class="breadcrumb-item"><a href="javascript:;">Professores</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Detalhes Professor</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Detalhes Professor</small></h1>
    <!-- end page-header -->

    <?php 
        include('../../database/db.config.php');

        $prof = filter_input(INPUT_GET, 'professor', FILTER_SANITIZE_STRING);
        $query = "SELECT * FROM professores WHERE nome_professor = '$prof'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <?php
        include __DIR__ . "../../../source/Controllers/listInfo.php"
    ?>

    <!-- begin tabs -->
    <!-- begin col-6 -->
    <div class="">
        <!-- end nav-tabs -->
        <!-- begin tab-content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Editar Professor</h4>
                        </div>
                        <div class="card-body">
                            <div id="resultado"></div>
                            
                            <form method="POST" id="update-professor" enctype="multipart/form-data">
                                
                                <div class="row">
                                    <input type="hidden" value="<?= $data['id']?>" name="id">
                                    <div class="col-lg-6">
                                        <label>Foto</label>
                                        <input type="file" name="foto" class="form-control mb-3">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Nome</label>
                                        <input type="text" value="<?= $data['nome_professor']?>" name="nome" class="form-control mb-3"
                                            placeholder="Nome do Professor">
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

                                    <div class="col-lg-4">
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
                                        <label for="">Disciplina</label>
                                        <select class="form-control mb-3" name="disciplina" id="">
                                            <option value="<?= $data['disciplina']?>"><?= $data['disciplina']?></option>
                                            <?php
                                                foreach ($disciplina as $disc) {?>
                                            <option value="<?= $disc['nome_disciplina']?>">
                                                <?= $disc['nome_disciplina']?></option>
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
                                        <label for="">Formação</label>
                                        <input class="form-control" value="<?= $data['formacao']?>" type="text" name="formacao" id=""
                                            placeholder="Formação">
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
                                <img style="border-radius: 50%;" width="180" class="d-flex m-auto mt-3 img" src="./foto/professor/<?= $data['foto']?>" />
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-gray"><?= $data['disciplina']?></h6>
                            <h4 class="card-title"><?= $data['nome_professor']?></h4>
                            <p class="card-description">
                                <?= $data['descricao'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end tab-content -->

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
<script src="../../assets/js/ajax/professorUpdate.js"></script>
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