<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artesvisuales";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

$stmt = $conn->prepare("INSERT INTO Servicio (Nombre, Descripción, Precio) VALUES (?, ?, ?)");
$stmt->bind_param("ssd", $nombre, $descripcion, $precio);

if ($stmt->execute()) {
    echo "Registro de servicio exitoso";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<a href="menu.html">Regresar al Menu</a>