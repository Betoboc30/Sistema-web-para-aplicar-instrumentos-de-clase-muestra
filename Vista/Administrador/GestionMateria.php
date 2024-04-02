<?php
 session_start();
    if(!isset($_SESSION['usuario'])){

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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="../estilos/cssadmin.css">
	 <link rel="stylesheet" href="fonts/icomoon/style.css">
</head>
<body>

<?php include_once("menu.php"); ?>

<div class="container-fluid portada mt-5">
  <div class="row justify-content-end pe-3 mt-5">

   <div class="col-7">
      <p class="text-center titulo">Gestión de Materias</p>
    </div>
  </div>
</div>

      <div class="row m-3 mb-1 border bg-light justify-content-center">
      	<p class="text-center fw-bolder fs-5 pt-2">Registro de materias</p>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Nueva materia</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    		
                                        <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#modalMateria">Agregar</a>
                                        <div class="small text-white"><i class="bi bi-caret-right-fill"></i></div>
                                       
                                    </div>
                                </div>
                            </div>
                        
          
           </div>

  	<div class="card m-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
             	Materias registradas
        </div>

        <div class="card-body">
               <table id="datatablesSimple">
              <thead>
                <tr>
						      <th scope="col">Clave</th>
						      <th scope="col">Materia</th>
						      <th scope="col">Tipo de curso</th>
						      <th scope="col">Eje</th>
						      <th scope="col">Total (hrs)</th>
						      <th scope="col">Nivel</th>
						      <th scope="col">Cuatrimestre</th>
						      <th scope="col">Estatus</th>
						      <th scope="col">Academia</th>
						      <th scope="col">Editar/Borrar</th>
					    	</tr>
              </thead>
   
              <tbody>
                 <?php
               
        				$sql = $conexion->query("SELECT * FROM materia INNER JOIN academia ON materia.idAcademia = academia.idAcademia");
					        while ($datos = $sql->fetch_object()) {
					        	 
					        ?>
						    <tr>
						      <td><?= $datos->Clave ?></td>
						      <td><?= $datos->NombreM ?></td>
						      <td><?= $datos->TipoCurso ?></td>
						      <td><?= $datos->Eje ?></td>
						      <td><?= $datos->HorasTotal ?></td>
						      <td><?= $datos->Nivel ?></td>
						      <td><?= $datos->Cuatrimestre ?></td>
						      <td><?= $datos->EstatusM ?></td>
						      <td><?= $datos->NombreAca ?></td>
						     
						      <td><button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $datos->idMateria; ?>"><i class="bi bi-pencil"></i></button>
						  		<button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $datos->idMateria;?>"><i class="bi bi-trash"></i></button></td>
						    </tr>
      
			           <?php 	include('modalEditarMateria.php');
			           				include('modalEliminarMateria.php');
			            }?>
              </tbody>
          </table>
       
         </div>
        </div>


<!-------------------------------- Modal de registro de Materia ------------------------------>
<div class="modal fade" id="modalMateria" tabindex="-1" aria-labelledby="modalApyCi" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de materia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" method="POST" action="../../Controlador/Administrador/registroMateria.php" novalidate>

        		<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Clave de la materia</span>
						  <input type="text" name="clave" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

        		<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Nombre de la materia</span>
						  <input type="text" name="materia" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Tipo de curso</label>
						  <select class="form-select" id="inputGroupSelect01" name="tipocurso" required>
						    <option selected disabled value>Seleccionar...</option>
						    <option value="Obligatorio">Obligatorio</option>
						    <option value="Obtativo">Obtativo</option>
						  </select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Eje</label>
						  <select class="form-select" id="inputGroupSelect01" name="eje" required>
						    <option selected disabled value>Seleccionar...</option>
						    <option value="Ciencias básicas">Ciencias básicas</option>
						    <option value="Ciencias de la ingeniería">Ciencias de la ingeniería</option>
						    <option value="Ingeniería aplicada">Ingeniería aplicada</option>
						    <option value="Diseño de ingeniería">Diseño de ingeniería</option>
						    <option value="Sociales y humanidades">Sociales y humanidades</option>
						    <option value="Economicas y administrativas">Economicas y administrativas</option>
						    <option value="Economicas y administrativas">Economicas y administrativas</option>
						  </select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Total de horas</span>
						  <input type="number" min="1" name="horas" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Nivel</label>
						  <select class="form-select" id="inputGroupSelect01" name="nivel" required>
						    <option selected disabled value>Seleccionar...</option>
						    <option value="1">Introductorio</option>
						    <option value="2">Medio</option>
						    <option value="3">Avanzado</option>
						  </select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Cuatrimestre</span>
						  <input type="number" min="1" max="10" name="cuatrimestre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Estatus</label>
						  <select class="form-select" id="inputGroupSelect01" name="estatus" required>
						    <option selected disabled value>Seleccionar...</option>
						     <option value="1">Activo</option>
                <option value="2">Inactivo</option>
						  </select>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Academia</label>
						  <select class="form-select" id="inputGroupSelect01" name="academia" required>
						    <option selected disabled value>Seleccionar...</option>

						    <?php 
							    	$sql = $conexion->query("SELECT * FROM academia WHERE idAcademia>1");
						        while ($datos = $sql->fetch_object()) { ?>

						    <option value="<?= $datos->idAcademia ?>"><?= $datos->NombreAca ?></option>

						    <?php } ?>

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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>

</body>
</html>