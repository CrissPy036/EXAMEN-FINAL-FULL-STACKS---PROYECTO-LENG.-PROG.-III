<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left; width: 33%">LP3-Gestion de Pedidos</td>
                <td style="text-align: center; width: 34%"><strong>LISTADO DE CLIENTES</strong></td>
                <td style="text-align: right; width: 33%"><?php echo date('d/m/Y'); ?></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left; width: 50%">Gestión de Clientes</td>
                <td style="text-align: right; width: 50%">página [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <br><br>

    <table style="width: 80%;border: solid 1px #5544DD; border-collapse: collapse align=center">
        <thead>
            <tr>
                <th style="width: 15%; text-align: left; border: solid 1px #5544DD; background: #5544DD; color: #FFFFFF;"><span style="color: #FFFFFF;">ID</span></th>
                <th style="width: 25%; text-align: left; border: solid 1px #5544DD; background: #5544DD; color: #FFFFFF;"><span style="color: #FFFFFF;">RUC</span></th>
                <th style="width: 25%; text-align: left; border: solid 1px #5544DD; background: #5544DD; color: #FFFFFF;"><span style="color: #FFFFFF;">CLIENTE</span></th>
                <th style="width: 20%; text-align: left; border: solid 1px #5544DD; background: #5544DD; color: #FFFFFF;"><span style="color: #FFFFFF;">DIRECCIÓN</span></th>
                <th style="width: 15%; text-align: left; border: solid 1px #5544DD; background: #5544DD; color: #FFFFFF;"><span style="color: #FFFFFF;">TELÉFONO</span></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row) {
            ?>
                <tr>
                    <td style="width: 10%; text-align: left; border: solid 1px #5544DD">
                        <?= $row['id'] ?>
                    </td>
                    <td style="width: 25%; text-align: left; border: solid 1px #5544DD">
                        <?= $row['ruc'] ?>
                    </td>
                    <td style="width: 35%; text-align: left; border: solid 1px #5544DD">
                        <?= $row['nombre_completo'] ?>
                    </td>
                    <td style="width: 35%; text-align: left; border: solid 1px #5544DD">
                        <?= $row['direccion'] ?>
                    </td>
                    <td style="width: 20%; text-align: left; border: solid 1px #5544DD">
                        <?= $row['telefono'] ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</page>