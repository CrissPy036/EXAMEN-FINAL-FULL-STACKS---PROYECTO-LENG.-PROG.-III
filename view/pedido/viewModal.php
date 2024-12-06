<div class="modal fade" id="idver<?= $row['id'] ?>" tabindex="-1" aria-labelledby="VistaModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="VistaModal">Detalle del Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                // Importar el controlador
                require_once(CONTROLLER_PATH . 'pedidoController.php');
                $pedidoController = new pedidoController();

                // Obtener los detalles del pedido utilizando el ID
                $pedido = $pedidoController->searchPedido($row['id']);
                ?>
                <div class="card" style="width: 28rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">FECHA: <?= $pedido['creado_en'] ?></li>
                        <li class="list-group-item">CLIENTE: <?= $pedido['cliente'] ?></li>
                        <li class="list-group-item">CONTACTO: <?= $pedido['contacto'] ?></li>
                        <li class="list-group-item">DESCRIPCIÓN: <?= $pedido['descripcion'] ?></li>
                        <li class="list-group-item">ESTADO: <?= $pedido['estado'] ?></li>

                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>