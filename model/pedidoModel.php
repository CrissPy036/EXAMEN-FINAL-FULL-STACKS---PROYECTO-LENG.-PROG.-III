<?php
class pedidoModel
{
    private $PDO;

    public function __construct()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');
        require_once(DAO_PATH . 'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    public function insertar($creado_en, $id_cliente, $contacto, $descripcion, $id_estado)
    {
        $sql = 'INSERT INTO pedido (creado_en, id_cliente, contacto, descripcion, id_estado) VALUES (:creado_en, :id_cliente, :contacto, :descripcion, :id_estado)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':creado_en', $creado_en);
        $statement->bindParam(':id_cliente', $id_cliente);
        $statement->bindParam(':contacto', $contacto);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':id_estado', $id_estado);
        $statement->execute();
        return ($this->PDO->lastInsertId());
    }

    public function actualizar($id, $id_cliente, $contacto, $descripcion, $id_estado)
    {
        $sql = 'UPDATE pedido SET id_cliente = :id_cliente, contacto = :contacto, descripcion = :descripcion, id_estado = :id_estado WHERE id = :id';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':id_cliente', $id_cliente);
        $statement->bindParam(':contacto', $contacto);
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':id_estado', $id_estado);
        return ($statement->execute()) ? true : false;
    }

    public function eliminar($id)
    {
        $sql = 'DELETE FROM pedido WHERE id = :id';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id', $id);
        return ($statement->execute()) ? true : false;
    }

    public function listar()
    {
        $sql = 'SELECT p.id, p.creado_en, c.nombre_completo AS cliente, p.contacto, p.descripcion, e.descripcion_estado AS estado 
                FROM pedido p
                JOIN cliente c ON p.id_cliente = c.id
                JOIN estado e ON p.id_estado = e.id
                ORDER BY p.id DESC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function buscar($id)
    {
        $sql = 'SELECT p.id, p.creado_en, c.nombre_completo AS cliente, p.contacto, p.descripcion, e.descripcion_estado AS estado 
                FROM pedido p
                JOIN cliente c ON p.id_cliente = c.id
                JOIN estado e ON p.id_estado = e.id
                WHERE p.id = :id';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id', $id);
        return ($statement->execute()) ? $statement->fetch() : false;
    }

    public function listarEstados()
    {
        $sql = 'SELECT id, descripcion_estado FROM estado';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }
}
