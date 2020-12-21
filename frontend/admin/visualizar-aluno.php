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
                        <small>Administrador</small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="javascript:;"><i class="ion-ios-cog"></i> Usuários do sistema</a></li>
                </ul>
            </li>
        </ul>

        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav nav1">
            <li class="nav-header">Navigation</li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="home"><i class="fas fa-home"></i><span>Home</span></a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-copy"></i>
                    <span>Turno e Turma</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="turno"><i class="fas fa-tags"></i> Gerir Turnos</a></li>
                    <li class=""><a href="Turma"><i class="fas fa-tags"></i> Gerir Turma</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Professores</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="professor"><i class="fas fa-tags"></i>Cadastrar
                            professores</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-bars"></i>
                    <span>Disciplinas</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="disciplina"><i class="fas fa-tags"></i> Gerir Disciplinas</a>
                    </li>
                </ul>
            </li>

            <li class="active has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Alunos</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="aluno"><i class="fas fa-tags"></i> Cadastrar Aluno</a>
                    </li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-print"></i>
                    <span>Relatórios</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="boletim"><i class="fas fa-tags"></i> Boletim</a></li>
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
        <li class="breadcrumb-item"><a href="javascript:;">Aluno</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Detalhes Aluno</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Detalhes Aluno</small></h1>
    <!-- end page-header -->


    <!-- begin tabs -->
    <!-- begin col-6 -->
    <div class="">
        <!-- begin nav-tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#default-tab-1" data-toggle="tab" class="nav-link active">
                    <span class="d-sm-none">Tab 1</span>
                    <span class="d-sm-block d-none">Perfil</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#default-tab-2" data-toggle="tab" class="nav-link">
                    <span class="d-sm-none">Tab 2</span>
                    <span class="d-sm-block d-none">Notas</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#default-tab-3" data-toggle="tab" class="nav-link">
                    <span class="d-sm-none">Tab 3</span>
                    <span class="d-sm-block d-none">Default Tab 3</span>
                </a>
            </li>
        </ul>
        <!-- end nav-tabs -->
        <!-- begin tab-content -->
        <div class="tab-content">
            <!-- begin tab-pane -->
            <div class="tab-pane fade active show" id="default-tab-1">
                <!-- <h3 class="m-t-10"><i class="fa fa-cog"></i>Perfil</h3> -->
                <img src="/foto/professor/marcel-strauss-bvIbAlj3J4U-unsplash.jpg" alt="">
                <img class="ml-3" width="200" height="250"  alt="">
                <form name="wysihtml5" action="/SGN/view/aluno/visualizarAluno.php?aluno" enctype="multipart/form-data" method="POST">
                    <div class="modal-body">
                        <div
                            style="max-width: 600px;display: flex;flex-direction: column;justify-content: center; align-items: center;">
                            <input required type="hidden" name="update_id"  class="form-control mb-3">
                            <input type="file" name="foto" class="form-control mb-3">
                            <input required type="text" name="update_aluno"  class="form-control mb-3"
                                placeholder="Nome do Aluno">
                            <select class="form-control mb-3" name="sexo" id="">
                                <option ></option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                            <input required type="text"  name="nome_resp" class="form-control mb-3" placeholder="Nome do Responsável">
                            <select class="form-control mb-3" name="update_turma" id="">
                                <option >Turma/option>
                                
                            </select>
                            <select class="form-control mb-3" name="update_classe" id="">
                                <option ></option>
                                
                                    
                                        <option></option>
                                
                            </select>

                        </div>
                    </div>
                    <div class="text-left ml-3 m-b-0">
                        <button type="submit" name="updatedata" style="width: 600px;" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
            <div class="tab-pane fade" id="default-tab-2">
                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                </blockquote>
                <h4>Lorem ipsum dolor sit amet</h4>
                <p>
                    Nullam ac sapien justo. Nam augue mauris, malesuada non magna sed, feugiat blandit ligula.
                    In tristique tincidunt purus id iaculis. Pellentesque volutpat tortor a mauris convallis,
                    sit amet scelerisque lectus adipiscing.
                </p>
            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
            <div class="tab-pane fade" id="default-tab-3">
                <p>
                    <span class="fa-stack fa-4x pull-left m-r-10">
                        <i class="fa fa-square-o fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </span>
                    Praesent tincidunt nulla ut elit vestibulum viverra. Sed placerat magna eget eros accumsan
                    elementum.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam quis lobortis neque.
                    Maecenas justo odio, bibendum fringilla quam nec, commodo rutrum quam.
                    Donec cursus erat in lacus congue sodales. Nunc bibendum id augue sit amet placerat.
                    Quisque et quam id felis tempus volutpat at at diam. Vivamus ac diam turpis.Sed at lacinia augue.
                    Nulla facilisi. Fusce at erat suscipit, dapibus elit quis, luctus nulla.
                    Quisque adipiscing dui nec orci fermentum blandit.
                    Sed at lacinia augue. Nulla facilisi. Fusce at erat suscipit, dapibus elit quis, luctus nulla.
                    Quisque adipiscing dui nec orci fermentum blandit.
                </p>
            </div>
            <!-- end tab-pane -->
        </div>
        <!-- end tab-content -->

    </div>
    <!-- end col-6 -->
    <!-- end tabs -->
</div>
<!-- end #content -->



<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
        class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->

</div>
<!-- end panel -->
</div>
<!-- end #content -->

<!-- ================== BEGIN BASE JS ================== -->
<?php

include __DIR__. "../includes/footer.php";
        
?>