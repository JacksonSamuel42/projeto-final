<!-- begin #sidebar -->
<div id="sidebar" class="sidebar" style="background:#D97E00">
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
                        <small><?php echo  $_SESSION["usuario"]; ?></small>

                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="perfil"><i class="ion-ios-cog"></i>Perfil</a></li>
                </ul>
            </li>
        </ul>

        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav nav1">
			<li class="nav-header" style="font-size: 14px;">Navigation</li>
            
            <li class="has-sub">
				<a href="#">
                    <b class="caret"></b>
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
				</a>
				<ul class="sub-menu">
					<li class=""><a href="dashboard"><i class="fas fa-home"></i><span>Home</span></a></li>
				</ul>
			</li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-user"></i>
                    <span>Sala</span>
                </a>
                <ul class="sub-menu">
                    <!-- <li class=""><a href="<?= url('dashboard') ?>"><i class="fas fa-tags"></i>Novo</a></li> -->
                    <li class=""><a href="<?= url('aluno-lista') ?>"><i class="fas fa-tags"></i>Lista de alunos</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="nav-icon fas fa-print"></i>
                    <span>Relatórios</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="<?= url('boletim') ?>"><i class="fas fa-tags"></i> Boletim</a></li>
                    <li class=""><a href="<?= url('pauta') ?>"><i class="fas fa-tags"></i> Pauta</a></li>
                </ul>
            </li>

            <li class="">
                <a href="<?= url('desempenho') ?>">
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