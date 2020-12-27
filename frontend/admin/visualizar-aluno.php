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
		<li class="breadcrumb-item"><a href="javascript:;">Aluno</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">visualizar</a></li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header">Detalhes do aluno(a)</small></h1>
	<!-- end page-header -->

	<div class="row">
		<!-- @if(isset($candidato) && !empty($candidato)) -->
		<!--User Img Card-->
		<div class="col-lg-3 p-0">
			<div class="col-lg-12 bg-white p-4" style=" height: 190px; border-radius:3px 3px 0 0px">
				<div class="w-100 text-center ">
					<img class="img-user mt-4" width="100" src="../assets/avatar2.png">
				</div>
				<h3 class="text-center mt-2">Nome do aluno</h3>
			</div>
			<!-- User Carteira Card-->
			<div class="col-lg-12 bg-white h-50 p-0 mt-2" style="margin-top:0px;height:54%;">
				<div class="w-100 text-center bg-dark d-flex" style="height: 30px;">
					<h3 class="w-100 text-center  text-white p-1" style="font-size:16px">Alguma Coisa
					</h3>
				</div>
				<div class="w-100 text-center" style="padding-bottom:20px;margin-top:65px">
					<h3 class=" text-white prece-saldo">
						<!-- <span style="color:#333">0,00 <small>kz</small></span> -->
					</h3>
				</div>
			</div>
		</div>
		<!--Tabs-->
		<div class="col-lg-9 pr-0">
			<div class="bg-white" style="border-radius:5px">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#historico">Dados Pessoais</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#pagamento">
							Notas
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#desempenho">
							Desempenho
						</a>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content" style="height:380px;">
					<div class="tab-pane active container p-0" id="historico">
						<?php include __DIR__. '/aluno/dados-aluno.php' ?>
					</div>
					<div class="tab-pane container p-0" id="pagamento">
                        <h1>Dados da Turma</h1>
					</div>
					<div class="tab-pane container p-0" id="desempenho">
                        <?php include __DIR__. '/aluno/desempenho.php' ?>
					</div>
				</div>
			</div>
		</div>
		<!--End Tabs-->
	</div>
</div>

<?php

include __DIR__. "../includes/footer.php";
        
?>