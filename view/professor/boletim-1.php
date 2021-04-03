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
        </ul>

        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav nav1">
			<li class="nav-header">Navigation</li>

            <!-- <li class="">
                <a href="<?= url() ?>">
                    <i class="ion-ios-pulse"></i>
                    <span>Home</span>
                </a>
            </li> -->

            <li class="">
                <a href="<?= url('sala') ?>">
                    <i class="fa fa-tags"></i>
                    <span>Sala</span>
                </a>
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

    <!-- {% if app.session.get('success') %}
        <h4 class="alert alert-success">{{success}}</h4>
    {% endif %} -->

    <!-- end page-header -->
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
        $curso = $resData['curso'];
        $turma = $resData['turma'];
    ?>


    <?php 
        
        $query = "SELECT * FROM aluno WHERE sala = :s AND turno = :t AND curso = :c AND turma = :tu";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':s', $sala);
        $stmt->bindValue(':t', $turno);
        $stmt->bindValue(':c', $curso);
        $stmt->bindValue(':tu', $turma);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        if(!$data){
            echo "<div class='alert alert-warning'>Nenhum aluno encontrado</div>";
        }

    ?>

    
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Gerir Boletim</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                    data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="panel-body">

            <table id="data-table-autofill" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">id</th>
                        <th class="text-nowrap">Nome do Aluno</th>
                        <th class="text-nowrap">Comandos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($data as $row) {?>
                            <tr class="odd gradeX">
                                <td><?= $row['id']?></td>
                                <td><?= $row['nome_aluno']?></td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#boletim-modal" class="imprimir btn btn-primary" ><i class="fa fa-eye"></i></button>
                                    <a href="boletim-1?id=<?= $row['id']?>" class="btn btn-success" ><i class="fa fa-hand-pointer"></i></a>
                                </td>
                            </tr>
                        <?php
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
<?php include __DIR__. "./boletimData/modal1.php"?>
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
        var panel = document.querySelector(".boletim-card");
        var printWindow = window.open('', '', '');
        printWindow.document.write('<html><head><title></title>');

        // Make sure the relative URL to the stylesheet works:
        // printWindow.document.write('<link rel="stylesheet" href="../assets/css/style.css">');
        printWindow.document.write('<link rel="stylesheet" media="print" href="../assets/css/print.css">');
        printWindow.document.write('<link rel="stylesheet" href="../assets/css/apple/app.min.css">');
        printWindow.document.write(
            '<style>.boletim-card{width: 70%;}</style>');
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