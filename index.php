<?php

session_start();

if (isset($_SESSION["usuario"])) {
    header('location: /proyec-gestion-pedidos/main.php');
} else {
    header('location: /proyec-gestion-pedidos/view/usuario/login.php');
}
