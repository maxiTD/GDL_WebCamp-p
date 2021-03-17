<?php
	require_once 'funciones/sesiones.php';
    require_once 'templates/header.php';
    require_once 'funciones/funciones.php';

    $id = $_GET['id'];
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        die('Error!');
    }

	require_once 'templates/barra.php';
    require_once 'templates/navegacion.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Editar cuenta Administrador
			<small>modificá los campos de la cuenta de administrador</small>
		</h1>
	</section>

	<div class="row">
		<div class="col-md-8">
			<!-- Main content -->
			<section class="content">
				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Editar Administrador</h3>
                    </div>

                    <?php
                        $sql = "SELECT * FROM admins WHERE id_admin = $id";
                        $resultado = $conn->query($sql);
                        $admin = $resultado->fetch_assoc();
                    ?>

					<form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
						<div class="box-body">
							<div class="form-group">
								<label for="usuario">Usuario</label>
								<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $admin['usuario']; ?>">
							</div>
							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre" value="<?php echo $admin['nombre']; ?>">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password para Iniciar Sesión">
							</div>
							<div class="form-group">
								<label>Acceso</label>
								<select id="nivel" name="nivel" class="form-control">
									<option value="" selected>--Seleccione--</option>
									<option value="0" '>Básico</option>
									<option value="1">Total</option>
								</select>
                			</div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
                            <input type="hidden" name="registro" value="actualizar">
							<input type="hidden" name="id_registro" value="<?php echo $id; ?>">
							<button type="submit" class="btn btn-primary">Actualizar</button>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</section>
			<!-- /.content -->
		</div>
	</div>

</div>
<!-- /.content-wrapper -->

<?php require_once 'templates/footer.php'; ?>