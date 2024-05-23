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

$id_servicio = $_POST['id_servicio'];

$sql = "DELETE FROM Servicio WHERE ID_Servicio = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_servicio);

if ($stmt->execute()) {
    echo "Servicio eliminado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>

<a href="menu.html">Regresar al Menu</a>
