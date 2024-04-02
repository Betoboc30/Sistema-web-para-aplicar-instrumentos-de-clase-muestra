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

<?php include_once("menu.php");

			$i=0;
      $sub= array ();
  		$sql = $conexion->query("SELECT * FROM guiaobservacion");
				while ($datos = $sql->fetch_object()) {

					$sub[$i]=((float)$datos->Porcentaje);
					$i++;
					
				}
					$total = array_sum($sub);
				?>


 		

<div class="container-fluid portada mt-5">
  <div class="row justify-content-end pe-3 mt-5">

    <div class="col-12">
      <p class="text-center titulo">Gestión de guía de observación</p>
    </div>
   
  </div>
</div>

      <div class="row m-3 mb-1 border bg-light">
      	<p class="text-center fw-bolder fs-5 pt-2">Registro de rubros</p>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Apertura y cierre</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    		<?php if($total<100){ ?>
                                        <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#modalApyCi">Agregar</a>
                                        <div class="small text-white"><i class="bi bi-caret-right-fill"></i></div>
                                        <?php }else{ ?>
                                        		<a class="small text-white" style="text-decoration: none;">No puedes agregar más rubros</a>
                                        		<div class=" text-withe"><i class="bi bi-exclamation-circle "></i></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Participación</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php if($total<100){ ?>
                                        <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#modalParticipacion">Agregar</a>
                                        <div class="small text-white"><i class="bi bi-caret-right-fill"></i></div>
                                        <?php }else{ ?>
                                        		<a class="small text-white" style="text-decoration: none;">No puedes agregar más rubros</a>
                                        		<div class=" text-withe"><i class="bi bi-exclamation-circle "></i></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Técnica</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php if($total<100){ ?>
                                        <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#modalTecnica">Agregar</a>
                                        <div class="small text-white"><i class="bi bi-caret-right-fill"></i></div>
                                        <?php }else{ ?>
                                        		<a class="small text-white" style="text-decoration: none;">No puedes agregar más rubros</a>
                                        		<div class=" text-white"><i class="bi bi-exclamation-circle "></i></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Desempeño</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php if($total<100){ ?>
                                        <a class="small text-white stretched-link" href="#" data-bs-toggle="modal" data-bs-target="#modalDesemp">Agregar</a>
                                        <div class="small text-white"><i class="bi bi-caret-right-fill"></i></div>
                                        <?php }else{ ?>
                                        		<a class="small text-white" style="text-decoration: none;">No puedes agregar más rubros</a>
                                        		<div class=" text-white"><i class="bi bi-exclamation-circle "></i></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
             <p class="text-center fw-bold"><?= $total ?>% completado</p>
						<div class="progress mb-2" style="height: 5px;">
	  					<div class="progress-bar" role="progressbar" style="width: <?= $total ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
	  					</div>
						</div>
           </div>

  	<div class="card m-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
             	Rubros registrados
        </div>

        <div class="card-body">
            <table id="datatablesSimple">
              <thead>
                <tr>
						      <th scope="col">Rubro</th>
						      <th scope="col">Fecha de Registro</th>
						      <th scope="col">Tipo de rubro</th>
						      <th scope="col">Porcentaje</th>
						      <th scope="col">Editar/Borrar</th>

					    	</tr>
              </thead>
   
              <tbody>
                <?php
               
                $sub= array ();
        				$sql = $conexion->query("SELECT * FROM guiaobservacion");
					        while ($datos = $sql->fetch_object()) {
					        	 
					        ?>
						    <tr>
						      <td><?= $datos->Rubro ?></td>
						      <td><?= $datos->FechaGuia ?></td>
						      <td><?= $datos->TipoRubro ?></td>
						      <td><?= $datos->Porcentaje ?> %</td>
						     
						      <td><button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $datos->idGuiaObservacion; ?>"><i class="bi bi-pencil"></i></button>
						  		<button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $datos->idGuiaObservacion;?>"><i class="bi bi-trash"></i></button></td>
						    </tr>
      
			           <?php include('modalEditarGuia.php');
			           				include('modalEliminarGuia.php');
			            }?>
			            <tr>
							      <td></td>
							      <td></td>
							      <td scope="fw-bold" class="">Total:</td>
							      <td><?= $total ?>%</td>
							    </tr>

              </tbody>

          </table>
       
         </div>
        </div>

<!-------------------------------- Modal de registro de rubro Apertura y C ------------------------------>
<div class="modal fade" id="modalApyCi" tabindex="-1" aria-labelledby="modalApyCi" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar rubro de apertura o cierre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" method="POST" action="../../Controlador/Administrador/RegistroGuiaObservacion.php" novalidate>

        	<input type="hidden" class="form-control" value="1" name="tipo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

        		<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Rubro</span>
						 <textarea class="form-control" id="validationTextarea" name="rubro" required></textarea>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Porcentaje</label>
						  <select class="form-select" id="inputGroupSelect01" name="porcentaje" required>
						    <option selected disabled value>Seleccionar...</option>
						    <option value="2.5">2.5%</option>
						    <option value="5">5%</option>
						    <option value="10">10%</option>
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

<!--------------------------------- Modal de registro de Rubro Participación -------------------------->
<div class="modal fade" id="modalParticipacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar rubro de Participación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form class="row g-3 needs-validation" method="POST" action="../../Controlador/Administrador/RegistroGuiaObservacion.php" novalidate>

            	<input type="hidden" class="form-control" value="2" name="tipo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

        		<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Rubro</span>
						 <textarea class="form-control" id="validationTextarea" name="rubro" required></textarea>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Porcentaje</label>
						  <select class="form-select" id="inputGroupSelect01" name="porcentaje" required>
						    <option selected disabled value>Seleccionar...</option>
						    <option value="2.5">2.5%</option>
						    <option value="5">5%</option>
						    <option value="10">10%</option>
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

<!------------------------------------- Modal de registro de Tecnica---------------------------------->
<div class="modal fade" id="modalTecnica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar rubro de técnica</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form class="row g-3 needs-validation" method="POST" action="../../Controlador/Administrador/RegistroGuiaObservacion.php" novalidate>

        	
            	<input type="hidden" class="form-control" value="3" name="tipo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

        		<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Rubro</span>
						 <textarea class="form-control" id="validationTextarea" name="rubro" required></textarea>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Porcentaje</label>
						  <select class="form-select" id="inputGroupSelect01" name="porcentaje" required>
						    <option selected disabled value>Seleccionar...</option>
						    <option value="2.5">2.5%</option>
						    <option value="5">5%</option>
						    <option value="10">10%</option>
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

<!------------------------------------- Modal de registro de Desempeño---------------------------------->
<div class="modal fade" id="modalDesemp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar rubro de desempeño</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" method="POST" action="../../Controlador/Administrador/RegistroGuiaObservacion.php" novalidate>

        	
            	<input type="hidden" class="form-control" value="4" name="tipo" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

        	<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Rubro</span>
						 <textarea class="form-control" id="validationTextarea" name="rubro" required></textarea>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Porcentaje</label>
						  <select class="form-select" id="inputGroupSelect01" name="porcentaje" required>
						    <option selected disabled value>Seleccionar...</option>
						    <option value="2.5">2.5%</option>
						    <option value="5">5%</option>
						    <option value="10">10%</option>
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

	
			<?php 
			function generatePassword()
			{
				$caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789?.-';
				$longpalabra=8;
				for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) {
				  $x = rand(0,$n);
				  $pass.= $caracteres[$x];
				}
				return $pass;
			}
			?>

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