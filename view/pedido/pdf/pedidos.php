<?php

/**
 * Html2Pdf Library - Pedidos
 * HTML => PDF converter
 **/
include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');
require_once(ROOT_PATH . 'vendor/autoload.php');

// Incluir controlador de pedidos
require_once(CONTROLLER_PATH . 'pedidoController.php');
$object = new pedidoController();
$rows = $object->select(); // Obtener la lista de pedidos

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    // Iniciar el almacenamiento en búfer de la salida
    ob_start();

    // Incluir el archivo HTML que va a ser utilizado para el contenido del PDF
    // Asegúrate de crear el archivo doc/pedidos_html.php que contenga la estructura HTML
    // y los datos de los pedidos. Aquí pasamos la variable $rows que contiene los datos de los pedidos.
    include dirname(__FILE__) . '/doc/pedidos_html.php';  // Este archivo debe tener el HTML con los pedidos.

    // Obtener el contenido del buffer
    $content = ob_get_clean();

    // Crear una instancia de Html2Pdf
    $html2pdf = new Html2Pdf('P', 'A4', 'es', true, 'UTF-8', 3);

    // Configurar el modo de visualización del PDF
    $html2pdf->pdf->SetDisplayMode('fullpage');

    // Escribir el contenido HTML en el archivo PDF
    $html2pdf->writeHTML($content);

    // Generar y mostrar el PDF
    $html2pdf->output('pedidos.pdf');
} catch (Html2PdfException $e) {
    // Limpiar y manejar excepciones
    $html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
