<?php
$host = 'localhost';
$user = 'root';
$password = 'admin2023';
$database = 'farmaciaDB';

$conn = new mysqli($host, $user, $password);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    $conn->select_db($database);
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS Medicamento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    tipo VARCHAR(255),
    cantidad INT,
    Distribuidor VARCHAR(255),
    sucursal VARCHAR(255)
)";

    if ($conn->query($sqlCreateTable) === FALSE) {
        echo "<script>alert('Error al crear la tabla Medicamento: " . $conn->error . "');</script>";
    }  
    
} else {
    echo "<script>alert('Error al crear la base de datos: " . $conn->error . "');</script>";
}
$GLOBALS['conn'] = $conn;