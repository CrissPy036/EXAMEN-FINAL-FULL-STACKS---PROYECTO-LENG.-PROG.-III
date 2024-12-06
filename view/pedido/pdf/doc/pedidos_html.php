<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
    <page_header>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left; width: 33%">LP3-Gestion de Pedidos</td>
                <td style="text-align: center; width: 34%"><strong>LISTADO DE PEDIDOS</strong></td>
                <td style="text-align: right; width: 33%"><?php echo date('d/m/Y'); ?></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
                <td style="text-align: left; width: 50%">Gestión de Pedidos</td>
                <td style="text-align: right; width: 50%">página [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>

    <br><br>

    <table style="width: 80%; border: solid 1px #5544DD; border-collapse: collapse; text-align: center;">
        <thead>
            <tr>
                <th style="width: 15%; text-align: left; border: solid 1px #5544DD; background: #5544DD; color: #FFFFFF;"><span style="color: #FFFFFF;">ID</span></th>
                <th style="width: 25%; text-align: left; border: solid 1px #5544DD; background: #5544DD; color: #FFFFFF;"><span style="color: #FFFFFF;">FECHA</span></th>
                <th style="width: 25%; text-align: left; border: solid 1px #5544DD; background: #5544DD; color: #FFFFFF;"><span style="color: #FFFFFF;">CLIENTE</span></th>
                <th style="width: 20%; text-align: left; border: solid 1px #5544DD; background: #5544DD; color: #FFFFFF;"><span style="color: #FFFFFF;">DESCRIPCIÓN</span></th>
                <th style="width: 15%; text-align: left; border: solid 1px #5544DD; background: #5544DD; color: #FFFFFF;"><span style="color: #FFFFFF;">ESTADO</span></th>
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
                        <?= date('d/m/Y', strtotime($row['creado_en'])) ?>
                    </td>
                    <td style="width: 35%; text-align: left; border: solid 1px #5544DD">
                        <?= $row['cliente'] ?>
                    </td>
                    <td style="width: 35%; text-align: left; border: solid 1px #5544DD">
                        <?= nl2br($row['descripcion']) ?>
                    </td>
                    <td style="width: 20%; text-align: left; border: solid 1px #5544DD">
                        <?= $row['estado'] ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</page>