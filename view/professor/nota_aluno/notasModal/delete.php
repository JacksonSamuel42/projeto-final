<!-- inicio delete modal -->
<?php
    $idB = filter_input(INPUT_GET ,'id', FILTER_SANITIZE_NUMBER_INT);
?>
<div class="modal fade" id="delete-users" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Remover nota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="" id="user-delete">
                <div class="modal-body">
                    <input id="boletim-id" value="<?= $idB?>" name="id" type="hidden" required>
                    <div class="text-center" style="color:red"><i style="font-size:50px;" class="fa fa-warning">Atenção</i></div>
                    <div class="text-center">Você esta prestes a apagar a nota de um aluno</div>
                    <div class="text-center">Deseja continuar?</div>
                    <!-- <button class="btn btn-primary mt-3">Apagar</button> -->
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delete" id="delete-boletim" class="btn btn-danger" >Apagar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- fim modal inserir -->