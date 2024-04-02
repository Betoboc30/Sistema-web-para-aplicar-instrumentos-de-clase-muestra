<?php
session_start();
if (!isset($_SESSION['usuario']) && $_SESSION['tipo'] == 'Coordinador') {

	header("Location: ../../Vista/login.php");
}

include_once("../../Modelo/conexion.php");

$id = $_SESSION['usuario'];
$sql = $conexion->query("SELECT * FROM usuario WHERE idUsuario = $id");
$consulta = ($sql->fetch_object());
?>

<!DOCTYPE html>
<html>

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
	<link rel="stylesheet" type="text/css" href="../estilos/csscoordinador.css">
	<link rel="stylesheet" href="fonts/icomoon/style.css">
</head>

<body>

	<?php include_once("menu.php") ?>

	<div class="card bg-dark text-white mt-5">

		<?php
		date_default_timezone_set('America/Mexico_City');
		$date = date("H");

		if ($date < 12) { ?>
			<img src="../imagenes/amanecer-min.jpg" class="card-img" alt="...">
			<div class="card-img-overlay">
				<div class="card-img-overlay text-center">
					<h5 class="card-title text-center fs-1">¡Buenos días!</h5>
					<img src="../../Public/<?= $consulta->fotoperfil ?>" width="135px" class="rounded-circle">
					<h5 class="card-title text-center fs-3 mt-3">
						<?= $consulta->Nombre ?>
						<?= $consulta->ApellidoP ?>
					</h5>
					<h5 class="card-title text-center fs-4">Administrador(a)</h5>
				</div>
			</div>

		<?php } else if ($date < 18) { ?>

				<img src="../imagenes/atardecer-min.jpg" class="card-img" alt="...">
				<div class="card-img-overlay">
					<div class="card-img-overlay text-center">
						<h5 class="card-title text-center fs-1">¡Buenas tardes!</h5>
						<img src="../../Public/<?= $consulta->fotoperfil ?>" width="100px" class="rounded-circle">
						<h5 class="card-title text-center fs-3 mt-3">
						<?= $consulta->Nombre ?>
						<?= $consulta->ApellidoP ?>
						</h5>
						<h5 class="card-title text-center fs-4">Administrador(a)</h5>
					</div>
				</div>

		<?php } else { ?>

				<img src="../imagenes/anochecer-min.jpg" class="card-img" alt="...">
				<div class="card-img-overlay">
					<div class="card-img-overlay text-center">
						<h5 class="card-title text-center fs-1">¡Buenas noches!</h5>
						<img src="../../Public/<?= $consulta->fotoperfil ?>" width="100px" class="rounded-circle">
						<h5 class="card-title text-center fs-3 mt-3">
						<?= $consulta->Nombre ?>
						<?= $consulta->ApellidoP ?>
						</h5>
						<h5 class="card-title text-center fs-4">Administrador(a)</h5>
					</div>
				</div>
		<?php } ?>
	</div>

	<div class="row m-3 mb-1 border bg-light justify-content-center ">
		<p class="text-center fw-bolder fs-5 pt-2">¿Qué deseas hacer?</p>

		<div class="col-12 col-lg-9 card-group ">
			<div class="card mt-3 ms-5 me-5 mb-3">
				<img src="../imagenes/gestionUsuario.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Gestión de usuarios</h5>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between bg-transparent">

					<a class="small  stretched-link" href="gestionUsuario.php">Ir</a>
					<div class="small "><i class="bi bi-caret-right-fill"></i></div>

				</div>
			</div>
			<div class="card mt-3 ms-5 me-5 mb-3">
				<img src="../imagenes/guiaObservacion.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Gestión de guía de observación</h5>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between bg-transparent">

					<a class="small  stretched-link" href="gestionGuiaObservacion.php">Ir</a>
					<div class="small "><i class="bi bi-caret-right-fill"></i></div>

				</div>
			</div>

			<div class="card mt-3 ms-5 me-5 mb-3">
				<img src="../imagenes/gestionAcademia.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Gestión de academias</h5>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between bg-transparent">

					<a class="small  stretched-link" href="gestionAcademia.php">Ir</a>
					<div class="small "><i class="bi bi-caret-right-fill"></i></div>

				</div>
			</div>


		</div>

		<div class="col-12 col-lg-9 card-group ">
			<div class="card mt-3 ms-5 me-5 mb-3">
				<img src="../imagenes/gestionMaterias.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Gestión de materias</h5>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between bg-transparent">

					<a class="small  stretched-link" href="GestionMateria.php">Ir</a>
					<div class="small "><i class="bi bi-caret-right-fill"></i></div>

				</div>
			</div>

			<div class="card mt-3 ms-5 me-5 mb-3">
				<img src="../imagenes/gestionEncuesta.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Gestión de encuestas</h5>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between bg-transparent">

					<a class="small  stretched-link" href="gestionEncuesta.php">Ir</a>
					<div class="small "><i class="bi bi-caret-right-fill"></i></div>

				</div>
			</div>

			<div class="card mt-3 ms-5 me-5 mb-3">
				<img src="../imagenes/respaldoBD.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Respaldo de la base de datos</h5>
				</div>
				<div class="card-footer d-flex align-items-center justify-content-between bg-transparent">

					<a class="small  stretched-link" href="#">Ir</a>
					<div class="small "><i class="bi bi-caret-right-fill"></i></div>

				</div>
			</div>

		</div>
	</div>


	<!------------------------------------------ Modal agendar clase ------------------------------------------>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agendar nueva clase </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form class="row g-3 needs-validation mt-2" method="POST"
						action="../../Controlador/Coordinador/agendarClase.php" enctype="multipart/form-data"
						novalidate>


						<input type="hidden" name="tipo" value="<?= $consulta->TipoUsuario ?>" readonly>
						<input type="hidden" name="idCoordinador" value="<?= $consulta->idUsuario ?>" readonly>

						<div class="input-group input-group-sm mb-3 has-validation">
							<span class="input-group-text" id="inputGroup-sizing-sm">Coordinador</span>
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
							<span class="input-group-text" id="inputGroup-sizing-sm">Fecha de aplicación</span>
							<input type="date" name="fechaAgenda" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupSelect01">Profesor</label>
							<select class="form-select" id="inputGroupSelect01" name="idProfesor" required>

								<?php
								$consultaAca = $conexion->query("SELECT * FROM Usuario WHERE TipoUsuario LIKE 'Profesor'; ");
								while ($datosA = $consultaAca->fetch_object()) {
									?>
									<option selected disabled value>
										Seleccionar profesor...
									</option>
									<option value="<?= $datosA->idUsuario ?>">
										<?= $datosA->Nombre ?>
										<?= $datosA->ApellidoP ?>
										<?= $datosA->ApellidoM ?>
									</option>
								<?php } ?>
							</select>
						</div>


						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
							<button class="btn btn-primary" type="submit">Editar</button>
						</div>
					</form>
				</div>
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