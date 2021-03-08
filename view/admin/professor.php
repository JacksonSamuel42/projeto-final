<?php 
    session_start();
    include('../../database/db.config.php');
    include('../../config/isUser.php') 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="../../assets/css/apple/app.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="../../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="../../assets/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css" rel="stylesheet" />

    <!-- ================== END PAGE LEVEL STYLE ================== -->
</head>

<?php include('./partials/header.php') ?>

<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image image-icon bg-black text-grey-darker">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="info">
                        <b class="caret"></b>
                        <?php echo $_SESSION['user']?>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li class="active"><a href="<?= url('usuario') ?>"><i class="ion-ios-cog"></i>Usuários do sistema</a></li>
                </ul>
            </li>
        </ul>

        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav nav1">
			<li class="nav-header">Navigation</li>
			<li class=" has-sub">
				<a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
				</a>
				<ul class="sub-menu">
					<li class=""><a href="<?= url('index') ?>"><i class="fas fa-home"></i><span>Home</span></a></li>
				</ul>
			</li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-copy"></i>
                    <span>Turno/Turma/Classe</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="<?= url('turno') ?>"><i class="fas fa-tags"></i> Gerir Turno</a></li>
                    <li class=""><a href="<?= url('turma') ?>"><i class="fas fa-tags"></i> Gerir Turma</a></li>
                    <li class=""><a href="<?= url('classe') ?>"><i class="fas fa-tags"></i> Gerir Classe</a></li>
                </ul>
            </li>

            <li class="active has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Professores</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="<?= url('professor') ?>"><i class="fas fa-tags"></i>Cadastrar professores</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-bars"></i>
                    <span>Salas</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="<?= url('salas') ?>"><i class="fas fa-tags"></i> Cadastrar Sala</a>
                    </li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-bars"></i>
                    <span>Disciplinas</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="<?= url('disciplina') ?>"><i class="fas fa-tags"></i> Gerir Disciplinas</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Alunos</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="<?= url('aluno') ?>"><i class="fas fa-tags"></i> Cadastrar
                            Alunos</a></li>
                </ul>
            </li>

            <li class="has-sub">
				<a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Boletins</span>
				</a>
				<ul class="sub-menu">
					<li class=""><a href="<?= url('boletim-1') ?>"><i class="fas fa-tags"></i><span>I-Trimestre</span></a></li>
					<li class=""><a href="<?= url('boletim-2') ?>"><i class="fas fa-tags"></i><span>II-Trimestre</span></a></li>
					<li class=""><a href="<?= url('boletim-3') ?>"><i class="fas fa-tags"></i><span>III-Trimestre</span></a></li>
				</ul>
			</li>
            <li class="">
                <a href="javascript:;">
                    <i class="fas fa-chart-pie"></i>
                    <span>Desempenho</span>
                </a>
            </li>

            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                        class="ion-ios-arrow-back"></i> <span>Collapse</span></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="/SGN/admin/">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Professores</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Professores</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Professores</small></h1>
    <!-- end page-header -->

    <?php 

        if(isset($_POST['deletedata'])){
            // $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            $id = addslashes($_POST['delete_id']);

            $query = "DELETE FROM professores WHERE id = '$id' ";
            $stmt = $pdo->prepare($query);

            if($stmt->execute()){
                echo "<div class='alert alert-success'><h5>Deletado com sucesso</h5></div>";
            }else{
                echo "<div class='alert alert-warning'><h5>Não Deletado</h5></div>";
            } 
        }
        
        $query = "SELECT * FROM professores";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    ?>
    <?php
        include __DIR__ . "../../../source/Controllers/listInfo.php"
    ?>
    
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Professores</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                    data-click="panel-expand"><i class="fa fa-expand"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <!-- Modal -->
            <div class="modal fade" id="Inserir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Adicionar Professor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form  id="insert-professor" enctype="multipart/form-data" method="POST">
                            <div class="modal-body">
                                <div id="resultado"></div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Foto</label>
                                        <input type="file" name="foto" class="form-control mb-3">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Nome</label>
                                        <input type="text" name="nome_professor" class="form-control mb-3" placeholder="Nome do Professor">
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Classe</label>
                                        <select class="form-control mb-3" name="classe" id="">
                                            <option value="">Selecionar</option>
                                            <?php
                                                foreach ($classe as $value) {?>
                                                    <option value="<?= $value['classe']?>"><?= $value['classe']?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Turno</label>
                                        <select class="form-control mb-3" name="turno" id="">
                                            <option value="">Selecionar</option>
                                            <?php
                                                foreach ($turno as $value) {?>
                                                    <option value="<?= $value['nome_turno']?>"><?= $value['nome_turno']?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Turma</label>
                                        <select class="form-control mb-3" name="turma" id="">
                                            <option value="">Selecionar</option>
                                            <?php
                                                foreach ($turma as $value) {?>
                                                    <option value="<?= $value['nome_turma']?>"><?= $value['nome_turma']?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="">Disciplina</label>
                                        <select class="form-control mb-3" name="disciplina" id="">
                                            <option value="">Selecionar</option>
                                            <?php
                                                foreach ($disciplina as $disc) {?>
                                                    <option value="<?= $disc['nome_disciplina']?>"><?= $disc['nome_disciplina']?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="">Curso</label>
                                        <select class="form-control mb-3" name="curso" id="">
                                            <option value="">Selecionar</option>
                                            <option value="informática">Informática</option>
                                            <option value="eletrónica">Eletrónica</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Sala</label>
                                        <select class="form-control mb-3" name="sala" id="">
                                            <option value="">Selecionar</option>
                                            <?php
                                                foreach ($sala as $value) {?>
                                            <option value="<?= $value['nome_sala']?>"><?= $value['nome_sala']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="">Formação</label>
                                        <input class="form-control" type="text" name="formacao" id="" placeholder="Formação">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="">Email</label>
                                        <input class="form-control" type="email" name="email" id="" placeholder="Email">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="">Sexo</label>
                                        <select class="form-control mb-3" name="sexo" id="">
                                            <option value="">Selecionar</option>
                                            <option value="masculino">Masculino</option>
                                            <option value="feminino">Feminino</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                    <label for="">Descrição</label>
                                        <textarea class="textarea form-control" name="desc"  placeholder="Descrição do professor" rows="8"></textarea>      
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <table id="data-table-autofill" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th width="1%" class="text-nowrap">ID</th>
                        <th class="text-nowrap">Nome</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Classe</th>
                        <th class="text-nowrap">Curso</th>
                        <th class="text-nowrap">Turma</th>
                        <th class="text-nowrap">Turno</th>
                        <th class="text-nowrap">Disciplina</th>
                        <th class="text-nowrap">Comandos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                       foreach($data as $row){?>
                        <tr class="odd gradeX">
                            <td width="1%" class="f-s-600 text-inverse"><?= $row['id']?></td>
                            <td width="15%"><?= $row['nome_professor']?></td>
                            <td width="15%"><?= $row['email']?></td>
                            <td width="10%"><?= $row['classe']?></td>
                            <td width="10%"><?= $row['curso']?></td>
                            <td width="10%"><?= $row['turma']?></td>
                            <td width="10%"><?= $row['turno']?></td>
                            <td width="10%"><?= $row['disciplina']?></td>
                            <td>
                                <a href="<?= url('visualizarProf') ?>?professor=<?= $row['nome_professor']?>" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                <button type="button" class="deletebtn btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                       <?php
                       }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="float-right btn btn-primary mb-4" data-toggle="modal" data-target="#Inserir">
        Adicionar disciplina
    </button>
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
                        Você esta prestes a deletar um Professor <br>
                        tem a certeza que deseja deletar?
                    </h3>
                </div>
            </div>
            <form action="<?= url('professor') ?>" method="POST">
                <div class="modal-body">
                    <div style="max-width: 400px;margin: auto;display: flex;flex-direction: column;justify-content: center; align-items: center;">
                        <input required type="hidden" name="delete_id" id="delete_id" class="form-control mb-3" >
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


<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
    data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->

</div>
<!-- end panel -->
</div>
<!-- end #content -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="../../assets/js/app.min.js"></script>
<script src="../../assets/js/theme/apple.min.js"></script>
<script src="../../assets/js/ajax/professorInsert.js"></script>
<!-- ================== END BASE JS ================== -->
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../../assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables.net-autofill/js/dataTables.autofill.min.js"></script>
<script src="../../assets/plugins/datatables.net-autofill-bs4/js/autofill.bootstrap4.min.js"></script>
<script src="../../assets/js/demo/table-manage-autofill.demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- <script src="../assets/js/activelink.js"></script> -->
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function(){
        $('.deletebtn').on('click', function(){
           $('#delete').modal('show');
           $tr = $(this).closest('tr');

           let data = $tr.children('td').map(function(){
            return $(this).text();
           }).get();

           $('#delete_id').val(data[0]);
        });
    });
</script>

</body>

</html>