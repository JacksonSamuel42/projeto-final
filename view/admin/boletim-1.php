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
    <link href="../../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
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
                    <li><a href="/SGN/view/usuario.php"><i class="ion-ios-cog"></i> Usuários do sistema</a></li>
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

            <li class="active has-sub">
				<a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Boletins</span>
				</a>
				<ul class="sub-menu">
					<li class="active"><a href="<?= url('boletim-1') ?>"><i class="fas fa-tags"></i><span>I-Trimestre</span></a></li>
					<li class=""><a href="<?= url('boletim-2') ?>"><i class="fas fa-tags"></i><span>II-Trimestre</span></a></li>
					<li class=""><a href="<?= url('boletim-3') ?>"><i class="fas fa-tags"></i><span>III-Trimestre</span></a></li>
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
        <li class="breadcrumb-item"><a href="/SGN/admin/">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Turno</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Gerir Disciplina</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Gerir Boletim</small></h1>

    <!-- end page-header -->
    <?php 
        include('../../database/db.config.php');
        
        $query = "SELECT * FROM aluno";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
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

    
    <!-- begin panel -->
    <div class="panel panel-inverse">

        <div class="row">
            
        </div>

        <div class="panel-heading">
            <div class="col-lg-4">
                <h4 class="panel-title">Boletim Alunos</h4>
            </div>
            <div class="col-lg-8 ">
                <div class="w-100">
                    <form method="post" class="float-right form-inline" style="margin-right:-20px">

                        <div class="form group mr-1">
                            <input type="number" name="data" class="form-control" placeholder="ano">
                        </div>
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

            <table id="data-table-autofill" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">id</th>
                        <th class="text-nowrap">Nome do Aluno</th>
                        <th class="text-nowrap">Sala do Aluno</th>
                        <th class="text-nowrap">Comandos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
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
                                    <td><?= $row['id']?></td>
                                    <td><?= $row['nome_aluno']?></td>
                                    <td><?= $row['sala']?></td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#boletim-modal" class="imprimir btn btn-primary" ><i class="fa fa-eye"></i></button>
                                        <a href="boletim-1?id=<?= $row['id']?>" class="btn btn-success" ><i class="fa fa-hand-pointer"></i></a>
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
                                <td><?= $row['id']?></td>
                                <td><?= $row['nome_aluno']?></td>
                                <td><?= $row['sala']?></td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#boletim-modal" class="imprimir btn btn-primary" ><i class="fa fa-eye"></i></button>
                                    <a href="boletim-1?id=<?= $row['id']?>" class="btn btn-secondary" ><i class="fa fa-hand-pointer"></i></a>
                                </td>
                            </tr>
                        <?php
                            }

                    }
                    

                    ?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- end panel -->

<!-- Button trigger modal -->
<button type="button" class="float-right btn btn-primary mb-4">
    Imprimir
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
<?php include __DIR__. "./boletim/modal1.php"?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
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

<script>
    function PrintPanel() {
        let btn = document.querySelector('.imprimir-btn').style.display = 'none';
        var panel = document.querySelector(".modal-body");
        var printWindow = window.open('', '', '');
        printWindow.document.write('<html><head><title></title>');

        // Make sure the relative URL to the stylesheet works:
        // printWindow.document.write('<link rel="stylesheet" href="../assets/css/style.css">');
        printWindow.document.write('<link rel="stylesheet" media="print" href="../../assets/css/print.css">');
        printWindow.document.write('<link rel="stylesheet" href="../../assets/css/apple/app.min.css">');
        printWindow.document.write(
            '<style>.boletim-modal{display:flex; justify-content:center, align-items:center; width: 50%}</style>');
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