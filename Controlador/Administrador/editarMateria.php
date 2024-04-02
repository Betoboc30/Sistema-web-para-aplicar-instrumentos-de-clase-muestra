<?php

include("../../Modelo/conexion.php");
include("../../Vista/bootstrap.php");

//Validar que los campos que fueron enviados del formulario tipo POST no estén vacíos o sean NULL
if (
    isset($_POST['clave']) && isset($_POST['materia']) && isset($_POST['tipocurso'])
    && isset($_POST['eje']) && isset($_POST['horas']) && isset($_POST['nivel'])
    && isset($_POST['cuatrimestre']) && isset($_POST['estatus']) && isset($_POST['academia'])
    && isset($_POST['idmateria'])
) {

    //Obtenemos los valores de formulario y los asignamos a variables
    $idMateria = htmlspecialchars($_POST['idmateria'], ENT_QUOTES, 'UTF-8');
    $clave = htmlspecialchars($_POST['clave'], ENT_QUOTES, 'UTF-8');
    $materia = htmlspecialchars($_POST['materia'], ENT_QUOTES, 'UTF-8');
    $tipocurso = htmlspecialchars($_POST['tipocurso'], ENT_QUOTES, 'UTF-8');
    $eje = htmlspecialchars($_POST['eje'], ENT_QUOTES, 'UTF-8');
    $horas = htmlspecialchars($_POST['horas'], ENT_QUOTES, 'UTF-8');
    $nivel = htmlspecialchars($_POST['nivel'], ENT_QUOTES, 'UTF-8');
    $cuatrimestre = htmlspecialchars($_POST['cuatrimestre'], ENT_QUOTES, 'UTF-8');
    $estatus = htmlspecialchars($_POST['estatus'], ENT_QUOTES, 'UTF-8');
    $academia = htmlspecialchars($_POST['academia'], ENT_QUOTES, 'UTF-8');


    $sql = $conexion->query("UPDATE materia SET Clave='$clave', NombreM='$materia', TipoCurso='$tipocurso', Eje='$eje', HorasTotal=$horas, Nivel=$nivel, Cuatrimestre=$cuatrimestre, EstatusM=$estatus, idAcademia=$academia WHERE idMateria=$idMateria");


    //Validamos que las consultas se hayan ejecutado correctamente
    if ($sql) {
        //Muestra un mensaje si se ejecuta correctamente la consulta
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                    <div class="col-auto text-center">
                        <p class="fs-5">Realizado con exito</p>
                        <i class="bi bi-check2 fs-1 text-success"></i>
                    </div>
                    </body>';
        header("Refresh:3; ../../Vista/Administrador/gestionMateria.php");
    } else {
        //Muestra un mensaje si hubo un error al ejecutar la consulta
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                    <div class="col-auto text-center">
                        <p class="fs-5">Algo salió mal</p>
                        <i class="bi bi-x-lg fs-1 text-danger"></i>
                    </div>
                    </body>';
        header("Refresh:3; ../../Vista/Administrador/gestionMateria.php");
    }

}
?>