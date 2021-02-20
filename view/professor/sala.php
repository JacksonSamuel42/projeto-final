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

            <li class="">
                <a href="<?= url('boletim') ?>">
                    <i class="fa fa-circle"></i>
                    <span>Boletim</span>
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

<?php
    include('../../database/db.config.php');
    $email = $_SESSION['status_email'];
    
    $query = "SELECT * FROM professores WHERE email = :status_email";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':status_email', $email);
    $stmt->execute();

    $resData = $stmt->fetch(PDO::FETCH_ASSOC); 

    $sala = $resData['sala'];
    $turno = $resData['turno'];
?>


<?php 
    
    $query = "SELECT * FROM aluno WHERE sala = :s AND turno = :t";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':s', $sala);
    $stmt->bindValue(':t', $turno);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    if(!$data){
        echo "<div class='alert alert-warning'>Nenhum aluno encontrado</div>";
    }

?>

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Sala</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Sala</small></h1>
    
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <!-- <h4 class="panel-title">Sala</h4> -->
        </div>
        <div class="panel-body">

            <table id="data-table-autofill" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th width="1%" class="text-nowrap">ID</th>
                        <th class="text-nowrap">Nome</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Classe</th>
                        <th class="text-nowrap">Curso</th>
                        <th class="text-nowrap">Turma</th>
                        <th class="text-nowrap">Turno</th>
                        <th class="text-nowrap">Comandos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($data as $row) {?>
                            <tr class="odd gradeX">
                                <td class="f-s-600 text-inverse"><?= $row['id']?></td>
                                <td><?= $row['nome_aluno']?></td>
                                <td><?= $row['email']?></td>
                                <td><?= $row['classe']?></td>
                                <td><?= $row['curso']?></td>
                                <td><?= $row['turma']?></td>
                                <td><?= $row['turno']?></td>
                                <td>
                                    <a href="<?= url('visualizarAluno') ?>?aluno=<?= $row['nome_aluno']?>"
                                        class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    <a href="<?= url('notas') ?>?aluno=<?= $row['nome_aluno']?>&id=<?= $row['id']?>"
                                        class="btn btn-success"><i class="fa fa-hand-pointer"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                    ?>
                </tbody>
            </table>

        </div>
    </div>


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