<!-- about header section -->
<div id="about-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12"></div>
			</div>
		</div>
	</div>

	<!-- team section -->
	<div id="team">
		<div class="container">

			<div class="row">
				<div class="col-md-offset-2 col-md-8 col-sm-12">
					<h2>Conoce a los diseñadores disponibles</h2>
					<p>Tenemos un amplio catalogo de diseñadores Freenlance especializados en el diseño de personajes y backgrounds</p>
				</div>
			</div>

			<div class="row mt30">
				<?php
					$conexion = new mysqli("localhost","root","","redisenio");

					$conexion->set_charset("utf8");

					$consulta = "SELECT usuario_nombre,diseniador_titulo,diseniador_img,diseniador_descripcion from usuario,diseniador WHERE usuario.usuario_id = diseniador.diseniador_id;";
					$diseniadores = $conexion->query($consulta);

					foreach ($diseniadores as $diseniador) {
					
				?>
				<div class="col-md-4 col-sm-4 col-xs-9">
					<div class="team-wrapper">
						<img src="images/<?php echo $diseniador["diseniador_img"];?>" class="img-responsive"
							alt="team img">
						<h3><?php echo $diseniador["usuario_nombre"]; ?></h3>
						<h4><?php echo $diseniador["diseniador_titulo"]; ?></h4>
						<p><?php echo $diseniador["diseniador_descripcion"];?></p>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
	</div>