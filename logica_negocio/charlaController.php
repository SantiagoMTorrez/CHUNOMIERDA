<?php
require_once __DIR__ . "/../Persistencia/charlaModel.php"; 
class CharlaController {
    private $model;

    public function __construct() {
        $this->model = new CharlaModel();
    }

    public function listar() {
        return $this->model->getAll();
    }

    public function obtener($id) {
        return $this->model->getById($id);
    }

    public function crear($data) {
        return $this->model->insert($data);
    }

    public function actualizar($id, $data) {
        return $this->model->update($id, $data);
    }

    public function eliminar($id) {
        return $this->model->delete($id);
    }
}
?>
