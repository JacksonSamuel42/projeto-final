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
<div id="content" class="content" style="margin-top:40px;">
<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/SGN/admin/">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Professor</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Visualizar Professor</a></li>
    </ol>
    <!-- end breadcrumb -->

    <!-- begin page-header -->
    <h1 class="page-header">Detalhes do Professor</small></h1>
    <!-- end page-header -->
	<div class="row">
		<!-- begin col-10 -->
		<div class="col-xl-12">
			<div>
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#perfil">
							Perfil
						</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#notas">Desempenho</a>
					</li> -->
				</ul>

				<!-- Tab panes -->
				<div class="tab-content" style="background:#ccc">
					<div class="tab-pane active container" id="perfil" >
						<?php include __DIR__. "/professor/perfil.php" ?>
					</div>

					<!-- <div class="tab-pane container" id="notas" data-sortable-id="chart-js-6">
						<div class="col-lg-12 col-sm-12">
							<div class="card p-5" style="height: 500px; box-shadow: 5px 5px 15px -3px rgba(0,0,0,.4)">
								<div class="card-body">
									<canvas id="doughnut-chart" data-render="chart-js"></canvas>
								</div>
							</div>
						</div>
					</div> -->

				</div>
			</div>
		</div>
		<!-- end col-10 -->
	</div>
	<!-- end row -->
</div>

<?php

include __DIR__. "../includes/footer.php";
        
?>
		