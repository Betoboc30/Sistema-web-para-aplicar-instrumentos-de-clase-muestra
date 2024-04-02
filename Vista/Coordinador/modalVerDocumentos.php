<div class="modal fade" id="verDocs<?php echo $datosDocs->idAgenda;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
  <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Documentación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                <div class="row">

                    <div class="col-sm-6 mb-2">
                        <div class="card">
                        <div class="card-body shadow rounded d-flex align-items-center">
                            <div class="d-grid gap-2 col-9">
                                <label class="text-start ps-2" style="font-family: Verdana, sans-serif;">CV</label>
                                <button class="btn btn-sm btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#visualizar" onclick="verDocumento('<?php echo $datosDocs->CV;?>')">
                                    Ver
                                </button>
                            </div>
                            <div class="col-3 ps-2">
                                <h5 class="card-title text-end display-6"><i class="bi bi-file-earmark-check-fill" style="color: #3498DB;" ></i></h5>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mb-2">
                        <div class="card">
                        <div class="card-body shadow rounded d-flex align-items-center">
                            <div class="d-grid gap-2 col-9">
                                <label class="text-start ps-1" style="font-family: Verdana, sans-serif;">Identificación</label>
                                <button class="btn btn-sm btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#visualizar" onclick="verDocumento('<?php echo $datosDocs->Identificacion;?>')">
                                    Ver
                                </button>
                            </div>
                            <div class="col-3 ps-2">
                                <h5 class="card-title text-end display-6"><i class="bi bi-person-vcard" style="color: #2ECC71;" ></i></h5>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mb-2">
                        <div class="card">
                        <div class="card-body shadow rounded d-flex align-items-center">
                            <div class="d-grid gap-2 col-9">
                                <label class="text-start ps-1" style="font-family: Verdana, sans-serif;">Comprobante de domicilio</label>
                                <button class="btn btn-sm btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#visualizar" onclick="verDocumento('<?php echo $datosDocs->CompDomicilio;?>')">
                                    Ver
                                </button>
                            </div>
                            <div class="col-3 ps-2">
                                <h5 class="card-title text-end display-6"><i class="bi bi-geo-alt" style="color: #F71717;" ></i></h5>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mb-2">
                        <div class="card">
                        <div class="card-body shadow rounded d-flex align-items-center">
                            <div class="d-grid gap-2 col-9">
                                <label class="text-start ps-1" style="font-family: Verdana, sans-serif;">Título Académico</label>
                                <button class="btn btn-sm btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#visualizar" onclick="verDocumento('<?php echo $datosDocs->TituloAcad;?>')">
                                    Ver
                                </button>
                            </div>
                            <div class="col-3 ps-2">
                                <h5 class="card-title text-end display-6"><i class="bi bi-bookmark-heart-fill" style="color: #9817F7;" ></i></h5>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mb-2">
                        <div class="card">
                        <div class="card-body shadow rounded d-flex align-items-center">
                            <div class="d-grid gap-2 col-9">
                                <label class="text-start ps-1" style="font-family: Verdana, sans-serif;">Cédula Profesional</label>
                                <button class="btn btn-sm btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#visualizar" onclick="verDocumento('<?php echo $datosDocs->Cedula;?>')">
                                    Ver
                                </button>
                            </div>
                            <div class="col-3 ps-2">
                                <h5 class="card-title text-end display-6"><i class="bi bi-book" style="color: #00D9CC;" ></i></h5>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mb-2">
                        <div class="card">
                        <div class="card-body shadow rounded d-flex align-items-center">
                            <div class="d-grid gap-2 col-9">
                                <label class="text-start ps-1" style="font-family: Verdana, sans-serif;">Acta de Nacimiento</label>
                                <button class="btn btn-sm btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#visualizar" onclick="verDocumento('<?php echo $datosDocs->ActaNaci;?>')">
                                    Ver
                                </button>
                            </div>
                            <div class="col-3 ps-2">
                                <h5 class="card-title text-end display-6"><i class="bi bi-suit-heart-fill" style="color: #E6E600;" ></i></h5>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                   

                    <!-- <p class="fw-bold">CV</p>
                    <iframe src="../../Public/<?php echo $datosDocs->CV;?>" width="750px" height="580" ></iframe> <br><br>
                    <p class="fw-bold">Identificación</p>
                    <iframe src="../../Public/<?php echo $datosDocs->Identificacion;?>" width="750px" height="580" ></iframe><br><br>
                    <p class="fw-bold">Comprobante de domicilio</p>
                    <iframe src="../../Public/<?php echo $datosDocs->CompDomicilio;?>" width="750px" height="580" ></iframe><br><br>
                    <p class="fw-bold">Título Académico</p>
                    <iframe src="../../Public/<?php echo $datosDocs->TituloAcad;?>" width="750px" height="580" ></iframe><br><br>
                    <p class="fw-bold">Cédula</p>
                    <iframe src="../../Public/<?php echo $datosDocs->Cedula;?>" width="750px" height="580" ></iframe><br><br>
                    <p class="fw-bold">Acta de Nacimiento</p>
                    <iframe src="../../Public/<?php echo $datosDocs->ActaNaci;?>" width="750px" height="580" ></iframe><br><br> -->
                </div>
            </div>
</div>
</div>

