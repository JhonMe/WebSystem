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

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $elementId = $_POST['elementId']; // Asegúrate de que este campo esté presente en tu formulario HTML
    $nombre = $_POST['nombreTaller'];
    $fechaEntregaEPPs = $_POST['fechaEntrega'];
    $guantesEntrega = $_POST['guantesEntrega'];
    $mascarillaEntrega = $_POST['mascarillaEntrega'];
    $tallaZapato = $_POST['tallaZapato'];
    $tallaPantalon = $_POST['tallaPantalon'];

    // Consulta SQL para actualizar los datos en la base de datos
    $sql = "UPDATE talleres SET nombre = '$nombre', fecha_entrega_epps = '$fechaEntregaEPPs', guantes_entrega = '$guantesEntrega', mascarilla_entrega = '$mascarillaEntrega', talla_zapato = '$tallaZapato', talla_pantalon = '$tallaPantalon' WHERE id = $elementId";

    if ($conn->query($sql) === TRUE) {
        echo "Los datos se actualizaron correctamente.";
    } else {
        echo "Error al actualizar datos: " . $conn->error;
    }
} else {
    echo "No se recibieron datos para actualizar.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>