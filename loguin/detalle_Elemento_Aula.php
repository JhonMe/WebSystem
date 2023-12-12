<?php
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

    $sql = "SELECT `id`, `nombre`, `apellido`, `fecha_ingreso`, `fecha_entrega_epps`, `talla_guardapolvo` FROM `aula` WHERE `id` = $elementId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $fechaIngreso = $row['fecha_ingreso'];
        $fechaEntrega = $row['fecha_entrega_epps'];
        $tallaGuardapolvo = $row['talla_guardapolvo'];

    } else {
        echo 'No se encontraron detalles para este usuario.';
    }
} else {
    echo 'Error: No se proporcionó un ID válido.';
}

$conn->close();
?>

<div id="datosAula">
    <h4><?php echo $nombre . ' ' . $apellido; ?></h4>
    <p>Fecha de Ingreso: <?php echo $fechaIngreso; ?></p>
    <p>Fecha de entrega: <?php echo $fechaEntrega; ?></p>
    <p>Talla Guardapolvo: <?php echo $tallaGuardapolvo; ?></p>

    <button onclick="eliminarOficina(<?php echo $elementId; ?>)" class="btn btn-danger">Eliminar</button>
    <button onclick="mostrarFormularioEdicionAula()" class="btn btn-primary">Editar</button>
</div>

<div id="formEditarAula" style="display: none;">
    <form id="formEditarAula" action="actualizar_aula.php" method="post">
        <input type="hidden" id="elementId" name="elementId" value="<?php echo $elementId; ?>">
        <input type="text" id="nombreAula" name="nombreAula" value="<?php echo $nombre; ?>">
        <input type="text" id="apellidoAula" name="apellidoAula" value="<?php echo $apellido; ?>">
        <input type="text" id="fechaIngresoAula" name="fechaIngresoAula" value="<?php echo $fechaIngreso; ?>">
        <input type="text" id="fechaEntregaAula" name="fechaEntregaAula" value="<?php echo $fechaEntrega; ?>">
        <input type="text" id="tallaGuardapolvo" name="tallaGuardapolvo" value="<?php echo $tallaGuardapolvo; ?>">

        <input type="submit" value="Actualizar">
    </form>
</div>

<script>
function mostrarFormularioEdicionAula() {
    document.getElementById("formEditarAula").style.display = "block";
}

$(document).ready(function() {
    $("#formEditarAula").submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "actualizar_aula.php",
            data: formData,
            success: function(response) {
                console.log(response);
                $('#formEditarAula').hide();
            },
            error: function(error) {
                console.log("Error al actualizar datos: " + error);
            }
        });
    });
});
</script>