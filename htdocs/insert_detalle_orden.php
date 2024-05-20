<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artesvisuales";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id_orden = $_POST['id_orden'];
$id_servicio = $_POST['id_servicio'];
$cantidad = $_POST['cantidad'];
$subtotal = $_POST['subtotal'];

$stmt = $conn->prepare("INSERT INTO Detalle_Orden (ID_Orden, ID_Servicio, Cantidad, Subtotal) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiid", $id_orden, $id_servicio, $cantidad, $subtotal);

if ($stmt->execute()) {
    echo "Registro de detalle de orden exitoso";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
