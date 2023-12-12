<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "senati";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $fechaIngreso = $_POST["fecha-ingreso"];
    $fechaEntregaEPPs = $_POST["fecha-entrega-epps"];
    $ternoCantidad = $_POST["terno-cantidad"];

    // Consulta SQL para insertar datos en la base de datos
    $sql = "INSERT INTO admistrativo (nombre, apellido, fecha_ingreso, fecha_entrega_epps, terno_cantidad) 
    VALUES ('$nombre', '$apellido', '$fechaIngreso', '$fechaEntregaEPPs', '$ternoCantidad')";

    if ($conn->query($sql) === TRUE) {
        header("Location: bienvenido.php");
    } else {
        echo "Error al registrar datos: " . $conn->error;
    }
}




// Cerrar la conexión a la base de datos
$conn->close();
?>