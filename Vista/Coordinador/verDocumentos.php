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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Documentos</title>
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
    <?php include_once("menu.php"); ?>

    <div class="container-fluid">
        <div class="pt-5 mt-5 mt-1 ps-3 me-3">
			<p class="fs-4">Documentos de los profesores aprobados</p>
		</div>
        
        <div class="row row-cols-1 row-cols-md-2 g-4 mt-1 ps-3 me-3 mx-auto">
        <?php
            $consultaAgenda = $conexion->query("SELECT * FROM Agenda INNER JOIN Usuario ON Usuario.idUsuario = Agenda.idProfesor 
            INNER JOIN Materia ON Materia.idMateria = Agenda.idMateria INNER JOIN datoscontrato ON Agenda.idProfesor = datoscontrato.idUsuario 
			WHERE (idCoordinador = $id OR idCoordinador2 = $id or idCoordinador3 = $id) ");
            $totalFilas = mysqli_num_rows($consultaAgenda);
            if($totalFilas > 0){
            while ($datosAgenda = $consultaAgenda->fetch_object()) {
        ?>
            <div class="col">
                <div class="col-12 card card-group mb-3 border-start-0 border-dark border-1 d-flex">
                    <div class="col-5 card-body d-block text-center d-none d-sm-block">	
                        <img src="../../Public/<?= $datosAgenda->fotoperfil ?>" class="img-fluid" alt="...">			
                    </div>
                    <div class="col-7 ps-3 pt-2 pe-sm-2">
                        <label class="text-secondary fw-bold text-muted">Profesor</label>
                        <p class="fs-5 fw-bold"><?= $datosAgenda->Nombre ?>  <?= $datosAgenda->ApellidoP ?>  <?= $datosAgenda->ApellidoM ?></p>
                        <label class="text-secondary fw-bold text-muted">Materia</label>
                        <p class="fs-5 fw-bold"><?= $datosAgenda->NombreM ?></p>
                        <label class="text-secondary fw-bold text-muted">Grado Académico</label>
                        <p class="fs-5 fw-bold"><?= $datosAgenda->GradoA ?></p>
                        <?php
                            $consultaDocs = $conexion->query("SELECT * FROM Agenda INNER JOIN datoscontrato ON datoscontrato.idUsuario = Agenda.idProfesor
                            WHERE (idCoordinador = $id OR idCoordinador2 = $id or idCoordinador3 = $id) AND idUsuario = $datosAgenda->idProfesor");

                            $totalFilas = mysqli_num_rows($consultaDocs);
                            if ($totalFilas != 0) {
                                while ($datosDocs = $consultaDocs->fetch_object()) {
                        ?>
                                    <div class="d-grid gap-2 pe-3 mb-2">
                                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                                            data-bs-target="#verDocs<?php echo $datosDocs->idAgenda; ?>">
                                                Ver documentos
                                        </button>
                                    </div>
                        <?php
                                    include ('modalVerDocumentos.php');
                                }
                            } else {
                        ?>
                            <div class="col-12">
                                <p class="text-center text-warning">
                                    Este usuario aún no ha subido ningún documento
                                </p>
                            </div>
                        <?php
                            }
                        ?>
                    </div>      
                </div>
            </div>
            <?php 
            } }else{ ?>
                <div class="card-body d-block text-center m-5 justify-content-center align-items-center" style="height: 50vh;">
                <p class="fs-5" style="font-family: 'Trebuchet MS', Verdana, sans-serif;">No hay nada que mostrar</p>	
                <img src="../imagenes/empty.png" class="img-fluid" width="300	" alt="...">
                    
                </div>

        <?php } 
    ?>
        </div>
    </div>

                 <!-- Modal para ver documentos -->
 <div class="modal fade" id="visualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="doc" width="770px" height="600"></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        function verDocumento(NombreDoc) {

            //document.getElementById("doc").src = "../../Public/" + NombreDoc;
            $("#doc").attr("src", "../../Public/" + NombreDoc);
            $("#titulo").html(NombreDoc);

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

</body>

</html>