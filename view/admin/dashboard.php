<?php 
    
    session_start();
    include('../../database/db.config.php');
    include('../../config/isUser.php');
    include('./code/counts.php'); 
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
    <link href="../../assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<link href="../../assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
	<link href="../../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
	<link href="../../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
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
			<li class="active has-sub">
				<a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
				</a>
				<ul class="sub-menu">
					<li class="active"><a href="<?= url('index') ?>"><i class="fas fa-home"></i><span>Home</span></a></li>
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
            <li class="has-sub">
				<a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Pautas</span>
				</a>
				<ul class="sub-menu">

					<li class=""><a href="<?= url('pautas') ?>"><i class="fas fa-tags"></i><span>
                    Visualizar Pautas</span></a></li>
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
        </div>
        <div class="panel-body">
            <!-- begin row -->
			<div class="row">
				<!-- begin col-3 -->
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon"><i class="fa fa-desktop"></i></div>
						<div class="stats-info">
							<h4>TOTAL DE ALUNOS</h4>
							<p><?php 
                                foreach($countAlunos as $cont){
                                    echo($cont);
                                }
                            ?></p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;"></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-info">
						<div class="stats-icon"><i class="fa fa-link"></i></div>
						<div class="stats-info">
							<h4>TOTAL DE PROFESSORES</h4>
							<p><?php 
                                foreach($countProfessores as $cont){
                                    echo($cont);
                                }
                            ?></p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;"></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-orange">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h4>TOTAL USUÁRIOS</h4>
							<p><?php 
                                foreach($countUsers as $cont){
                                    echo($cont);
                                }
                            ?></p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;"></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-clock"></i></div>
						<div class="stats-info">
							<h4>TOTAL DE SALAS</h4>
							<p><?php 
                                foreach($countSalas as $cont){
                                    echo($cont);
                                }
                            ?></p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;"></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
			</div>
			<!-- end row -->

            <div class="row">
                <div class="col-xl-8">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">Website Analytics (Last 7 Days)</h4>
                        </div>
                        <div class="panel-body pr-1">
                            <div id="interactive-chart" class="height-sm"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<!-- <script src="../../assets/js/activelink.js"></script> -->

<script src="../../assets/plugins/gritter/js/jquery.gritter.js"></script>
<script src="../../assets/plugins/flot/jquery.flot.js"></script>
<script src="../../assets/plugins/flot/jquery.flot.time.js"></script>
<script src="../../assets/plugins/flot/jquery.flot.resize.js"></script>
<script src="../../assets/plugins/flot/jquery.flot.pie.js"></script>
<script src="../../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="../../assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
<script src="../../assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
<script src="../../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<script src="../../assets/js/demo/dashboard.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    var handleInteractiveChart = function () {
	"use strict";
	function showTooltip(x, y, contents) {
		$('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css( {
			top: y - 45,
			left: x - 55
		}).appendTo("body").fadeIn(200);
	}
	if ($('#interactive-chart').length !== 0) {
	
		var data1 = [ 
			[1, 40], [2, 50], [3, 60], [4, 60], [5, 60], [6, 65], [7, 75], [8, 90], [9, 100], [10, 105], 
			[11, 110], [12, 110], [13, 120], [14, 130], [15, 135],[16, 145], [17, 132], [18, 123], [19, 135], [20, 150] 
		];
		var data2 = [
			[1, 10],  [2, 6], [3, 10], [4, 12], [5, 18], [6, 20], [7, 25], [8, 23], [9, 24], [10, 25], 
			[11, 18], [12, 30], [13, 25], [14, 25], [15, 30], [16, 27], [17, 20], [18, 18], [19, 31], [20, 23]
		];
		var xLabel = [
			[1,''],[2,''],[3,'May&nbsp;15'],[4,''],[5,''],[6,'May&nbsp;19'],[7,''],[8,''],[9,'May&nbsp;22'],[10,''],
			[11,''],[12,'May&nbsp;25'],[13,''],[14,''],[15,'May&nbsp;28'],[16,''],[17,''],[18,'May&nbsp;31'],[19,''],[20,'']
		];
		$.plot($("#interactive-chart"), [{
				data: data1, 
				label: "Page Views", 
				color: COLOR_BLUE,
				lines: { show: true, fill:false, lineWidth: 2 },
				points: { show: true, radius: 3, fillColor: COLOR_WHITE },
				shadowSize: 0
			}, {
				data: data2,
				label: 'Visitors',
				color: COLOR_GREEN,
				lines: { show: true, fill:false, lineWidth: 2 },
				points: { show: true, radius: 3, fillColor: COLOR_WHITE },
				shadowSize: 0
			}], {
				xaxis: {  ticks:xLabel, tickDecimals: 0, tickColor: COLOR_DARK_TRANSPARENT_2 },
				yaxis: {  ticks: 10, tickColor: COLOR_DARK_TRANSPARENT_2, min: 0, max: 200 },
				grid: { 
				hoverable: true, 
				clickable: true,
				tickColor: COLOR_DARK_TRANSPARENT_2,
				borderWidth: 1,
				backgroundColor: 'transparent',
				borderColor: COLOR_DARK_TRANSPARENT_2
			},
			legend: {
				labelBoxBorderColor: COLOR_DARK_TRANSPARENT_2,
				margin: 10,
				noColumns: 1,
				show: true
			}
		});
		var previousPoint = null;
		$("#interactive-chart").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));
			if (item) {
				if (previousPoint !== item.dataIndex) {
					previousPoint = item.dataIndex;
					$("#tooltip").remove();
					var y = item.datapoint[1].toFixed(2);

					var content = item.series.label + " " + y;
					showTooltip(item.pageX, item.pageY, content);
				}
			} else {
				$("#tooltip").remove();
				previousPoint = null;            
			}
			event.preventDefault();
		});
	}
};
</script>