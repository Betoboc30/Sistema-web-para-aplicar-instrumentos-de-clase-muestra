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
        $consultaTotal = $conexion->query("SELECT COUNT(DISTINCT(guiaaplicacion.idProfesor)) as totalGuia,  
        COUNT(DISTINCT(respuesta.idUsuario)) as totalRespuesta FROM guiaaplicacion LEFT JOIN respuesta 
        ON respuesta.idUsuario = guiaaplicacion.idProfesor WHERE estatus LIKE '%Contratado%'");

        $usuariosRespuesta = $consultaTotal->fetch_object();
    ?>

    <div class="container-fluid mt-5 pt-1">

        <div class="col-12 mt-5 mb-4">
            <div class="col-12 mt-5 col-12 col-lg-11 mt-3 mx-auto">
                <p class="fs-4">Resultados de encuestas</p>
            </div>
        </div>

        <div class="col-12 col-lg-11 row justify-content-center mx-auto">
            <div class="col-lg-6 p-1">
                <div class="card">
                    <div class="card-body shadow rounded d-flex align-items-center">
                        <div class="d-grid gap-2 col-8">
                            <label class="text-start ps-1" style="font-family: Verdana, sans-serif;">Usuarios que han respondido la encuesta</label>
                        </div>
                        <div class="col-3 p-1">
                            <h5 class="card-title text-end display-6 fw-normal" style="color: #2ECC71;"><?= $usuariosRespuesta->totalRespuesta ?></h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 p-1">
                <div class="card">
                    <div class="card-body shadow rounded d-flex align-items-center">
                        <div class="d-grid gap-2 col-8">
                            <label class="text-start ps-1" style="font-family: Verdana, sans-serif;">Usuarios que no han respondido la encuesta</label>
                        </div>
                        <div class="col-3 p-1">
                            <h5 class="card-title text-end display-6 fw-normal" style="color: #F71717;"><?= $total = $usuariosRespuesta->totalGuia-$usuariosRespuesta->totalRespuesta ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
    <div class="col-12 col-lg-11 mx-auto">
        <div class="card-group">

            <?php
            $consultaEncuesta = $conexion->query("SELECT * FROM Encuesta ");
            while ($datosEncuesta = $consultaEncuesta->fetch_object()) {
                ?>

                <div class="card mt-4 border-dark">
                    <div class="card-body text-center">
                        <?= $datosEncuesta->Pregunta ?>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php
                        $consultaRespuesta = $conexion->query("SELECT * FROM Encuesta INNER JOIN Respuesta 
                            ON Encuesta.idEncuesta = Respuesta.idEncuesta WHERE Encuesta.idEncuesta = $datosEncuesta->idEncuesta LIMIT 10");
                        while ($datosRespuesta = $consultaRespuesta->fetch_object()) {
                            ?>
                            <li class="list-group-item">
                                <?= $datosRespuesta->Respuesta ?>
                            </li>

                        <?php } ?>
                    </ul>

                </div>
            <?php } ?>
            
            <!-- ------------------------------------------------------------------------------------------------ -->

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