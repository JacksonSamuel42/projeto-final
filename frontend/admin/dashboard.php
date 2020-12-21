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

<div id="content" class="content">
	<!-- begin page-header -->
	<h1 class="page-header" style="margin-top:-30px">Dashboard</h1>
	<!-- end page-header -->

	<!-- begin row -->
	<div class="row">
		<!-- begin col-3 -->
		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-blue">
				<div class="stats-icon"><i class="fa fa-desktop"></i></div>
				<div class="stats-info">
					<h4>Inscrições Presenciais</h4>
					<p>3,291,922</p>
				</div>
				<div class="stats-link">
					<a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-globe"></i></div>
				<div class="stats-info">
					<h4>Inscrições Online</h4>
					<p>20.44%</p>
				</div>
				<div class="stats-link">
					<a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-orange">
				<div class="stats-icon"><i class="fa fa-users"></i></div>
				<div class="stats-info">
					<h4>Total Inscrições</h4>
					<p>1,291,922</p>
				</div>
				<div class="stats-link">
					<a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-red">
				<div class="stats-icon"><i class="fa fa-clock"></i></div>
				<div class="stats-info">
					<h4>Inscrições Pendentes</h4>
					<p>233</p>
				</div>
				<div class="stats-link">
					<a href="javascript:;">Ver Detalhes <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
		<div class="col-xl-12 md-12">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="chart-js-3">
				<div class="panel-heading" style="background-color:white;color:#1c1c1c">
					<h4 class="panel-title">
						<i class="ion-ios-podium"></i>
						Relatório dos últimos 6 meses
					</h4>
				</div>
				<div class="panel-body">
					<div id="apex-area-chart"></div>
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!--<div class="col-xl-3 md-12">
            <div class="panel panel-inverse" data-sortable-id="index-10">
                <div class="panel-heading" style="background-color:white;color:#1c1c1c">
                    <h4 class="panel-title">
                        <i class="ion-ios-calendar"></i>
                        Calendário
                    </h4>
                </div>
                <div class="panel-body">
                    <div id="datepicker-inline" class="datepicker-full-width overflow-y-scroll position-relative"><div></div></div>
                </div>
            </div>
        </div>
    </div>-->
		<!-- end row -->
</div>
<?php
    include __DIR__. "../includes/footer.php";
?>


		

