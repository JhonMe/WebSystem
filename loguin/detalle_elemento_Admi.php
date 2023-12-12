<?php
// Inicializar las variables
$nombre = '';
$apellido = '';
$fechaIngreso = '';
$fechaEntrega = '';
$ternoCantidad = '';

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "senati";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $elementId = $_GET['id'];

    // Realizar una consulta para obtener los detalles del elemento usando el ID recibido
    $sql = "SELECT `id`, `nombre`, `apellido`, `fecha_ingreso`, `fecha_entrega_epps`, `terno_cantidad` FROM `admistrativo` WHERE `id` = $elementId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Asignar valores obtenidos a las variables
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $fechaIngreso = $row['fecha_ingreso'];
        $fechaEntrega = $row['fecha_entrega_epps'];
        $ternoCantidad = $row['terno_cantidad'];
    } else {
        // Si no se encontró el elemento, devuelve un mensaje indicando que no hay detalles disponibles
        echo 'No se encontraron detalles para este elemento.';
    }
} else {
    // Si no se recibió un ID válido, devuelve un mensaje de error
    echo 'Error: No se proporcionó un ID válido.';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!-- Contenedor para mostrar los detalles del usuario y formulario de edición -->
<div id="datosUsuario">
    <!-- Mostrar los detalles del usuario -->
    <h4><?php echo $nombre . ' ' . $apellido; ?></h4>
    <p>Fecha de entrega: <?php echo $fechaIngreso; ?></p>
    <p>Guantes entregados: <?php echo $fechaEntrega; ?></p>
    <p>Mascarillas entregadas: <?php echo $ternoCantidad; ?></p>

    <!-- Botones de editar y eliminar -->
    <button onclick="eliminarOficina(<?php echo $elementId; ?>)" class="btn btn-danger">Eliminar</button>
    <button onclick="mostrarFormularioEdicionAdmi()" class="btn btn-primary">Editar</button>
</div>

<!-- Contenedor para el formulario de edición (se mostrará al hacer clic en "Editar") -->
<div id="formEditarUsuario" style="display: none;">
    <form id="formEditarUsuarioForm" action="actualizar_Admi.php" method="post">
        <!-- Campo oculto para el ID -->
        <input type="hidden" id="elementId" name="elementId" value="<?php echo $elementId; ?>">

        <!-- Campos del formulario de edición -->
        <input type="text" id="nombreUsuario" name="nombreUsuario" value="<?php echo $nombre; ?>">
        <input type="text" id="apellidoUsuario" name="apellidoUsuario" value="<?php echo $apellido; ?>">
        <input type="text" id="fechaIngreso" name="fechaIngreso" value="<?php echo $fechaIngreso; ?>">
        <input type="text" id="fechaEntrega" name="fechaEntrega" value="<?php echo $fechaEntrega; ?>">
        <input type="text" id="ternoCantidad" name="ternoCantidad" value="<?php echo $ternoCantidad; ?>">
        <!-- Otros campos de edición -->

        <input type="submit" class="btn btn-secondary" value="Actualizar">
    </form>
</div>

<!-- Script JavaScript para manejar la interacción con el usuario -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// Función para mostrar el formulario de edición
function mostrarFormularioEdicionAdmi() {
    document.getElementById("formEditarUsuario").style.display = "block";
}

$(document).ready(function() {
    // Evento para enviar los datos del formulario mediante AJAX
    $("#formEditarUsuarioForm").submit(function(event) {
        event.preventDefault(); // Evita el envío del formulario por defecto
        var formData = $(this).serialize(); // Obtener los datos del formulario

        $.ajax({
            type: "POST",
            url: "actualizar_Admi.php",
            data: formData,
            success: function(response) {
                // Manejar la respuesta del servidor (opcional)
                console.log(
                    alert("Datos actualizado correactamente")
                ); // Puedes mostrar un mensaje de éxito o actualizar la página, etc.

                // Ocultar los detalles del elemento y el formulario de edición después de la actualización exitosa
                $('#formEditarUsuario').hide();

                // Puedes agregar más acciones aquí después de actualizar los datos
            },
            error: function(error) {
                // Manejar errores (opcional)
                console.log("Error al actualizar datos: " + error);
            }
        });
    });

    // Resto del código jQuery
});
</script>