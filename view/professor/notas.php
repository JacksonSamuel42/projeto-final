<?php 
    session_start();
    include('../../database/db.config.php');
    include('../../config/isUser.php');

    $id = filter_input(INPUT_GET ,'id', FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM aluno WHERE id = $id ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    // pegando os boletins
    $stmt = $pdo->prepare("SELECT * FROM boletim WHERE id_aluno = :id AND trimestre = 'I-trimestre'");
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $resCount = count($res); // contando quantos elementos ele tem

    $stmt = $pdo->prepare("SELECT * FROM boletim WHERE id_aluno = :id AND trimestre = 'II-trimestre'");
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $resData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $resCount2 = count($resData); // contando quantos elementos ele tem

    

    $stmt = $pdo->prepare("SELECT * FROM tipo_disciplina WHERE classe = :classe
    AND curso = :curso");
    $stmt->bindValue(':classe', $data['classe']);
    $stmt->bindValue(':curso', $data['curso']);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $countDisciplina = count($res); // contando quantos elementos ele tem

    // verificando se o numero de notas no boletim corresponde ao numero de disciplinas desse aluno

    if($resCount >= $countDisciplina) $displayTrimestres2 = '';
    else $displayTrimestres2 = 'd-none';

    if($resCount2 >= $countDisciplina) $displayTrimestres3 = '';
    else $displayTrimestres3 = 'd-none'


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
    <link href="../../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../../assets/css/custom.css">
    <link rel="stylesheet" href="../../assets/css/recibo.css">
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

            <li class="">
                <a href="<?= url() ?>">
                    <i class="ion-ios-pulse"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="active">
                <a href="<?= url('sala') ?>">
                    <i class="fa fa-tags"></i>
                    <span>Sala</span>
                </a>
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
        <li class="breadcrumb-item"><a href="javascript:;">Notas</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Notas</small></h1>
    
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <!-- <h4 class="panel-title">Sala</h4> -->
        </div>
        <div class="panel-body">

        <div class="col-lg-12 pr-0">
            <div class="bg-white" style="border-radius:5px">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#primeiro">1º Trimestre</a>
                    </li>
                    <li class="nav-item <?= $displayTrimestres2?> ">
                        <a class="nav-link" data-toggle="tab" href="#segundo">2º Trimestre</a>
                    </li>
                    <li class="nav-item <?= $displayTrimestres3 ?>">
                        <a class="nav-link" data-toggle="tab" href="#terceiro">
                            3º Trimestre
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content" style="height: 420px;background-color: #fff; overflow: auto;">
                    <div class="tab-pane active container p-0" id="primeiro">
                        <?php include __DIR__. "./nota_aluno/trimestres/primeiro.php" ?>
                    </div>

                    <div class="tab-pane container p-0" id="segundo">
                        <?php include __DIR__. "./nota_aluno/trimestres/segundo.php" ?>
                    </div>

                    <div class="tab-pane container p-0" id="terceiro">
                        <?php include __DIR__. "./nota_aluno/trimestres/terceiro.php" ?>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>


</div>

<?php
    include __DIR__. "./nota_aluno/notasModal/adicionar.php";
    include __DIR__. "./nota_aluno/notasModal/edit.php";
    include __DIR__. "./nota_aluno/notasModal/delete.php";
?>
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
<script src="../../assets/js/babel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="../../assets/js/app.min.js"></script>
<script src="../../assets/js/notas/index.js" type="module"></script>
<script src="../../assets/js/theme/apple.min.js"></script>
<!-- ================== END BASE JS ================== -->
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../../assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables.net-autofill/js/dataTables.autofill.min.js"></script>
<script src="../../assets/plugins/datatables.net-autofill-bs4/js/autofill.bootstrap4.min.js"></script>
<script src="../../assets/js/demo/table-manage-autofill.demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- <script src="../../assets/js/activelink.js"></script> -->
<!-- ================== END PAGE LEVEL JS ================== -->


</body>

</html>