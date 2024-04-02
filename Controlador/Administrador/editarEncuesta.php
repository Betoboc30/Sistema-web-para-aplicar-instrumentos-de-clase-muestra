<?php
//Validar si el usuario ha presionado el boton de envíar

include("../../Modelo/conexion.php");
include("../../Vista/bootstrap.php");

//Validar que los campos que fueron enviados del formulario tipo POST no estén vacíos o sean NULL
if (isset($_POST['idencuesta']) && isset($_POST['pregunta'])) {

    //Obtenemos los valores de formulario y los asignamos a variables
    $idEncuesta = htmlspecialchars($_POST['idencuesta'], ENT_QUOTES, 'UTF-8');
    $pregunta = htmlspecialchars($_POST['pregunta'], ENT_QUOTES, 'UTF-8');


    $sql = $conexion->query("UPDATE encuesta SET Pregunta='$pregunta' WHERE idEncuesta=$idEncuesta");


    //Validamos que las consultas se hayan ejecutado correctamente
    if ($sql) {
        //Muestra un mensaje si se ejecuta correctamente la consulta
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Realizado con exito</p>
                    <i class="bi bi-check2 fs-1 text-success"></i>
                </div>
                </body>';
        header("Refresh:3; ../../Vista/Administrador/gestionEncuesta.php");
    } else {
        //Muestra un mensaje si hubo un error al ejecutar la consulta
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Algo salió mal</p>
                    <i class="bi bi-x-lg fs-1 text-danger"></i>
                </div>
                </body>';
        header("Refresh:3; ../../Vista/Administrador/gestionEncuesta.php");
    }

}
?>