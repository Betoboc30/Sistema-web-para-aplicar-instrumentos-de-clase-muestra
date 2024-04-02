<?php
include("../../Modelo/conexion.php");
include("../../Vista/bootstrap.php");

//Validar que los campos que fueron enviados del formulario tipo POST no estén vacíos o sean NULL
if (
    isset($_POST['tipo']) && isset($_POST['nombre'])
    && isset($_POST['paterno']) && isset($_POST['grado'])
    && isset($_POST['programa']) && isset($_POST['nacimiento'])
    && isset($_POST['correo']) && isset($_POST['contra']) && isset($_POST['academia'])
) {

    //Obtenemos los valores de formulario y los asignamos a variables
    $tipo = htmlspecialchars($_POST['tipo'], ENT_QUOTES, 'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
    $paterno = htmlspecialchars($_POST['paterno'], ENT_QUOTES, 'UTF-8');
    $materno = htmlspecialchars($_POST['materno'], ENT_QUOTES, 'UTF-8');
    $grado = htmlspecialchars($_POST['grado'], ENT_QUOTES, 'UTF-8');
    $programa = htmlspecialchars($_POST['programa'], ENT_QUOTES, 'UTF-8');
    $nacimiento = htmlspecialchars($_POST['nacimiento'], ENT_QUOTES, 'UTF-8');
    $correo = htmlspecialchars($_POST['correo'], ENT_QUOTES, 'UTF-8');
    $pass = md5(htmlspecialchars($_POST['contra'], ENT_QUOTES, 'UTF-8'));
    $academia = htmlspecialchars($_POST['academia'], ENT_QUOTES, 'UTF-8');
    
    $contra = htmlspecialchars($_POST['contra'], ENT_QUOTES, 'UTF-8');

    //Realizamos una consulta la base de datos para verificar si ya existe el correo eletrónico
    $validaruser = $conexion->query("SELECT * FROM usuario WHERE Correo LIKE '$correo'");
    $datos = $validaruser->fetch_object();

    //Validamos que el nombre de usuario no exista
    if (empty($datos->Correo)) {
        //Sí el usuario no existe validamos si el usuario se registro como coordinador en este caso tipo 2
        if ($tipo == 1) {
            //Hacemos el registro del usuario en la base de datos
            $sql = $conexion->query("INSERT INTO usuario(Nombre,ApellidoP,ApellidoM,FechaNac,GradoA,ProgramaE,Correo,Contrasena,Firma,Cargo,TipoUsuario,fotoperfil,idAcademia) 
                                            VALUE('$nombre','$paterno','$materno','$nacimiento','$grado','$programa','$correo','$pass',null,3,$tipo,default,$academia)");

        } else {
            //Mover la imagen al servidor
            $carpeta_destino = "../../Public/";
            $nombre_img1 = $_FILES['firma']['name'];


            $archivo_destinoimg1 = $carpeta_destino . basename($nombre_img1);

            $tipo_archivo1 = strtolower(pathinfo($archivo_destinoimg1, PATHINFO_EXTENSION));

            $firma = "";

            //Movemos la imagen a la carpeta
            if (move_uploaded_file($_FILES['firma']['tmp_name'], $archivo_destinoimg1)) {
                //echo "Logramos subir la imagen<br>";
                $firma = $nombre_img1;
            }

            if ($tipo == 2) {
                if (isset($_POST['cargo'])) {

                    $cargo = htmlspecialchars($_POST['cargo'], ENT_QUOTES, 'UTF-8');

                    $sql = $conexion->query("INSERT INTO usuario(Nombre,ApellidoP,ApellidoM,FechaNac,GradoA,ProgramaE,Correo,Contrasena,Firma,Cargo,TipoUsuario,fotoperfil,idAcademia) 
                                            VALUE('$nombre','$paterno','$materno','$nacimiento','$grado','$programa','$correo','$pass','$firma','$cargo',$tipo,default,$academia)");
                }
            } else {


                $asunto = 'Credenciales para acceder al sistema';
                $descripcion = 'Estimado usuario tu contraseña para acceder a nuestro sistema donde podrás acceder a
                las fechas de las clases y los resultados es: ' . $contra;
                $de = 'From: UPEMOR';
                //$contramd5 = $contra;

                if (mail($correo, $asunto, $descripcion, $de)) {
                    $sql = $conexion->query("INSERT INTO usuario(Nombre,ApellidoP,ApellidoM,FechaNac,GradoA,ProgramaE,Correo,Contrasena,Firma,Cargo,TipoUsuario,fotoperfil,idAcademia) 
                    VALUE('$nombre','$paterno','$materno','$nacimiento','$grado','$programa','$correo','$pass','$firma',3,$tipo,default,$academia)");
                } else {
                    echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                    <div class="col-auto text-center">
                        <p class="fs-5">No se puedo enviar las credenciales al usuario</p>
                        <i class="bi bi-x-lg fs-1 text-danger"></i>
                    </div>
                    </body>';
                    header("Refresh:3; ../../Vista/Administrador/gestionUsuario.php");
                }

            }
        }


        //Validamos que las consultas se hayan ejecutado correctamente
        if ($sql) {
            //Muestra un mensaje si se ejecuta correctamente la consulta
            echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                    <div class="col-auto text-center">
                        <p class="fs-5">Realizado con exito</p>
                        <i class="bi bi-check2 fs-1 text-success"></i>
                    </div>
                    </body>';
            header("Refresh:3; ../../Vista/Administrador/gestionUsuario.php");
        } else {
            //Muestra un mensaje si hubo un error al ejecutar la consulta
            echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                    <div class="col-auto text-center">
                        <p class="fs-5">Algo salió mal</p>
                        <i class="bi bi-x-lg fs-1 text-danger"></i>
                    </div>
                    </body>';
            header("Refresh:3; ../../Vista/Administrador/gestionUsuario.php");
        }

    } else {
        //Muestra mensaje de que el nombre de usuario ya esta en uso
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                    <div class="col-auto text-center">
                        <p class="fs-5">El correo ya esta en uso</p>
                        <i class="bi bi-x-lg fs-1 text-danger"></i>
                    </div>
                    </body>';
        header("Refresh:3; ../../Vista/Administrador/gestionUsuario.php");
    }


}
