<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');
require_once(CONTROLLER_PATH . 'pedidoController.php');

$pedidoController = new pedidoController();

$id = $_POST['id'];
$creado_en = $_POST['creado_en'];
$id_cliente = $_POST['id_cliente'];
$contacto = $_POST['contacto'];
$descripcion = $_POST['descripcion'];
$id_estado = $_POST['id_estado'];

$pedidoController->update($id, $id_cliente, $contacto, $descripcion, $id_estado);
?>

<script>
    history.replaceState(null, null, location.pathname);
</script>