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

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Salas</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">lista</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">lista</small></h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
        </div>
        <div class="panel-heading" style="background-color:#f7f7f7">
            <div class="w-100 row">
                <div class="col-lg-4">
                    <h3 style="color:#1c1c1c">Lista de salas</h3>
                </div>
                <div class="col-lg-8 pr-0">
                    <div class="w-100">
                        <form method="post" class="float-right form-inline" action="{{route('licenca.filtro.post')}}"
                            style="margin-right:-20px">

                            <div class="form group mr-1">
                                <select class="form-control" name="sala" required>
                                    <option value="0">Sala</option>
                                </select>
                            </div>
                            <div class="form group mr-1">
                                <select class="form-control" name="curso" required>
                                    <option value="0">Curso</option>
                                </select>
                            </div>
                            <div class="form group mr-1">
                                <select class="form-control" name="turma" required>
                                    <option value="0">turma</option>
                                </select>
                            </div>
                            <div class="form group mr-1">
                                <input type="date" name="dataInicio" class="form-control">
                            </div>
                            <div class="form group mr-1">
                                <button class="btn btn-primary btn-destaque" type="submit">
                                    Filtrar <i class="fa fa-filter"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">

            <table id="data-table-buttons" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th width="15%" class="text-nowrap">Nome da Sala</th>
                        <th width="15%" class="text-nowrap">Turma</th>
                        <th width="20%" class="text-nowrap">Responsável</th>
                        <th width="20%" class="text-nowrap">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX">
                        <td>131313</td>
                        <td>131313</td>
                        <td>131313</td>
                        <td>
                            <a href="" class="btn btn-primary"><i class="fa fa-eye"></i>
                                Visualizar</a>
                            <a href="" class="btn btn-success"><i class="fa fa-edit"></i>
                                Editar</a>
                            <button type="button" class="deletebtn btn btn-danger"><i class="fa fa-trash"></i>
                                Deletar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="float-right mb-3 btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Adicionar sala
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Adicionado Sala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="salas.php" method="POST">
                        <div class="form-group">
                            <label for="">Nome da sala</label>
                            <input type="text" name="sala" class="form-control" placeholder="Sala">
                        </div>
                        <label for="">Turma</label>
                        <select class="mb-3 form-control" name="turma">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                        <div class="form-group">
                            <label for="">Responsável</label>
                            <input type="text" name="resp" class="form-control" placeholder="Representante da Turma">
                        </div>

                        <button name="inserir" type="submit" class="w-100 btn btn-primary">Adicionar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end panel -->
</div>
<!-- end #content -->


</body>

</html>

<?php

include __DIR__. "../includes/footer.php";
        
?>