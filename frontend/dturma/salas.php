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
                        <small>Administrador</small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="javascript:;"><i class="ion-ios-cog"></i> Usuários do sistema</a></li>
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
                    <li class=""><a href="/SGN/view/prof/professor.php"><i class="fas fa-tags"></i> Gerir professores</a></li>
                    <li><a href="/SGN/view/prof/profDisciplina.php"><i class="fas fa-tags"></i> Professore X Disciplina</a></li>
                    <li><a href="/SGN/view/prof/profClasse.php"><i class="fas fa-tags"></i> Professore X Classe</a></li>
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
                    <li class=""><a href="/SGN/view/aluno/alunoNovo.php"><i class="fas fa-tags"></i> Cadastrar Aluno</a></li>
                    <li class="active"><a href="/SGN/view/aluno/aluno.php"><i class="fas fa-tags"></i> Exibir Alunos</a></li>
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
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Dashboard</small></h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Professor</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                    data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="panel-body">

            <!-- Button trigger modal -->
            <!-- Button trigger modal -->
            <button type="button" class="mb-3 btn btn-primary" data-toggle="modal"
                data-target="#exampleModalLong">
                Adicionar sala
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Adicionado Sala</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="salas.php" method="POST">
                                <div class="form-group">
                                    <input type="text" name="sala" class="form-control" placeholder="Sala">
                                </div>
                                <select class="mb-3 form-control" name="turma">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                                <div class="form-group">
                                    <input type="text" name="resp" class="form-control"
                                        placeholder="Representante da Turma">
                                </div>
                                <!-- <div class="form-group">
                            <input type="text" class="form-control" placeholder="">
                        </div> -->
                                <button name="inserir" type="submit"
                                    class="w-100 btn btn-primary">Adicionar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>


            <table id="data-table-autofill" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">Sala</th>
                        <th class="text-nowrap">Turma</th>
                        <th class="text-nowrap">Responsável</th>
                        <th class="text-nowrap">Quantidade de aluno</th>
                        <th class="text-nowrap">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX">
                        <td width="1%" class="f-s-600 text-inverse">1</td>
                        <td>Trident</td>
                        <td>Internet Explorer 4.0</td>
                        <td>Win 95+</td>
                        <td><a href="#">Acessar<i class="ml-2 fas fa-arrow-right"></i></a></td>
                    </tr>
                    <tr class="even gradeC">
                        <td width="1%" class="f-s-600 text-inverse">2</td>
                        <td>Trident</td>
                        <td>Internet Explorer 5.0</td>
                        <td>Win 95+</td>
                        <td><a href="#">Acessar<i class="ml-2 fas fa-arrow-right"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end panel -->
</div>
<!-- end #content -->

<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
    data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
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
<!-- <script src="../assets/js/activelink.js"></script> -->
<!-- ================== END PAGE LEVEL JS ================== -->

</body>

</html>