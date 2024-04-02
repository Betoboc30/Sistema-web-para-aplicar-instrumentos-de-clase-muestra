<div class="modal fade" id="edit<?php echo $datos->idAcademia; ?>" tabindex="-1" aria-labelledby="modalApyCi" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar academia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" method="POST" action="../../Controlador/Administrador/editarAcademia.php" novalidate>

        	<input type="hidden" class="form-control" value="<?php echo $datos->idAcademia; ?>" name="idacademia" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

        		<div class="input-group input-group-sm mb-3 has-validation">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Nombre de la academia</span>
						  <input type="text" name="academia" value="<?= $datos->NombreAca ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Periodo</label>
						  <select class="form-select" id="inputGroupSelect01" name="periodo" required>
						    <option selected disabled value><?= $datos->Periodo ?></option>
						    <option value="1">Primavera</option>
						    <option value="2">Otoño</option>
						    <option value="3">Invierno</option>
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