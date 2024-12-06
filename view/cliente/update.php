<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');

require_once(CONTROLLER_PATH . 'clienteController.php');
$object = new clienteController();

$ruc = $_REQUEST['ruc'];
$nombreCompleto = $_REQUEST['nombre_completo'];
$direccion = $_REQUEST['direccion'];
$telefono = $_REQUEST['telefono'];

$object->update($idCliente, $ruc, $nombreCompleto, $direccion, $telefono);
?>
<script>
    history.replaceState(null, null, location.pathname);
</script>