<?php

$id = $_SESSION['usuario'];
$sql = $conexion->query("SELECT * FROM usuario WHERE idUsuario = $id");
$consulta = ($sql->fetch_object());
?>

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
					<a class="nav-link" aria-current="page" href="gestionUsuario.php">Gestión de usuarios</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="gestionGuiaObservacion.php">Gestión de guía de
						observación</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="gestionAcademia.php">Gestión de Academia</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="gestionMateria.php">Gestión de materias</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="gestionEncuesta.php">Gestión de encuestas</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="respaldobd.php">Respaldo de la base de datos</a>
				</li>
			</ul>

			<ul class="navbar-nav me-4 mb-2 mb-lg-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				<?= $consulta->Nombre ?>
					<img src="../../Public/<?= $consulta->fotoperfil ?>" alt="" width="30" class="rounded-circle">
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
					<li><a class="dropdown-item" href="../../Controlador/cerrarSesion.php">Cerrar sesión <i class="bi bi-box-arrow-in-right fs-5 text-danger fw-bold"></i></a></li>
				</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>