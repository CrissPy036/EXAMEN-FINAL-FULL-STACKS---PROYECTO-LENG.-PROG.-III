<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header('location: ../usuario/login.php');
    exit();
}

include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');
require_once(CONTROLLER_PATH . 'pedidoController.php');

// Instanciando el controlador de pedidos
$pedidoController = new pedidoController();

// Obtener listas necesarias para el formulario
$clientes = $pedidoController->getClientes();
$estados = $pedidoController->getEstados();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Agregar Pedido</title>
</head>

<body>
    <?php
    require_once(VIEW_PATH . 'navbar/navbar.php');
    ?>
    <div class="container">
        <div class="mb-3">
            <h2>Agregar nuevo pedido</h2>
        </div>
        <form id="formPedido" action="store.php" method="post" class="g-3 needs-validation" novalidate>
            <div class="mb-3">
                <label for="creado_en" class="form-label">Fecha de Creación</label>

                <input type="date" class="form-control" id="creado_en" name="creado_en" value="<?= date('Y-m-d') ?>" required>

                <div class="invalid-feedback">Ingrese una fecha válida!</div>
            </div>
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <select class="form-control" name="id_cliente" id="id_cliente" required>
                    <option selected disabled value="">Seleccione un cliente</option>
                    <?php foreach ($clientes as $cliente) { ?>
                        <option value="<?= $cliente['id'] ?>"><?= $cliente['nombre_completo'] ?></option>
                    <?php } ?>
                </select>
                <div class="invalid-feedback">Seleccione un cliente válido!</div>
            </div>
            <div class="mb-3">
                <label for="contacto" class="form-label">Contacto</label>
                <input type="text" class="form-control" id="contacto" name="contacto" required>
                <div class="invalid-feedback">Ingrese un contacto válido!</div>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                <div class="invalid-feedback">Ingrese una descripción válida!</div>
            </div>
            <div class="mb-3">
                <label for="id_estado" class="form-label">Estado</label>
                <select class="form-control" name="id_estado" id="id_estado" required>
                    <option selected disabled value="">Seleccione un estado</option>
                    <?php foreach ($estados as $estado) { ?>
                        <option value="<?= $estado['id'] ?>"><?= $estado['descripcion_estado'] ?></option>
                    <?php } ?>
                </select>
                <div class="invalid-feedback">Seleccione un estado válido!</div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg col-4">Guardar</button>
        </form>
    </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>

</html>