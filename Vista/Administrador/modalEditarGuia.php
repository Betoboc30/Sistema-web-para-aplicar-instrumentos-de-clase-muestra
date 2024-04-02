<div class="modal fade" id="edit<?php echo $datos->idGuiaObservacion;?>" tabindex="-1" aria-labelledby="modalApyCi" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar rubro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" method="POST" action="../../Controlador/Administrador/editarGuiaObservacion.php" novalidate>

        	<input type="hidden" class="form-control" value="<?php echo $datos->idGuiaObservacion; ?>" name="idguia" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

        		<div class="input-group input-group-sm mb-3 has-validation mt-3">
						  <span class="input-group-text" id="inputGroup-sizing-sm">Rubro</span>
						 <textarea class="form-control" id="validationTextarea" name="rubro" required><?= $datos->Rubro?></textarea>
						</div>

						<div class="input-group input-group-sm mb-3 has-validation">
						  <label class="input-group-text" for="inputGroupSelect01">Porcentaje</label>
						  <select class="form-select" id="inputGroupSelect01" name="porcentaje" required>
						    <option selected value="<?= $datos->Porcentaje ?>"><?= $datos->Porcentaje ?></option>
						    <option value="2.5">2.5%</option>
						    <option value="5">5%</option>
						    <option value="10">10%</option>
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
