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

// Verificar si elementId se ha enviado
if (isset($_POST['elementId'])) {
    $elementId = $_POST['elementId'];

    // Realizar la consulta para actualizar los datos
    $nombre = $_POST['nombreUsuario'];
    $apellido = $_POST['apellidoUsuario'];
    $fechaIngreso = $_POST['fechaIngreso'];
    $fechaEntrega = $_POST['fechaEntrega'];
    $ternoCantidad = $_POST['ternoCantidad'];

    $sql = "UPDATE `admistrativo` SET `nombre`='$nombre', `apellido`='$apellido', `fecha_ingreso`='$fechaIngreso', `fecha_entrega_epps`='$fechaEntrega', `terno_cantidad`='$ternoCantidad' WHERE `id` = $elementId";

    if ($conn->query($sql) === TRUE) {
        echo "Datos actualizados correctamente";
    } else {
        echo "Error al actualizar datos: " . $conn->error;
    }
} else {
    echo "No se recibió el ID del elemento a actualizar";
}
// Cerrar la conexión a la base de datos
$conn->close();
?>