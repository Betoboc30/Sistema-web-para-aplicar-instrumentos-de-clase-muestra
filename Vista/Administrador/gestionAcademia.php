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

<?php include_once("menu.php");?>

<div class="container-fluid portada mt-5">
  <div class="row justify-content-end pe-3 mt-5">

   <div class="col-7">
      <p class="text-center titulo">Gestión de Academias</p>
    </div>
  </div>
</div>

      <div class="row m-3 mb-1 border bg-light justify-content-center">
      	<p class="text-center fw-bolder fs-5 pt-2">Registro de academias</p>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Nueva academia</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#modalAcademia">Agregar</a>
                                        <div class="small text-white"><i class="bi bi-caret-right-fill"></i></div>
                                       
                                    </div>
                                </div>
                            </div>
           </div>

  	<div class="card m-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
             	Academias registradas
        </div>

        <div class="card-body">
               <table id="datatablesSimple">
              <thead>
                <tr>
						      <th scope="col">Nombre de la Academia</th>
						      <th scope="col">Clave del programa educativo</th>
						      <th scope="col">Periodo</th>
						      <th scope="col">Editar/Borrar</th>
					    	</tr>
              </thead>
   
              <tbody>
                 <?php
               
        				$sql = $conexion->query("SELECT * FROM academia");
					        while ($datos = $sql->fetch_object()) {
					        	 
					        ?>
						    <tr>
						      <td><?= $datos->NombreAca ?></td>
						      <td><?= $datos->ClavePro ?></td>
						      <td><?= $datos->Periodo ?></td>
						      
						     
						      <td><button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $datos->idAcademia; ?>"><i class="bi bi-pencil"></i></button>
						  		<button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $datos->idAcademia;?>"><i class="bi bi-trash"></i></button></td>
						    </tr>
      
			           <?php include('modalEditarAcademia.php');
			           				include('modalEliminarAcademia.php');
			            }?>
              </tbody>
          </table>
       
         </div>
        </div>


<!-------------------------------- Modal de registro de Academia ------------------------------>
<div class="modal fade" id="modalAcademia" tabindex="-1" aria-labelledby="modalApyCi" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de academia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" method="POST" action="../../Controlador/Administrador/registroAcademia.php" novalidate>

        		<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Nombre de la academia</span>
						  <input type="text" name="academia" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Periodo</label>
						  <select class="form-select" id="inputGroupSelect01" name="periodo" required>
						    <option selected disabled value>Seleccionar...</option>
						    <option value="1">Primavera</option>
						    <option value="2">Otoño</option>
						    <option value="3">Invierno</option>
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