<?php
require_once('controllers/MedicamentoController.php');
$controller = new MedicamentoController();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if ($action == 'index') {
    $controller->index();
} elseif ($action == 'create') {
    $controller->create($conn);
} elseif ($action == 'edit') {
    $controller->edit($conn);
} elseif ($action == 'delete') {
    $controller->delete($conn);
} else {
    echo "Ruta no válida";
}