<div class="modal fade" id="edit<?php echo $datos->idMateria; ?>" tabindex="-1" aria-labelledby="modalApyCi" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Materia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" method="POST" action="../../Controlador/Administrador/editarMateria.php" novalidate>

        	<input type="hidden" class="form-control" value="<?php echo $datos->idMateria; ?>" name="idmateria" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

        		<div class="input-group input-group-sm mb-3 mt-3 has-validation">
              <span class="input-group-text" id="inputGroup-sizing-sm">Clave de la materia</span>
              <input type="text" name="clave" value="<?php echo $datos->Clave; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="input-group input-group-sm mb-3 has-validation">
              <span class="input-group-text" id="inputGroup-sizing-sm">Nombre de la materia</span>
              <input type="text" name="materia" value="<?php echo $datos->NombreM; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="input-group input-group-sm mb-3 has-validation">
              <label class="input-group-text" for="inputGroupSelect01">Tipo de curso</label>
              <select class="form-select" id="inputGroupSelect01" name="tipocurso" required>
                <option selected value ="<?= $datos->TipoCurso ?>"><?= $datos->TipoCurso ?></option>
                <option value="Obligatorio">Obligatorio</option>
                <option value="Obtativo">Obtativo</option>
              </select>
            </div>

            <div class="input-group input-group-sm mb-3 has-validation">
              <label class="input-group-text" for="inputGroupSelect01">Eje</label>
              <select class="form-select" id="inputGroupSelect01" name="eje" required>
                <option selected value="<?= $datos->Eje ?>"><?= $datos->Eje ?></option>
                <option value="Ciencias básicas">Ciencias básicas</option>
                <option value="Ciencias de la ingeniería">Ciencias de la ingeniería</option>
                <option value="Ingeniería aplicada">Ingeniería aplicada</option>
                <option value="Diseño de ingeniería">Diseño de ingeniería</option>
                <option value="Sociales y humanidades">Sociales y humanidades</option>
                <option value="Economicas y administrativas">Economicas y administrativas</option>
                <option value="Economicas y administrativas">Economicas y administrativas</option>
              </select>
            </div>

            <div class="input-group input-group-sm mb-3 has-validation">
              <span class="input-group-text" id="inputGroup-sizing-sm">Total de horas</span>
              <input type="number" min="1" value ="<?= $datos->HorasTotal ?>" name="horas" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="input-group input-group-sm mb-3 has-validation">
              <label class="input-group-text" for="inputGroupSelect01">Nivel</label>
              <select class="form-select" id="inputGroupSelect01" name="nivel" required>
                <option selected disabled value> <?= $datos->Nivel ?></option>
                <option value="1">Introductorio</option>
                <option value="2">Medio</option>
                <option value="3">Avanzado</option>
              </select>
            </div>

            <div class="input-group input-group-sm mb-3 has-validation">
              <span class="input-group-text" id="inputGroup-sizing-sm">Cuatrimestre</span>
              <input type="number" value ="<?= $datos->Cuatrimestre ?>" min="1" max="10" name="cuatrimestre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="input-group input-group-sm mb-3 has-validation">
              <label class="input-group-text" for="inputGroupSelect01">Estatus</label>
              <select class="form-select" id="inputGroupSelect01" name="estatus" required>
                <option selected disabled value><?= $datos->EstatusM ?></option>
                
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
              </select>
            </div>

            <div class="input-group input-group-sm mb-3 has-validation">
              <label class="input-group-text" for="inputGroupSelect01">Academia</label>
              <select class="form-select" id="inputGroupSelect01" name="academia" required>
                <option selected value="<?= $datos->idAcademia ?>"><?= $datos->NombreAca ?></option>

                <?php 
                    $sql2 = $conexion->query("SELECT * FROM academia WHERE idAcademia>1");
                    while ($dato = $sql2->fetch_object()) { ?>

                <option value="<?= $dato->idAcademia ?>"><?= $dato->NombreAca ?></option>

                <?php } ?>

              </select>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="submit">Editar</button>
        </form>
      </div>
    </div>
  </div>
</div>