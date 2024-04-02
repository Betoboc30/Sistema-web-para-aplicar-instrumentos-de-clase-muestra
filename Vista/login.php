<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
    integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="estilos/login.css">
</head>

<body>
  <div class="content">
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-6  order-md-2 mt-5 d-none d-lg-block">
          <img src="imagenes/login2.jpg" alt="Image" width="500px" class="img-fluid">
        </div>
        <div class="col-12 col-lg-6 contents mt-5">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <h3>Iniciar <strong>sesión</strong></h3>
                <p class="mb-4 text-muted txt">Ingresa tu correo y contraseña para poder inicar sesión.</p>
              </div>
              <form class="row mt-3 g-3 needs-validation" action="../Controlador/inicioSesion.php" method="POST"
                novalidate>
                <div class="mt-3">
                  <label for="validationCustomUsername" class="form-label">Correo eletrónico</label>
                  <div class="input-group has-validation">
                    <input type="email" class="form-control" name="correo" id="validationCustomUsername"
                      aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Por favor, escribe correctamente tu correo eletrónico.
                    </div>
                  </div>
                </div>

                <div class="mt-4">
                  <label for="validationCustom01" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" name="pass" id="validationCustom01" required>
                  <div class="invalid-feedback">
                    ¡Escribe una contraseña válida!
                  </div>
                </div>

                <div class="d-flex mb-5 align-items-center">

                  <span class="ml-auto text-reset"><a href="#" data-bs-toggle="modal"
                      data-bs-target="#exampleModal">Olvidé mi contraseña</a></span>
                </div>
                <div class="d-grid gap-2">
                  <input type="submit" value="Iniciar sesión" class="btn text-white btn-block btn-primary buton">
                </div>
              </form>
            </div>
            <?php
            include("../Modelo/conexion.php");
            include_once "../Controlador/recuperarContra.php";
            ?>
          </div>

        </div>

      </div>
    </div>
  </div>

  <!-- Modal para recuperar contraseña-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="exampleModalLabel">Recuperación de contraseña</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form class="row g-3 needs-validation" method="POST" novalidate>
            <div class="col-auto">
              <label for="inputPassword6" class="col-form-label text-dark">Correo Electrónico</label>
            </div>
            <div class="col-auto">
              <input type="email" class="form-control" name="correo" id="validationCustom01" required>
              <div class="invalid-feedback">
                ¡Verifica tu correo por favor!
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" name="btn1" value="ok">Enviar</button>
        </div>
        </form>
      </div>
    </div>
  </div>

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>