<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container-fluid ms-5">

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" aria-current="page" data-bs-toggle="modal"
						data-bs-target="#agendarClase">Agendar clase</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="aplicarGuia.php">Ver próximas clases</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="verDocumentos.php">Ver documentos</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="verEncuestas.php">Ver respuestas de la encuesta</a>
				</li>

			</ul>
			<ul class="navbar-nav me-5 mb-2 mb-lg-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<?= $consulta->Nombre ?>
					<img src="../../Public/<?= $consulta->fotoperfil ?>" alt="" width="30" class="rounded-circle">
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
					<li><a class="dropdown-item" aria-current="page" href="perfil.php">Perfil</a></li>
					<li><hr class="dropdown-divider"></li>
					<li><a class="dropdown-item" href="../../Controlador/cerrarSesion.php">Cerrar sesión <i class="bi bi-box-arrow-in-right fs-5 text-danger fw-bold"></i></a></li>
				</ul>
				</li>
			</ul>

		</div>
	</div>
</nav>


<!------------------------------------------ Modal agendar clase ------------------------------------------>
<div class="modal fade" id="agendarClase" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agendar nueva clase </h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="row g-3 needs-validation mt-2" method="POST"
					action="../../Controlador/Coordinador/agendarClase.php" enctype="multipart/form-data" novalidate>


					<input type="hidden" name="tipo" value="<?= $consulta->TipoUsuario ?>" readonly>
					<input type="hidden" name="idCoordinador" value="<?= $consulta->idUsuario ?>" readonly>

					<div class="input-group input-group-sm mb-3 has-validation">
						<span class="input-group-text" id="inputGroup-sizing-sm">Coordinador 1</span>
						<input type="text" class="form-control" aria-label="Sizing example input"
							aria-describedby="inputGroup-sizing-sm" value="<?php echo $consulta->Nombre ?>"
							placeholder="Nombre" name="nombre" required readonly>
						<input type="text" class="form-control" aria-label="Sizing example input"
							aria-describedby="inputGroup-sizing-sm" value="<?php echo $consulta->ApellidoP ?>"
							placeholder="Ap. Paterno" name="paterno" required readonly>
						<input type="text" class="form-control" aria-label="Sizing example input"
							aria-describedby="inputGroup-sizing-sm" value="<?php echo $consulta->ApellidoM ?>"
							placeholder="Ap. Materno" name="materno" readonly>
					</div>

					<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupSelect01">Coordinador 2</label>
							<select class="form-select" id="inputGroupSelect01" name="idCoordinador2" required>
								<option selected disabled value>
									Seleccionar profesor...
								</option>
								<?php
								$consultaAca = $conexion->query("SELECT * FROM Usuario WHERE TipoUsuario LIKE 'Coordinador' AND idUsuario <> $consulta->idUsuario; ");
								while ($datosA = $consultaAca->fetch_object()) {
									?>

									<option value="<?= $datosA->idUsuario ?>">
										<?= $datosA->Nombre ?>
										<?= $datosA->ApellidoP ?>
										<?= $datosA->ApellidoM ?>
									</option>
								<?php } ?>
							</select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupSelect01">Coordinador 3</label>
							<select class="form-select" id="inputGroupSelect01" name="idCoordinador3" required>
								<option selected disabled value>
									Seleccionar profesor...
								</option>
								<?php
								$consultaAca = $conexion->query("SELECT * FROM Usuario WHERE TipoUsuario LIKE 'Coordinador' AND idUsuario <> $consulta->idUsuario; ");
								while ($datosA = $consultaAca->fetch_object()) {
									?>

									<option value="<?= $datosA->idUsuario ?>">
										<?= $datosA->Nombre ?>
										<?= $datosA->ApellidoP ?>
										<?= $datosA->ApellidoM ?>
									</option>
								<?php } ?>
							</select>
						</div>
						<?php
						date_default_timezone_set('America/Mexico_City');
						$date = new DateTime(date_create("Y-m-d H:i"));
						?>

					<div class="input-group input-group-sm mb-3 has-validation">
						<span class="input-group-text" id="inputGroup-sizing-sm">Fecha de aplicación</span>
						<input type="datetime-local" name="fechaAgenda" min="<?php echo $date->format('Y-m-d H:i');?>" class="form-control" aria-label="Sizing example input"
							aria-describedby="inputGroup-sizing-sm" required>
							
					</div>

					<div class="input-group input-group-sm mb-3 has-validation">
						<label class="input-group-text" for="inputGroupSelect01">Profesor</label>
						<select class="form-select" id="inputGroupSelect01" name="idProfesor" required>
							<option selected disabled value>
								Seleccionar profesor...
							</option>
							<?php
							$consultaAca = $conexion->query("SELECT * FROM Usuario WHERE TipoUsuario LIKE 'Profesor'; ");
							while ($datosA = $consultaAca->fetch_object()) {
								?>

								<option value="<?= $datosA->idUsuario ?>">
									<?= $datosA->Nombre ?>
									<?= $datosA->ApellidoP ?>
									<?= $datosA->ApellidoM ?>
								</option>
							<?php } ?>
						</select>
					</div>

					<div class="input-group input-group-sm mb-3 has-validation">
						<label class="input-group-text" for="inputGroupSelect01">Materia</label>
						<select class="form-select" id="inputGroupSelect01" name="idMateria" required>
							<option selected disabled value>
								Seleccionar profesor...
							</option>
							<?php
							$consultaMat = $conexion->query("SELECT * FROM Materia");
							while ($datosM = $consultaMat->fetch_object()) {
								?>
								<option value="<?= $datosM->idMateria ?>">
									<?= $datosM->NombreM ?>
								</option>
							<?php } ?>
						</select>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
						<button class="btn btn-primary" type="submit">Agendar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>