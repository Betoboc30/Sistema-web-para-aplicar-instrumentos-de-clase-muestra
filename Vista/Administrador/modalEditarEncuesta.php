<div class="modal fade" id="edit<?php echo $datos->idEncuesta; ?>" tabindex="-1" aria-labelledby="modalApyCi" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar pregunta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 needs-validation" method="POST" action="../../Controlador/Administrador/editarEncuesta.php" novalidate>

          <input type="hidden" class="form-control" value="<?php echo $datos->idEncuesta; ?>" name="idencuesta" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>

            <div class="input-group input-group-sm mb-3 mt-3 has-validation">
              <span class="input-group-text" id="inputGroup-sizing-sm">Pregunta</span>
              <input type="text" name="pregunta" value="<?= $datos->Pregunta ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
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