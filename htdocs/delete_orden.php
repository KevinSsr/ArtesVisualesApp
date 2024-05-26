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

$id_orden = $_POST['id_orden'];

$sql = "DELETE FROM Orden WHERE ID_Orden = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_orden);

if ($stmt->execute()) {
    echo "Orden eliminada correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>

<a href="menu.html">Regresar al Menu</a>
