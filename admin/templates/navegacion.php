<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="info">
                <p><?php echo $_SESSION['nombre']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> En Línea</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Buscar...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menú de Administración</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="dashboard.php"><i class="fa fa-circle-o"></i>Dashboard</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Eventos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="lista-evento.php"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
                    <li><a href="crear-evento.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i> <span>Categoría Eventos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="lista-categoria.php"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
                    <li><a href="crear-categoria.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle"></i> <span>Invitados</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="lista-invitados.php"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
                    <li><a href="crear-invitado.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Registrados</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="lista-registrados.php"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
                    <li><a href="crear-registro.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
                </ul>
            </li>
            <?php if ($_SESSION['nivel'] == 1) { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Administradores</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="lista-admin.php"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
                        <li><a href="crear-admin.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
                    </ul>
                </li>
            <?php } ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-comments"></i> <span>Testimoniales</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
                    <li><a href="#"><i class="fa fa-plus-circle"></i> Agregar</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>