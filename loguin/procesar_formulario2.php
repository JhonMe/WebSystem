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

if ($_SERVER["REQUEST_METHOD"] == "POST") 
// Recuperar los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha_ingreso = $_POST['fecha-ingreso'];
$fecha_entrega_epps = $_POST['fecha-entrega-epps'];
$talla_guardapolvo = $_POST['talla-guardapolvo'];

// Consulta SQL para insertar los datos en la base de datos
$sql = "INSERT INTO aula (nombre, apellido, fecha_ingreso, fecha_entrega_epps, talla_guardapolvo)
VALUES ('$nombre', '$apellido', '$fecha_ingreso', '$fecha_entrega_epps', '$talla_guardapolvo')";

if ($conn->query($sql) === TRUE) {
    header("Location: bienvenido.php");
} else {
    echo "Error al insertar datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>