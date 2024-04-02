<div class="modal fade" id="delete<?php echo $datos->idEncuesta;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar pregunta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form class="row g-3 needs-validation mt-2" method="POST" action="../../Controlador/Administrador/eliminarEncuesta.php" novalidate>

          <input type="hidden" name="idencuesta" value="<?php echo $datos->idEncuesta; ?>"  readonly>

          <div class="container">
            
            <p class="fs-6 text-center">¿Seguro que quieres eliminar la siguiente pregunta?</p>
             <p class="fs-5 fw-bold text-center"><?php echo  $datos->Pregunta ?> </p>
          </div>

     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-danger" type="submit">Eliminar</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>

 