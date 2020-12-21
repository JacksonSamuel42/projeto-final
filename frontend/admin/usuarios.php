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
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Usuários</a></li>
    </ol>
    <!-- begin page-header -->
    <h1 class="page-header">Usuários</h1>
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

            <table id="data-table-autofill" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th style="width: 5%;" class="text-nowrap">ID</th>
                        <th class="text-nowrap">Nome</th>
                        <th class="text-nowrap">Login</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Comandos</th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="odd gradeX">
                        <td class="f-s-600 text-inverse">21</td>
                        <td width="20%">Jackson Samuel</td>
                        <td width="20%">Jackson324</td>
                        <td width="20%">jacksonsamu42@gmail.com</td>
                        <td>
                            <a href="" class="btn btn-primary"><i class="fa fa-edit"></i>
                                Editar</a>
                            <button type="button" class="deletebtn btn btn-danger"><i class="fa fa-trash"></i>
                                Deletar</button>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
    <!-- end panel -->

    <!-- Large modal -->
    <button type="button" class="float-right btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus-square"></i> Adicionar</button>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar usuário</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="form-group col-lg-6 col-sm-6">
                                <label class="text-lg-right col-form-label">Nome usuário</label>
                                <input type="text" name="nomeUser" placeholder="Nome usuário" class="form-control" />
                            </div>
                            <div class="form-group col-lg-6 col-sm-6">
                                <label class="text-lg-right col-form-label">Login</label>
                                <input type="text" name="login" placeholder="Login usuário" class="form-control" />
                            </div>
                            <div class="form-group col-lg-6 col-sm-6">
                                <label class="text-lg-right col-form-label">Email</label>
                                <input type="email" name="emaildata_emissao_bi" placeholder="Email usuário" class="form-control" />
                            </div>
                            <div class="form-group col-lg-6 col-sm-6">
                                <label class="text-lg-right col-form-label">Senha</label>
                                <input type="password" name="senha" placeholder="Senha usuário" class="form-control" />
                            </div>
                            <div class="form-group col-lg-6 col-sm-6">
                                <label class="text-lg-right col-form-label">Confirmar Senha</label>
                                <input type="password" name="cSenha" placeholder="Confirmar Senha" class="form-control" />
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
</div>

<?php
	include __DIR__. "/includes/footer.php";
?>