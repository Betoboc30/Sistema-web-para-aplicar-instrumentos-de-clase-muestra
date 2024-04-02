<!-- Modal de registro de Administrador-->
<div class="modal fade" id="edit<?= $datos->idUsuario; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario <?php echo  $datos->Nombre ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form class="row g-3 needs-validation mt-2" method="POST" action="../../Controlador/Administrador/editarUsuario.php" enctype="multipart/form-data" novalidate>


          <input type="hidden" name="tipo" value="<?=  $datos->TipoUsuario ?>"  readonly>
          <input type="hidden" name="idUsuario" value="<?=  $datos->idUsuario ?>"  readonly>

            <div class="input-group input-group-sm mb-3 has-validation">
              <span class="input-group-text" id="inputGroup-sizing-sm">Nombre completo</span>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo  $datos->Nombre ?>" placeholder="Nombre" name="nombre" required>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo  $datos->ApellidoP ?>" placeholder="Ap. Paterno" name="paterno" required>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo  $datos->ApellidoM ?>" placeholder="Ap. Materno" name="materno">
            </div>

            <div class="input-group input-group-sm mb-3 has-validation">
              <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de nacimiento</span>
              <input type="date" name="nacimiento" value="<?php echo  $datos->FechaNac ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="input-group input-group-sm mb-3 has-validation">
              <label class="input-group-text" for="inputGroupSelect01">Grado académico</label>
              <select class="form-select" id="inputGroupSelect01" name="grado" required>
                <option selected value disabled readonly><?php echo  $datos->GradoA ?></option>
                <option value="1">Licenciatura</option>
                <option value="2">Maestría</option>
                <option value="3">Doctorado</option>
              </select>
            </div>

            <div class="input-group input-group-sm mb-3 has-validation">
              <span class="input-group-text" id="inputGroup-sizing-sm">Correo electrónico</span>
              <input type="email" name="correo" value="<?php echo  $datos->Correo ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="g-3 mb-3">
              <div class="input-group input-group-sm has-validation">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Nueva contraseña</span>
                  <input type="password" name="contra" id="passNueva4<?= $datos->idUsuario; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                          onkeyup="compararContra4(<?= $datos->idUsuario; ?>); obtenerContra(<?= $datos->idUsuario; ?>);" required>
                          <span class="input-group-text border-primary bg-white data-bs-toggle="tooltip" data-bs-placement="right" 
title="Tu contraseña debe contener: 
 • Mínimo 8 caracteres
 • Una mayúscula
 • Una minúscula
 • Un múmero
 • Un carácter especial"><i class="bi bi-question-circle text-primary"></i></span>
              </div>
              <div class="progres" style="height: 5px;">
                <div class="progress-bar" id="progressbar4<?= $datos->idUsuario; ?>" role="progressbar" style="width: 0%;" aria-valuenw="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="g-3">
              <div class="input-group input-group-sm has-validation">
                <span class="input-group-text" id="inputGroup-sizing-sm">Confirma tu contraseña nueva</span>
                <input type="password" id="passConfirm4<?= $datos->idUsuario; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                        onkeyup="compararContra4(<?= $datos->idUsuario; ?>); obtenerContra(<?= $datos->idUsuario; ?>);" required disabled>
              </div>
              <label for="" id="Mensaje4<?= $datos->idUsuario; ?>"></label> 
            </div>
                        

            <?php if($datos->TipoUsuario == 'Coordinador'){ ?>

              <div class="input-group input-group-sm mb-3 has-validation">
                <label class="input-group-text" for="inputGroupSelect01">Cargo</label>
                <select class="form-select" name="cargo" id="inputGroupSelect01" required>
                  <option selected disabled value><?php echo  $datos->Cargo ?></option>
                  <option value="1">Profesor de Tiempo Completo</option>
                  <option value="2">Profesor</option>
                </select>
              </div>


               <div class="input-group input-group-sm mb-3 has-validation">
              <label class="input-group-text" for="inputGroupSelect01">Academia</label>
              <select class="form-select" id="inputGroupSelect01" name="academia" required>
                <option selected disabled value><?php echo  $datos->NombreAca ?></option>
                <?php
                  $consultaAca = $conexion->query("SELECT * FROM Academia WHERE idAcademia>1");
                  while ($datosA = $consultaAca->fetch_object()) {
                ?>
                
                <option value="<?= $datosA->idAcademia ?>"><?= $datosA->NombreAca ?></option>
                <?php } ?>
              </select>
            </div>

            <?php } ?>


            <?php if($datos->TipoUsuario != 'Administrador'){ ?>

              <div class="input-group input-group-sm mb-3 has-validation">
                <label class="input-group-text" for="inputGroupFile01">Cambiar firma</label>
                <input type="file" name="firma" id="firma" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
              </div>

            <?php } ?>

     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" id="enviar4<?= $datos->idUsuario; ?>" type="submit">Editar</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>



<script>
  function obtenerContra(idUsuario) {
    var idUser = idUsuario;
    
        $(`#passNueva4${idUser}`).keyup(function (e) {
            var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
            var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
            var enoughRegex = new RegExp("(?=.{6,}).*", "g");
            var confirmar = $(`#passNueva4${idUser}`).val();
            var nueva = $(`#passConfirm4${idUser}`).val();

            if (false == enoughRegex.test($(this).val())) {
                $(`#progressbar4${idUser}`).width('5%');
                $(`#progressbar4${idUser}`).css('background', 'red');
                $(`#enviar4${idUser}`).prop('disabled', true);
                $(`#passConfirm4${idUser}`).prop('disabled', true);
            } else if (strongRegex.test($(this).val())) {
                $(`#progressbar4${idUser}`).width('100%');
                $(`#progressbar4${idUser}`).css('background', '#2ECC71');
                $(`#passConfirm4${idUser}`).prop('disabled', false);
                $(`#enviar4${idUser}`).prop('disabled', false);

                if (nueva != "" && confirmar != "") {
                    if (nueva == confirmar) {
                        $(`#enviar4${idUser}`).prop('disabled', false);
                    } else {
                        $(`#enviar4${idUser}`).prop('disabled', true);
                    }

                } else {
                    $(`#enviar4${idUser}`).prop('disabled', true);
                }

            } else if (mediumRegex.test($(this).val())) {
                $(`#progressbar4${idUser}`).width('75%');
                $(`#progressbar4${idUser}`).css('background', 'yellow');
                $(`#enviar4${idUser}`).prop('disabled', true);
                $(`#passConfirm4${idUser}`).prop('disabled', true);
            } else {
                $(`#progressbar4${idUser}`).width('25%');
                $(`#progressbar4${idUser}`).css('background', 'orange');
                $(`#enviar4${idUser}`).prop('disabled', true);
                $(`#passConfirm4${idUser}`).prop('disabled', true);
            }
            
            return true;
        });
      }
    </script>

<script>
        function compararContra4(idUsuario){
            var idUser = idUsuario;
            var confirmar = $(`#passNueva4${idUser}`).val();
            var nueva = $(`#passConfirm4${idUser}`).val();
            console.log(idUser);
            if (nueva != "" && confirmar != "") {
                if (nueva == confirmar) {
                    $(`#Mensaje4${idUser}`).html("Las contraseñas coinciden");
                    $(`#passConfirm4${idUser}`).removeClass("is-invalid");
                    $(`#passConfirm4${idUser}`).addClass("is-valid");
                    $(`#enviar4${idUser}`).prop('disabled', false);
                } else {
                    $(`#Mensaje4${idUser}`).html("Las contraseñas no coinciden");
                    $(`#passConfirm4${idUser}`).addClass("is-invalid");
                    $(`#enviar4${idUser}`).prop('disabled', true);
                }

            } else {
                $(`#Mensaje4${idUser}`).html("La contraseña no puede estar vacía");
                $(`#passConfirm4${idUser}`).addClass("is-invalid");
                $(`#enviar4${idUser}`).prop('disabled', true);
            }
            
        }
    </script>