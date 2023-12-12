<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "senati";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si elementId se ha enviado
if (isset($_POST['elementId'])) {
    $elementId = $_POST['elementId'];
    
    $nombre = isset($_POST['nombreAula']) ? $_POST['nombreAula'] : '';
    $apellido = isset($_POST['apellidoAula']) ? $_POST['apellidoAula'] : '';
    $fechaIngreso = isset($_POST['fechaIngresoAula']) ? $_POST['fechaIngresoAula'] : '';
    $fechaEntrega = isset($_POST['fechaEntregaAula']) ? $_POST['fechaEntregaAula'] : '';
    $tallaGuardapolvo = isset($_POST['tallaGuardapolvo']) ? $_POST['tallaGuardapolvo'] : '';

    // Actualizar los datos en la base de datos
    $sql = "UPDATE `aula` SET `nombre`='$nombre', `apellido`='$apellido', `fecha_ingreso`='$fechaIngreso', `fecha_entrega_epps`='$fechaEntrega', `talla_guardapolvo`='$tallaGuardapolvo' WHERE `id`='$elementId'";

    if ($conn->query($sql) === TRUE) {
        echo "Datos actualizados correctamente";
    } else {
        echo "Error al actualizar datos: " . $conn->error;
    }
} else {
    echo "No se proporcionó un ID válido para actualizar";
}

$conn->close();
?>