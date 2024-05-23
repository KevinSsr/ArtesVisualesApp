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

$id_cliente = $_POST['id_cliente'];

$sql = "DELETE FROM Cliente WHERE ID_Cliente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_cliente);

if ($stmt->execute()) {
    echo "Cliente eliminado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>

<a href="menu.html">Regresar al Menu</a>
