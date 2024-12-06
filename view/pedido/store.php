<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');

// Importar el controlador de pedidos
require_once(CONTROLLER_PATH . 'pedidoController.php');

// Instanciar el controlador de pedidos
$pedidoController = new pedidoController();

// Capturar los datos enviados desde el formulario
$creado_en = $_REQUEST['creado_en'];
$id_cliente = $_REQUEST['id_cliente'];
$contacto = $_REQUEST['contacto'];
$descripcion = $_REQUEST['descripcion'];
$id_estado = $_REQUEST['id_estado'];

// Insertar el pedido utilizando el controlador
$registro = $pedidoController->insert($creado_en, $id_cliente, $contacto, $descripcion, $id_estado);

?>
<script>
    history.replaceState(null, null, location.pathname);
</script>