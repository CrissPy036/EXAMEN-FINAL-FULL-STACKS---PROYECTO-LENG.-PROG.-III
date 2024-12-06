<?php
class pedidoController
{
    private $model;

    public function __construct()
    {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/proyec-gestion-pedidos/routes.php');
        require_once(MODEL_PATH . 'pedidoModel.php');
        $this->model = new pedidoModel();
    }

    public function insert($creado_en, $id_cliente, $contacto, $descripcion, $id_estado)
    {
        $id = $this->model->insertar($creado_en, $id_cliente, $contacto, $descripcion, $id_estado);
        return ($id != false) ? header('location: ./index.php') : header('location: ./create.php');
    }

    public function update($id, $id_cliente, $contacto, $descripcion, $id_estado)
    {
        return ($this->model->actualizar($id, $id_cliente, $contacto, $descripcion, $id_estado) != false)
            ? header('location: ./index.php') : header('location: ./edit.php?id=' . $id);
    }

    public function delete($id)
    {
        return ($this->model->eliminar($id)) ? header('location: ./index.php') :
            header('location: ./index.php');
    }

    public function search($id)
    {
        return ($this->model->buscar($id) != false) ? $this->model->buscar($id) :
            header('location: ./index.php');
    }

    public function select()
    {
        return ($this->model->listar()) ? $this->model->listar() : false;
    }

    public function getClientes()
    {
        // Suponiendo que tienes un modelo para manejar clientes
        require_once(MODEL_PATH . 'clienteModel.php');
        $clienteModel = new clienteModel();
        return $clienteModel->listar(); // Devuelve la lista de clientes
    }

    public function getEstados()
    {
        // Suponiendo que el modelo de estados está manejado por `pedidoModel`
        return $this->model->listarEstados(); // Crear método en `pedidoModel`
    }

    public function searchPedido($id)
    {
        $pedido = $this->model->buscar($id); // Este método debe obtener los detalles del pedido desde la base de datos.
        return $pedido;
    }
}
