<!-- Large modal -->
<div class="modal fade editar-aluno" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Aluno</h5>
            </div>
            <div class="modal-body">
                <form action="" id="frmPostLicenca" method="POST" name="form-wizard" class="form-control-with-bg">
                    <!-- begin wizard-content -->
                    <div>
                        <!-- begin fieldset -->
                        <fieldset style="padding-bottom:5px">
                            <!-- begin row -->
                            <div class="row">
                                <div class="form-group col-lg-4 col-sm-6">
                                    <label class="col-form-label" for="">Foto<span class="text-danger">*</span></label>
                                    <input required type="file" name="foto" class="form-control mb-4"
                                        placeholder="Foto">
                                    <label for="">Nome do aluno<span class="text-danger">*</span></label>
                                    <input required type="text" name="nome_aluno" class="form-control mb-3"
                                        placeholder="Nome do Aluno">
                                </div>

                                <div class="form-group col-lg-4 col-sm-6">
                                    <label class="col-form-label" for="">Sexo<span class="text-danger">*</span></label>
                                    <select class="form-control mb-3" name="sexo" id="">
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                    <label class="col-form-label" for="">Nome do Responsável<span
                                            class="text-danger">*</span></label>
                                    <input required type="text" name="nome_responsavel" class="form-control mb-3"
                                        placeholder="Nome do Responsável">
                                </div>

                                <div class="form-group col-lg-4 col-sm-6">
                                    <label class="col-form-label" for="">Turma<span class="text-danger">*</span></label>
                                    <select class="form-control mb-3" name="turma" id="">
                                        <option value="">Turma</option>
                                    </select>
                                    <label class="col-form-label" for="">Turno<span class="text-danger">*</span></label>
                                    <select required class="form-control mb-3" name="turno" id="">
                                        <option value="">Turno</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4 col-sm-6">
                                    <label class="col-form-label" for="">Classe<span
                                            class="text-danger">*</span></label>
                                    <select required class="form-control mb-3" name="classe" id="">
                                        <option value="">Classe</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4 col-sm-6">
                                    <label class="col-form-label" for="">Curso<span class="text-danger">*</span></label>
                                    <select required class="form-control mb-3" name="curso" id="">
                                        <option value="">curso</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4 col-sm-6">
                                    <label class="col-form-label" for="">Disciplina<span
                                            class="text-danger">*</span></label>
                                    <select required class="form-control mb-3" name="disciplina" id="">
                                        <option value="">Disciplina</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-12 col-sm-6">
                                    <label class="col-form-label" for="">Descrição<span
                                            class="text-danger">*</span></label>
                                    <textarea class="textarea form-control" id="wysihtml5" cols="30"
                                        rows="10"></textarea>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>