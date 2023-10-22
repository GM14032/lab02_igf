<?php
require_once('./models/Medicamento.php');
require_once('./config.php');

class MedicamentoController
{
    private $medicamentos;

    public function __construct()
    {
        $this->medicamentos = array();
    }
    public function index() {
        require('./views/medicamento_list.php');
    }

    public function create($conn) {
        if (isset($_POST['create_medicamento'])) {

            $nombre = $_POST['nombre'];
            $tipo = $_POST['tipo'];
            $cantidad = $_POST['cantidad'];
            $Distribuidor = $_POST['distribuidor'];
            $s1 = $_POST['sucursal1'];
            $s2 = $_POST['sucursal2'];

            if ($s1 == null || $s2 == null) {
                $sucursal = "Para la farmacia situada en " . $s1 . $s2;
            } else {
                $sucursal = "Para la farmacia situada en " . $s1 . " y para la situada en " . $s2;
            }

            $medicamento = new Medicamento(null, $nombre, $tipo, $cantidad, $Distribuidor, $sucursal);
            Medicamento::createMedicamento($conn, $medicamento);
        }
        require('./views/medicamento_list.php');
    }
    public function edit($conn) {
        if (isset($_POST['update_medicamento'])) {
            $medicamento_id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $tipo = $_POST['tipo'];
            $cantidad = $_POST['cantidad'];
            $Distribuidor = $_POST['distribuidor'];
            $s1 = $_POST['sucursal1'];
            $s2 = $_POST['sucursal2'];

            if ($s1 == null || $s2 == null) {
                $sucursal = "Para la farmacia situada en " . $s1 . $s2;
            } else {
                $sucursal = "Para la farmacia situada en " . $s1 . " y para la situada en " . $s2;
            }

            $medicamento = new Medicamento($medicamento_id, $nombre, $tipo, $cantidad, $Distribuidor, $sucursal);
            Medicamento::updateMedicamento($conn, $medicamento);
            require('./views/medicamento_list.php');
        } else {
            $id = $_GET['id'];
            $medicamento = Medicamento::getMedicamento($conn, $id);
            require('./views/update_medicamento.php');
        }
    }
    public function delete($conn) {
        $id = $_POST['id'];
        Medicamento::deleteMedicamento($conn, $id);
        require('./views/medicamento_list.php');
    }
}