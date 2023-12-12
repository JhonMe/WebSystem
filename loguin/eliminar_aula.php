<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "senati";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Consulta SQL para eliminar el usuario
    $sql = "DELETE FROM aula WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo 'success'; // Envía la respuesta de éxito al JavaScript
    } else {
        echo 'error';
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>