<?php
session_start();
if (!isset($_SESSION['usuario']) && $_SESSION['tipo'] == 'Coordinador') {

	header("Location: ../../Vista/login.php");
}

include_once("../../Modelo/conexion.php");

$id = $_SESSION['usuario'];
$sql = $conexion->query("SELECT * FROM usuario WHERE idUsuario = $id");
$consulta = ($sql->fetch_object());

// $puntaje = $conexion->query("SELECT SUM(DISTINCT TotalPuntaje) as TotalPuntaje FROM guiaaplicacion WHERE idProfesor = $id; ");
// $puntajeTotal = ($puntaje->fetch_object());
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inicio</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.7.1.slim.js"
		integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
		integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" type="text/css" href="../estilos/csscoordinador.css">
	<link rel="stylesheet" href="fonts/icomoon/style.css">
</head>

<body class="bg-light">
	<?php include_once("menu.php");
	$Agendados = $conexion->query("SELECT * FROM agenda WHERE idProfesor =  $id");
	$datosAgenda1 = $Agendados->fetch_object();
	$coor1 = $datosAgenda1->idCoordinador;
	$coor2 = $datosAgenda1->idCoordinador2;
	$coor3 = $datosAgenda1->idCoordinador3;

	$puntaje1 = $conexion->query("SELECT SUM(DISTINCT TotalPuntaje) as TotalPuntaje FROM guiaaplicacion WHERE idProfesor = $id AND idCoordinador = $coor1; ");
	$puntajeTotal1 = ($puntaje1->fetch_object());

	$puntaje2 = $conexion->query("SELECT SUM(DISTINCT TotalPuntaje) as TotalPuntaje FROM guiaaplicacion WHERE idProfesor = $id AND idCoordinador = $coor2; ");
	$puntajeTotal2 = ($puntaje2->fetch_object());

	$puntaje3 = $conexion->query("SELECT SUM(DISTINCT TotalPuntaje) as TotalPuntaje FROM guiaaplicacion WHERE idProfesor = $id AND idCoordinador = $coor3; ");
	$puntajeTotal3 = ($puntaje3->fetch_object());

	$TOTAL = ($puntajeTotal1->TotalPuntaje + $puntajeTotal2->TotalPuntaje + $puntajeTotal3->TotalPuntaje);

	?>

	<!-- --------------------------------------------------------------------------------------------------- -->
	<div class="container-fluid mt-5 #archivos">
	<div class="col-11 col-lg-9 mt-5 pt-5 mx-auto">
		<?php
			$consultaAgenda = $conexion->query("SELECT * FROM guiaaplicacion 
			INNER JOIN Usuario ON Usuario.idUsuario = guiaaplicacion.idProfesor 
			INNER JOIN Materia ON Materia.idMateria = guiaaplicacion.idMateria
			INNER JOIN Agenda ON Agenda.idProfesor = guiaaplicacion.idProfesor WHERE
			guiaaplicacion.idCoordinador = $coor1 
			OR guiaaplicacion.idCoordinador = $coor2 
			OR guiaaplicacion.idCoordinador = $coor3 AND
			guiaaplicacion.idProfesor =  $id  GROUP BY guiaaplicacion.idCoordinador");

			$totalFilas = mysqli_num_rows($consultaAgenda);
			if ($totalFilas == 3) {
				$datosAgenda = $consultaAgenda->fetch_object();
		?>
		<p class="text center fs-4"> Resultados </p>
		<div class="card p-1 mb-3 border-start-0 border-dark border-1">
			
						<div class="card-body d-flex m-0 vh-50 justify-content-center align-items-center">
							<div class="col-4 border-end pe-4 border-secondary">
								<img src="../../Public/<?= $consulta->fotoperfil ?>" class="img-fluid rounded-circle mb-1 lh-1" alt="..."><br>
								<p class="text-secondary fw-bold text-muted">Fecha y hora</p>
								<p class="fs-5 fw-bold">
									<?php echo date("d", strtotime($datosAgenda->FechaApli)) ?>
									<?php echo date("M Y", strtotime($datosAgenda->FechaApli)) ?>,
									<?php echo date("h: i A", strtotime($datosAgenda->FechaApli)) ?><br>
									<br>
									
								</p>
							</div>
							<div class="col-8 ps-5">
								<label class="text-secondary fw-bold text-muted">Materia</label>
								<p class="fs-5 fw-bold"><?= $datosAgenda->NombreM ?></p>
								<label class="text-secondary fw-bold text-muted">Puntaje</label>
								<p class="fs-5 fw-bold"><?= $total = bcdiv($TOTAL / 3, '1', 2); ?></p>
								<label class="text-center">Estatus</label><br>
								<?php if ($total > 70) { ?>
									<span class="badge rounded-pill bg-success">Contratado</span>
								<?php } else { ?>
									<span class="badge rounded-pill bg-danger">No contratado</span>
								<?php } ?>
										
								<div class="d-grid gap-2 mt-3">
									<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#detalles">
										Ver detalles
									</button>
								</div>

								<?php if ($total > 7) {
									$consultaEncuesta = $conexion->query("SELECT * FROM respuesta WHERE idUsuario = $id");
									$filas = mysqli_num_rows($consultaEncuesta);
										if ($filas != 0) {
											$consultaDocumento = $conexion->query("SELECT * FROM datoscontrato WHERE idUsuario = $id");
											$filasDocs = mysqli_num_rows($consultaDocumento);
												if ($filasDocs == 0) {
								?>
													<div class="d-grid gap-2 mt-3">
														<button type="button" class="btn btn-outline-dark"
															data-bs-toggle="modal" data-bs-target="#archivos">
															Subir archivos de contratación
														</button>
													</div>

													<?php } else { ?>
														<div class="d-grid gap-2 mt-3">
															<span class="badge rounded-pill bg-secondary">Puedes editar tus documentos en tu perfil</span>
														</div>
													<?php }
												} else { ?>
												<div class="d-grid gap-2 mt-3">
													<button type="button" class="btn btn-outline-dark"
														data-bs-toggle="modal" data-bs-target="#encuesta" data-bs-toggle="tooltip"
														data-bs-placement="bottom"
														title="Debes contestar la encuesta para poder subir tus archivos">Contestar
														encuesta</button>
												</div>
												<?php } ?>
											<?php } ?>
										
								


							</div>
						</div>
					</div>


		<?php } else { ?>
		<div class="card-body d-block text-center m-5 justify-content-center align-items-center" style="height: 50vh;">
			<p class="fs-5" style="font-family: 'Trebuchet MS', Verdana, sans-serif;">No hay nada que mostrar</p>	
			<img src="../imagenes/empty.png" class="img-fluid" width="300	" alt="...">			
		</div>
		<?php } ?>
					</div>
					</div>


	<!-- ----------------------------------------------------------------------------------------------------- -->
	<div class="modal fade" id="detalles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg  modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detalles de guías aplicadas</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<?php
					$consulta1 = $conexion->query("SELECT * FROM guiaaplicacion INNER JOIN Usuario ON Usuario.idUsuario = guiaaplicacion.idCoordinador INNER JOIN Materia ON Materia.idMateria = guiaaplicacion.idMateria WHERE idProfesor =  $id GROUP BY idCoordinador");

					while ($datos = $consulta1->fetch_object()) {
						$idCoordinador = $datos->idCoordinador;
						?>


						<table class="table table-bordered border border-dark border-2">

							<tbody>
								<tr>
									<th scope="row">Coordinador</th>
									<td colspan="4">
										<?php echo $datos->Nombre ?>
										<?php echo $datos->ApellidoP ?>
										<?php echo $datos->ApellidoM ?>
									</td>
								</tr>
								<tr>
									<th scope="row">Profesor</th>
									<td colspan="4">
										<?php echo $consulta->Nombre ?>
										<?php echo $consulta->ApellidoP ?>
									</td>
								</tr>

								<tr>
									<th scope="row">Tema</th>
									<td colspan="4">
										<?php echo $datos->Tema ?>
									</td>
								</tr>

								<tr>
									<td>
										Valor
									</td>
									<td>
										Características (rubro)
									</td>
									<td>
										Si
									</td>
									<td>
										No
									</td>
									<td>
										Observaciones
									</td>
								</tr>

								<tr>
									<td colspan="5" class="text-center">Apertura y cierre</td>
								</tr>

								<?php $rubro = $conexion->query("SELECT * FROM guiaaplicacion INNER JOIN guiaobservacion ON
									 guiaaplicacion.idGuiaObservacion = guiaobservacion.idGuiaObservacion WHERE TipoRubro 
									 LIKE '%Apertura y cierre%' AND idCoordinador = $idCoordinador AND idProfesor = $id");
								while ($datosRubro = $rubro->fetch_object()) {
									?>
									<tr>

										<td>
											<?= $datosRubro->Porcentaje ?>%
										</td>
										<td>
											<?= $datosRubro->Rubro ?>
										</td>
										<?php if ($datosRubro->Puntaje > 0) { ?>
											<td>
												<i class="bi bi-check2-circle text-success fs-5"></i>
											</td>
											<td>

											</td>
										<?php } else { ?>
											<td>

											</td>
											<td>
												<i class="bi bi-x-circle text-danger fs-5"></i>
											</td>
										<?php } ?>
										<td>
											<?= $datosRubro->Observacion ?>
										</td>
									</tr>

								<?php } ?>

								<tr>
									<td colspan="5" class="text-center">Participación</td>
								</tr>

								<?php $rubro = $conexion->query("SELECT * FROM guiaaplicacion INNER JOIN guiaobservacion ON
									 guiaaplicacion.idGuiaObservacion = guiaobservacion.idGuiaObservacion WHERE TipoRubro 
									 LIKE '%Participacion%' AND idCoordinador = $idCoordinador AND idProfesor = $id");
								while ($datosRubro = $rubro->fetch_object()) {
									?>
									<tr>

										<td>
											<?= $datosRubro->Porcentaje ?>%
										</td>
										<td>
											<?= $datosRubro->Rubro ?>
										</td>
										<?php if ($datosRubro->Puntaje > 0) { ?>
											<td>
												<i class="bi bi-check2-circle text-success fs-5"></i>
											</td>
											<td>

											</td>
										<?php } else { ?>
											<td>

											</td>
											<td>
												<i class="bi bi-x-circle text-danger fs-5"></i>
											</td>
										<?php } ?>
										<td>
											<?= $datosRubro->Observacion ?>
										</td>
									</tr>
								<?php } ?>

								<tr>
									<td colspan="5" class="text-center">Técnica</td>
								</tr>

								<?php $rubro = $conexion->query("SELECT * FROM guiaaplicacion INNER JOIN guiaobservacion ON
									 guiaaplicacion.idGuiaObservacion = guiaobservacion.idGuiaObservacion WHERE TipoRubro 
									 LIKE '%Tecnica%' AND idCoordinador = $idCoordinador AND idProfesor = $id");
								while ($datosRubro = $rubro->fetch_object()) {
									?>
									<tr>

										<td>
											<?= $datosRubro->Porcentaje ?>%
										</td>
										<td>
											<?= $datosRubro->Rubro ?>
										</td>
										<?php if ($datosRubro->Puntaje > 0) { ?>
											<td>
												<i class="bi bi-check2-circle text-success fs-5"></i>
											</td>
											<td>

											</td>
										<?php } else { ?>
											<td>

											</td>
											<td>
												<i class="bi bi-x-circle text-danger fs-5"></i>
											</td>
										<?php } ?>
										<td>
											<?= $datosRubro->Observacion ?>
										</td>
									</tr>
								<?php } ?>

								<tr>
									<td colspan="5" class="text-center">Desempeño</td>
								</tr>

								<?php $rubro = $conexion->query("SELECT * FROM guiaaplicacion INNER JOIN guiaobservacion ON
									 guiaaplicacion.idGuiaObservacion = guiaobservacion.idGuiaObservacion WHERE TipoRubro 
									 LIKE '%Desempeno%' AND idCoordinador = $idCoordinador AND idProfesor = $id");
								while ($datosRubro = $rubro->fetch_object()) {
									?>
									<tr>

										<td>
											<?= $datosRubro->Porcentaje ?>%
										</td>
										<td>
											<?= $datosRubro->Rubro ?>
										</td>
										<?php if ($datosRubro->Puntaje > 0) { ?>
											<td>
												<i class="bi bi-check2-circle text-success fs-5"></i>
											</td>
											<td>

											</td>
										<?php } else { ?>
											<td>

											</td>
											<td>
												<i class="bi bi-x-circle text-danger fs-5"></i>
											</td>
										<?php } ?>
										<td>
											<?= $datosRubro->Observacion ?>
										</td>
									</tr>
								<?php } ?>
								<tr>
									<th scope="row">Observación general</th>
									<td colspan="4">
										<?php echo $datos->ObservacionGeneral ?>
									</td>
								</tr>

							</tbody>
						</table>

					<?php } ?>


				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="encuesta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg  modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Encuesta de satisfacción</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="../../Controlador/Profesor/registroEncuesta.php" method="POST"
						class="needs-validation" novalidate>
						<?php
						$sql = $conexion->query("SELECT * FROM encuesta");

						while ($datos = $sql->fetch_object()) {
							?>

							<div class="row d-flex pt-3 pb-4 justify-content-center border ">

								<p class="fw-bold text-center pb-3 fs-6">
									<?= $datos->Pregunta ?>
								</p>

								<div class="col-2 d-flex justify-content-center align-items-center">
									<input class="form-check-input" type="radio"
										name="respuesta[<?= $datos->idEncuesta ?>][res]"
										id="res<?php echo $datos->idEncuesta; ?>5" value="1" required>
									<label class="form-check-label" for="res<?php echo $datos->idEncuesta; ?>5">
										Muy malo
									</label>
								</div>

								<div class="col-2 d-flex justify-content-center align-items-center">
									<input class="form-check-input" type="radio"
										name="respuesta[<?= $datos->idEncuesta ?>][res]"
										id="res<?php echo $datos->idEncuesta; ?>4" value="2" required>
									<label class="form-check-label" for="res<?php echo $datos->idEncuesta; ?>4">Malo</label>
								</div>

								<div class="col-2 d-flex justify-content-center align-items-center">
									<input class="form-check-input" type="radio"
										name="respuesta[<?= $datos->idEncuesta ?>][res]"
										id="res<?php echo $datos->idEncuesta; ?>3" value="3" required>
									<label class="form-check-label"
										for="res<?php echo $datos->idEncuesta; ?>3">Regular</label>
								</div>

								<div class="col-2 d-flex justify-content-center align-items-center">
									<input class="form-check-input" type="radio"
										name="respuesta[<?= $datos->idEncuesta ?>][res]"
										id="res<?php echo $datos->idEncuesta; ?>2" value="4" required>
									<label class="form-check-label"
										for="res<?php echo $datos->idEncuesta; ?>2">Bueno</label>
								</div>

								<div class="col-2 d-flex justify-content-center align-items-center">
									<input class="form-check-input" type="radio"
										name="respuesta[<?= $datos->idEncuesta ?>][res]"
										id="res<?php echo $datos->idEncuesta ?>1" value="5" required>
									<label class="form-check-label"
										for="res<?php echo $datos->idEncuesta ?>1">Excelente</label>
								</div>

								<input type="number" name="respuesta[<?= $datos->idEncuesta ?>][id]" id="idPregunta"
									value="<?php echo $datos->idEncuesta ?>" hidden>
							</div>
						<?php } ?>
				</div>


				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="submit" name="btn" class="btn btn-primary">Enviar</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="archivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg  modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Subir archivos para contratación</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form enctype="multipart/form-data" action="../../Controlador/Profesor/registroArchivos.php"
						method="POST" class="needs-validation" novalidate>

						<input type="hidden" name="idUsuario" value="<?= $id ?>" readonly>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupFile01">CV</label>
							<input type="file" name="cv" id="inputGroupFile01" class="form-control"
								aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupFile02">Identifiación con fotografía
								(INE/Pasaporte)</label>
							<input type="file" name="identificacion" id="inputGroupFile02" class="form-control"
								aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupFile03">Comprobante de domicilio
								(Agua/Luz)</label>
							<input type="file" name="comprobante" id="inputGroupFile03" class="form-control"
								aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupFile04">Título del último grado
								académico</label>
							<input type="file" name="titulo" id="inputGroupFile04" class="form-control"
								aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupFile05">Cédula profesional</label>
							<input type="file" name="cedula" id="inputGroupFile05" class="form-control"
								aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupFile06">Acta de nacimiento</label>
							<input type="file" name="actaNacimiento" id="inputGroupFile06" class="form-control"
								aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="submit" name="btn" class="btn btn-primary">Enviar</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
		crossorigin="anonymous"></script>
	<script>
		// Ejemplo de JavaScript inicial para deshabilitar el envío de formularios si hay campos no válidos
		(function () {
			'use strict'

			// Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
			var forms = document.querySelectorAll('.needs-validation')

			// Bucle sobre ellos y evitar el envío
			Array.prototype.slice.call(forms)
				.forEach(function (form) {
					form.addEventListener('submit', function (event) {
						if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()
						}

						form.classList.add('was-validated')
					}, false)
				})
		})()
	</script>


</body>

</html>