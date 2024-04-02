<?php
//Validar si el usuario ha presionado el boton de envíar

include("../../Modelo/conexion.php");
include("../../Vista/bootstrap.php");

date_default_timezone_set('America/Mexico_City');

//Validar que los campos que fueron enviados del formulario tipo POST no estén vacíos o sean NULL
if (
    isset($_POST['tipo']) && isset($_POST['rubro'])
    && isset($_POST['porcentaje'])
) {

    //Obtenemos los valores de formulario y los asignamos a variables
    $tipo = htmlspecialchars($_POST['tipo'], ENT_QUOTES, 'UTF-8');
    $rubro = htmlspecialchars($_POST['rubro'], ENT_QUOTES, 'UTF-8');
    $porcentaje = htmlspecialchars($_POST['porcentaje'], ENT_QUOTES, 'UTF-8');
    $fechaActual = date("Y-m-d");

    $i = 0;
    $sub = array();
    $sql = $conexion->query("SELECT * FROM guiaobservacion");
    while ($datos = $sql->fetch_object()) {

        $sub[$i] = ((float) $datos->Porcentaje);
        $i++;

    }
    $total = array_sum($sub);

    if ($total + $porcentaje > 100) {
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto text-center">
            <p class="fs-5">El porcentaje no puede ser mayor al 100%</p>
            <i class="bi bi-x-lg fs-1 text-danger"></i>
        </div>
        </body>';
        header("Refresh:3; ../../Vista/Administrador/gestionGuiaObservacion.php");
    } else {


        $sql = $conexion->query("INSERT INTO guiaobservacion(Rubro,Porcentaje,FechaGuia,TipoRubro) 
                                            VALUE('$rubro',$porcentaje,'$fechaActual',$tipo)");

        //Validamos que las consultas se hayan ejecutado correctamente
        if ($sql) {
            //Muestra un mensaje si se ejecuta correctamente la consulta
            echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                    <div class="col-auto text-center">
                        <p class="fs-5">Realizado con exito</p>
                        <i class="bi bi-check2 fs-1 text-success"></i>
                    </div>
                    </body>';
            header("Refresh:3; ../../Vista/Administrador/gestionGuiaObservacion.php");
        } else {
            //Muestra un mensaje si hubo un error al ejecutar la consulta
            echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
            <div class="col-auto text-center">
                <p class="fs-5">Algo salió mal</p>
                <i class="bi bi-x-lg fs-1 text-danger"></i>
            </div>
            </body>';
            header("Refresh:3; ../../Vista/Administrador/gestionGuiaObservacion.php");
        }

    }


}
?>