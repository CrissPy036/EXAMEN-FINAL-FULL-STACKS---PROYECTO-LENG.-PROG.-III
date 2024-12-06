<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');
require_once(CONTROLLER_PATH . 'clienteController.php');
$object = new clienteController();
$idCliente = $_GET['id'];
$cliente = $object->search($idCliente);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body>
    <?php
    require_once(VIEW_PATH . '/navbar/navbar.php');
    ?>
    <div class="container">
        <div class="mb-3">
            <h2>Editando Cliente</h2>
        </div>
        <form id="formCliente" action="update.php" method="post" class="g-3 needs-validation" novalidate>
            <div class="mb-3">
                <label for="id" class="form-label">ID Cliente</label>
                <input value="<?= $cliente['id'] ?>" type="text" class="form-control" id="id" name="id" readonly>
            </div>
            <div class="mb-3">
                <label for="ruc" class="form-label">RUC</label>
                <input value="<?= $cliente['ruc'] ?>" type="text" class="form-control" id="ruc" name="ruc" required>
                <div class="invalid-feedback">Ingrese un RUC válido!</div>
            </div>
            <div class="mb-3">
                <label for="nombre_completo" class="form-label">Nombre Completo</label>
                <input value="<?= $cliente['nombre_completo'] ?>" type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                <div class="invalid-feedback">Ingrese un nombre válido!</div>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <textarea class="form-control" id="direccion" name="direccion" rows="3"><?= $cliente['direccion'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input value="<?= $cliente['telefono'] ?>" type="text" class="form-control" id="telefono" name="telefono" required>
                <div class="invalid-feedback">Ingrese un teléfono válido!</div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/validate.js"></script>

</html>