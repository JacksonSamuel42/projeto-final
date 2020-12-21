<?php

include __DIR__. "../../../backend/controllers/gestorAluno.php";
include __DIR__. "../../../backend/models/gestorAluno.php";

session_start();

if(!$_SESSION["validar"]){

    header("location:login");

    exit();
}

include __DIR__. "../includes/head.php";
include __DIR__. "../includes/header.php";
include __DIR__. "../includes/aside.php";
        
?>

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
            <!-- <h4 class="panel-title">Lista de Alunos</h4> -->
            <div class="panel-heading-btn">
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                    data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
            </div>
        </div>
        <div class="panel-body">
            
            <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">Nome</th>
                        <th class="text-nowrap">Sexo</th>
                        <th class="text-nowrap">Turma</th>
                        <th class="text-nowrap">Turno</th>

                        <th class="text-nowrap">Classe</th>
                        <th class="text-nowrap">Responsavel</th>
                        <th class="text-nowrap">Disciplina</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Curso</th>
                        <th class="text-nowrap">Descriçao</th>
                         <th class="text-nowrap">Comandos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                       $gestor = new GestorAluno();
                       $gestor -> listarAlunoControllers();
                       $gestor-> apagarAlunoControllers();
                    ?> 
                    
                    
                       
                       
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
	include __DIR__. "/includes/footer.php";
	
?>
