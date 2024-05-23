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

$sql = "SELECT * FROM Detalle_Orden";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver Detalles de Órdenes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        td {
            background-color: #f4f4f4;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        a:hover {
            color: #0056b3;
        }
        .btn {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles de Órdenes Registradas</h1>
        <table>
            <tr>
                <th>ID Detalle Orden</th>
                <th>ID Orden</th>
                <th>ID Servicio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["ID_Detalle_Orden"]. "</td>
                            <td>" . $row["ID_Orden"]. "</td>
                            <td>" . $row["Cantidad"]. "</td>
                            <td>" . $row["Subtotal"]. "</td>
                            </tr>";
                  }
              } else {
                  echo "<tr><td colspan='4'>No hay detalles de órdenes registradas</td></tr>";
              }
              $conn->close();
              ?>
          </table>
          <a href="menu.html" class="btn">Regresar al Menu</a>
      </div>
  </body>
  </html>