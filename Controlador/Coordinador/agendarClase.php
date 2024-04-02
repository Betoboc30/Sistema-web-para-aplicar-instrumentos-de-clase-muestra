<?php
//Validar si el usuario ha presionado el boton de envíar

include("../../Modelo/conexion.php");
include("../../Vista/bootstrap.php");

//Validar que los campos que fueron enviados del formulario tipo POST no estén vacíos o sean NULL
if (
    isset($_POST['idCoordinador']) && isset($_POST['fechaAgenda']) && isset($_POST['idProfesor'])
    && isset($_POST['idMateria']) && isset($_POST['idCoordinador2']) && isset($_POST['idCoordinador3'])
) {

    //Obtenemos los valores de formulario y los asignamos a variables
    $idCoordinador = htmlspecialchars($_POST['idCoordinador'], ENT_QUOTES, 'UTF-8');
    $idCoordinador2 = htmlspecialchars($_POST['idCoordinador2'], ENT_QUOTES, 'UTF-8');
    $idCoordinador3 = htmlspecialchars($_POST['idCoordinador3'], ENT_QUOTES, 'UTF-8');
    $idProfesor = htmlspecialchars($_POST['idProfesor'], ENT_QUOTES, 'UTF-8');
    $fechaAgenda = htmlspecialchars($_POST['fechaAgenda'], ENT_QUOTES, 'UTF-8');
    $idMateria = htmlspecialchars($_POST['idMateria'], ENT_QUOTES, 'UTF-8');

    $sql = $conexion->query("INSERT INTO agenda (FechaAgenda, idCoordinador, idCoordinador2, idCoordinador3, idProfesor, idMateria) 
    VALUE('$fechaAgenda',$idCoordinador,$idCoordinador2,$idCoordinador3,$idProfesor,$idMateria)");

    //Validamos que las consultas se hayan ejecutado correctamente
    if ($sql) {
        //Muestra un mensaje si se ejecuta correctamente la consulta

        $obtenercorreo = $conexion->query("SELECT * FROM usuario INNER JOIN agenda ON Agenda.idProfesor = Usuario.idUsuario 
        WHERE idUsuario = $idProfesor");

        $correo = mysqli_fetch_object($obtenercorreo);
        $asunto = 'Agenda para la clase muestra';
        $descripcion = 'Hola ' . $correo->Nombre . ' la fecha para aplicar la clase muestra será la fecha: ' .
            $correo->FechaAgenda;
        $de = 'From: UPEMOR';
        if (mail($correo->Correo, $asunto, $descripcion, $de)) {
            //echo '<p class="fs-5">Registro exitoso, se ha enviado el correo al profesor</p>';
        } else {
        }

        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto text-center">
            <p class="fs-5">Realizado con exito</p>
            <i class="bi bi-check2 fs-1 text-success"></i>
        </div>
        </body>';
        header("Refresh:3; ../../Vista/Coordinador/index.php");
    } else {
        //Muestra un mensaje si hubo un error al ejecutar la consulta
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto text-center">
            <p class="fs-5">Algo salió mal</p>
            <i class="bi bi-x-lg fs-1 text-danger"></i>
        </div>
        </body>';
        header("Refresh:3; ../../Vista/Coordinador/index.php");
    }

}



?>