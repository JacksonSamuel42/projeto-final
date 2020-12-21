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
                    <form id="frmPostLicenca" method="POST" name="form-wizard" class="form-control-with-bg"
                        enctype="multipart/form-data">

                        <!-- <input type="hidden" name="recividToken"  id="recividToken" value="{{$token}}"> -->
                        <!-- begin wizard -->
                        <div id="wizard">
                            <!-- begin wizard-step -->
                            <ul>
                                <li class="bg-dark">
                                    <a href="#step-1">
                                        <span class="number">1</span>
                                        <span class="info" style="font-size:12px !important">
                                            Dados Do Professor
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

                                        <?php
                                               $cadastrar = new controllersCadastro();
                                               $cadastrar -> cadastrarControllers();
                                               ?>
                                        <!-- begin row -->
                                        <div class="row" id="mensagem">


                                            <div class="form-group col-lg-4 col-sm-6">
                                                <label class="col-form-label" for="">Email<span
                                                        class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true" required
                                                    type="text" name="email" class="form-control mb-3"
                                                    placeholder="email">

                                                <label class="col-form-label" for="">Foto<span
                                                        class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true"
                                                    type="file" name="imagen" class="form-control mb-4"
                                                    placeholder="Foto" id="subirFoto">




                                            </div>

                                            <div class="form-group col-lg-4 col-sm-6">

                                                <label class="col-form-label" for="">Nome<span
                                                        class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true" required
                                                    type="text" name="nome" class="form-control mb-3"
                                                    placeholder="Nome">
                                                <label class="col-form-label" for="">Classe<span
                                                        class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true" required
                                                    type="text" name="classe" class="form-control mb-3"
                                                    placeholder="Classe">
                                            </div>

                                            <div class="form-group col-lg-4 col-sm-6">
                                                <label class="col-form-label" for="">Turma<span
                                                        class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true" required
                                                    type="text" name="turma" class="form-control mb-3"
                                                    placeholder="Turma">

                                                <label class="col-form-label" for="">Turno<span
                                                        class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true" required
                                                    type="text" name="turno" class="form-control mb-3"
                                                    placeholder="Turno"> </div>
                                            <div class="form-group col-lg-4 col-sm-6">
                                                <label class="col-form-label" for="">Formacao<span
                                                        class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true" required
                                                    type="text" name="formacao" class="form-control mb-3"
                                                    placeholder="Formacao">

                                                <label class="col-form-label" for="">Sexo<span
                                                        class="text-danger">*</span></label>
                                                <select data-parsley-group="step-1" data-parsley-required="true"
                                                    class="form-control mb-3" name="sexo" id="">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Feminino</option>
                                                </select>

                                            </div>
                                            <div class="form-group col-lg-4 col-sm-6">
                                                <label class="col-form-label" for="">Curso<span
                                                        class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true" required
                                                    type="text" name="curso" class="form-control mb-3"
                                                    placeholder="Curso">

                                            </div>
                                            <div class="form-group col-lg-4 col-sm-6">
                                                <label class="col-form-label" for="">Disciplina<span
                                                        class="text-danger">*</span></label>
                                                <input data-parsley-group="step-1" data-parsley-required="true" required
                                                    type="text" name="disciplina" class="form-control mb-3"
                                                    placeholder="Disciplina">
                                            </div>

                                            <div class="form-group col-lg-12 col-sm-6">
                                                <label class="col-form-label" for="">Descrição<span
                                                        class="text-danger">*</span></label>
                                                <textarea data-parsley-group="step-1" data-parsley-required="true"
                                                    class="textarea form-control" id="wysihtml5" cols="30" rows="10"
                                                    name="desc"></textarea>
                                            </div>
                                            <!--
                                             <div id="photo" >                                                    
                                               
                                                   </div>
                                               -->

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
</div>

<?php
	include __DIR__. "/includes/footer.php";
?>