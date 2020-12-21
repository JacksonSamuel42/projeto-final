<?php

session_start();

if(!$_SESSION["validar"]){

    header("location:login");

    exit();
}

include __DIR__. "../includes/head.php";
include __DIR__. "../includes/header.php";
include __DIR__. "../includes/aside.php";
        
?>
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
                    <li><a href="javascript:;"><i class="ion-ios-cog"></i> Usuários do sistema BRUNO</a></li>
                </ul>
            </li>
        </ul>

        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav nav1">
			<li class="nav-header">Navigation</li>
			<li class="active has-sub">
				<a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
				</a>
				<ul class="sub-menu">
					<li class="active"><a href="home"><i class="fas fa-home"></i><span>Home</span></a></li>
				</ul>
			</li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-copy"></i>
                    <span>Turno e Turma</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="turno"><i class="fas fa-tags"></i> Gerir Turnos</a></li>
                    <li class=""><a href="Turma"><i class="fas fa-tags"></i> Gerir Turma</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Professores</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="professor"><i class="fas fa-tags"></i>Cadastrar professores</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-bars"></i>
                    <span>Disciplinas</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="disciplina"><i class="fas fa-tags"></i> Gerir Disciplinas</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Alunos</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="aluno"><i class="fas fa-tags"></i> Cadastrar Alunos</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-print"></i>
                    <span>Relatórios</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="boletim"><i class="fas fa-tags"></i> Boletim</a></li>
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
            <h4 class="panel-title">Dashboard</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                    data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="panel-body">
            Panel Content Here
        </div>
    </div>
    <!-- end panel -->
</div>
<!-- end #content -->
		
<?php

include __DIR__. "../includes/footer.php";
        
?>

