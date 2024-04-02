<div class="modal fade" id="delete<?php echo $datos->idAcademia;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar academia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form class="row g-3 needs-validation mt-2" method="POST" action="../../Controlador/Administrador/eliminarAcademia.php" novalidate>

          <input type="hidden" name="idacademia" value="<?php echo $datos->idAcademia; ?>"  readonly>

          <div class="container">
            
            <p class="fs-5">¿Seguro que quieres eliminar la academia <?php echo  $datos->NombreAca ?>?</p>
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

 