<?php
	include_once("../../Modelo/conexion.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inicio</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/c8d70e4cd4.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../estilos/cssadmin.css">
</head>
<body>

<header >
	<div class="row justify-content-between">
		<div class="col-9">
	 <p class="text-center titulo">Gestión de usuarios</p>
</div>
	 
		<div class="col-3">
    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdministrador">Administrador</button>
		<button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalCoordinador">Coordinador</button>
		<button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalProfesor">Profesor</button> 
    
  </div>
</div>
</header>

<div class="container-fluid fixed-top bg-transparent pt-4">
	<ul class="nav">
		<li class="nav-item">
				<i class="bi bi-text-left" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"></i>
		</li> 
	</ul>
</div>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
  	<div class="position-absolute top-0 start-100 translate-middle mt-3 ms-2">
  		<i class="bi bi-x-square-fill" data-bs-dismiss="offcanvas"></i>
  	</div>
  	
    <div class="card bg-dark text-white">
					  <img src="../imagenes/portada.jpg" class="card-img" alt="...">
					  <div class="card-img-overlay text-center">
					  	<h5 class="card-title text-center">¡Buenas noches!</h5>
					  	<img src="../imagenes/perfil.jpeg" width="100px" class="rounded-circle">
					    <h5 class="card-title text-center">Alberto Gutiérrez</h5>
					    
					  </div>
					</div>
  </div>
  <div class="offcanvas-body">
   <ul class="nav flex-column">
 <li class="nav-item">
			<a class="nav-link active" aria-current="page" href="#">Gestión de usuarios</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" aria-current="page" href="#">Gestión de guía de observación</a>
		</li>

		<li class="nav-item">
				<a class="nav-link" aria-current="page" href="#">Gestión de coordinadores</a>
		</li>

		<li class="nav-item">
				<a class="nav-link" aria-current="page" href="#">Gestión de materias</a>
		</li>

		<li class="nav-item">
				<a class="nav-link" aria-current="page" href="#">Gestión de encuestas</a>
		</li>

		<li class="nav-item">
				<a class="nav-link" aria-current="page" href="#">Respaldo de la base de datos</a>
		</li> 	
</ul>
  </div>
</div>

<div class="container-fluid d-flex">


<div class="col-9 ms-3 mt-2 ms-auto listaUsuarios">
	<div class="col-6 pt-1 pb-1 ms-auto">
		
		<div class="input-group ">
		  
		  <input type="text" class="form-control ms-5" placeholder="Buscar usuarios" aria-label="Texto de ejemplo con complemento de botón" aria-describedby="button-addon1">
		  <button class="btn btn-outline-secondary me-5 bi bi-search" type="button" id="button-addon1"></button>
		</div>
	</div>

	
<div class="table-responsive">
	<table class="table table-light table-striped caption-top">
		<caption>Lista de usuarios</caption>
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Fec. Nacimiento</th>
      <th scope="col">Gdo. Académico</th>
      <th scope="col">P. Edu</th>
      <th scope="col">Correo</th>
      <th scope="col">Materia</th>
      <th scope="col">Cargo</th>
      <th scope="col">Tipo</th>
      <th scope="col">Academia</th>
      <th scope="col">Editar/Eliminar</th>
    </tr>
  </thead>
  <tbody>
  	 <?php

        $sql = $conexion->query("SELECT * FROM usuario INNER JOIN Academia ON usuario.idAcademia=academia.idAcademia INNER JOIN Materia ON usuario.idMateria=materia.idMateria");

        while ($datos = $sql->fetch_object()) {
        ?>
    <tr>
      <td><?= $datos->Nombre ?></td>
      <td><?= $datos->ApellidoP ?> <?= $datos->ApellidoM ?></td>
      <td><?= $datos->FechaNac ?></td>
      <td><?= $datos->GradoA ?></td>
      <td><?= $datos->ProgramaE ?></td>
      <td><?= $datos->Correo ?></td>
      <td><?= $datos->NombreM ?></td>
      <td><?= $datos->Cargo ?></td>
      <td><?= $datos->TipoUsuario ?></td>
      <td><?= $datos->NombreAca ?></td>
      <td><button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $datos->idUsuario; ?>"><i class="bi bi-pencil"></i></button>
  		<a href="gestionusuarios.php?id=<?= $datos->idUsuario ?>"><button type="button" class="btn btn-small btn-outline-danger fa-solid fa-user-xmark" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="return eliminarUsuario()"></button></a></td>
    </tr>
      
           <?php include('modalEditarUsuario.php') ?>
        <?php } ?>
  </tbody>
</table>
</div>
</div>
</div>

<!-- Modal de registro de Administrador-->
<div class="modal fade" id="modalAdministrador" tabindex="-1" aria-labelledby="modalAdmin" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo administrador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" method="POST" action="../../Controlador/Administrador/RegistroUsuario.php" novalidate>

        	<input type="hidden" class="form-control" value="1" name="tipo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

        		<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Nombre completo</span>
						  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nombre" name="nombre" required>
						  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ap. Paterno" name="paterno" required>
						  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ap. Materno" name="materno" required>
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
						  <input type="text" class="form-control" name="programa" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
						  <input type="date" name="nacimiento" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Correo electrónico</span>
						  <input type="email" name="correo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Contraseña</span>
						  <input type="password" name="contra" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Academia</label>
						  <select class="form-select" id="inputGroupSelect01" name="materia" required>
						  	<option selected disabled value>Seleccionar...</option>
						  	<?php
	        				$sql = $conexion->query("SELECT * FROM Materia");
					        while ($datos = $sql->fetch_object()) {
				        ?>
						    
						    <option value="<?= $datos->idMateria ?>"><?= $datos->NombreM ?></option>
						    <?php }?>
						  </select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Academia</label>
						  <select class="form-select" id="inputGroupSelect01" name="academia" required>
						  	<option selected disabled value>Seleccionar...</option>
						  	<?php
	        				$sql = $conexion->query("SELECT * FROM Academia");
					        while ($datos = $sql->fetch_object()) {
				        ?>
						    
						    <option value="<?= $datos->idAcademia ?>"><?= $datos->NombreAca ?></option>
						    <?php }?>
						  </select>
						</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="submit">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal de registro de Coordinador-->
<div class="modal fade" id="modalCoordinador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo coordinador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" method="POST" action="../../Controlador/Administrador/RegistroUsuario.php" enctype="multipart/form-data" novalidate>

        	<input type="hidden" class="form-control" value="2" name="tipo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

        		<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Nombre completo</span>
						  <input type="text" name="nombre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nombre" required>
						  <input type="text" name="paterno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ap. Paterno" required>
						  <input type="text" name="materno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ap. Materno" required>
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
						  <input type="text" name="programa" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Cargo</label>
						  <select class="form-select" name="cargo" id="inputGroupSelect01" required>
						    <option selected disabled value>Seleccionar...</option>
						    <option value="1">Licenciatura</option>
						    <option value="2">Maestría</option>
						    <option value="3">Doctorado</option>
						  </select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
						  <input type="date" name="nacimiento" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Correo electrónico</span>
						  <input type="email" name="correo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Contraseña</span>
						  <input type="password" name="contra" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Academia</label>
						  <select class="form-select" id="inputGroupSelect01" name="materia" required>
						  	<option selected disabled value>Seleccionar...</option>
						  	<?php
	        				$sql = $conexion->query("SELECT * FROM Materia");
					        while ($datos = $sql->fetch_object()) {
				        ?>
						    
						    <option value="<?= $datos->idMateria ?>"><?= $datos->NombreM ?></option>
						    <?php }?>
						  </select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Academia</label>
						  <select class="form-select" id="inputGroupSelect01" name="academia" required>
						  	<option selected disabled value>Seleccionar...</option>
						  	<?php
	        				$sql = $conexion->query("SELECT * FROM Academia");
					        while ($datos = $sql->fetch_object()) {
				        ?>
						    
						    <option value="<?= $datos->idAcademia ?>"><?= $datos->NombreAca ?></option>
						    <?php }?>
						  </select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupFile01">Subir firma</label>
  						<input type="file" name="firma" id="firma" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="submit">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal de registro de Profesor-->
<div class="modal fade" id="modalProfesor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo profesor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" method="POST" action="../../Controlador/Administrador/RegistroUsuario.php" enctype="multipart/form-data" novalidate>

        	<input type="hidden" class="form-control" value="3" name="tipo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
        		<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Nombre completo</span>
						  <input type="text" name="nombre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nombre" required>
						  <input type="text" name="paterno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ap. Paterno" required>
						  <input type="text" name="materno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ap. Materno" required>
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
						  <input type="text" name="programa" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
						  <input type="date" name="nacimiento" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Correo electrónico</span>
						  <input type="email" name="correo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Contraseña</span>
						  <input type="password" name="contra" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Materia</label>
						  <select class="form-select" id="inputGroupSelect01" name="materia" required>
						  	<option selected disabled value>Seleccionar...</option>
						  	<?php
	        				$sql = $conexion->query("SELECT * FROM Materia");
					        while ($datos = $sql->fetch_object()) {
				        ?>
						    
						    <option value="<?= $datos->idMateria ?>"><?= $datos->NombreM ?></option>
						    <?php }?>
						  </select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Academia</label>
						  <select class="form-select" id="inputGroupSelect01" name="academia" required>
						  	<option selected disabled value>Seleccionar...</option>
						  	<?php
	        				$sql = $conexion->query("SELECT * FROM Academia");
					        while ($datos = $sql->fetch_object()) {
				        ?>
						    
						    <option value="<?= $datos->idAcademia ?>"><?= $datos->NombreAca ?></option>
						    <?php }?>
						  </select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupFile01">Subir firma</label>
  						<input type="file" name="firma" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="submit">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<script>
		var myModal = document.getElementById('myModal')
		var myInput = document.getElementById('myInput')

		myModal.addEventListener('shown.bs.modal', function () {
		  myInput.focus()
		})
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

</body>
</html>