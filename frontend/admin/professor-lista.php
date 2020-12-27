<?php
include __DIR__. "../../../backend/controllers/gestorProfessor.php";
include __DIR__. "../../../backend/models/gestorProfessor.php";

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
        <li class="breadcrumb-item"><a href="javascript:;">Professores</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Gerências Professores</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Gerências Professores</small></h1>
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
                            <td width="20%">nome_aluno</td>
                            <td width="20%">turno</td>
                            <td width="20%">turma</td>
                            <td width="10%">classe</td>
                            <td>
                                <a href="<?= url('professor-view') ?>" class="btn btn-primary"><i class="fa fa-eye"></i> Visualizar</a>
                                <button type="button" class="deletebtn btn btn-danger"><i class="fa fa-trash"></i> Deletar</button>
                            </td>
                        </tr>
                       
                </tbody>
            </table>
        </div>
    </div>
    <!-- end panel -->
</div>
<!-- end #content -->

<!-------------------------------------- Modal Editar ----------------------------->

<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="wysihtml5" action="/SGN/view/prof/professor.php" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <div
                        style="max-width: 400px;margin: auto;display: flex;flex-direction: column;justify-content: center; align-items: center;">
                        <input required type="hidden" name="update_id" class="form-control mb-3">
                        <input type="file" name="update_foto" class="form-control mb-3">
                        <input required type="text" name="update_professor" class="form-control mb-3"
                            placeholder="Nome do Professor">
                        <select class="form-control mb-3" name="update_turma" id="">
                            <option value="">Turma</option>

                        </select>
                        <select class="form-control mb-3" name="update_classe" id="">
                            <option value="">Classe</option>

                        </select>
                        <select class="form-control mb-3" name="update_disciplina" id="">
                            <option value="">Disciplina</option>

                        </select>
                        <textarea class="textarea form-control" name="update_desc" id="wysihtml5"
                            placeholder="Descrição do professor" rows="12"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="update" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!---------------------------------- end Modal editar ------------------------------->

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
                        Você esta prestes a deletar um Professor <br>
                        tem a certeza que deseja deletar?
                    </h3>
                </div>
            </div>
            <form action="/SGN/view/prof/professor.php" method="POST">
                <div class="modal-body">
                    <div
                        style="max-width: 400px;margin: auto;display: flex;flex-direction: column;justify-content: center; align-items: center;">
                        <input required type="hidden" name="delete_id" id="delete_id" class="form-control mb-3">
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
    $(document).ready(function () {
        $('.deletebtn').on('click', function () {
            $('#delete').modal('show');
            $tr = $(this).closest('tr');

            let data = $tr.children('td').map(function () {
                return $(this).text();
            }).get();

            $('#delete_id').val(data[0]);
        });
    });
</script>

<?php
	include __DIR__. "../includes/footer.php";

?>