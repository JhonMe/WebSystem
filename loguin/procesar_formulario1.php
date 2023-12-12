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



// Recoger datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fechaIngreso = $_POST['fecha-ingreso'];
$fechaEntregaEPPs = $_POST['fecha-entrega-epps'];
$guantesEntrega = $_POST['guantes-entrega'];
$mascarillaEntrega = $_POST['mascarilla-entrega'];
$tallaZapato = $_POST['talla-zapato'];
$tallaPantalon = $_POST['talla-pantalon'];

// Sentencia SQL para insertar los datos en la base de datos
$sql = "INSERT INTO talleres (nombre, apellido, fecha_ingreso, fecha_entrega_epps, guantes_entrega, mascarilla_entrega, talla_zapato, talla_pantalon)
VALUES ('$nombre', '$apellido', '$fechaIngreso', '$fechaEntregaEPPs', '$guantesEntrega', '$mascarillaEntrega', '$tallaZapato', '$tallaPantalon')";

if ($conn->query($sql) === TRUE) {
    header("Location: bienvenido.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>