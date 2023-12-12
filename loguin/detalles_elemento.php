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


// Verificar si se recibió el ID del elemento
if (isset($_GET['id'])) {
    $elementId = $_GET['id'];

    // Realizar una consulta para obtener los detalles del elemento usando el ID recibido
    // Aquí se simula una consulta, debes adaptarla a tu estructura de base de datos y tablas
    $sql = "SELECT nombre, fecha_entrega_epps, guantes_entrega, mascarilla_entrega, talla_zapato, talla_pantalon FROM talleres WHERE id = $elementId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Preparar los detalles del elemento para mostrar en el modal
        $nombre = $row['nombre'];
        $fechaEntrega = $row['fecha_entrega_epps'];
        $guantesEntrega = $row['guantes_entrega'];
        $mascarillaEntrega = $row['mascarilla_entrega'];
        $tallaZapato = $row['talla_zapato'];
        $tallaPantalon = $row['talla_pantalon'];

        // Construir el contenido HTML con los detalles del elemento
        $content = '<h4>' . $nombre . '</h4>';
        $content .= '<p>Fecha de entrega: ' . $fechaEntrega . '</p>';
        $content .= '<p>Guantes entregados: ' . $guantesEntrega . '</p>';
        $content .= '<p>Mascarillas entregadas: ' . $mascarillaEntrega . '</p>';
        $content .= '<p>Talla de zapato: ' . $tallaZapato . '</p>';
        $content .= '<p>Talla de pantalón: ' . $tallaPantalon . '</p>';

        // Devolver los detalles del elemento como respuesta
        echo $content;

         // Botón para eliminar
         echo '<button onclick="eliminarTaller(' . $elementId . ')" class="btn btn-danger">Eliminar</button>';

        // Botón para editar en talleres
        echo '<button onclick="mostrarFormularioEdicionTaller()" class="btn btn-primary">Editar</button>';


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

<!-- Contenedor para el formulario de edición (se mostrará al hacer clic en "Editar") -->
<div id="formEditarTalleres" style="display: none;">
    <form id="formEditarTaller" action="actualizar_taller.php" method="post">
        <!-- Campos del formulario de edición -->
        <input type="hidden" id="elementId" name="elementId" value="<?php echo $elementId; ?>">
        <input type="text" id="nombreTaller" name="nombreTaller" value="<?php echo $nombre; ?>">
        <input type="text" id="fechaEntrega" name="fechaEntrega" value="<?php echo $fechaEntrega; ?>">
        <input type="text" id="guantesEntrega" name="guantesEntrega" value="<?php echo $guantesEntrega; ?>">
        <input type="text" id="mascarillaEntrega" name="mascarillaEntrega" value="<?php echo $mascarillaEntrega; ?>">
        <input type="text" id="tallaZapato" name="tallaZapato" value="<?php echo $tallaZapato; ?>">
        <input type="text" id="tallaPantalon" name="tallaPantalon" value="<?php echo $tallaPantalon; ?>">
        <!-- Otros campos de edición -->

        <input type="submit" class="btn btn-secundary" value="Actualizar">
    </form>
</div>

<!-- Script JavaScript para manejar la interacción con el usuario -->
<script>
// Función para mostrar el formulario de edición
function mostrarFormularioEdicionTaller() {
    document.getElementById("formEditarTalleres").style.display = "block";
}
$(document).ready(function() {
    // Evento para enviar los datos del formulario mediante AJAX
    $("#formEditarTaller").submit(function(event) {
        event.preventDefault(); // Evita el envío del formulario por defecto
        var formData = $(this).serialize(); // Obtener los datos del formulario

        $.ajax({
            type: "POST",
            url: "actualizar_taller.php",
            data: formData,
            success: function(response) {
                // Manejar la respuesta del servidor (opcional)
                alert("Datos actualizados correctamente");

                // Ocultar los detalles del elemento y el formulario de edición después de la actualización exitosa
                $('#datosElemento').hide();
                $('#formEditarTalleres').hide();

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