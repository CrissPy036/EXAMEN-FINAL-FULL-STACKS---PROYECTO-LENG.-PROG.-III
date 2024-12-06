<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');
require_once(CONTROLLER_PATH . 'clienteController.php');
$object = new clienteController();
$rows = $object->select();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once(ROOT_PATH . 'header.php') ?>
    <title>Clientes</title>
</head>

<body>
    <?php
    require_once(VIEW_PATH . 'navbar/navbar.php');
    ?>
    <section class="intro">
        <div class="container">
            <div class="mb-3"></div>
            <div class="mb-3">
                <a href="create.php" class="btn btn-primary">Agregar</a>
                <!-- <a href="javascript:imprimirWindow('ventana')" class="btn btn-info">Imprimir</a> -->
                <a href="pdf/clientes.php" target="_blank" class="btn btn-info">Imprimir</a>
            </div>
            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px;">
                <table id="myTabla" class="table table-striped mb-0">
                    <thead style="background-color: #002d72;">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">RUC</th>
                            <th scope="col">NOMBRE COMPLETO</th>
                            <th scope="col">DIRECCIÓN</th>
                            <th scope="col">TELÉFONO</th>
                            <th scope="col">OPERACIONES</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ((array) $rows as $row) { ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['ruc'] ?></td>
                                <td><?= $row['nombre_completo'] ?></td>
                                <td><?= $row['direccion'] ?></td>
                                <td><?= $row['telefono'] ?></td>
                                <td>
                                    <!-- <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#idver<?= $row['id'] ?>">Ver</a> -->
                                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Editar</a>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#iddel<?= $row['id'] ?>">Eliminar</a>
                                    <!-- modal para ver y del -->
                                    <?php
                                    include('viewModal.php');
                                    include('deleteModal.php');
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </section>
    <!-- div area de impresion -->
    <div class="container" id="ventana" style="display:none;">
        <div class="mb-3">
            <h2 style="font-size: 3.00rem;">Listado de Clientes</h2>
        </div>
        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px;">
            <table class="table table-striped mb-0" style="font-size: 2.00rem;">
                <thead>
                    <tr>
                        <th colspan="1" scope="col">ID</th>
                        <th colspan="3" scope="col">RUC</th>
                        <th colspan="3" scope="col">NOMBRE COMPLETO</th>
                        <th colspan="3" scope="col">DIRECCIÓN</th>
                        <th colspan="3" scope="col">TELÉFONO</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td colspan="1"><?= $row['id'] ?></td>
                            <td colspan="3"><?= $row['ruc'] ?></td>
                            <td colspan="3"><?= $row['nombre_completo'] ?></td>
                            <td colspan="3"><?= $row['direccion'] ?></td>
                            <td colspan="3"><?= $row['telefono'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
    <!-- fin area de impresion -->
</body>
<?php include_once(ROOT_PATH . 'footer.php') ?>
<script>
    $(document).ready(function() {
        //$('#myTabla').DataTable();
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