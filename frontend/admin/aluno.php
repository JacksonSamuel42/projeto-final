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
                    <li><a href="javascript:;"><i class="ion-ios-cog"></i> Usuários do sistema</a></li>
                </ul>
            </li>
        </ul>

        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav nav1">
			<li class="nav-header">Navigation</li>
			<li class="has-sub">
				<a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
				</a>
				<ul class="sub-menu">
					<li class=""><a href="home"><i class="fas fa-home"></i><span>Home</span></a></li>
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

            <li class="active has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Alunos</span>
                </a>
                <ul class="sub-menu">
                <li class="active"><a href="aluno"><i class="fas fa-tags"></i> Cadastrar Aluno</a>
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

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/SGN/admin/">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Alunos</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Lista de Alunos</a></li>
    </ol>
    <!-- end breadcrumb -->

   

    <!-- begin page-header -->
    <h1 class="page-header">Lista de Alunos</small></h1>
    <!-- end page-header -->
    
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Lista de Alunos</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                    data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#Inserir">
                Adicionar Aluno
            </button>

            <!-- Modal -->
            <div class="modal fade" id="Inserir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Professor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form  name="wysihtml5" action="/SGN/view/aluno/aluno.php" enctype="multipart/form-data" method="POST">
                            <div class="modal-body">
                                <div style="max-width: 400px;margin: auto;display: flex;flex-direction: column;justify-content: center; align-items: center;">
                                    <input type="file" name="foto" class="form-control mb-3">
                                    <input required type="text" name="nome_professor" class="form-control mb-3" placeholder="Nome do Aluno">
                                    <select class="form-control mb-3" name="sexo" id="">
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                    <input required type="text" name="nome_resp" class="form-control mb-3" placeholder="Nome do Responsável">
                                    <select class="form-control mb-3" name="turma" id="">
                                        <option value="">Turma</option>
                                      
                                    </select>
                                    <select class="form-control mb-3" name="turno" id="">
                                        <option value="">Turno</option>
                                     
                                    </select>
                                    <select class="form-control mb-3" name="classe" id="">
                                        <option value="">Classe</option>
                                       
                                    <option ></option>
                                            
                                    
                                    </select>
                                    <!-- <select class="form-control mb-3" name="disciplina" id="">
                                        <option value="">Disciplina</option  
                                            
                                    </select>
                                    <textarea class="textarea form-control" name="desc" id="wysihtml5"  placeholder="Descrição do professor" rows="12"></textarea> -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" name="inserir" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th style="width: 2%;" class="text-nowrap">ID</th>
                        <th class="text-nowrap">Nome</th>
                        <th class="text-nowrap">Turno</th>
                        <th class="text-nowrap">Turma</th>
                        <th class="text-nowrap">Classe</th>
                        <th class="text-nowrap">Comandos</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                    
                        <tr class="odd gradeX">
                            <td width="1%" class="f-s-600 text-inverse">id</td>
                            <td width="15%">nome_aluno</td>
                            <td width="10%">turno</td>
                            <td width="10%">turma</td>
                            <td width="10%">classe</td>
                            <td>
                                <a href="visualizarAluno" class="btn btn-primary">Visualizar</a>
                                <button type="button" class="deletebtn btn btn-danger" >Deletar</button>
                            </td>
                        </tr>
                       
                </tbody>
            </table>
        </div>
    </div>
    <!-- end panel -->
</div>
<!-- end #content -->

<!-------------------------------- Modal Deletar ------------------------------------>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-danger" id="exampleModalLabel">Deletar</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center text-danger">
                    <i class="fas fa-exclamation-circle fa-4x mb-3 animated rotateIn"></i>
                    <h3 class="">
                        Você esta prestes a deletar um Aluno <br>
                        tem a certeza que deseja deletar?
                    </h3>
                </div>
            </div>
            <form action="/SGN/view/prof/professor.php" method="POST">
                <div class="modal-body">
                    <div style="max-width: 400px;margin: auto;display: flex;flex-direction: column;justify-content: center; align-items: center;">
                        <input required type="hidden" name="delete_id" id="delete_id" class="form-control mb-3" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" name="deletedata" class="btn btn-danger">Deletar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!----------------------------------- end Modal Deletar --------------------------->

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


<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function(){
        $('.deletebtn').on('click', function(){
           $('#delete').modal('show');
           $tr = $(this).closest('tr');

           let data = $tr.children('td').map(function(){
            return $(this).text();
           }).get();

           $('#delete_id').val(data[0]);
        });
    });
</script>

<?php

include __DIR__. "../includes/footer.php";
        
?>
