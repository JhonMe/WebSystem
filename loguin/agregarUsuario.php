<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "senati";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$cargo = $_POST['cargo'];
$contrasena = $_POST['contrasena'];

$sql = "INSERT INTO usuarios (nombre, apellido, correo, cargo, password) VALUES ('$nombre', '$apellido', '$correo', '$cargo', '$contrasena')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>