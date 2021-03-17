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
            Crear Nuevo Evento
			<small>completá los campos para agregar un evento</small>
		</h1>
	</section>

	<div class="row">
		<div class="col-md-8">
			<!-- Main content -->
			<section class="content">
				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Crear Evento</h3>
					</div>
					<form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-evento.php">
						<div class="box-body">
							<div class="form-group">
								<label for="titulo-evento">Evento</label>
								<input type="text" class="form-control" id="titulo-evento" name="titulo-evento" placeholder="Nombre de evento">
                            </div>
                            <div class="form-group">
                                <label >Categoría</label>
                                <select name="categoria-evento" class="form-control select2" id="categoria-evento">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        try {
                                            $sql = "SELECT * FROM categoria_evento";
                                            $resultado = $conn->query($sql);
                                            while ($cat_evento = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $cat_evento['id_categoria']; ?>">
                                                <?php echo $cat_evento['cat_evento']; ?>
                                                </option>
                                            <?php }
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha-evento">Fecha</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="fecha-evento" name="fecha-evento">
                                </div>
                            </div>
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Hora</label>
                                    <div class="input-group">
                                        <input type="text" id="hora-evento" name="hora-evento" class="form-control timepicker">
                                        <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="form-group">
                                <label >Invitado o Ponente</label>
                                <select name="invitado-evento" class="form-control select2" id="invitado-evento">
                                    <option value="0">--Seleccione--</option>
                                    <?php
                                        try {
                                            $sql = "SELECT id_invitado, nombre_invitado, apellido_invitado FROM invitados";
                                            $resultado = $conn->query($sql);
                                            while ($invitado = $resultado->fetch_assoc()) { ?>
                                                <option value="<?php echo $invitado['id_invitado']; ?>">
                                                <?php echo $invitado['nombre_invitado'] . ' ' . $invitado['apellido_invitado']; ?>
                                                </option>
                                            <?php }
                                        } catch (Exception $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                    ?>
                                </select>
                            </div>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<input type="hidden" name="registro" value="nuevo">
							<button type="submit" class="btn btn-primary">Añadir</button>
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