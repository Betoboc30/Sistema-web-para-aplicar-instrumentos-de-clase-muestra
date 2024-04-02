<!-- Modal de registro de Administrador -->
<?php
  include_once("../../Modelo/conexion.php");
?>



<div class="modal fade" id="aplicar<?php echo $datosAgenda->idAgenda; ?>" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg  modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Guía de observación (Clase muestra)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-1 needs-validation" method="POST" action="../../Controlador/Coordinador/guardarGuia.php"
          enctype="multipart/form-data" novalidate>


          <table class="table table-bordered">
            <tbody>
              <tr>
                <td>Nombre del profesor(a):
                  <b>
                    <?= $datosAgenda->Nombre ?>
                    <?= $datosAgenda->ApellidoP ?>
                    <?= $datosAgenda->ApellidoM ?>
                  </b>
                </td>
                <td>Firma del profesor(a):
                  <img src="../../Public/<?= $datosAgenda->Firma ?>" width="90px">
                </td>

              </tr>

              <tr>
                <td> Nombre del evaluador(a):
                  <b>
                    <?= $consulta->Nombre ?>
                    <?= $consulta->ApellidoP ?>
                    <?= $consulta->ApellidoM ?>
                  </b>
                </td>
                <td>Firma del evaluador(a):
                  <img src="../../Public/<?= $consulta->Firma ?>" width="90px">
                </td>

              </tr>
              <tr>
                <td> Materia:
                  <b>
                    <?= $datosAgenda->NombreM ?>
                  </b>
                </td>
                <td> Fecha y hora:
                  <b>
                    <?= $datosAgenda->FechaAgenda ?>

                    <!----------------------------- Input para campo FechaApli ----------------------------->
                    <input type="hidden" name="FechaAplicacion" class="form-control"
                      value="<?= $datosAgenda->FechaAgenda ?>" aria-label="Sizing example input"
                      aria-describedby="inputGroup-sizing-sm" required>

                    <input type="hidden" name="idProfesor" class="form-control" value="<?= $datosAgenda->idProfesor ?>"
                      aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>

                    <input type="hidden" name="idCoordinador" class="form-control"
                      value="<?= $id ?>" aria-label="Sizing example input"
                      aria-describedby="inputGroup-sizing-sm" required>

                    <input type="hidden" name="idMateria" class="form-control" value="<?= $datosAgenda->idMateria ?>"
                      aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                  </b>
                </td>

              </tr>

              <!----------------------------- Input para tema ----------------------------->
              <tr>
                <td colspan="2">
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Tema</span>
                    <input type="text" name="tema" class="form-control" aria-label="Sizing example input"
                      aria-describedby="inputGroup-sizing-sm" required>
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan="2">
                  <b>Instrucciones: </b> Marque los apartados de "Si" o "No" de acuerdo al desarrollo del la
                  clase muestra.
                  En caso de marcar "No", ocupe la columna de "Observaciones" cuando tenga que hacer comentarios
                  referente
                  al area de
                  oportunidad.
                </td>
              </tr>
            </tbody>
          </table>

          <table class="table table-bordered">
            <tbody>
              <tr>
                <td>
                  Valor
                </td>
                <td>
                  Características (rubro)
                </td>
                <td>
                  Si
                </td>
                <td>
                  No
                </td>
                <td>
                  Observaciones
                </td>
              </tr>
              <!-----------------------------------    APERTURA Y CIERRE   ------------------------------- -->
              <tr>
                <td colspan="5" style="text-align: center">
                  <b class="text-center">Apertura y cierre</b>
                </td>
              </tr>

              <?php
              $rubroApertura = $conexion->query("SELECT * FROM guiaobservacion WHERE TipoRubro LIKE '%Apertura y cierre%'");
              while ($apertura = $rubroApertura->fetch_object()) {
                ?>
                <tr>
                  <td>
                    <?php echo $apertura->Porcentaje ?>%
                  </td>
                  <td>
                    <?php echo $apertura->Rubro ?>
                  </td>
                  <!----------------------------- Input para puntaje ----------------------------->

                <td>
                  <div class="form-check has-validation">
                    <input class="form-check-input" type="radio"
                      onclick="totalPuntaje(<?= $apertura->idGuiaObservacion ?>,<?= $datosAgenda->idAgenda ?>)"
                      name="aperturaycierre[<?= $apertura->idGuiaObservacion ?>][ayc]"
                      value="<?php echo $apertura->Porcentaje ?>" required>

                  </div>
                </td>
                <td>
                  <div class="form-check has-validation">
                    <input class="form-check-input" type="radio" onclick="totalPuntaje(0,<?= $datosAgenda->idAgenda ?>)"
                      name="aperturaycierre[<?= $apertura->idGuiaObservacion ?>][ayc]" value="0" required>

                  </div>
                </td>
                <td>
                  <div class="input-group has-validation">

                    <input type="text" value="Bien"
                      name="aperturaycierre[<?= $apertura->idGuiaObservacion ?>][observacionApertura]"
                      class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                      required>
                  </div>
                </td>
              </tr>

              <input type="number" name="aperturaycierre[<?= $apertura->idGuiaObservacion ?>][id]" id="idPregunta"
                value="<?php echo $apertura->idGuiaObservacion ?>" hidden>
              <?php } ?>
              <!-----------------------------------    PARTICIPACIÓN   ------------------------------- -->
              <tr>
                <td colspan="5" style="text-align: center">
                  <b class="text-center">Participacion (se crea un ambiente participativo)</b>
                </td>
              </tr>

              <?php
              $rubroApertura = $conexion->query("SELECT * FROM guiaobservacion WHERE TipoRubro LIKE '%Participacion%'");
              while ($apertura = $rubroApertura->fetch_object()) {
                ?>
                <tr>
                  <td>
                    <?php echo $apertura->Porcentaje ?>%
                  </td>
                  <td>
                    <?php echo $apertura->Rubro ?>
                  </td>
                  <!----------------------------- Input para puntaje ----------------------------->
                <td>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" class="sum"
                      name="participacion[<?= $apertura->idGuiaObservacion ?>][parti]"
                      value="<?php echo $apertura->Porcentaje ?>" required>

                  </div>
                </td>
                <td>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" class="sum"
                      name="participacion[<?= $apertura->idGuiaObservacion ?>][parti]" value="0" required>

                  </div>
                </td>
                <td>
                  <div class="input-group has-validation">

                    <input type="text" value="Bien" class="form-control" aria-label="Sizing example input"
                      aria-describedby="inputGroup-sizing-sm"
                      name="participacion[<?= $apertura->idGuiaObservacion ?>][observacionparticipacion]" required>
                  </div>
                </td>
              </tr>

              <input type="number" name="participacion[<?= $apertura->idGuiaObservacion ?>][idParti]" id="idPregunta"
                value="<?php echo $apertura->idGuiaObservacion ?>" hidden>
              <?php } ?>

              <!-----------------------------------    Técnica   ------------------------------- -->

              <tr>
                <td colspan="5" style="text-align: center">
                  <b class="text-center">Técnica</b>
                </td>
              </tr>

              <?php
              $rubroApertura = $conexion->query("SELECT * FROM guiaobservacion WHERE TipoRubro LIKE '%Tecnica%'");
              while ($apertura = $rubroApertura->fetch_object()) {
                ?>
                <tr>
                  <td>
                    <?php echo $apertura->Porcentaje ?>%
                  </td>
                  <td>
                    <?php echo $apertura->Rubro ?>
                  </td>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" class="sum"
                        name="tecnica[<?= $apertura->idGuiaObservacion ?>][tecnica]"
                        value="<?php echo $apertura->Porcentaje ?>" required>

                    </div>
                  </td>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" class="sum"
                        name="tecnica[<?= $apertura->idGuiaObservacion ?>][tecnica]" value="0" required>

                    </div>
                  </td>
                  <td>
                    <div class="input-group has-validation">

                      <input type="text" name="tecnica[<?= $apertura->idGuiaObservacion ?>][observaciontecnica]"
                        value="Bien" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm" required>
                    </div>

                  </td>
                </tr>
                <input type="number" name="tecnica[<?= $apertura->idGuiaObservacion ?>][idtecnica]" id="idPregunta"
                  value="<?php echo $apertura->idGuiaObservacion ?>" hidden>
              <?php } ?>

              <!-----------------------------------    Desempeño   ------------------------------- -->

              <tr>
                <td colspan="5" style="text-align: center">
                  <b class="text-center">Desempeño</b>
                </td>
              </tr>

              <?php
              $rubroApertura = $conexion->query("SELECT * FROM guiaobservacion WHERE TipoRubro LIKE '%Desempeño%'");
              while ($apertura = $rubroApertura->fetch_object()) {
                ?>
                <tr>
                  <td>
                    <?php echo $apertura->Porcentaje ?>%
                  </td>
                  <td>
                    <?php echo $apertura->Rubro ?>
                  </td>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" class="sum"
                        name="desempeno[<?= $apertura->idGuiaObservacion ?>][desemp]"
                        value="<?php echo $apertura->Porcentaje ?>" required>

                    </div>
                  </td>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" class="sum"
                        name="desempeno[<?= $apertura->idGuiaObservacion ?>][desemp]" value="0" required>

                    </div>
                  </td>
                  <td>
                    <div class="input-group has-validation">

                      <input type="text" name="desempeno[<?= $apertura->idGuiaObservacion ?>][observaciondesempeno]"
                        value="Bien" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm" required>
                    </div>
                  </td>
                </tr>
                <input type="number" name="desempeno[<?= $apertura->idGuiaObservacion ?>][iddesemp]" id="idPregunta"
                  value="<?php echo $apertura->idGuiaObservacion ?>" hidden>
              <?php } ?>

              <tr>

                <td>
                  100%
                </td>
                <td style="text-align: right">
                  Calificación final
                </td>
                <td colspan="2">
                  <div class="input-group has-validation">

                    <input type="number" step=".01" min="0" max="100" name="total" id="total<?= $datosAgenda->idAgenda ?>" class="form-control"
                      aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
                  </div>
                </td>
                <td>

                </td>
              </tr>

              <tr>
                <td colspan="5" style="text-align: center; font-size:10px">
                  Nota: Se llenará una guía de observación por cada evaluador presente en la clase muestra. El resultado
                  final se obtendrá
                  promediando las diferentes evaluaciones.
                </td>
              </tr>

              <tr>
                <td colspan="5" style="text-align: center;">
                  Obseraciones generales/áreas de oportunidad:
                  <div class="input-group input-group-sm mb-3 has-validation mt-3">

                    <textarea class="form-control" id="validationTextarea" name="observacionGeneral"
                      required></textarea>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>


          <table class="table table-bordered">

            <tbody>
              <tr>
                <td colspan="3" style="text-align: center; ">
                  Datos de contratación
                </td>

              </tr>

              <tr>
                <td>
                  El profesor fue contratado
                </td>

                <td>
                  Si
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="1" name="contratado" id="flexRadioDefault1"
                      required>

                  </div>
                </td>

                <td>
                  No
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="2" name="contratado" id="flexRadioDefault1"
                      required>

                  </div>
                </td>
              </tr>

              <tr>
                <td> Asignatura(s) para la que fue contratado a partir de esta clase muestra:
                </td>
                <td colspan="2">
                  <div class="input-group input-group-sm mb-3 has-validation mt-3">

                    <textarea class="form-control" id="validationTextarea" name="matria"
                      required readonly><?= $datosAgenda->NombreM ?></textarea>
                  </div>
                </td>

              </tr>

            </tbody>
          </table>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button class="btn btn-primary" type="submit">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function totalPuntaje(idGuia, idAgenda) {
    /*$("input[type='radio']").on('change', function () {
      //$(this).closest('tr').find('input[type="text"]').val($(this).val());
      // sumar();



      //alert(total);
      //$('#total').val("q");

      //$('#total').val("Hola");

      $('input:number[name=total]').val($(this).val());

    });*/

    document.getElementById("total" + idAgenda).innerHTML = "xd";
    console.log(idGuia, idAgenda)
  }

</script>