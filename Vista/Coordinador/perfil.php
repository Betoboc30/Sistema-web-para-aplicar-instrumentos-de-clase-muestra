<?php
session_start();
if (!isset($_SESSION['usuario']) && $_SESSION['tipo'] == 'Coordinador') {

    header("Location: ../../Vista/login.php");
}

include_once("../../Modelo/conexion.php");

$id = $_SESSION['usuario'];
$sql = $conexion->query("SELECT * FROM usuario INNER JOIN academia ON academia.idAcademia = usuario.idAcademia WHERE idUsuario = $id");
$consulta = ($sql->fetch_object());

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil</title>
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

<body>

    <?php include_once("menu.php") ?>
    <div class="m-0 vh-100 row justify-content-center align-items-center mt-5 pt-5 mt-lg-0 pt-lg-0">
        <div class="card g-0" style="max-width: 750px; padding-left: 0;">
            <div class="row g-0">
                <div class="col-12 col-sm-12 col-lg-5">
                    <img src="../imagenes/gradiente.jpg" class="img-fluid rounded-start" style="height: 100%;">
                    <div class="card-img-overlay col-12 col-lg-5 text-center mt-2 text-white">

                        <div class="position-relative">
                            <img src="../../Public/<?= $consulta->fotoperfil ?>" width="130px"
                                class="rounded-circle mb-2"><br>
                            <div class="position-absolute bottom-0 start-50 translate-middle-x"><button type="button"
                                    class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#cambiarFoto"><i class="bi bi-camera-fill"></i></button></div>
                        </div>

                        <h3 class="card-title mt-4">

                            <?= $consulta->Nombre ?>
                            <?= $consulta->ApellidoP ?>
                            <?= $consulta->ApellidoM ?>
                        </h3>
                        <p class="card-text fs-5 mt-3">
                            <?= $consulta->TipoUsuario ?>
                        </p>

                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <p class="card-text fs-3 text-white"><i class="bi bi-pencil-square"></i></p>
                        </button>

                        <div class="mt-3">

                            <button type="button" class="btn btn-sm text-decoration-underline text-white"
                                data-bs-toggle="modal" data-bs-target="#cambiarContra">
                                Cambiar contraseña
                            </button>

                        </div>


                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title border-bottom border-3 border-warning pb-2">Información personal</h5>
                        <div class="row justify-content-between">


                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <p class="card-text fw-bold">Correo electrónico:</p>
                                    <p class="card-text text-muted">
                                        <?= $consulta->Correo ?>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="card-text fw-bold">Fecha de nacimiento:</p>
                                    <p class="card-text text-muted">
                                        <?= $consulta->FechaNac ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <h5 class="card-title border-bottom border-3 border-info pb-2 mt-5">Información académica</h5>

                        <div class="row justify-content-between border-bottom pb-2">
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <p class="card-text fw-bold">Grado académico:</p>
                                    <p class="card-text text-muted">
                                        <?= $consulta->GradoA ?>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="card-text fw-bold">Programa educativo:</p>
                                    <p class="card-text text-muted">
                                        <?= $consulta->ProgramaE ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-between pt-2 border-bottom pb-2">

                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <p class="card-text fw-bold">Cargo:</p>
                                    <p class="card-text text-muted">
                                        <?= $consulta->Cargo ?>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="card-text fw-bold">Academia:</p>
                                    <p class="card-text text-muted">
                                        <?= $consulta->NombreAca ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-between pt-2">

                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <p class="card-text fw-bold">Periodo:</p>
                                    <p class="card-text text-muted">
                                        <?= $consulta->Periodo ?>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="card-text fw-bold">Clave:</p>
                                    <p class="card-text text-muted">
                                        <?= $consulta->ClavePro ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal editar datos-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar usuario
                        <?= $consulta->Nombre ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation mt-2" method="POST"
                        action="../../Controlador/Coordinador/editarUsuario.php" enctype="multipart/form-data"
                        novalidate>


                        <input type="hidden" name="tipo" value="<?= $consulta->TipoUsuario ?>" readonly>
                        <input type="hidden" name="idUsuario" value="<?= $consulta->idUsuario ?>" readonly>


                        <div class="input-group input-group-sm mb-3 has-validation">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Nombre completo</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" value="<?php echo $consulta->Nombre ?>"
                                placeholder="Nombre" name="nombre" required>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" value="<?php echo $consulta->ApellidoP ?>"
                                placeholder="Ap. Paterno" name="paterno" required>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" value="<?php echo $consulta->ApellidoM ?>"
                                placeholder="Ap. Materno" name="materno">
                        </div>

                        <div class="input-group input-group-sm mb-3 has-validation">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
                            <input type="date" name="nacimiento" value="<?php echo $consulta->FechaNac ?>"
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" required>
                        </div>

                        <div class="input-group input-group-sm mb-3 has-validation">
                            <label class="input-group-text" for="inputGroupSelect01">Grado académico</label>
                            <select class="form-select" id="inputGroupSelect01" name="grado" required>
                                <option selected value disabled readonly>
                                    <?php echo $consulta->GradoA ?>
                                </option>
                                <option value="1">Licenciatura</option>
                                <option value="2">Maestría</option>
                                <option value="3">Doctorado</option>
                            </select>
                        </div>

                        <div class="input-group input-group-sm mb-3 has-validation">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Correo electrónico</span>
                            <input type="email" name="correo" value="<?php echo $consulta->Correo ?>"
                                class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm" required>
                        </div>

                        <?php if ($consulta->TipoUsuario == 'Coordinador') { ?>

                            <div class="input-group input-group-sm mb-3 has-validation">
                                <label class="input-group-text" for="inputGroupSelect01">Cargo</label>
                                <select class="form-select" name="cargo" id="inputGroupSelect01" required>
                                    <option selected disabled value>
                                        <?php echo $consulta->Cargo ?>
                                    </option>
                                    <option value="1">Profesor de Tiempo Completo</option>
                                    <option value="2">Profesor</option>
                                </select>
                            </div>


                            <div class="input-group input-group-sm mb-3 has-validation">
                                <label class="input-group-text" for="inputGroupSelect01">Academia</label>
                                <select class="form-select" id="inputGroupSelect01" name="academia" required>
                                    <option selected disabled value>
                                        <?php echo $consulta->NombreAca ?>
                                    </option>
                                    <?php
                                    $consultaAca = $conexion->query("SELECT * FROM Academia WHERE idAcademia>1");
                                    while ($datosA = $consultaAca->fetch_object()) {
                                        ?>

                                        <option value="<?= $datosA->idAcademia ?>">
                                            <?= $datosA->NombreAca ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                        <?php } ?>


                        <?php if ($consulta->TipoUsuario != 'Administrador') { ?>

                            <div class="input-group input-group-sm mb-3 has-validation">
                                <label class="input-group-text" for="inputGroupFile01">Cambiar firma</label>
                                <input type="file" name="firma" id="firma" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>

                        <?php } ?>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button class="btn btn-primary" type="submit">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!------------------------------------- Modal cambiar contraseña ------------------->
    <div class="modal fade" id="cambiarContra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation mt-1" method="POST"
                        action="../../Controlador/Coordinador/editarContra.php" enctype="multipart/form-data"
                        novalidate>

                        <input type="hidden" name="tipo" value="<?= $consulta->TipoUsuario ?>" readonly>
                        <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $consulta->idUsuario ?>">

                        <!-- <div class="g-3">
                            <div class="input-group input-group-sm has-validation">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Contraseña actual</span>
                                <input type="password" id="pass" name="pass" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                            </div>
                            <span id="resultado"></span>
                        </div> -->

                        <div class="g-3">
                            <div class="input-group input-group-sm has-validation">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nueva contraseña</span>
                                <input type="password" name="contra" id="passNueva" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                    onkeyup="compararContra();" required>
                            </div>

                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar" id="progressbar" role="progressbar" style="width: 0%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

                            </div>
                        </div>

                        <div class="g-3">
                            <div class="input-group input-group-sm has-validation">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Confirma tu contraseña
                                    nueva</span>
                                <input type="password" id="passConfirm" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                    onkeyup="compararContra();" required disabled>
                            </div>
                            <label for="" id="Mensaje"></label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                            <button class="btn btn-primary" type="submit" id="enviar"
                                onclick="validarPass($('#idUsuario').val(), $('#pass').val());"
                                disabled>Cambiar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------- Modal cambiar Foto ------------------->
    <div class="modal fade" id="cambiarFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar foto de perfil </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation mt-1" method="POST"
                        action="../../Controlador/Coordinador/cambiarfoto.php" enctype="multipart/form-data" novalidate>

                        <input type="hidden" name="tipo" value="<?= $consulta->TipoUsuario ?>" readonly>
                        <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $consulta->idUsuario ?>">

                        <div class="col-12 text-center">
                            <img src="../../Public/<?= $consulta->fotoperfil ?>" width="180px"
                                class="rounded-circle mb-2"><br>
                                <p>Foto actual</p>
                        </div>
                        <div class="input-group input-group-sm mb-3 has-validation">
							<label class="input-group-text" for="inputGroupFile01">Cambiar foto</label>
  						<input type="file" name="perfil" id="perfil" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                            <button class="btn btn-primary" type="submit" 
                                >Cambiar</button>
                        </div>
                    </form>
                </div>
            </div>
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

    <script>
        function validarPass(idUsuario, pass) {
            var parametros = {
                "pass": pass,
                "idUsuario": idUsuario
            };

            $.ajax({
                data: parametros, //datos que se envian a traves de ajax
                url: '../../Controlador/Coordinador/validarContra.php', //archivo que recibe la peticion
                type: 'post', //método de envio
                beforeSend: function () {
                    $("#resultado").html("Procesando, espere por favor...");
                },
                success: function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resultado").addClass(response);
                }
            });
        }
    </script>

    <script>
        $('#passNueva').keyup(function (e) {
            var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
            var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
            var enoughRegex = new RegExp("(?=.{6,}).*", "g");
            var confirmar = $('#passNueva').val();
            var nueva = $('#passConfirm').val();

            if (false == enoughRegex.test($(this).val())) {
                $("#progressbar").width('5%');
                $("#progressbar").css('background', 'red');
                $("#enviar").prop('disabled', true);
                $('#passConfirm').prop('disabled', true);

            } else if (strongRegex.test($(this).val())) {
                $("#progressbar").width('100%');
                $("#progressbar").css('background', '#2ECC71');
                $('#passConfirm').prop('disabled', false);
                $("#enviar").prop('disabled', false);

                if (nueva != "" && confirmar != "") {
                    if (nueva == confirmar) {
                        $("#enviar").prop('disabled', false);
                    } else {
                        $("#enviar").prop('disabled', true);
                    }

                } else {
                    $("#enviar").prop('disabled', true);
                }

            } else if (mediumRegex.test($(this).val())) {
                $("#progressbar").width('75%');
                $("#progressbar").css('background', 'yellow');
                $("#enviar").prop('disabled', true);
                $('#passConfirm').prop('disabled', true);


            } else {
                $("#progressbar").width('25%');
                $("#progressbar").css('background', 'orange');
                $("#enviar").prop('disabled', true);
                $('#passConfirm').prop('disabled', true);
            }
            return true;
        });
    </script>

    <script>
        function compararContra() {

            var confirmar = $('#passNueva').val();
            var nueva = $('#passConfirm').val();

            if (nueva != "" && confirmar != "") {

                if (nueva == confirmar) {
                    $("#Mensaje").html("Las contraseñas coinciden");
                    $("#passConfirm").removeClass("is-invalid");
                    $("#passConfirm").addClass("is-valid");
                    $("#enviar").prop('disabled', false);
                } else {
                    $("#Mensaje").html("Las contraseñas no coinciden");
                    $("#passConfirm").addClass("is-invalid");
                    $("#enviar").prop('disabled', true);

                }

            } else {
                $("#Mensaje").html("La contraseña no puede estar vacía");
                $("#passConfirm").addClass("is-invalid");
                $("#enviar").prop('disabled', true);
            }

        }
    </script>
</body>

</html>