<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');

// Incluir el controlador de pedidos
require_once(CONTROLLER_PATH . 'pedidoController.php');

// Crear una instancia del controlador de pedidos
$pedidoController = new pedidoController();

// Obtener el ID del pedido desde la URL o el formulario
$idPedido = $_REQUEST['id'];

// Llamar al método delete del controlador para eliminar el pedido
$pedidoController->delete($idPedido);
