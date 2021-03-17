<?php include_once 'includes/templates/header.php'; ?>
	<section  id="pagina-principal" class="seccion contenedor">
		<h2>La mejor conferencia de diseño web en español</h2>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt fuga, tempore repellat quaerat facilis
			consequuntur, dolores doloremque totam similique at odit delectus beatae! Asperiores consequatur minima
			sequi laborum officiis ipsam?
		</p>
	</section>
	<!--seccion-->

	<section class="programa">
		<div class="contenedor-video">
			<video autoplay loop poster="img/bg-talleres.jpg">
				<source src="video/video.mp4" type="video/mp4">
				<source src="video/video.webm" type="video/mp4">
				<source src="video/video.ogv" type="video/mp4">
			</video>
		</div>
		<!--contenedor-video-->

		<div class="contenido-programa">
			<div class="contenedor">
				<div class="programa-evento">
					<h2>Programa del Evento</h2>
					<?php
						try {
							require_once('includes/funciones/db_conexion.php');
							$sql = "SELECT * FROM `categoria_evento` ";
							$resultado = $conn->query($sql);
						} catch (\Exception $e) {
							echo $e->getMessage();
						}
					?>

					<nav class="menu-programa">
						<?php  while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) {
							$categoria = $cat['cat_evento'];
							$icono = $cat['icono']?>
							<a href="#<?php echo strtolower($categoria)?>">
								<i class="fas <?php echo $icono ?>"></i><?php echo $categoria ?>
							</a>
						<?php } ?>
					</nav>
					<?php 
						try {
							require_once('includes/funciones/db_conexion.php');
							$sql = "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
							$sql .= " FROM `eventos` ";
							$sql .= " INNER JOIN `categoria_evento` ";
							$sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
							$sql .= " INNER JOIN `invitados`";
							$sql .= " ON eventos.id_inv = invitados.id_invitado ";
							$sql .= " AND eventos.id_cat_evento = 1";
							$sql .= " ORDER BY `evento_id` LIMIT 2;";
							$sql .= "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
							$sql .= " FROM `eventos` ";
							$sql .= " INNER JOIN `categoria_evento` ";
							$sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
							$sql .= " INNER JOIN `invitados`";
							$sql .= " ON eventos.id_inv = invitados.id_invitado ";
							$sql .= " AND eventos.id_cat_evento = 2";
							$sql .= " ORDER BY `evento_id` LIMIT 2;";
							$sql .= "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
							$sql .= " FROM `eventos` ";
							$sql .= " INNER JOIN `categoria_evento` ";
							$sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
							$sql .= " INNER JOIN `invitados`";
							$sql .= " ON eventos.id_inv = invitados.id_invitado ";
							$sql .= " AND eventos.id_cat_evento = 3";
							$sql .= " ORDER BY `evento_id` LIMIT 2;";
						} catch (\Exception $e) {
							echo $e->getMessage();
						}
						?>

					<?php $conn->multi_query($sql); ?>
					<?php do {
						$resultado = $conn->store_result();
						$row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
						<?php $i = 0; ?>
						<?php foreach($row as $evento): ?>
							<?php if ($i % 2 == 0) {?>
								<div id="<?php echo strtolower($evento['cat_evento']); ?>" class="info-curso ocultar clearfix">
							<?php }; ?>
									<div class="detalle-evento">
										<h3><?php echo $evento['nombre_evento']; ?></h3>
										<p><i class="far fa-clock"></i> <?php echo $evento['hora_evento']; ?></p>
										<p><i class="far fa-calendar-alt"></i> <?php echo date('d-m-Y', strtotime($evento['fecha_evento'])); ?></p>
										<p><i class="fas fa-user"></i> <?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></p>
									</div>

							<?php if ($i % 2 == 1) {?>
									<a href="calendario.php" class="boton float-rigth">Ver todos</a>
								</div>
								<!--seminarios-->
							<?php }; ?>
							<?php $i++; ?>
						<?php endforeach; ?>
						<?php $resultado->free(); ?>
					<?php } while ($conn->more_results() && $conn->next_result()); ?>
				</div>
				<!--programa-evento-->
			</div>
			<!--contenedor-->
		</div>
		<!--contenido-programa-->
	</section>
	<!--programa-->

	<?php include_once 'includes/templates/invitados.php'; ?>

	<div class="contador parallax">
		<div class="contenedor">
			<ul class="resumen-evento clearfix">
				<li><p class="numero">0</p>Invitados</li>
				<li><p class="numero">0</p>Talleres</li>
				<li><p class="numero">0</p>Días</li>
				<li><p class="numero">0</p>Conferencias</li>
			</ul>
		</div>
	</div>

	<section class="precios seccion">
		<h2>Precios</h2>
		<div class="contenedor">
			<ul class="lista-precios">
				<li>
					<div class="tabla-precio">
						<h3>Pase por día (viernes)</h3>
						<p class="numero">$30</p>
						<ul>
							<li><i class="fas fa-check"></i>Bocadillos gratis</li>
							<li><i class="fas fa-check"></i>Todas las conferencias</li>
							<li><i class="fas fa-check"></i>Todos los talleres</li>
						</ul>
						<a href="registro.php" class="boton hollow">Comprar</a>
					</div>
					<!--tabla-precio-->
				</li>

				<li>
					<div class="tabla-precio">
						<h3>Todos los días</h3>
						<p class="numero">$50</p>
						<ul>
							<li><i class="fas fa-check"></i>Bocadillos gratis</li>
							<li><i class="fas fa-check"></i>Todas las conferencias</li>
							<li><i class="fas fa-check"></i>Todos los talleres</li>
						</ul>
						<a href="registro.php" class="boton">Comprar</a>
					</div>
					<!--tabla-precio-->
				</li>

				<li>
					<div class="tabla-precio">
						<h3>Pase por 2 días</h3>
						<p class="numero">$45</p>
						<ul>
							<li><i class="fas fa-check"></i>Bocadillos gratis</li>
							<li><i class="fas fa-check"></i>Todas las conferencias</li>
							<li><i class="fas fa-check"></i>Todos los talleres</li>
						</ul>
						<a href="registro.php" class="boton hollow">Comprar</a>
					</div>
					<!--tabla-precio-->
				</li>
			</ul>
			<!--lista-precios-->
		</div>
		<!--contenedor---->
	</section>

	<div id="mapa" class="mapa"></div>

	<section class="seccion">
		<h2>Testimoniales</h2>
		<div class="testimoniales contenedor clearfix">
			<div class="testimonial">
				<blockquote>
					<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque repellendus distinctio iste nobis
						nulla. Quia assumenda reprehenderit, laudantium enim placeat voluptas ad deserunt eveniet illum
						delectus! Facere quis praesentium aspernatur.</p>
					<footer class="info-testimonial clearfix">
						<img src="../GDL_WebCamp/img/testimonial.jpg" alt="Imagen Testimonial">
						<cite>Oswaldo Aponte Escobedo<span>Diseñador en @prisma</span> </cite>
					</footer>
				</blockquote>
			</div>
			<!--testimonial-->

			<div class="testimonial">
				<blockquote>
					<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque repellendus distinctio iste nobis
						nulla. Quia assumenda reprehenderit, laudantium enim placeat voluptas ad deserunt eveniet illum
						delectus! Facere quis praesentium aspernatur.</p>
					<footer class="info-testimonial clearfix">
						<img src="../GDL_WebCamp/img/testimonial.jpg" alt="Imagen Testimonial">
						<cite>Oswaldo Aponte Escobedo<span>Diseñador en @prisma</span> </cite>
					</footer>
				</blockquote>
			</div>
			<!--testimonial-->

			<div class="testimonial">
				<blockquote>
					<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque repellendus distinctio iste nobis
						nulla. Quia assumenda reprehenderit, laudantium enim placeat voluptas ad deserunt eveniet illum
						delectus! Facere quis praesentium aspernatur.</p>
					<footer class="info-testimonial clearfix">
						<img src="../GDL_WebCamp/img/testimonial.jpg" alt="Imagen Testimonial">
						<cite>Oswaldo Aponte Escobedo<span>Diseñador en @prisma</span> </cite>
					</footer>
				</blockquote>
			</div>
			<!--testimonial-->
		</div>
		<!--testimoniales-->
	</section>

	<div class="newsletter parallax">
		<div class="contenido contenedor">
			<p>regístrate al newsletter:</p>
			<h3>gdlwebcamp</h3>
			<a href="#mc_embed_signup" class="boton_newsletter boton transparente">Registro</a>
		</div>
		<!--contenido-->
	</div>
	<!--newsletter-->

	<seccion class="seccion">
		<h2>faltan</h2>
		<div class="cuenta-regresiva contenedor">
			<ul class="clearfix">
				<li><p id="dias" class="numero"></p>días</li>
				<li><p id="horas" class="numero"></p>horas</li>
				<li><p id="minutos" class="numero"></p>minutos</li>
				<li><p id="segundos" class="numero"></p>segundos</li>
			</ul>
		</div>
	</seccion>

<?php include_once 'includes/templates/footer.php'; ?>
