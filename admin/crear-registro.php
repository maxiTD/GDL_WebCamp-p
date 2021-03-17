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
			Crear Registro de Usiario Manual
		</h1>
	</section>

	<div class="row">
		<div class="col-md-8">
			<!-- Main content -->
			<section class="content">
				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Crear Registro</h3>
					</div>
					<form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-registrado.php">
						<div class="box-body">
							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" class="form-control" id="nombre" name="nombre" placeholder="su nombre" required>
							</div>
                            <div class="form-group">
								<label for="apellido">Apellido</label>
								<input type="text" class="form-control" id="apellido" name="apellido" placeholder="su apellido" required>
							</div>
                            <div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="su correo electrónico" required>
							</div>
                            <div class="form-group">
                                <div id="paquetes" class="paquetes">
                                    <h3>Elige el número de boletos</h3>

                                    <ul class="lista-precios clearfix row">
                                        <li class="col-md-4">
                                            <div class="tabla-precio text-center">
                                                <h3>Pase por día (Viernes)</h3>
                                                <p class="numero">$30</p>
                                                <ul>
                                                    <li>Bocadillos gratis</li>
                                                    <li>Todas las conferencias</li>
                                                    <li>Todos los talleres</li>
                                                </ul>
                                                <div class="orden">
                                                    <label for="pase_dia">Boletos deseados:</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           min="0"
                                                           id="pase_dia"
                                                           size="3"
                                                           name="boletos[un_dia][cantidad]"
                                                           placeholder="0">
                                                    <input type="hidden" value="30" name="boletos[un_dia][precio]">
                                                </div>
                                            </div>
                                            <!--tabla-precio-->
                                        </li>

                                        <li class="col-md-4">
                                            <div class="tabla-precio text-center">
                                                <h3>Todos los días</h3>
                                                <p class="numero">$50</p>
                                                <ul>
                                                    <li>Bocadillos gratis</li>
                                                    <li>Todas las conferencias</li>
                                                    <li>Todos los talleres</li>
                                                </ul>
                                                <label for="pase_completo">Boletos deseados:</label>
                                                <input type="number"
                                                       class="form-control"
                                                       min="0"
                                                       id="pase_completo"
                                                       size="3"
                                                       name="boletos[completo][cantidad]" placeholder="0">
                                                <input type="hidden" value="50" name="boletos[completo][precio]">
                                            </div>
                                            <!--tabla-precio-->
                                        </li>

                                        <li class="col-md-4">
                                            <div class="tabla-precio text-center">
                                                <h3>Pase por 2 días (viernes y sábado)</h3>
                                                <p class="numero">$45</p>
                                                <ul>
                                                    <li>Bocadillos gratis</li>
                                                    <li>Todas las conferencias</li>
                                                    <li>Todos los talleres</li>
                                                </ul>
                                                <label for="pase_dos_dias">Boletos deseados:</label>
                                                <input type="number"
                                                       class="form-control"
                                                       min="0"
                                                       id="pase_dos_dias"
                                                       size="3"
                                                       name="boletos[2dias][cantidad]"
                                                       placeholder="0">
                                                <input type="hidden" value="45" name="boletos[2dias][precio]">
                                            </div>
                                            <!--tabla-precio-->
                                        </li>

                                    </ul>
                                    <!--lista-precios-->
                                </div>
                                <!--paquetes-->
                            </div>
                            <!--form-group-->
                            <div class="form-group">
                                <div class="box-header with-border">
                                    <h3 class="box-tittle">Elige los talleres</h3>
                                </div>

                                <div id="eventos" class="eventos clearfix">
                                    <div class="caja">
                                        <?php
                                        try {
                                            $sql = "SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado ";
                                            $sql .= " FROM eventos ";
                                            $sql .= " JOIN categoria_evento ";
                                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                                            $sql .= " JOIN invitados ";
                                            $sql .= " ON eventos.id_inv = invitados.id_invitado ";
                                            $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento";

                                            $resultado = $conn->query($sql);
                                        } catch (Exception $e) {
                                            echo $e->getMessage();
                                        }

                                        $eventos_dias = array();
                                        while ($eventos = $resultado->fetch_assoc()) {
                                            $fecha = $eventos['fecha_evento'];
                                            //seteo el idioma para que la fecha se muestre en español
                                            //linux
                                            setlocale(LC_TIME, 'es_ES.UTF-8');
                                            //windows
                                            setlocale(LC_TIME, 'spanish.UTF-8');
                                            $dia_semana = strftime("%A", strtotime($fecha));

                                            $hora = $eventos['hora_evento'];
                                            $hora_formateada = date("G:i", strtotime($hora));

                                            $categoria = $eventos['cat_evento'];
                                            $dia = array(
                                                'nombre_evento' => $eventos['nombre_evento'],
                                                'hora' => $hora_formateada,
                                                'id' => $eventos['evento_id'],
                                                'nombre_invitado' => $eventos['nombre_invitado'],
                                                'apellido_invitado' => $eventos['apellido_invitado']
                                            );
                                            $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;
                                        }
                                        ?>
                                        <?php foreach ($eventos_dias as $dia => $eventos) { ?>
                                            <div id="<?php echo str_replace('á', 'a', $dia); ?>" class="contenido-dia clearfix row">
                                                <h4 class="text-center nombre-dia"><?php echo $dia; ?></h4>

                                                <?php foreach ($eventos['eventos'] as $tipo => $evento_dia): ?>
                                                    <div class="col-md-4">
                                                        <p><?php echo $tipo;?>:</p>
                                                        <?php foreach ($evento_dia as $evento) { ?>
                                                            <label>
                                                                <input type="checkbox"
                                                                       class="minimal"
                                                                       name="registro_evento[]"
                                                                       id="<?php echo $evento['id']; ?>"
                                                                       value="<?php echo $evento['id']; ?>">
                                                                <time><?php echo $evento['hora']; ?></time>
                                                                <?php echo $evento['nombre_evento']; ?>
                                                                <br>
                                                                <span class="autor"><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></span>
                                                            </label>
                                                        <?php }; //end foreach?>
                                                    </div>
                                                <?php endforeach; //end foreach?>
                                            </div>
                                            <!--.contenido-dia-->
                                        <?php }; //end foreach?>

                                        <div id="resumen" class="resumen">
                                            <div class="box-header with-border">
                                                 <h3 class="box-tittle">Pagos y Extras</h3>
                                            </div>
                                            <br>

                                            <div class="caja clearfix row">
                                                <div class="extras col-md-6">
                                                    <div class="orden">
                                                        <label for="camisa_evento">Camisa del evento $10 <small>(promoción 7% dto.)</small></label>
                                                        <input type="number" class="form-control" min="0" id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3" placeholder="0">
                                                        <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                                                    </div>
                                                    <!--orden-->

                                                    <div class="orden">
                                                        <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript,
                                                                Chrome)</small></label>
                                                        <input type="number" class="form-control" min="0" id="etiquetas" name="pedido_extra[etiquetas][cantidad]"size="3" placeholder="0">
                                                        <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                                                    </div>
                                                    <!--orden-->

                                                    <div class="orden">
                                                        <label for="regalo">Selecione un regalo</label><br>
                                                        <select name="regalo" id="regalo" class="form-control seleccionar" required>
                                                            <option value="">-- Seleccione un regalo --</option>
                                                            <option value="2">Etiquetas</option>
                                                            <option value="1">Pulseras</option>
                                                            <option value="3">Plumas</option>
                                                        </select>
                                                    </div>
                                                    <!--orden-->
                                                    <br>
                                                    <input type="button" name="calcular" id="calcular" class="btn btn-success" value="Calcular">
                                                </div>
                                                <!--extras-->

                                                <div class="total col-md-6">
                                                    <p>Resumen:</p>
                                                    <div id="lista-productos">

                                                    </div>
                                                    <p>Total:</p>
                                                    <div id="suma-total">

                                                    </div>
                                                    <input type="hidden" name="total_pedido" id="total_pedido">
                                                    <input type="hidden" name="total_descuento" id="total_descuento">
                                                </div>
                                                <!--total-->
                                            </div>
                                            <!--.caja-->
                                        </div>
                                        <!--#resumen-->
                                    </div>
                                    <!--.caja-->
                                </div>
                                <!--#eventos-->
                            </div>
                            <!--form-group-->
						<!-- /.box-body -->
						<div class="box-footer">
							<input type="hidden" name="registro" value="nuevo">
							<button type="submit" class="btn btn-primary" id="btnRegistro">Añadir</button>
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

<?php
    require_once 'templates/footer.php';
?>