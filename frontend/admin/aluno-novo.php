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
    <div class="panel panel-inverse" style="background:#ccc">
        <div class="panel-heading">
            <!-- <h4 class="panel-title">Lista de Alunos</h4> -->
            <div class="panel-heading-btn">
                <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                    data-click="panel-expand"><i class="fa fa-expand"></i></a> -->
            </div>
        </div>
        <div class="panel-body">

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active container" id="ficha">
                    <form action="" id="frmPostLicenca" method="POST" name="form-wizard" class="form-control-with-bg" enctype="multipart/form-data">
                        <!-- <input type="hidden" name="recividToken"  id="recividToken" value="{{$token}}"> -->
                        <!-- begin wizard -->
                        <div id="wizard">
                            <!-- begin wizard-step -->
                            <ul>
                                <li class="bg-dark">
                                    <a href="#step-1">
                                        <span class="number">1</span>
                                        <span class="info" style="font-size:12px !important">
                                            Dados Do Aluno
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <span class="number">2</span>
                                        <span class="info" style="font-size:12px !important">
                                            Conclusão
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <!-- end wizard-step -->
                            <!-- begin wizard-content -->
                            <div>
                                <!-- begin step-1 -->
                                <div id="step-1">
                                    <!-- begin fieldset -->
                                    <fieldset style="padding-bottom:5px">
                                        <!-- begin row -->
                                        <div class="row" id="mensagem">
                                            <?php

                                              $alunoNovo = new GestorAluno();
                                              $alunoNovo -> GuardarAlunoControllers();


                                            ?>
                                            <div class="form-group col-lg-4 col-sm-6">
                                                <label class="col-form-label" for="">Foto<span class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true" required type="file" name="imagem" class="form-control mb-4" placeholder="Foto" id="subirFoto">
                                                <label for="">Nome do aluno<span class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true" required type="text" name="nome_aluno" class="form-control mb-3" placeholder="Nome do Aluno">
                                            </div>

                                            <div class="form-group col-lg-4 col-sm-6">
                                                <label class="col-form-label" for="">Sexo<span class="text-danger">*</span></label>
                                                <select data-parsley-group="step-1" data-parsley-required="true" class="form-control mb-3" name="sexo" id="">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Feminino</option>
                                                </select>
                                                <label  class="col-form-label" for="">Nome do Responsável<span class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true" required type="text" name="nome_responsavel"
                                                    class="form-control mb-3" placeholder="Nome do Responsável">


                                            </div>

                                            <div class="form-group col-lg-4 col-sm-6">
                                                <label class="col-form-label" for="">Turma<span class="text-danger">*</span></label>
                                                 <input data-parsley-group="step-1" data-parsley-required="true" required type="text" name="turma"
                                                    class="form-control mb-3" placeholder="Turma">

                                                <label class="col-form-label" for="">Turno<span class="text-danger">*</span></label>
                                                 <input data-parsley-group="step-1" data-parsley-required="true" required type="text" name="turno"
                                                    class="form-control mb-3" placeholder="Turno">
                                            </div>
                                            <div class="form-group col-lg-4 col-sm-6">
                                                <label class="col-form-label" for="">Classe<span class="text-danger">*</span></label>
                                             <input data-parsley-group="step-1" data-parsley-required="true" required type="text" name="classe"
                                                    class="form-control mb-3" placeholder="Classe">

                                                   <label  class="col-form-label" for="">Email<span class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true" required type="text" name="email"
                                                    class="form-control mb-3" placeholder="Nome do Responsável">
                                            </div>
                                            <div class="form-group col-lg-4 col-sm-6">
                                                <label class="col-form-label" for="">Curso<span class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true" required type="text" name="curso"
                                                    class="form-control mb-3" placeholder="Curso">

                                            </div>
                                            <div class="form-group col-lg-4 col-sm-6">
                                                <label class="col-form-label" for="">Disciplina<span class="text-danger">*</span></label>
                                                 <input data-parsley-group="step-1" data-parsley-required="true" required type="text" name="disciplina"
                                                    class="form-control mb-3" placeholder="Disciplina">

                                            </div>
                                            
                                            <div class="form-group col-lg-12 col-sm-6">
                                                <label class="col-form-label" for="">Descrição<span class="text-danger">*</span></label>
                                                <textarea data-parsley-group="step-1" data-parsley-required="true" class="textarea form-control" id="wysihtml5" cols="30" rows="10" name="descricao"></textarea>

                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <!-- end step-1 -->
                                <div id="step-2">
                                    <div class="text-center addLicencaGifContainer" id="addLicencaGifContainer" hidden>
                                        <!-- <img id="img-gif" src="{{asset('img/ajax-loader.gif')}}"> -->
                                        <p>Aguarde...</p>
                                    </div>
                                    <div class="jumbotron m-b-0 text-center" id="submitLicencaGifContainer"
                                        style="background-color:white">
                                        <h2 class="display-4" style="font-size:24px;font-weight:500">
                                            Concluir registro
                                        </h2>
                                        <p class="lead mb-4" style="font-size:18px;">
                                            Clique em Salvar registro para concluir o registro
                                        </p>
                                        <button class="btn btn-primary p-5" type="submit">
                                            Salvar <i class="p-5 fa fa-save"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
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