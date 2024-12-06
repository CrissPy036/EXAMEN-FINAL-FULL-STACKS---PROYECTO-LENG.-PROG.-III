<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');

require_once(CONTROLLER_PATH . 'clienteController.php');
$object = new clienteController();

// Obtener valores del formulario
$idCliente = $_REQUEST['id'];
$ruc = $_REQUEST['ruc'];
$nombreCompleto = $_REQUEST['nombre_completo'];
$direccion = $_REQUEST['direccion'];
$telefono = $_REQUEST['telefono'];

// Insertar el registro
$registro = $object->insert($ruc, $nombreCompleto, $direccion, $telefono);

// Redirigir o manejar errores
if ($registro) {
    header('Location: /proyec-gestion-pedidos/views/cliente/index.php');
    exit();
} else {
    echo "Error al insertar el cliente.";
}

?>
<script>
    history.replaceState(null, null, location.pathname);
</script>