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

	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="dashboard>">Home</a></li>
		<li class="breadcrumb-item"><a href="perfil:;">Perfil</a></li>
	</ol>
	<!-- begin page-header -->
	<h1 class="page-header">Perfil</h1>
	<!-- end page-header -->

	<!-- begin panel -->
	<div class="panel panel-inverse">
		<div class="panel-heading">
			<!-- <h4 class="panel-title">Lista de Alunos</h4> -->
			<div class="panel-heading-btn">
				<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                    data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
			</div>
		</div>
		<div class="panel-body">

			<div class="row  d-flex justify-content-center m-auto">
				
				<div class="col-lg-8 col-sm-12 mb-3">
					<img class="rounded-circle d-flex justify-content-center m-auto"
						style="width: 150px; height: 150px;" src="views/img/fotos/br115.jpg"
						title="Editar" alt="">
					
					<form action="">
						<div class="row mt-3">
							<div class="form-group col-lg-6 col-sm-6">
								<label class="col-form-label" for="">Foto<span class="text-danger">*</span></label>
								<input required type="file" name="foto" class="form-control mb-4" placeholder="Foto">

								<label for="">Nome<span class="text-danger">*</span></label>
								<input required type="text" name="nome_aluno" class="form-control mb-3" placeholder="Nome">

								<label for="">Email<span class="text-danger">*</span></label>
								<input required type="email" name="nome_aluno" class="form-control mb-3" placeholder="Email">
							</div>

							<div class="form-group col-lg-6 col-sm-6 mt-2">
								<label for="">Senha<span class="text-danger">*</span></label>
								<input required type="password" name="nome_aluno" class="form-control mb-3" placeholder="Senha">
								
								<label for="" class="mt-2">Confirmar Senha<span class="text-danger">*</span></label>
								<input required type="password" name="nome_aluno" class="form-control mb-3" placeholder="Confirmar Senha">

								<button  type="submit" class="mt-4 w-100 btn btn-primary"><i class="fa fa-edit"></i> Editar</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- end panel -->
</div>

<?php
	include __DIR__. "/includes/footer.php";

?>