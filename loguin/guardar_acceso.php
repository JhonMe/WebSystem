<?php

print_r($_POST); // Imprimir los datos recibidos desde el formulario

// Establecer conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "senati";

$conexion = new mysqli($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $cargo = $_POST["cargo"];

    // Preparar la consulta SQL para insertar un nuevo usuario en la tabla
    $query = "INSERT INTO usuarios (nombre, apellido, correo, cargo) VALUES ('$nombre', '$apellido', '$correo', '$cargo')";

    if ($conexion->query($query) === TRUE) {
        echo "Usuario creado correctamente";
    } else {
        echo "Error al crear el usuario: " . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();
?>