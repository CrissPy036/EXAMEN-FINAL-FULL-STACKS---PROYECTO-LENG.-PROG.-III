<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');
require_once(CONTROLLER_PATH . 'pedidoController.php');
$object = new pedidoController();
$rows = $object->select(); // Obtén la lista de pedidos
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once(ROOT_PATH . 'header.php') ?>
    <title>Pedidos</title>
    <style>
        table td {
            word-wrap: break-word;
            /* Permite que el texto largo se ajuste y se divida en líneas */
            white-space: normal;
            /* Permite que los saltos de línea dentro del texto sean respetados */
            max-width: 250px;
            /* Limita el ancho máximo de la columna para controlar el ajuste */
        }
    </style>
</head>

<body>
    <?php
    require_once(VIEW_PATH . 'navbar/navbar.php');
    ?>
    <section class="intro">
        <div class="container">
            <div class="mb-3"></div>
            <div class="mb-3">
                <a href="create.php" class="btn btn-primary">Agregar Pedido</a>
                <a href="pdf/pedidos.php" target="_blank" class="btn btn-info">Imprimir</a>
            </div>
            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px;">
                <table id="myTabla" class="table table-striped mb-0">
                    <thead style="background-color: #002d72;">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">CLIENTE</th>
                            <th scope="col">CONTACTO</th>
                            <th scope="col">DESCRIPCIÓN</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">OPERACIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ((array) $rows as $row) { ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['creado_en'] ?></td>
                                <td><?= $row['cliente'] ?></td>
                                <td><?= $row['contacto'] ?></td>
                                <td><?= $row['descripcion'] ?></td>
                                <td><?= $row['estado'] ?></td>
                                <td>
                                    <div style="display: flex; flex-direction: column; gap: 5px;">
                                        <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#idver<?= $row['id'] ?>">Ver</a>
                                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Editar</a>
                                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </section>
</body>
<?php include_once(ROOT_PATH . 'footer.php') ?>
<script>
    $(document).ready(function() {
        var table = new DataTable('#myTabla', {
            language: {
                url: '../../assets/js/es-ES.json',
            },
            'paging': true,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, 'Todos']
            ]
        });
    });
</script>

</html>