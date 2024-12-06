<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Capturar datos del formulario
$nombre_usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : null;
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : null;

include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');
require_once(CONTROLLER_PATH . 'usuarioController.php');
$object = new usuarioController();
$resultado = $object->search($nombre_usuario);

if ($resultado) {
    $data = $resultado;
    $idUsuario = $resultado['id'];
    $nombre_usuario = $resultado['nombre_usuario'];
    $hash = $resultado['pass_hash'];

    // Verificar la contraseña ingresada con el hash almacenado
    if (password_verify($clave, $hash)) {
        $_SESSION["idUsuario"] = $idUsuario;
        $_SESSION["usuario"] = $nombre_usuario;
    } else {
        $_SESSION["idUsuario"] = null;
        $_SESSION["usuario"] = null;
        $data = null;
    }
} else {
    $_SESSION["idUsuario"] = null;
    $_SESSION["usuario"] = null;
    $data = null;
}

// Devolver respuesta en formato JSON
print json_encode($data);
exit();
