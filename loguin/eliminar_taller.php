<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "senati";

// Verificar la conexión
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se recibió el ID del elemento a eliminar
if (isset($_POST['id'])) {
    $elementId = $_POST['id'];

    // Consulta para eliminar el elemento según el ID recibido
    $sql = "DELETE FROM talleres WHERE id = $elementId"; // O cambiar a la tabla correspondiente
    $result = $conn->query($sql);

    if ($result) {
        echo "Elemento eliminado correctamente.";
    } else {
        echo "Error al eliminar el elemento: " . $conn->error;
    }
} else {
    echo "ID de elemento no recibido.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>