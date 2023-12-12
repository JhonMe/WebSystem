<?php
// obtener_datos_usuario.php

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


$userId = $_GET['id'];

$sql = "SELECT * FROM aula WHERE id = $userId";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
<!-- Construir el formulario -->
<form id="formularioEditar" action="actualizar_usuario.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
    Fecha Ingreso: <input type="text" name="fecha_ingreso" value="<?php echo $row['fecha_ingreso']; ?>"><br>
    Fecha entrega EPPs: <input type="text" name="fecha_entrega_epps"
        value="<?php echo $row['fecha_entrega_epps']; ?>"><br>
    Talla Guardapolvo: <input type="text" name="talla_guardapolvo" value="<?php echo $row['talla_guardapolvo']; ?>"><br>
    <!-- Agrega más campos según tu tabla de usuarios -->
    <input type="submit" value="Actualizar">
</form>
<?php
} else {
    echo "No se encontró ningún usuario con ese ID.";
}

$conn->close();
?>