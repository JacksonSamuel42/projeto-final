<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
<!-- begin #header -->
<div id="header" class="header navbar-default">
    <!-- begin navbar-header -->
    <div class="navbar-header">
        <a href="/SGN/admin/" class="navbar-brand"><span class="navbar-logo"></span>
            Sistema de Gestao de notas</a>
        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- end navbar-header -->

    <!-- begin header-nav -->
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle icon">
                <i class="ion-ios-notifications"></i>
                <span class="label">0</span>
            </a>
            <ul class="dropdown-menu media-list dropdown-menu-right">
                <li class="dropdown-header">NOTIFICATIONS (0)</li>
                <li class="text-center width-300 p-b-10 p-t-10">
                    No notification found
                </li>
            </ul>
        </li>
        <li class="dropdown navbar-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <div class="image image-icon bg-black text-grey-darker">
                    <?php
                        include __DIR__. '../../code/credencias.php';
                        
                        if($data['foto'] == NULL){?>
                        <img src="../admin/foto/professor/default.jpg" width="180"
                            class="rounded-circle d-flex justify-content-center m-auto">
                        <?php
                            }else{?>
                        <img class="rounded-circle d-flex justify-content-center m-auto" width="180"
                            src="../admin/foto/professor/<?= $data['foto']?>" alt="">
                        <?php
                            }
                    ?>
                </div>
                <span class="d-none d-md-inline"></span> <b class="caret"></b>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?= url('perfil') ?>" class="dropdown-item">Perfil</a>
                <a href="<?= url('logout') ?>" class="dropdown-item">Sair</a>
            </div>
        </li>
    </ul>
    <!-- end header navigation right -->
</div>
<!-- end #header -->