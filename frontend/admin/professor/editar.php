<!-- Large modal -->
<div class="modal fade editar-professor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Professor</h5>
            </div>
            <div class="modal-body">
                <form action="" id="frmPostLicenca" method="POST" name="form-wizard" class="form-control-with-bg">

                    <!-- begin fieldset -->
                    <fieldset style="padding-bottom:5px">
                        <!-- begin row -->
                        <div class="row">
                            <div class="form-group col-lg-4 col-sm-6">
                                <label class="col-form-label" for="">Foto<span class="text-danger">*</span></label>
                                <input data-parsley-group="step-1" data-parsley-required="true" required type="file"
                                    name="foto" class="form-control mb-4" placeholder="Foto">
                                <label for="">Nome do Professor<span class="text-danger">*</span></label>
                                <input data-parsley-group="step-1" data-parsley-required="true" required type="text"
                                    name="nome_professor" class="form-control mb-3" placeholder="Nome do professor">
                            </div>

                            <div class="form-group col-lg-4 col-sm-6">
                                <label class="col-form-label" for="">Sexo<span class="text-danger">*</span></label>
                                <select data-parsley-group="step-1" data-parsley-required="true"
                                    class="form-control mb-3" name="sexo" id="">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                                <label class="col-form-label" for="">Formação<span class="text-danger">*</span></label>
                                <input data-parsley-group="step-1" data-parsley-required="true" required type="text"
                                    name="nome_responsavel" class="form-control mb-3" placeholder="Nome do Responsável">
                            </div>

                            <div class="form-group col-lg-4 col-sm-6">
                                <label class="col-form-label" for="">Turma<span class="text-danger">*</span></label>
                                <select data-parsley-group="step-1" data-parsley-required="true"
                                    class="form-control mb-3" name="turma" id="">
                                    <option value="">Turma</option>
                                </select>
                                <label class="col-form-label" for="">Turno<span class="text-danger">*</span></label>
                                <select data-parsley-group="step-1" data-parsley-required="true" required
                                    class="form-control mb-3" name="turno" id="">
                                    <option value="">Turno</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-sm-6">
                                <label class="col-form-label" for="">Classe<span class="text-danger">*</span></label>
                                <select data-parsley-group="step-1" data-parsley-required="true" required
                                    class="form-control mb-3" name="classe" id="">
                                    <option value="">Classe</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-sm-6">
                                <label class="col-form-label" for="">Curso<span class="text-danger">*</span></label>
                                <select data-parsley-group="step-1" data-parsley-required="true" required
                                    class="form-control mb-3" name="curso" id="">
                                    <option value="">curso</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-sm-6">
                                <label class="col-form-label" for="">Disciplina<span
                                        class="text-danger">*</span></label>
                                <select data-parsley-group="step-1" data-parsley-required="true" required
                                    class="form-control mb-3" name="disciplina" id="">
                                    <option value="">Disciplina</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-12 col-sm-6">
                                <label class="col-form-label" for="">Descrição<span class="text-danger">*</span></label>
                                <textarea data-parsley-group="step-1" data-parsley-required="true"
                                    class="textarea form-control" id="wysihtml5" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </fieldset>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>