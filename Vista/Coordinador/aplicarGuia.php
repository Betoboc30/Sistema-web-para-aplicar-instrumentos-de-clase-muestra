<?php
session_start();
if (!isset($_SESSION['usuario']) && $_SESSION['tipo'] == 'Coordinador') {

	header("Location: ../../Vista/login.php");
}

include_once("../../Modelo/conexion.php");

date_default_timezone_set('America/Mexico_City');
$date = new DateTime(date_create("Y-m-d H:i:s"));
$fechaActual = $date->format('Y-m-d H:i:s');

$id = $_SESSION['usuario'];
$sql = $conexion->query("SELECT * FROM usuario WHERE idUsuario = $id");
$consulta = ($sql->fetch_object());
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplicar guía</title>
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
	<?php include_once("menu.php");?>

	<div class="container-fluid">
		<div class="pt-5 mt-5 col-12 col-lg-9 mt-3 mx-auto">
			<p class="fs-4">Clases muestra </p>
		</div>

		<div class="col-12 col-lg-9 mt-3 mx-auto">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="col-4 justify-content-center d-flex border-bottom border-primary border-4" id="Vigente">
					<button class="btn btn-outline-light text-dark col-12" onclick="Vigentes();" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button">Vigentes</button>
				</li>
				<li class="col-4 justify-content-center d-flex" role="presentation" id="Vencido">
					<button class="btn btn-outline-light text-dark col-12" onclick="Vencidas();" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button">Vencidas</button>
				</li>

				<li class="col-4 justify-content-center d-flex" role="presentation" id="Evaluadas">
					<button class="btn btn-outline-light text-dark col-12" onclick="Evaluadas();" id="profile-tab" data-bs-toggle="tab" data-bs-target="#evaluada" type="button">Evaluadas</button>
				</li>
				
			</ul>
			<div class="tab-content" id="myTabContent">
				<!----------------------------------------------- Clases vigentes ---------------------------------------->
				<div class="tab-pane fade show active col-12 col-lg-11 mx-auto pt-3" id="home" role="tabpanel" aria-labelledby="home-tab">
					
					<?php
						/*$consultaAgenda = $conexion->query("SELECT * FROM Agenda INNER JOIN Usuario ON Usuario.idUsuario = Agenda.idProfesor INNER JOIN Materia ON Materia.idMateria = Agenda.idMateria 
						WHERE (idCoordinador = $id OR idCoordinador2 = $id or idCoordinador3 = $id) AND CONVERT(FechaAgenda,DATETIME) >= CONVERT('$fechaActual',DATETIME) ORDER BY FechaAgenda ASC");*/
						$consultaAgenda = $conexion->query("SELECT * FROM Agenda INNER JOIN Usuario ON Usuario.idUsuario = Agenda.idProfesor INNER JOIN Materia ON Materia.idMateria = Agenda.idMateria
						WHERE (idCoordinador = $id OR idCoordinador2 = $id or idCoordinador3 = $id) AND CONVERT(FechaAgenda,DATETIME) >= CONVERT('$fechaActual',DATETIME) 
						AND NOT EXISTS (SELECT idCoordinador FROM guiaaplicacion WHERE idCoordinador = $id AND idProfesor = Agenda.idProfesor) ORDER BY FechaAgenda ASC");
						$totalFilas = mysqli_num_rows($consultaAgenda);
						if($totalFilas > 0){
						while ($datosAgenda = $consultaAgenda->fetch_object()) {
					?>
					<div class="card p-1 mb-3 border-start-0 border-dark border-1">
						<div class="card-body d-flex m-0 vh-50 justify-content-center align-items-center">
							<div class="col-4 border-end pe-4 border-secondary">
								<img src="../../Public/<?= $consulta->fotoperfil ?>" class="img-fluid rounded-circle mb-1 lh-1" alt="..."><br>
								<p class="text-secondary fw-bold text-muted">Fecha y hora</p>
								<p class="fs-5 fw-bold">
									<?php echo date("d", strtotime($datosAgenda->FechaAgenda)) ?>
									<?php echo date("M Y", strtotime($datosAgenda->FechaAgenda)) ?>,
									<?php echo date("h:i A", strtotime($datosAgenda->FechaAgenda)) ?><br>
								</p>
							</div>
							<div class="col-8 ps-5">
								<p class="text-secondary fw-bold text-muted">Clase</p>
								<p class="fs-5 fw-bold"><?= $datosAgenda->NombreM ?></p>
								<p class="text-secondary fw-bold text-muted">Profesor</p>
								<p class="fs-5 fw-bold"><?= $datosAgenda->Nombre ?> <?= $datosAgenda->ApellidoP ?> <?= $datosAgenda->ApellidoM ?></p>
								<?php
									$idProfesor = $datosAgenda->idProfesor;
									$sql1 = $conexion->query("SELECT * FROM guiaaplicacion 
									WHERE idProfesor = $idProfesor AND idCoordinador = $id");

									$totalFilas = mysqli_num_rows($sql1);
									if ($totalFilas == 0) {
								?>
									<div class="d-grid gap-2">
										<button class="btn btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#aplicar<?php echo $datosAgenda->idAgenda; ?>">Empezar</button>
										<input type="hidden" value="<?= $datosAgenda->FechaAgenda ?>" id="fecha<?= $datosAgenda->idAgenda ?>" name="" id="">
										<button class="btn btn-outline-dark" id="btnHora<?= $datosAgenda->idAgenda ?>" 
										onclick="tiempo(<?= $datosAgenda->idAgenda ?>)">
										<i class="bi bi-clock-fill"></i></button>
										<span class="badge bg-dark pt-3 pb-3" id="demo<?= $datosAgenda->idAgenda ?>"></span>
										
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php include('modalAplicarGuia.php');
						} 
						}else{ ?>
								<div class="card-body d-block text-center m-5 justify-content-center align-items-center" style="height: 50vh;">
								<p class="fs-5" style="font-family: 'Trebuchet MS', Verdana, sans-serif;">No hay nada que mostrar</p>	
								<img src="../imagenes/empty.png" class="img-fluid" width="300	" alt="...">
									
								</div>
			
						<?php } 
					?>
				</div>
				<!----------------------------------------------- Clases vencidas ---------------------------------------->
				<div class="tab-pane fade col-11 mx-auto col-12 col-lg-11 mx-auto pt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<?php
						// $consultaAgenda = $conexion->query("SELECT * FROM Agenda INNER JOIN Usuario ON Usuario.idUsuario = Agenda.idProfesor INNER JOIN Materia ON Materia.idMateria = Agenda.idMateria 
						// WHERE (idCoordinador = $id OR idCoordinador2 = $id or idCoordinador3 = $id) AND (CONVERT(FechaAgenda,DATETIME) <= CONVERT('$fechaActual',DATETIME) )ORDER BY FechaAgenda ASC");
						$consultaAgenda = $conexion->query("SELECT * FROM Agenda INNER JOIN Usuario ON Usuario.idUsuario = Agenda.idProfesor INNER JOIN Materia ON Materia.idMateria = Agenda.idMateria
						WHERE (idCoordinador = $id OR idCoordinador2 = $id or idCoordinador3 = $id) AND CONVERT(FechaAgenda,DATETIME) <= CONVERT('$fechaActual',DATETIME) 
						AND NOT EXISTS (SELECT idCoordinador FROM guiaaplicacion WHERE idCoordinador = $id AND idProfesor = Agenda.idProfesor) ORDER BY FechaAgenda ASC");
						$totalFilas = mysqli_num_rows($consultaAgenda);
						if($totalFilas > 0){
						while ($datosAgenda = $consultaAgenda->fetch_object()) {
					?>
					<div class="card p-1 mb-3 border-start-0 border-dark border-1">
						<div class="card-body d-flex m-0 vh-50 justify-content-center align-items-center">
							<div class="col-4 border-end pe-4 border-secondary">
								<img src="../../Public/<?= $consulta->fotoperfil ?>" class="img-fluid rounded-circle mb-1 lh-1" alt="..."><br>
								<p class="text-secondary fw-bold text-muted">Fecha y hora</p>
								<p class="fs-5 fw-bold">
									<?php echo date("d", strtotime($datosAgenda->FechaAgenda)) ?>
									<?php echo date("M Y", strtotime($datosAgenda->FechaAgenda)) ?>,
									<?php echo date("h: i A", strtotime($datosAgenda->FechaAgenda)) ?><br>
									<br>
									
								</p>
							</div>
							<div class="col-8 ps-5">
								<p class="text-secondary fw-bold text-muted">Clase</p>
								<p class="fs-5 fw-bold"><?= $datosAgenda->NombreM ?></p>
								<p class="text-secondary fw-bold text-muted">Profesor</p>
								<p class="fs-5 fw-bold"><?= $datosAgenda->Nombre ?> <?= $datosAgenda->ApellidoP ?> <?= $datosAgenda->ApellidoM ?></p>
								<?php
									$idProfesor = $datosAgenda->idProfesor;
									$sql1 = $conexion->query("SELECT * FROM guiaaplicacion 
									WHERE idProfesor = $idProfesor AND idCoordinador = $id");

									$totalFilas = mysqli_num_rows($sql1);
									if ($totalFilas == 0) {
								?>
									<div class="d-grid gap-2">
										<button class="btn btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#aplicar<?php echo $datosAgenda->idAgenda; ?>">Empezar</button>
									</div>
								
								<?php } else { ?>
									<span class="badge rounded-pill bg-success">Profesor(a) evaluado</span>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php include('modalAplicarGuia.php');
						} 
						}else{ ?>
								<div class="card-body d-block text-center m-5 justify-content-center align-items-center" style="height: 50vh;">
								<p class="fs-5" style="font-family: 'Trebuchet MS', Verdana, sans-serif;">No hay nada que mostrar</p>	
								<img src="../imagenes/empty.png" class="img-fluid" width="300	" alt="...">
									
								</div>
			
						<?php } 
					?>
				</div>

					<!----------------------------------------------- Clases evaluadas ---------------------------------------->
					<div class="tab-pane fade col-12 col-lg-11 mx-auto pt-3" id="evaluada" role="tabpanel" aria-labelledby="profile-tab">
					<?php
						// $consultaAgenda = $conexion->query("SELECT * FROM Agenda INNER JOIN Usuario ON Usuario.idUsuario = Agenda.idProfesor INNER JOIN Materia ON Materia.idMateria = Agenda.idMateria 
						// WHERE (idCoordinador = $id OR idCoordinador2 = $id or idCoordinador3 = $id) AND (CONVERT(FechaAgenda,DATETIME) <= CONVERT('$fechaActual',DATETIME) )ORDER BY FechaAgenda ASC");
						$consultaAgenda = $conexion->query("SELECT * FROM Agenda INNER JOIN Usuario ON Usuario.idUsuario = Agenda.idProfesor INNER JOIN Materia ON Materia.idMateria = Agenda.idMateria
						WHERE (idCoordinador = $id OR idCoordinador2 = $id or idCoordinador3 = $id) 
						AND EXISTS (SELECT idCoordinador FROM guiaaplicacion WHERE idCoordinador = $id AND idProfesor = Agenda.idProfesor) ORDER BY FechaAgenda ASC");
						$totalFilas = mysqli_num_rows($consultaAgenda);
						if($totalFilas > 0){
						while ($datosAgenda = $consultaAgenda->fetch_object()) {
						
					?>
					<div class="card p-1 mb-3 border-start-0 border-dark border-1">
						<div class="card-body d-flex m-0 vh-50 justify-content-center align-items-center">
							<div class="col-4 border-end pe-4 border-secondary">
								<img src="../../Public/<?= $consulta->fotoperfil ?>" class="img-fluid rounded-circle mb-1 lh-1" alt="..."><br>
								<p class="text-secondary fw-bold text-muted">Fecha y hora</p>
								<p class="fs-5 fw-bold">
									<?php echo date("d", strtotime($datosAgenda->FechaAgenda)) ?>
									<?php echo date("M Y", strtotime($datosAgenda->FechaAgenda)) ?>,
									<?php echo date("h: i A", strtotime($datosAgenda->FechaAgenda)) ?><br>
									<br>
									
								</p>
							</div>
							<div class="col-8 ps-5">
								<p class="text-secondary fw-bold text-muted">Clase</p>
								<p class="fs-5 fw-bold"><?= $datosAgenda->NombreM ?></p>
								<p class="text-secondary fw-bold text-muted">Profesor</p>
								<p class="fs-5 fw-bold"><?= $datosAgenda->Nombre ?> <?= $datosAgenda->ApellidoP ?> <?= $datosAgenda->ApellidoM ?></p>
								<?php
									$idProfesor = $datosAgenda->idProfesor;
									$sql1 = $conexion->query("SELECT * FROM guiaaplicacion 
									WHERE idProfesor = $idProfesor AND idCoordinador = $id");

									$totalFilas = mysqli_num_rows($sql1);
									if ($totalFilas == 0) {
								?>
									<div class="d-grid gap-2">
										<button class="btn btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#aplicar<?php echo $datosAgenda->idAgenda; ?>">Empezar</button>
									</div>
								
								<?php } else { ?>
									<span class="badge rounded-pill bg-success">Profesor(a) evaluado</span>
								<?php } ?>
							</div>
						</div>
					</div>
						<?php include('modalAplicarGuia.php');
						} 
						}else{ ?>
								<div class="card-body d-block text-center m-5 justify-content-center align-items-center" style="height: 50vh;">
								<p class="fs-5" style="font-family: 'Trebuchet MS', Verdana, sans-serif;">No hay nada que mostrar</p>	
								<img src="../imagenes/empty.png" class="img-fluid" width="300	" alt="...">
									
								</div>
			
						<?php } 
					?>
				</div>
			</div>
			</div>
	</div>

	<script>
		function Vigentes(){
			var vencido = document.getElementById("Vencido");
			var vigente = document.getElementById("Vigente");
			var evaluada = document.getElementById("Evaluadas");
			vencido.classList.remove('border-bottom', 'border-primary', 'border-4');
			evaluada.classList.remove('border-bottom', 'border-primary', 'border-4');
			vigente.classList.add('border-bottom', 'border-primary', 'border-4');
		}
		function Vencidas(){
			var vencido = document.getElementById("Vencido");
			var vigente = document.getElementById("Vigente");
			var evaluada = document.getElementById("Evaluadas");
			vigente.classList.remove('border-bottom', 'border-primary', 'border-4');
			evaluada.classList.remove('border-bottom', 'border-primary', 'border-4');
			vencido.classList.add('border-bottom', 'border-primary', 'border-4');
		}
		function Evaluadas(){
			var vencido = document.getElementById("Vencido");
			var vigente = document.getElementById("Vigente");
			var evaluada = document.getElementById("Evaluadas");
			vigente.classList.remove('border-bottom', 'border-primary', 'border-4');
			vencido.classList.remove('border-bottom', 'border-primary', 'border-4');
			evaluada.classList.add('border-bottom', 'border-primary', 'border-4');
		}
	</script>

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

	<script>

		function tiempo(idAgenda) {

			fecha = document.getElementById("fecha" + idAgenda).value;
			var countDownDate = new Date(fecha).getTime();
			var x = setInterval(function () {
			var now = new Date().getTime();
			var distance = countDownDate - now;

				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				document.getElementById("demo" + idAgenda).innerHTML = "Inicia en " + days + "día " + hours + "hr "
					+ minutes + "min " + seconds + "seg ";
				//document.getElementById("demo" + idAgenda).style.color = "#1CCF00";
				document.getElementById("btnHora" + idAgenda).style.display = "none";
				if (distance < 0) {
					clearInterval(x);
					document.getElementById("demo" + idAgenda).innerHTML = "La clase expiró";
					document.getElementById("demo" + idAgenda).style.color = "red";
				}
			}, 1000);

		}
	</script>



</body>

</html>