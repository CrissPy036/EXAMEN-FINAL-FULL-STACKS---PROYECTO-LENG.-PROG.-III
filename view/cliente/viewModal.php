<div class="modal fade" id="idver<?= $row['idCliente'] ?>" tabindex="-1" aria-labelledby="VistaModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="VistaModal">Detalles del Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card" style="width: 28rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">NOMBRE COMPLETO: <?= $row['nombre_completo'] ?></li>
                        <li class="list-group-item">RUC: <?= $row['ruc'] ?></li>
                        <li class="list-group-item">DIRECCIÓN: <?= $row['direccion'] ?></li>
                        <li class="list-group-item">TELÉFONO: <?= $row['telefono'] ?></li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>