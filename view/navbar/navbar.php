<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');
if (!(isset($_SESSION))) {
  session_start();
}
$usuario = null;
if (isset($_SESSION["usuario"])) {
  $usuario = $_SESSION["usuario"];
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= PROJECT_PATH ?>">Gestion de Pedidos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pedidos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= PROJECT_PATH ?>view/pedido/create.php">Nuevo Pedido</a></li>
            <li><a class="dropdown-item" href="<?= PROJECT_PATH ?>view/pedido/">Ver Lista de Pedidos</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Clientes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= PROJECT_PATH ?>view/cliente/create.php">Nuevo Cliente</a></li>
            <li><a class="dropdown-item" href="<?= PROJECT_PATH ?>view/cliente/">Ver Lista de Clientes</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= ucfirst($usuario) ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= PROJECT_PATH ?>view/usuario/logout.php">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>