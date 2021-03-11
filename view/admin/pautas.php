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
    <link href="../../assets/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css" rel="stylesheet" />

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
                    <li class="active"><a href="<?= url('usuario') ?>"><i class="ion-ios-cog"></i>Usuários do
                            sistema</a></li>
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
                    <li class="active"><a href="<?= url('turno') ?>"><i class="fas fa-tags"></i> Gerir Turno</a></li>
                    <li class=""><a href="<?= url('turma') ?>"><i class="fas fa-tags"></i> Gerir Turma</a></li>
                    <li class=""><a href="<?= url('classe') ?>"><i class="fas fa-tags"></i> Gerir Classe</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Professores</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="<?= url('professor') ?>"><i class="fas fa-tags"></i>Cadastrar
                            professores</a></li>
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
                    <li class=""><a href="<?= url('disciplina') ?>"><i class="fas fa-tags"></i> Gerir Disciplinas</a>
                    </li>
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
                    <li class=""><a href="<?= url('boletim-1') ?>"><i
                                class="fas fa-tags"></i><span>I-Trimestre</span></a></li>
                    <li class=""><a href="<?= url('boletim-2') ?>"><i
                                class="fas fa-tags"></i><span>II-Trimestre</span></a></li>
                    <li class=""><a href="<?= url('boletim-3') ?>"><i
                                class="fas fa-tags"></i><span>III-Trimestre</span></a></li>
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
        <li class="breadcrumb-item"><a href="/SGN/admin/">Pautas</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Pauta</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Pauta</small></h1>

    <!-- {% if app.session.get('success') %}
        <h4 class="alert alert-success">{{success}}</h4>
    {% endif %} -->
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

    <!-- end page-header -->
    <?php 
        include('../../database/db.config.php');

        
        $query = "SELECT * FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) WHERE trimestre = 'I-trimestre'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $tri1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) WHERE trimestre = 'II-trimestre'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $tri2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) WHERE trimestre = 'III-trimestre'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $tri3 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(isset($_POST['filter-aluno'])){
            $stmt = $pdo->prepare("SELECT * FROM tipo_disciplina WHERE classe = :classe
            AND curso = :curso");
            $stmt->bindValue(':classe', $_POST['classe']);
            $stmt->bindValue(':curso', $_POST['curso']);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $stmt = $pdo->prepare("SELECT count(*) FROM tipo_disciplina WHERE classe = :classe
            AND curso = :curso");
            $stmt->bindValue(':classe', $_POST['classe']);
            $stmt->bindValue(':curso', $_POST['curso']);
            $stmt->execute();
            $resC = $stmt->fetch(PDO::FETCH_ASSOC);
    
            foreach($resC as $count){
                $calc = $count * 3;
            }
        }

    ?>


    <!-- begin panel -->
    <div class="panel panel-inverse" style="overflow: auto;">
        <div class="panel-heading">
            <div class="col-lg-4">
                <h4 class="panel-title">Pautas</h4>
            </div>
            <div class="col-lg-8 ">
                <div class="w-100">
                    <form method="post" class="float-right form-inline" style="margin-right:-20px">

                        <div class="form group mr-1">
                            <select class="form-control" name="sala">
                                <option value="0">sala</option>
                                <?php
                                    foreach ($sala as $value) {?>
                                <option value="<?= $value['nome_sala']?>"><?= $value['nome_sala']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form group mr-1">
                            <select class="form-control" name="curso">
                                <option value="0">Curso</option>
                                <option value="informática">Informática</option>
                                <option value="eletrónica">Eletrónica</option>
                            </select>
                        </div>
                        <div class="form group mr-1">
                            <select class="form-control" name="turma">
                                <option value="">turma</option>
                                <?php
                                    foreach ($turma as $value) {?>
                                <option value="<?= $value['nome_turma']?>"><?= $value['nome_turma']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form group mr-1">
                            <select class="form-control" name="turno">
                                <option value="">turno</option>
                                <?php
                                    foreach ($turno as $value) {?>
                                <option value="<?= $value['nome_turno']?>"><?= $value['nome_turno']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form group mr-1">
                            <select class="form-control" name="classe">
                                <option value="">classe</option>
                                <?php
                                        foreach ($classe as $value) {?>
                                <option value="<?= $value['classe']?>"><?= $value['classe']?></option>
                                <?php
                                        }
                                    ?>
                            </select>
                        </div>
                        <!-- <div class="form group mr-1">
                                            <input type="date" name="dataInicio" class="form-control">
                                        </div> -->
                        <div class="form group mr-1">
                            <button name="filter-aluno" class="btn btn-primary btn-destaque" type="submit">
                                Filtrar <i class="fa fa-filter"></i>
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        <div class="panel-body">

            <?php

            if(isset($_POST['filter-aluno']) ){ ?>
            <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">Nº</th>
                        <th > Nome Completo </th>
                        <th colspan="<?= $calc?>" class="text-center">I-Trimestre</th>
                        <th colspan="3" class="text-center">II-Trimestre</th>
                        <th colspan="3" class="text-center">III-Trimestre</th>
                        <th>CPE/CE</th>
                        <th>CF</th>
                    </tr>
                    <tr>
                        <th class="text-nowrap"></th>
                        <th></th>
                        <?php foreach($res as $row){ ?>
                            <th colspan="3"><?= $row['nome']?></th>
                        <?php
                        }
                        ?>
                        <th>CPE/CE</th>
                        <th>CF</th>
                    </tr>

                    <tr>
                        <th class="text-nowrap"></th>
                        <th></th>

                        <!-- 1 inicio -->
                        <?php foreach($res as $row){ ?>
                            <th>MAC</th>
                            <th>CPP</th>
                            <th>CT1</th>
                        <?php
                        }
                        ?>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $sala = addslashes($_POST['sala']);
                        $curso = addslashes($_POST['curso']);
                        $turma = addslashes($_POST['turma']);
                        $classe = addslashes($_POST['classe']);
                        $turno = addslashes($_POST['turno']);

                        $query = "SELECT * FROM `aluno` INNER JOIN boletim_preserv ON (aluno.id = boletim_preserv.id_aluno) WHERE curso = :curso AND sala = :sala AND turma = :turma AND turno = :turno AND classe = :classe ";
                        $stmt = $pdo->prepare($query);

                        $stmt->bindValue(':sala', $sala);
                        $stmt->bindValue(':curso', $curso);
                        $stmt->bindValue(':turma', $turma);
                        $stmt->bindValue(':turno', $turno);
                        $stmt->bindValue(':classe', $classe);

                        $stmt->execute();
                        $filtro = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if($stmt->rowCount()){
                            foreach ($filtro as $row) {
                                if($row['trimestre'] == "I-trimestre"){
                                ?>
                                    <tr class="odd gradeX">
                                        <td><?= $row['id']?></td>
                                        <td><?= $row['nome_aluno']?></td>
                                        <td><?= $row['nota1']?></td>
                                        <td><?= $row['nota2']?></td>
                                        <td><?= $row['nota3']?></td>
                                    </tr>
                                <?php
                                }
                            }
                        }else{
                            echo "<div class='alert alert-warning'>Nenhuma Pauta encontrada</div>";
                        }
                    ?>
                </tbody>
            </table>
            <?php

                }else{
                    echo "<div class='alert alert-warning'>Nenhuma Pauta encontrada por favor faça a sua busca</div>";
                }
            ?>

        </div>
    </div>
    <!-- end panel -->


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
<script src="../../assets/plugins/datatables.net-autofill/js/dataTables.autofill.min.js"></script>
<script src="../../assets/plugins/datatables.net-autofill-bs4/js/autofill.bootstrap4.min.js"></script>
<script src="../../assets/js/demo/table-manage-autofill.demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- <script src="../../assets/js/activelink.js"></script> -->
<!-- ================== END PAGE LEVEL JS ================== -->

</body>

</html>