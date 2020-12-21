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
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Dashboard</small></h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Professor</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                    data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="panel-body">

            <!-- Button trigger modal -->
            <!-- Button trigger modal -->
            <button type="button" class="mb-3 btn btn-primary" data-toggle="modal"
                data-target="#exampleModalLong">
                Adicionar sala
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                    <input type="text" name="sala" class="form-control" placeholder="Sala">
                                </div>
                                <select class="mb-3 form-control" name="turma">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                                <div class="form-group">
                                    <input type="text" name="resp" class="form-control"
                                        placeholder="Representante da Turma">
                                </div>
                                <!-- <div class="form-group">
                            <input type="text" class="form-control" placeholder="">
                        </div> -->
                                <button name="inserir" type="submit"
                                    class="w-100 btn btn-primary">Adicionar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>


            <table id="data-table-autofill" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th class="text-nowrap">Sala</th>
                        <th class="text-nowrap">Turma</th>
                        <th class="text-nowrap">Responsável</th>
                        <th class="text-nowrap">Quantidade de aluno</th>
                        <th class="text-nowrap">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX">
                        <td width="1%" class="f-s-600 text-inverse">1</td>
                        <td>Trident</td>
                        <td>Internet Explorer 4.0</td>
                        <td>Win 95+</td>
                        <td><a href="#">Acessar<i class="ml-2 fas fa-arrow-right"></i></a></td>
                    </tr>
                    <tr class="even gradeC">
                        <td width="1%" class="f-s-600 text-inverse">2</td>
                        <td>Trident</td>
                        <td>Internet Explorer 5.0</td>
                        <td>Win 95+</td>
                        <td><a href="#">Acessar<i class="ml-2 fas fa-arrow-right"></i></a></td>
                    </tr>
                </tbody>
            </table>
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