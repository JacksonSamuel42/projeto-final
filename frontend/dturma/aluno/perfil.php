<div class="row">
    <div class="col-lg-6 col-sm-12 mb-3">
        <div class="card" style="overflow: auto;height: 500px; box-shadow: 5px 5px 15px -3px rgba(0,0,0,.4)">
            <div class="card-body">
                <img class="rounded-circle d-flex justify-content-center m-auto" style="width: 150px; height: 150px;"
                    src="views/img/fotos/br115.jpg" title="Editar" alt="">

                <div class="row mt-4">
                    <div class="col-lg-12 col-sm-12">
                        <div class="d-flex">
                            <h5>Nome: </h5>
                            <span style="font-size: 14px;" class="mb-2 ml-2">Jackson Samuel Teixeira Tumba</span>
                        </div>

                        <div class="d-flex">
                            <h5>Sexo: </h5>
                            <span style="font-size: 14px;" class="mb-2 ml-2">Masculino</span>
                        </div>

                        <div class="d-flex">
                            <h5>Turma: </h5>
                            <p style="font-size: 14px;" class="mb-2 ml-2">B</p>
                        </div>

                        <div class="d-flex">
                            <h5>Turno: </h5>
                            <p style="font-size: 14px;" class="mb-2 ml-2">Manha</p>
                        </div>

                        <div class="d-flex">
                            <h5>Classe: </h5>
                            <span style="font-size: 14px;" class="mb-2 ml-2">12ª</span>
                        </div>

                        <div class="d-flex">
                            <h5>Curso: </h5>
                            <span style="font-size: 14px;" class="mb-2 ml-2">Eletrónica</span>
                        </div>

                        <div class="d-flex">
                            <h5>Responsável: </h5>
                            <span style="font-size: 14px;" class="ml-2">Mae</span>
                        </div>

                        <div class="">
                            <h5>Descrição: </h5>
                            <span style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Doloremque cum accusamus accusantium laboriosam odio illo quibusdam ipsum soluta? Illum
                                veniam consequuntur qui distinctio nihil mollitia.</span>
                            <!-- <span style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque cum accusamus accusantium laboriosam odio illo quibusdam ipsum soluta? Illum veniam consequuntur qui distinctio nihil mollitia.</span> -->
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                    </div>

                    <div class="col-lg-4 col-sm-6">
                    </div>
                </div>

                <button style="width: 150px;" class="float-right mt-3 btn btn-primary" data-toggle="modal" data-target=".editar-aluno">
                    <i class="fa fa-edit"></i>Editar
                </button>

                <?php include __DIR__ . "/editar.php" ?>

            </div>
        </div>
    </div>

    <div class="col-lg-6 col-sm-12">
        <div class="card p-5" style="height: 500px; box-shadow: 5px 5px 15px -3px rgba(0,0,0,.4)">
            <div class="card-body">

                <div class="card mb-3" style="height: 50px;box-shadow: 5px 5px 15px -3px rgba(0,0,0,.3);">
                    <div class="">
                        <h5 class="ml-2" style="line-height: 40px;font-size: 20px;">Nota 1</h5>
                    </div>

                    <div style="margin-top: -38px;">
                        <h5 class="mr-2 float-right text-success" style="font-size: 20px;">10</h5>
                    </div>
                </div>

                <div class="card mb-3" style="height: 50px;box-shadow: 5px 5px 15px -3px rgba(0,0,0,.3);">
                    <div class="">
                        <h5 class="ml-2" style="line-height: 40px;font-size: 20px;">Nota 2</h5>
                    </div>

                    <div style="margin-top: -38px;">
                        <h5 class="mr-2 float-right text-success" style="font-size: 20px;">08</h5>
                    </div>
                </div>

                <div class="card mb-3" style="height: 50px;box-shadow: 5px 5px 15px -3px rgba(0,0,0,.3);">
                    <div class="">
                        <h5 class="ml-2" style="line-height: 40px;font-size: 20px;">Nota 3</h5>
                    </div>

                    <div style="margin-top: -38px;">
                        <h5 class="mr-2 float-right text-success" style="font-size: 20px;">18</h5>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>