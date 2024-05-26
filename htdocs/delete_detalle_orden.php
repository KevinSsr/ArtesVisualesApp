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

$id_detalle_orden = $_POST['id_detalle_orden'];

$sql = "DELETE FROM Detalle_Orden WHERE ID_Detalle_Orden = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_detalle_orden);

if ($stmt->execute()) {
    echo "Detalle de orden eliminado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>

<a href="menu.html">Regresar al Menu</a>
