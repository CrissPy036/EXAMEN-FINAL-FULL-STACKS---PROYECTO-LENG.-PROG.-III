<?php
class usuarioModel
{
    private $PDO;

    public function __construct()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');
        require_once(DAO_PATH . 'database.php');
        $data = new dataConex();
        $this->PDO = $data->conexion();
    }

    // Método para listar usuarios
    public function listar()
    {
        $sql = 'SELECT * FROM usuario ORDER BY id';
        $statement = $this->PDO->prepare($sql);
        return ($statement->execute()) ? $statement->fetchAll() : false;
    }

    // Método para buscar un usuario por su nombre de usuario
    public function buscar($nombre_usuario)
    {
        $sql = 'SELECT * FROM usuario WHERE nombre_usuario=:nombre_usuario';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nombre_usuario', $nombre_usuario);
        return ($statement->execute()) ? $statement->fetch() : false;
    }

    // Método para insertar un nuevo usuario
    public function insertar($nombre_usuario, $clave, $id_persona)
    {
        // Generar el hash de la contraseña
        $clave = password_hash($clave, PASSWORD_DEFAULT);

        // Insertar el usuario en la tabla
        $sql = 'INSERT INTO usuario (nombre_usuario, pass_hash, id_persona) VALUES (:nombre_usuario, :pass_hash, :id_persona)';
        $statement = $this->PDO->prepare($sql);
        $statement->bindParam(':nombre_usuario', $nombre_usuario);
        $statement->bindParam(':pass_hash', $clave);
        $statement->bindParam(':id_persona', $id_persona);
        $statement->execute();

        // Retornar el último ID insertado
        return ($this->PDO->lastInsertId());
    }
}
