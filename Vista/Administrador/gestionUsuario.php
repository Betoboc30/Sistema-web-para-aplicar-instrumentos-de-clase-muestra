<?php
session_start();
if (!isset($_SESSION['usuario']) && $_SESSION['tipo'] == 'Administrador') {

	header("Location: ../../login.php");
}
include_once("../../Modelo/conexion.php");

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
	<link rel="stylesheet" type="text/css" href="../estilos/cssadmin.css">
	<link rel="stylesheet" href="fonts/icomoon/style.css">
</head>

<body>

	<?php include_once("menu.php"); ?>

	<div class="container-fluid portada mt-5">
		<div class="row justify-content-end pe-3 mt-5">

			<div class="col-7">
				<p class="text-center titulo">Gestión de Usuarios</p>
			</div>


		</div>
	</div>

	<div class="row m-3 mb-1 border bg-light justify-content-center">
		<p class="text-center fw-bolder fs-5 pt-2">Registro de usuarios</p>
		<div class="col-xl-4 col-md-6">
			<div class="card bg-danger text-white mb-4">
				<div class="card-body">Administrador</div>
				<div class="card-footer d-flex align-items-center justify-content-between">

					<a class="small text-white stretched-link" href="#" data-bs-toggle="modal"
						data-bs-target="#modalAdministrador">Agregar</a>
					<div class="small text-white"><i class="bi bi-caret-right-fill"></i></div>

				</div>
			</div>
		</div>

		<div class="col-xl-4 col-md-6">
			<div class="card bg-success text-white mb-4">
				<div class="card-body">Coordinador</div>
				<div class="card-footer d-flex align-items-center justify-content-between">

					<a class="small text-white stretched-link" href="#" data-bs-toggle="modal"
						data-bs-target="#modalCoordinador">Agregar</a>
					<div class="small text-white"><i class="bi bi-caret-right-fill"></i></div>

				</div>
			</div>
		</div>
		<div class="col-xl-4 col-md-6">
			<div class="card bg-info text-white mb-4">
				<div class="card-body">Profesor</div>
				<div class="card-footer d-flex align-items-center justify-content-between">

					<a class="small text-white stretched-link" href="#" data-bs-toggle="modal"
						data-bs-target="#modalProfesor">Agregar</a>
					<div class="small text-white"><i class="bi bi-caret-right-fill"></i></div>

				</div>
			</div>
		</div>

	</div>

	<div class="card m-3">
		<div class="card-header">
			<i class="fas fa-table me-1"></i>
			Usuarios registrados
		</div>

		<div class="card-body">
			<table id="datatablesSimple">
				<thead>
					<tr>
						<th scope="col">Nombre</th>
						<th scope="col">Apellidos</th>
						<th scope="col">Fec. Nacimiento</th>
						<th scope="col">Gdo. Académico</th>
						<th scope="col">P. Edu</th>
						<th scope="col">Correo</th>
						<th scope="col">Cargo</th>
						<th scope="col">Academia</th>
						<th scope="col">Periodo</th>
						<th scope="col">Tipo</th>
						<th scope="col">Editar/Borrar</th>
					</tr>
				</thead>

				<tbody>
					<?php

					$sql = $conexion->query("SELECT * FROM usuario INNER JOIN Academia ON usuario.idAcademia=academia.idAcademia");
					while ($datos = $sql->fetch_object()) {
						?>
						<tr>
							<td>
								<?= $datos->Nombre ?>
							</td>
							<td>
								<?= $datos->ApellidoP ?>
								<?= $datos->ApellidoM ?>
							</td>
							<td>
								<?= $datos->FechaNac ?>
							</td>
							<td>
								<?= $datos->GradoA ?>
							</td>
							<td>
								<?= $datos->ProgramaE ?>
							</td>
							<td>
								<?= $datos->Correo ?>
							</td>
							<td>
								<?= $datos->Cargo ?>
							</td>
							<td>
								<?= $datos->NombreAca ?>
							</td>
							<td>
								<?= $datos->Periodo ?>
							</td>
							<td>
								<?= $datos->TipoUsuario ?>
							</td>

							<td><button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
									data-bs-target="#edit<?php echo $datos->idUsuario; ?>"><i
										class="bi bi-pencil"></i></button>
								<button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
									data-bs-target="#delete<?php echo $datos->idUsuario; ?>"><i
										class="bi bi-trash"></i></button></a>
							</td>
						</tr>

						<?php include('modalEditarUsuario.php');
						include('modalEliminarUsuario.php');
					} ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-------------------------------- Modal de registro de Administrador --------------------------------->
	<div class="modal fade" id="modalAdministrador" tabindex="-1" aria-labelledby="modalAdmin" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nuevo administrador</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form class="row g-3 needs-validation" method="POST"
						action="../../Controlador/Administrador/RegistroUsuario.php" novalidate>

						<input type="hidden" class="form-control" value="1" name="tipo" id="validationCustomUsername"
							aria-describedby="inputGroupPrepend" required>

						<div class="input-group input-group-sm mb-3 has-validation">
							<span class="input-group-text" id="inputGroup-sizing-sm">Nombre completo</span>
							<input type="text" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" placeholder="Nombre" name="nombre" required>
							<input type="text" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" placeholder="Ap. Paterno" name="paterno"
								required>
							<input type="text" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" placeholder="Ap. Materno" name="materno">
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
							<input type="date" name="nacimiento" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupSelect01">Grado académico</label>
							<select class="form-select" id="inputGroupSelect01" name="grado" required>
								<option selected disabled value>Seleccionar...</option>
								<option value="1">Licenciatura</option>
								<option value="2">Maestría</option>
								<option value="3">Doctorado</option>
							</select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<span class="input-group-text" id="inputGroup-sizing-sm">Programa educativo</span>
							<input type="text" value="ITI" class="form-control" name="programa"
								aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly
								required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<span class="input-group-text" id="inputGroup-sizing-sm">Correo electrónico</span>
							<input type="email" name="correo" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="g-3">
							<div class="input-group input-group-sm has-validation">
								<span class="input-group-text" id="inputGroup-sizing-sm">Contraseña</span>
								<input type="password" name="contra" class="form-control" aria-label="Sizing example input"
									aria-describedby="inputGroup-sizing-sm" id="passNueva" onkeyup="compararContra();" required>
									<span class="input-group-text border-primary bg-white data-bs-toggle="tooltip" data-bs-placement="right" 
title="Tu contraseña debe contener: 
 • Mínimo 8 caracteres
 • Una mayúscula
 • Una minúscula
 • Un múmero
 • Un carácter especial"><i class="bi bi-question-circle text-primary"></i></span>
 
							</div>
						
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" id="progressbar" role="progressbar" style="width: 0%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

                            </div>
						</div>

						<div class="g-3">
                            <div class="input-group input-group-sm has-validation">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Confirma tu contraseña
                                    nueva</span>
                                <input type="password" id="passConfirm" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                    onkeyup="compararContra();" required disabled>
                            </div>
                            <label for="" id="Mensaje"></label>
                        </div>

						<input type="hidden" class="form-control" value="1" name="academia"
							id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" id="enviar" type="submit">Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!------------------------------------- Modal de registro de Coordinador -------------------------->
	<div class="modal fade" id="modalCoordinador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nuevo coordinador</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form class="row g-3 needs-validation" method="POST"
						action="../../Controlador/Administrador/RegistroUsuario.php" enctype="multipart/form-data"
						novalidate>

						<input type="hidden" class="form-control" value="2" name="tipo" id="validationCustomUsername"
							aria-describedby="inputGroupPrepend" required>

						<div class="input-group input-group-sm mb-3 has-validation">
							<span class="input-group-text" id="inputGroup-sizing-sm">Nombre completo</span>
							<input type="text" name="nombre" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" placeholder="Nombre" required>
							<input type="text" name="paterno" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" placeholder="Ap. Paterno" required>
							<input type="text" name="materno" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" placeholder="Ap. Materno">
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
							<input type="date" name="nacimiento" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupSelect01">Grado académico</label>
							<select class="form-select" name="grado" id="inputGroupSelect01" required>
								<option selected disabled value>Seleccionar...</option>
								<option value="1">Licenciatura</option>
								<option value="2">Maestría</option>
								<option value="3">Doctorado</option>
							</select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<span class="input-group-text" id="inputGroup-sizing-sm">Programa educativo</span>
							<input type="text" value="ITI" name="programa" class="form-control"
								aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" readonly
								required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<span class="input-group-text" id="inputGroup-sizing-sm">Correo electrónico</span>
							<input type="email" name="correo" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="g-3">
							<div class="input-group input-group-sm has-validation">
								<span class="input-group-text" id="inputGroup-sizing-sm">Contraseña</span>
								<input type="password" name="contra" class="form-control" aria-label="Sizing example input"
									aria-describedby="inputGroup-sizing-sm" id="passNueva2" onkeyup="compararContra2();" required>
									<span class="input-group-text border-primary bg-white data-bs-toggle="tooltip" data-bs-placement="right" 
title="Tu contraseña debe contener: 
 • Mínimo 8 caracteres
 • Una mayúscula
 • Una minúscula
 • Un múmero
 • Un carácter especial"><i class="bi bi-question-circle text-primary"></i></span>
							</div>
						
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" id="progressbar2" role="progressbar" style="width: 0%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

                            </div>
						</div>

						<div class="g-3">
                            <div class="input-group input-group-sm has-validation">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Confirma tu contraseña
                                    nueva</span>
                                <input type="password" id="passConfirm2" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                    onkeyup="compararContra2();" required disabled>
                            </div>
                            <label id="Mensaje2"></label>
                        </div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupSelect01">Cargo</label>
							<select class="form-select" name="cargo" id="inputGroupSelect01" required>
								<option selected disabled value>Seleccionar...</option>
								<option value="1">Profesor de tiempo completo</option>
								<option value="2">Profesor</option>
							</select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupSelect01">Academia</label>
							<select class="form-select" id="inputGroupSelect01" name="academia" required>
								<option selected disabled value>Seleccionar...</option>
								<?php
								$sql = $conexion->query("SELECT * FROM Academia WHERE idAcademia>1");
								while ($datos = $sql->fetch_object()) {
									?>
									<option value="<?= $datos->idAcademia ?>">
										<?= $datos->NombreAca ?>
									</option>
								<?php } ?>
							</select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupFile01">Subir firma</label>
							<input type="file" name="firma" id="firma" class="form-control"
								aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" id="enviar2" type="submit">Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!------------------------------------- Modal de registro de Profesor ---------------------------------->
	<div class="modal fade" id="modalProfesor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Nuevo profesor</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form class="row g-3 needs-validation" method="POST"
						action="../../Controlador/Administrador/RegistroUsuario.php" enctype="multipart/form-data"
						novalidate>

						<input type="hidden" class="form-control" value="3" name="tipo" id="validationCustomUsername"
							aria-describedby="inputGroupPrepend" required>
						<div class="input-group input-group-sm mb-3 has-validation">
							<span class="input-group-text" id="inputGroup-sizing-sm">Nombre completo</span>
							<input type="text" name="nombre" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" placeholder="Nombre" required>
							<input type="text" name="paterno" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" placeholder="Ap. Paterno" required>
							<input type="text" name="materno" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" placeholder="Ap. Materno">
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
							<input type="date" name="nacimiento" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupSelect01">Grado académico</label>
							<select class="form-select" name="grado" id="inputGroupSelect01" required>
								<option selected disabled value>Seleccionar...</option>
								<option value="1">Licenciatura</option>
								<option value="2">Maestría</option>
								<option value="3">Doctorado</option>
							</select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<span class="input-group-text" id="inputGroup-sizing-sm">Programa educativo</span>
							<input type="text" value="ITI" name="programa" class="form-control"
								aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required
								readonly>
						</div>



						<div class="input-group input-group-sm mb-3 has-validation">
							<span class="input-group-text" id="inputGroup-sizing-sm">Correo electrónico</span>
							<input type="email" name="correo" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" required>
						</div>


						<div class="g-3">
							<div class="input-group input-group-sm has-validation">
								<span class="input-group-text" id="inputGroup-sizing-sm">Contraseña</span>
								<input type="password" name="contra" class="form-control" aria-label="Sizing example input"
									aria-describedby="inputGroup-sizing-sm" id="passNueva3" onkeyup="compararContra3();" required>
									<span class="input-group-text border-primary bg-white data-bs-toggle="tooltip" data-bs-placement="right" 
title="Tu contraseña debe contener: 
 • Mínimo 8 caracteres
 • Una mayúscula
 • Una minúscula
 • Un múmero
 • Un carácter especial"><i class="bi bi-question-circle text-primary"></i></span>
									
							</div>
						
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" id="progressbar3" role="progressbar" style="width: 0%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

                            </div>
						</div>

						<div class="g-3">
                            <div class="input-group input-group-sm has-validation">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Confirma tu contraseña
                                    nueva</span>
                                <input type="password" id="passConfirm3" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                    onkeyup="compararContra3();" required disabled>
                            </div>
                            <label for="" id="Mensaje3"></label>
                        </div>

						<input type="hidden" class="form-control" value="1" name="academia"
							id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupFile01">Subir firma</label>
							<input type="file" name="firma" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-sm" required>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button class="btn btn-primary" id="enviar3" type="submit">Registrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script>
		var myModal = document.getElementById('myModal')
		var myInput = document.getElementById('myInput')

		myModal.addEventListener('shown.bs.modal', function () {
			myInput.focus()
		})

	</script>

<script>
        $('#passNueva').keyup(function (e) {
            var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
            var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
            var enoughRegex = new RegExp("(?=.{6,}).*", "g");
            var confirmar = $('#passNueva').val();
            var nueva = $('#passConfirm').val();

            if (false == enoughRegex.test($(this).val())) {
                $("#progressbar").width('5%');
                $("#progressbar").css('background', 'red');
                $("#enviar").prop('disabled', true);
                $('#passConfirm').prop('disabled', true);

            } else if (strongRegex.test($(this).val())) {
                $("#progressbar").width('100%');
                $("#progressbar").css('background', '#2ECC71');
                $('#passConfirm').prop('disabled', false);
                $("#enviar").prop('disabled', false);

                if (nueva != "" && confirmar != "") {
                    if (nueva == confirmar) {
                        $("#enviar").prop('disabled', false);
                    } else {
                        $("#enviar").prop('disabled', true);
                    }

                } else {
                    $("#enviar").prop('disabled', true);
                }

            } else if (mediumRegex.test($(this).val())) {
                $("#progressbar").width('75%');
                $("#progressbar").css('background', 'yellow');
                $("#enviar").prop('disabled', true);
                $('#passConfirm').prop('disabled', true);


            } else {
                $("#progressbar").width('25%');
                $("#progressbar").css('background', 'orange');
                $("#enviar").prop('disabled', true);
                $('#passConfirm').prop('disabled', true);
            }
            return true;
        });
    </script>

    <script>
        function compararContra() {

            var confirmar = $('#passNueva').val();
            var nueva = $('#passConfirm').val();

            if (nueva != "" && confirmar != "") {

                if (nueva == confirmar) {
                    $("#Mensaje").html("Las contraseñas coinciden");
                    $("#passConfirm").removeClass("is-invalid");
                    $("#passConfirm").addClass("is-valid");
                    $("#enviar").prop('disabled', false);
                } else {
                    $("#Mensaje").html("Las contraseñas no coinciden");
                    $("#passConfirm").addClass("is-invalid");
                    $("#enviar").prop('disabled', true);

                }

            } else {
                $("#Mensaje").html("La contraseña no puede estar vacía");
                $("#passConfirm").addClass("is-invalid");
                $("#enviar").prop('disabled', true);
            }

        }
    </script>

<script>
        $('#passNueva2').keyup(function (e) {
            var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
            var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
            var enoughRegex = new RegExp("(?=.{6,}).*", "g");
            var confirmar = $('#passNueva2').val();
            var nueva = $('#passConfirm2').val();

            if (false == enoughRegex.test($(this).val())) {
                $("#progressbar2").width('5%');
                $("#progressbar2").css('background', 'red');
                $("#enviar2").prop('disabled', true);
                $('#passConfirm2').prop('disabled', true);

            } else if (strongRegex.test($(this).val())) {
                $("#progressbar2").width('100%');
                $("#progressbar2").css('background', '#2ECC71');
                $('#passConfirm2').prop('disabled', false);
                $("#enviar2").prop('disabled', false);

                if (nueva != "" && confirmar != "") {
                    if (nueva == confirmar) {
                        $("#enviar2").prop('disabled', false);
                    } else {
                        $("#enviar2").prop('disabled', true);
                    }

                } else {
                    $("#enviar2").prop('disabled', true);
                }

            } else if (mediumRegex.test($(this).val())) {
                $("#progressbar2").width('75%');
                $("#progressbar2").css('background', 'yellow');
                $("#enviar2").prop('disabled', true);
                $('#passConfirm2').prop('disabled', true);


            } else {
                $("#progressbar2").width('25%');
                $("#progressbar2").css('background', 'orange');
                $("#enviar2").prop('disabled', true);
                $('#passConfirm2').prop('disabled', true);
            }
            return true;
        });
    </script>

    <script>
        function compararContra2() {

            var confirmar = $('#passNueva2').val();
            var nueva = $('#passConfirm2').val();

            if (nueva != "" && confirmar != "") {

                if (nueva == confirmar) {
                    $("#Mensaje2").html("Las contraseñas coinciden");
                    $("#passConfirm2").removeClass("is-invalid");
                    $("#passConfirm2").addClass("is-valid");
                    $("#enviar2").prop('disabled', false);
                } else {
                    $("#Mensaje2").html("Las contraseñas no coinciden");
                    $("#passConfirm2").addClass("is-invalid");
                    $("#enviar2").prop('disabled', true);

                }

            } else {
                $("#Mensaje2").html("La contraseña no puede estar vacía");
                $("#passConfirm2").addClass("is-invalid");
                $("#enviar2").prop('disabled', true);
            }

        }
    </script>

<script>
        $('#passNueva3').keyup(function (e) {
            var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
            var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
            var enoughRegex = new RegExp("(?=.{6,}).*", "g");
            var confirmar = $('#passNueva3').val();
            var nueva = $('#passConfirm3').val();

            if (false == enoughRegex.test($(this).val())) {
                $("#progressbar3").width('5%');
                $("#progressbar3").css('background', 'red');
                $("#enviar3").prop('disabled', true);
                $('#passConfirm3').prop('disabled', true);

            } else if (strongRegex.test($(this).val())) {
                $("#progressbar3").width('100%');
                $("#progressbar3").css('background', '#2ECC71');
                $('#passConfirm3').prop('disabled', false);
                $("#enviar3").prop('disabled', false);

                if (nueva != "" && confirmar != "") {
                    if (nueva == confirmar) {
                        $("#enviar3").prop('disabled', false);
                    } else {
                        $("#enviar3").prop('disabled', true);
                    }

                } else {
                    $("#enviar3").prop('disabled', true);
                }

            } else if (mediumRegex.test($(this).val())) {
                $("#progressbar3").width('75%');
                $("#progressbar3").css('background', 'yellow');
                $("#enviar3").prop('disabled', true);
                $('#passConfirm3').prop('disabled', true);


            } else {
                $("#progressbar3").width('25%');
                $("#progressbar3").css('background', 'orange');
                $("#enviar3").prop('disabled', true);
                $('#passConfirm3').prop('disabled', true);
            }
            return true;
        });
    </script>

    <script>
        function compararContra3() {

            var confirmar = $('#passNueva3').val();
            var nueva = $('#passConfirm3').val();

            if (nueva != "" && confirmar != "") {

                if (nueva == confirmar) {
                    $("#Mensaje3").html("Las contraseñas coinciden");
                    $("#passConfirm3").removeClass("is-invalid");
                    $("#passConfirm3").addClass("is-valid");
                    $("#enviar3").prop('disabled', false);
                } else {
                    $("#Mensaje3").html("Las contraseñas no coinciden");
                    $("#passConfirm3").addClass("is-invalid");
                    $("#enviar3").prop('disabled', true);

                }

            } else {
                $("#Mensaje3").html("La contraseña no puede estar vacía");
                $("#passConfirm3").addClass("is-invalid");
                $("#enviar3").prop('disabled', true);
            }

        }
    </script>


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

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
	<script src="assets/demo/chart-area-demo.js"></script>
	<script src="assets/demo/chart-bar-demo.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
		crossorigin="anonymous"></script>
	<script src="../js/datatables-simple-demo.js"></script>

</body>

</html>