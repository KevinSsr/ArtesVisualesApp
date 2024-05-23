<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artesvisuales";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id_cliente = $_POST['id_cliente'];
$fecha = $_POST['fecha'];
$total = $_POST['total'];

$stmt = $conn->prepare("INSERT INTO Orden (ID_Cliente, Fecha, Total) VALUES (?, ?, ?)");
$stmt->bind_param("isd", $id_cliente, $fecha, $total);

if ($stmt->execute()) {
    echo "Registro de orden exitoso";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<a href="menu.html">Regresar al Menu</a>