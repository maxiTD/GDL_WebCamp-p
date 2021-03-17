<?php
	require_once 'funciones/sesiones.php';
    require_once "funciones/funciones.php";
	require_once 'templates/header.php';
	require_once 'templates/barra.php';
	require_once 'templates/navegacion.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>da un vistaso al estado general en esta sección</small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
        <h2 class="page-header">Resumen de Registros</h2>
        <div class="row">
            <div class="box-body chart-responsive">
              <div class="chart" id="grafica-registros" style="height: 300px;"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <?php
                    $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-light-blue">
                    <div class="inner">
                    <h3><?php echo $registrados['registros']; ?></h3>
                    <p>Total Registrados</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-users"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Listado Registrados <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <?php
                    $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 1";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>
                        <p>Total Pagados</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check-circle-o"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Listado Registrados <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <?php
                    $sql = "SELECT COUNT(id_registrado) AS registros FROM registrados WHERE pagado = 0";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>
                        <p>Total Sin Pagar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-times"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Listado Registrados <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <?php
                    $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados WHERE pagado = 1";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-olive">
                    <div class="inner">
                        <h3>$<?php echo (float) $registrados['ganancias']; ?></h3>
                        <p>Ganancias Totales</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-usd"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Listado Registrados <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <h2 class="page-header">Regalos</h2>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <?php
                    $sql = "SELECT COUNT(id_registrado) AS pulseras FROM registrados WHERE regalo = 1 AND pagado = 1";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $registrados['pulseras']; ?></h3>
                        <p>Total Pulseras</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-circle-o"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Listado Registrados <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <?php
                    $sql = "SELECT COUNT(id_registrado) AS etiquetas FROM registrados WHERE regalo = 2 AND pagado = 1";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-fuchsia">
                    <div class="inner">
                        <h3><?php echo $registrados['etiquetas']; ?></h3>
                        <p>Total Etiquetas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sticky-note-o"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Listado Registrados <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <?php
                    $sql = "SELECT COUNT(id_registrado) AS plumas FROM registrados WHERE regalo = 3 AND pagado = 1";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-purple-active">
                    <div class="inner">
                        <h3><?php echo $registrados['plumas']; ?></h3>
                        <p>Total Plumas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                    Listado Registrados <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once 'templates/footer.php'; ?>
