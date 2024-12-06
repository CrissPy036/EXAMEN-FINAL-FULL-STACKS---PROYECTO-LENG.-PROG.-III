<?php
class clienteModel
{
    private $PDO;

    public function __construct()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');
        require_once(DAO_PATH . 'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    public function insertar($ruc, $nombre_completo, $direccion, $telefono)
    {
        $sql = 'INSERT INTO cliente (ruc, nombre_completo, direccion, telefono) VALUES (:ruc, :nombre_completo, :direccion, :telefono)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':ruc', $ruc);
        $statement->bindParam(':nombre_completo', $nombre_completo);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':telefono', $telefono);
        $statement->execute();
        return ($this->PDO->lastInsertId());
    }

    public function actualizar($id, $ruc, $nombre_completo, $direccion, $telefono)
    {
        $sql = 'UPDATE cliente SET ruc = :ruc, nombre_completo = :nombre_completo, direccion = :direccion, telefono = :telefono WHERE id = :id';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':ruc', $ruc);
        $statement->bindParam(':nombre_completo', $nombre_completo);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':telefono', $telefono);
        return ($statement->execute()) ? true : false;
    }

    public function eliminar($id)
    {
        $sql = 'DELETE FROM cliente WHERE id = :id';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id', $id);
        return ($statement->execute()) ? true : false;
    }

    public function listar()
    {
        $sql = 'SELECT id, ruc, nombre_completo, direccion, telefono FROM cliente ORDER BY id DESC';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    public function buscar($id)
    {
        $sql = 'SELECT id, ruc, nombre_completo, direccion, telefono FROM cliente WHERE id = :id';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':id', $id);
        return ($statement->execute()) ? $statement->fetch() : false;
    }
}
