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
    <link rel="stylesheet" href="../../assets/css/busca.css">
    <link href="../../assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="../../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" />
    <link href="../../assets/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="../../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="../../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />

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
                    <?php
                            include __DIR__. './code/credencias.php';
                            
                            if($data['foto'] == NULL){?>
                            <img src="../admin/foto/professor/default.jpg" width="180"
                                class="rounded-circle d-flex justify-content-center m-auto">
                            <?php
                                }else{?>
                            <img class="rounded-circle d-flex justify-content-center m-auto" width="180"
                                src="../admin/foto/professor/<?= $data['foto']?>" alt="">
                            <?php
                                }
                        ?>
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
                    <li class=""><a href="<?= url() ?>"><i class="fas fa-home"></i><span>Home</span></a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-copy"></i>
                    <span>Turno/Turma/Classe/Curso</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="<?= url('turno') ?>"><i class="fas fa-tags"></i> Gerir Turno</a></li>
                    <li class=""><a href="<?= url('turma') ?>"><i class="fas fa-tags"></i> Gerir Turma</a></li>
                    <li class=""><a href="<?= url('classe') ?>"><i class="fas fa-tags"></i> Gerir Classe</a></li>
                    <li class=""><a href="<?= url('curso') ?>"><i class="fas fa-tags"></i> Gerir cursos</a></li>
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

            <li class="has-sub">
				<a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fab fa-product-hunt"></i>
                    <span>Pautas</span>
				</a>
				<ul class="sub-menu">
					<li class=""><a href="<?= url('pautas') ?>"><i class="fas fa-tags"></i><span>
                    Visualizar Pautas</span></a></li>
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
        function nota($data){
            if($data >= 10){
                return '<span class="text-blue">'.$data.'</span>';
            }else{
                return '<span class="text-danger">'.$data.'</span>';
            }
        }

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

        $id = filter_input(INPUT_GET, 'aluno', FILTER_SANITIZE_NUMBER_INT);
        $classe = filter_input(INPUT_GET, 'classe', FILTER_SANITIZE_STRING);

        
        $query = "SELECT * FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) WHERE trimestre = 'I-trimestre' AND id_aluno = $id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $tri1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) WHERE trimestre = 'II-trimestre' AND id_aluno = $id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $tri2 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) WHERE trimestre = 'III-trimestre' AND id_aluno = $id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $tri3 = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare("SELECT * FROM tipo_disciplina WHERE classe = '$classe'
        AND curso = 'informatica'");
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($res as $row){
            $disc = $row['nome'];
            $query = "SELECT AVG(media) as media, disciplina, aluno.nome_aluno FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) WHERE id_aluno = 1 AND disciplina = '$disc'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $media = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    ?>


    <!-- begin panel -->
    <div class="panel panel-inverse" style="overflow: auto;">
        <div class="panel-heading">
            <div class="col-lg-4">
                <h4 class="panel-title">Pautas</h4>
            </div>
        </div>
        <div class="panel-body">

            <ul class="nav nav-tabs nav-tabs-inverse nav-justified nav-justified-mobile" data-sortable-id="index-2">
                <li class="nav-item"><a href="#itrimestre" data-toggle="tab" class="nav-link active"><i
                    class="fab fa-accusoft fa-lg m-r-5"></i> <span class="d-none d-md-inline">I-Trimestre</span></a>
                </li>
                <li class="nav-item"><a href="#iitrimestre" data-toggle="tab" class="nav-link"><i
                    class="fab fa-accusoft fa-lg m-r-5"></i> <span class="d-none d-md-inline">II-Trimestre</span></a>
                </li>
                <li class="nav-item"><a href="#iiitrimestre" data-toggle="tab" class="nav-link"><i
                    class="fab fa-accusoft fa-lg m-r-5"></i> <span class="d-none d-md-inline">III-Trimestre</span></a>
                </li>
                <li class="nav-item"><a href="#res" data-toggle="tab" class="nav-link"><i
                    class="fab fa-accusoft fa-lg m-r-5"></i> <span class="d-none d-md-inline">Resultado Final</span></a></li>
            </ul>

            <div class="tab-content" data-sortable-id="index-3">
                <div class="tab-pane fade active show" id="itrimestre">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                        <h3 class="text-center">I-Trimestre</h3>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Disciplina</th>
                                <!-- <th>Trimestre</th> -->
                                <th>Nota 1</th>
                                <th>Nota 2</th>
                                <th>Nota 3</th>
                                <th>Media</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php
                                foreach ($tri1 as $row) { ?>
                                    <tr class="odd gradeX">
                                        <td><?= $row['nome_aluno']?></td>
                                        <td><?= $row['disciplina']?></td>
                                        <!-- <td><?= $row['trimestre']?></td> -->
                                        <td><?= nota($row['nota1'])?></td>
                                        <td><?= nota($row['nota2'])?></td>
                                        <td><?= nota($row['nota3'])?></td>
                                        <td><?= nota($row['media'])?></td>

                                    </tr>
                                <?php
                                    
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="iitrimestre">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                        <h3 class="text-center">II-Trimestre</h3>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Disciplina</th>
                                <!-- <th>Trimestre</th> -->
                                <th>Nota 1</th>
                                <th>Nota 2</th>
                                <th>Nota 3</th>
                                <th>Media</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php
                                foreach ($tri2 as $row) { ?>
                                    <tr class="odd gradeX">
                                        <td><?= $row['nome_aluno']?></td>
                                        <td><?= $row['disciplina']?></td>
                                        <!-- <td><?= $row['trimestre']?></td> -->
                                        <td><?= nota($row['nota1'])?></td>
                                        <td><?= nota($row['nota2'])?></td>
                                        <td><?= nota($row['nota3'])?></td>
                                        <td><?= nota($row['media'])?></td>
                                    </tr>
                                <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="iiitrimestre">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                        <h3 class="text-center">III-Trimestre</h3>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Disciplina</th>
                                <!-- <th>Trimestre</th> -->
                                <th>Nota 1</th>
                                <th>Nota 2</th>
                                <th>Nota 3</th>
                                <th>Media</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php
                                foreach ($tri3 as $row) { ?>
                                    <tr class="odd gradeX">
                                        <td><?= $row['nome_aluno']?></td>
                                        <td><?= $row['disciplina']?></td>
                                        <!-- <td><?= $row['trimestre']?></td> -->
                                        <td><?= nota($row['nota1'])?></td>
                                        <td><?= nota($row['nota2'])?></td>
                                        <td><?= nota($row['nota3'])?></td>
                                        <td><?= nota($row['media'])?></td>

                                    </tr>
                                <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="pauta-imprimir tab-pane fade" id="res">
                    <table id=" data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                        <h3 class="text-center">Resultado final</h3>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Disciplina</th>
                                <th>Resultado Final</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php
                                foreach($res as $row){
                                    $disc = $row['nome'];
                                    $query = "SELECT AVG(media) as media, disciplina, aluno.nome_aluno FROM `boletim_preserv` INNER JOIN aluno ON (boletim_preserv.id_aluno = aluno.id) WHERE id_aluno = $id AND disciplina = '$disc'";
                                    $stmt = $pdo->prepare($query);
                                    $stmt->execute();
                        
                                    $media = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                                    foreach($media as $md){
                                        $val = $md['media'];
                                        $val_format = number_format($val, '2', '.', ',');
                                        echo "<tr>";
                                        echo "<td>". $md['nome_aluno'] ."</td>";
                                        echo "<td>". $md['disciplina'] ."</td>";
                                        echo "<td>". nota($val_format) ."</td>";
                                        echo "</tr>";
                                        if($val < 10){
                                            if(count($md) >= 9){
                                                echo "<div class='alert alert-danger'>Reprovado</div>";
                                            }else{
                                                echo "<div class='alert alert-success'>Aprovado</div>";
                                            }
                                        }
                                    };
                                }
                            ?>
                        </tbody>
                    </table>
                    <button onclick="PrintPanel()" type="button" class="imprimir-btn float-right btn btn-primary mb-4">
                        Imprimir
                    </button>
                </div>

            </div>

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
<script src="../../assets/js/jquery.js"></script>
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
<script src="../../assets/plugins/gritter/js/jquery.gritter.js"></script>
<script src="../../assets/plugins/flot/jquery.flot.js"></script>
<script src="../../assets/plugins/flot/jquery.flot.time.js"></script>
<script src="../../assets/plugins/flot/jquery.flot.resize.js"></script>
<script src="../../assets/plugins/flot/jquery.flot.pie.js"></script>
<script src="../../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="../../assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
<script src="../../assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
<script src="../../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<!-- <script src="../../assets/js/activelink.js"></script> -->
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    function PrintPanel() {
        let btn = document.querySelector('.imprimir-btn').style.display = 'none';
        var panel = document.querySelector(".pauta-imprimir");
        console.log(panel)
        var printWindow = window.open('', '', '');
        printWindow.document.write('<html><head><title></title>');

        // Make sure the relative URL to the stylesheet works:
        // printWindow.document.write('<link rel="stylesheet" href="../assets/css/style.css">');
        printWindow.document.write('<link rel="stylesheet" media="print" href="../../assets/css/print.css">');
        printWindow.document.write('<link rel="stylesheet" href="../../assets/css/apple/app.min.css">');
        printWindow.document.write(
            '<style>.pauta{display:flex; justify-content:center, align-items:center; width: 50%}</style>');
        printWindow.document.write(
            '<style>.body{background: #fff}</style>');
        // printWindow.document.write('<style>.front{background: url("../img/bg-tarjeta/bg-tarjeta-01.jpg")}</style>');
        // printWindow.document.write('<div class="div" style="width:400px;height:400px;background: red"></div>');

        printWindow.document.write('</head><body >');
        printWindow.document.write(panel.innerHTML);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        
        setTimeout(function () {
            printWindow.print();
        }, 500);
        return false;
    }
</script>

</body>

</html>