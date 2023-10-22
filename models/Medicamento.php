<?php

class Medicamento
{
    public $id;
    public $nombre;
    public $tipo;
    public $cantidad;
    public $Distribuidor;
    public $sucursal;

    public function __construct($id = null, $nombre = null, $tipo = null, $cantidad = null, $Distribuidor = null, $sucursal = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->cantidad = $cantidad;
        $this->Distribuidor = $Distribuidor;
        $this->sucursal = $sucursal;
    }

    public static function getAllMedicamentos($conn) {
        $sql = "SELECT * FROM Medicamento";
        $result = $conn->query($sql);
        $medicamentos = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $medicamentos[] = new Medicamento(
                    $row['id'],
                    $row['nombre'],
                    $row['tipo'],
                    $row['cantidad'],
                    $row['Distribuidor'],
                    $row['sucursal']
                );
            }
        }

        return $medicamentos;

    }
    public static function createMedicamento($conn, Medicamento $medicamento) {
        $sql = "INSERT INTO Medicamento (nombre, tipo, cantidad, Distribuidor, sucursal) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiss", $medicamento->nombre, $medicamento->tipo, $medicamento->cantidad, $medicamento->Distribuidor, $medicamento->sucursal);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public static function getMedicamento($conn, $id) {
        $sql = "SELECT * FROM Medicamento WHERE id = $id";
        $result = $conn->query($sql);
        $medicamento = null;

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $medicamento = new Medicamento(
                    $row['id'],
                    $row['nombre'],
                    $row['tipo'],
                    $row['cantidad'],
                    $row['Distribuidor'],
                    $row['sucursal']
                );
            }
        }

        return $medicamento;
    }
    public static function updateMedicamento($conn, Medicamento $medicamento) {
        $sql = "UPDATE Medicamento SET nombre = ?, tipo = ?, cantidad = ?, Distribuidor = ?, sucursal = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssissi", $medicamento->nombre, $medicamento->tipo, $medicamento->cantidad, $medicamento->Distribuidor, $medicamento->sucursal, $medicamento->id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public static function deleteMedicamento($conn, $id) {
        $sql = "DELETE FROM Medicamento WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}