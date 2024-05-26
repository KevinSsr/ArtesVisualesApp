<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artesvisuales";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

$stmt = $conn->prepare("INSERT INTO cliente (Nombre, Apellido, Teléfono, Email) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $apellido, $telefono, $email);

if ($stmt->execute()) {
    echo "Cliente ingresado correctamente";
} else {
    echo "Error: " .  $conn->error;
}

$stmt->close();
$conn->close();
?>

<a href="menu.html">Regresar al Menu</a>
