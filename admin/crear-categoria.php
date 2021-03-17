<?php
	require_once 'funciones/sesiones.php';
	require_once 'funciones/funciones.php';
	require_once 'templates/header.php';
	require_once 'templates/barra.php';
	require_once 'templates/navegacion.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Crear Categoría de Eventos
			<small>completá el formulario para crear una nueva categoría</small>
		</h1>
	</section>

	<div class="row">
		<div class="col-md-8">
			<!-- Main content -->
			<section class="content">
				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Crear Categoría</h3>
					</div>
					<form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
						<div class="box-body">
							<div class="form-group">
								<label for="nombre_categoria">Nombre</label>
								<input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Nombre de la categoría">
							</div>
							<div class="form-group">
								<label for="icono">Icono</label>
								<div class="input-group">
									<div class="input-group-addon"></div>
									<input type="text" id="icono" name="icono" class="form-control pull-right" placeholder="fa-icon">
								</div>
							</div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<input type="hidden" name="registro" value="nuevo">
							<button type="submit" class="btn btn-primary" id="crear-registro">Añadir</button>
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
