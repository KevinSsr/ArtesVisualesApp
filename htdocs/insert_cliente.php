<?php
$servername = "localhost";
$username = "root"; // Cambia esto si tienes otro usuario
$password = ""; // Cambia esto si tienes una contraseña
$dbname = "artesvisuales"; // Cambia esto al nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

$stmt = $conn->prepare("INSERT INTO Cliente (Nombre, Apellido, Teléfono, Email) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $apellido, $telefono, $email);

if ($stmt->execute()) {
    echo "Registro de cliente exitoso";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
