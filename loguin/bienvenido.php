<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: login.php");
    exit;
}

$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú lateral responsive </title>
    <link rel="icon"
        href="https://play-lh.googleusercontent.com/XwIN1cpkb7lvO4hIl2ZbTCyy5Ry0oEY7aT61viOUQB4AEwjVRBf6ooHlYohTDazJkq9Q"
        type="image/png">


    <link rel="stylesheet" href="estilos.css">
    <!-- Agrega estas líneas en la sección head de tu HTML -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



</head>

<body id="body">

    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
    </header>

    <div class="menu__side" id="menu_side">
        <div class="name__page">
            <i class="fas fa-home" id="btn_open"></i>
            <h5>Pagina principal</h5>
        </div>

        <div class="options__menu">
            <a href="#" class="selected" onclick="showSection('global');">
                <div class="option">
                    <i class="fas fa-globe" title="global"></i>
                    <h5>Historial EPPs global</h5>
                </div>
            </a>
            <a href="#" onclick="showSection('agregar');" onmouseover="limpiarFormulario();">
                <div class="option">
                    <i class="fas fa-user-plus" title="agregar"></i>
                    <h5>Agregar usuario</h5>
                </div>
            </a>

            <a href="#" onclick="showSection('personal');">
                <div class="option">
                    <i class="fas fa-user" title="personal"></i>
                    <h5>Historial EPPS personal</h5>
                </div>
            </a>

            <a href="#" onclick="showSection('Perfil');">
                <div class="option">
                    <i class="fas fa-user-tie" title="Perfil"></i>
                    <h5>Perfil</h5>
                </div>
            </a>

            <a href="login.php" onclick="showSection('Cerrar');">
                <div class="option">
                    <i class="fas fa-sign-out-alt" title="Cerrar"></i>
                    <h5>Cerrar sesion</h5>
                </div>
            </a>


            <!-- Agrega más enlaces aquí -->

        </div>
    </div>

    <main>
        <section id="agregar" style="display: none;">
            <div class="agregar_container" style="display: flex; margin-left: 5%;">
                <div class="agregar">
                    <h3>ADMINISTRATIVO</h3>
                    <form action="procesar_formulario.php" method="post" onsubmit="showModal()">
                        <div>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre"></br>
                            <label for="apellido">Apellido:</label>
                            <input type="text" id="apellido" name="apellido">

                        </div>
                        <div>
                            <label for="fecha-ingreso">Fecha de Ingreso:</label></br>
                            <input style="width: 300px;" type="date" id="fecha-ingreso" name="fecha-ingreso"></br>
                            <!-- Nuevo campo y botón -->
                            <label for="fecha-entrega-epps">Fecha de Entrega de EPPs:</label></br>
                            <input style="width: 300px;" type="date" id="fecha-entrega-epps"
                                name="fecha-entrega-epps"></br>
                        </div>
                        <!-- Campo de Terno -->
                        <label for="terno-entrega" id="label-terno-entrega" style="width: 100px; ">Terno:</label>
                        <input type="number" placeholder="Talla" id="terno-cantidad" name="terno-cantidad"
                            style="width: 100px; "> </br>
                        <button type="submit">Agergar Docente</button>
                    </form>

                    <div id="successModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <span class="close" id="closeModal">&times;</span>
                            <p>Datos guardados exitosamente</p>
                        </div>
                    </div>


                </div>

                <div class="agregar">
                    <h3>TALLERES</h3>
                    <form action="procesar_formulario1.php" method="post" onsubmit="showModal()">
                        <div>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre"></br>
                            <label for="apellido">Apellido:</label>
                            <input type="text" id="apellido" name="apellido">

                        </div>
                        <div>
                            <label for="fecha-ingreso">Fecha de Ingreso:</label>
                            <input style="width: 300px;" type="date" id="fecha-ingreso" name="fecha-ingreso"></br>
                            <!-- Nuevo campo y botón -->
                            <label for="fecha-entrega-epps">Fecha de Entrega de EPPs:</label>
                            <input style="width: 300px;" type="date" id="fecha-entrega-epps"
                                name="fecha-entrega-epps"></br>
                        </div>
                        <div style="display: flex;">
                            <label for="guantes-entrega" id="label-guantes-entrega"
                                style="width: 100px; ">Guantes:</label>
                            <input type="number" placeholder="Cantidad" id="guantes-entrega" name="guantes-entrega"
                                style="width: 100px;  ">

                            <!-- Campo de Mascarilla -->
                            <label for="mascarilla-entrega" id="label-mascarilla-entrega"
                                style="width: 100px; ">Mascarilla:</label>
                            <input type="number" placeholder="Cantidad" id="mascarilla-cantidad"
                                name="mascarilla-entrega" style="width: 100px; " id="label-guantes-entrega">
                        </div>
                        <div style="display:flex">
                            <label for="talla-zapato" id="label-talla-zapato" style="width: 100px; ">Zapato:</label>
                            <input type="number" placeholder="Talla" style="width: 100px; " id="talla-zapato"
                                name="talla-zapato">

                            <label for="talla-pantalon" id="label-talla-pantalon"
                                style="width: 100px;">Pantalon:</label>
                            <input type="number" placeholder="Talla" style="width: 100px; " id="talla-pantalon"
                                name="talla-pantalon">
                        </div>
                        <button type="submit">Agregar Docente</button>
                    </form>
                    <div id="mensaje" style="display: none;">
                        Datos ingresados con éxito
                    </div>

                    <div id="successModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <span class="close" id="closeModal">&times;</span>
                            <p>Datos guardados exitosamente</p>
                        </div>
                    </div>

                </div>

                <div class="agregar">
                    <h3>AULA</h3>
                    <form action="procesar_formulario2.php" method="post" onsubmit="showModal()">
                        <div>
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre"></br>
                            <label for="apellido">Apellido:</label>
                            <input type="text" id="apellido" name="apellido">

                        </div>
                        <div>
                            <label for="fecha-ingreso">Fecha de Ingreso:</label>
                            <input style="width: 300px;" type="date" id="fecha-ingreso" name="fecha-ingreso"></br>
                            <!-- Nuevo campo y botón -->
                            <label for="fecha-entrega-epps">Fecha de Entrega de EPPs:</label>
                            <input style="width: 300px;" type="date" id="fecha-entrega-epps"
                                name="fecha-entrega-epps"></br>
                            <label for="guardapolvo" id="label-talla-guardapolvo"
                                style="width: 100px; ">Guardapolvo:</label>
                            <input placeholder="Talla" style="width: 100px; " id="talla-guardapolvo" name="guardapolvo">
                        </div>
                        <button type="submit">Agergar Docente</button>
                    </form>
                    <div id="mensaje" style="display: none;">
                        Datos ingresados con éxito
                    </div>

                    <div id="successModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <span class="close" id="closeModal">&times;</span>
                            <p>Datos guardados exitosamente</p>
                        </div>
                    </div>

                </div>
            </div>
            </div>





        </section>
        <?php
function conectarBaseDatos(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "senati";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    return $conn;
}

function generarTablaTalleres($conn){
    $sql = "SELECT id, nombre, fecha_entrega_epps, fecha_ingreso, guantes_entrega, mascarilla_entrega, talla_zapato, talla_pantalon FROM talleres";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $fecha_actual = date("Y-m-d");

        while ($row = $result->fetch_assoc()) {
            // Calcular la diferencia en días entre la fecha de entrega y la fecha actual
            $fecha_entrega = $row["fecha_entrega_epps"];
            $diferencia = strtotime($fecha_entrega) - strtotime($fecha_actual);
            $dias_restantes = floor($diferencia / (60 * 60 * 24));

            // Determinar el color del punto en función de la diferencia de días
            $color_punto = "verde"; // Por defecto, verde (más de 1 mes)
            if ($dias_restantes < 15) {
                $color_punto = "amarillo"; // Menos de 15 días
            }
            if ($dias_restantes < 0) {
                $color_punto = "rojo"; // Fecha pasada
            }
            // Generar la fila de la tabla con el nombre y el punto de color
            echo '<tr>';
            echo '<td><a href="#" onclick="mostrarDetalles(' . $row["id"] . ')">' . $row["nombre"] . '</a></td>';
            echo '<td><span class="punto ' . $color_punto . '"></span></td>';
            echo '</tr>';
        }
        
    } else {
        echo '<tr><td colspan="2">No hay talleres disponibles</td></tr>';
    }
    
}


function generarTablaOficina($conn){
    $sql = "SELECT id, nombre, fecha_ingreso, fecha_entrega_epps, terno_cantidad FROM admistrativo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $fecha_actual = date("Y-m-d");

        while ($row = $result->fetch_assoc()) {
            $fecha_entrega = $row["fecha_entrega_epps"];

            // Calcular la diferencia en días entre la fecha de entrega y la fecha actual
            $diferencia = strtotime($fecha_entrega) - strtotime($fecha_actual);
            $dias_restantes = floor($diferencia / (60 * 60 * 24));

            // Determinar el color del punto en función de la diferencia de días
            $color_punto = "verde"; // Por defecto, verde (más de 1 mes)
            if ($dias_restantes < 15) {
                $color_punto = "amarillo"; // Menos de 15 días
            }
            if ($dias_restantes < 0) {
                $color_punto = "rojo"; // Fecha pasada
            }

            // Generar la fila de la tabla con el nombre y el punto de color
            echo '<tr>';
            echo '<td><a href="#" onclick="mostrarDetallesAdmi(' . $row["id"] . ')">' . $row["nombre"] . '</a></td>';
            echo '<td><span class="punto ' . $color_punto . '"></span></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="2">No hay oficinas disponibles</td></tr>';
    }
}


function generarTablaAula($conn){
    $sql = "SELECT id, nombre, fecha_ingreso, fecha_entrega_epps, talla_guardapolvo FROM aula";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $fecha_actual = date("Y-m-d");

        while ($row = $result->fetch_assoc()) {
            $fecha_entrega = $row["fecha_entrega_epps"];

            // Calcular la diferencia en días entre la fecha de entrega y la fecha actual
            $diferencia = strtotime($fecha_entrega) - strtotime($fecha_actual);
            $dias_restantes = floor($diferencia / (60 * 60 * 24));

            // Determinar el color del punto en función de la diferencia de días
            $color_punto = "verde"; // Por defecto, verde (más de 1 mes)
            if ($dias_restantes < 15) {
                $color_punto = "amarillo"; // Menos de 15 días
            }
            if ($dias_restantes < 0) {
                $color_punto = "rojo"; // Fecha pasada
            }

            // Generar la fila de la tabla con el nombre y el punto de color
            echo '<tr>';
            echo '<td><a href="#" onclick="mostrarDetallesAula(' . $row["id"] . ')">' . $row["nombre"] . '</a></td>';
            echo '<td><span class="punto ' . $color_punto . '"></span></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="2">No hay aulas disponibles</td></tr>';
    }
}


$conn = conectarBaseDatos();
?>

        <section id="global">
            <form action="#" method="get" class="search-form">
                <!-- ... Código del formulario ... -->
            </form>

            <h2>Hola</h2>

            <div class="cuadros-container">
                <div class="cuadro">
                    <h3>Taller EPPs</h3>
                    <table>
                        <tr>
                            <th>Nombre</th>
                            <th>EPPs</th>
                        </tr>
                        <?php generarTablaTalleres($conn); ?>
                    </table>
                </div>

                <div class="cuadro">
                    <h3>Oficina EPPs</h3>
                    <table>
                        <tr>
                            <th>Nombre</th>
                            <th>EPPs</th>
                        </tr>
                        <?php generarTablaOficina($conn); ?>
                    </table>
                </div>

                <div class="cuadro">
                    <h3>Informática EPPs</h3>
                    <table>
                        <tr>
                            <th>Nombre</th>
                            <th>EPPs</th>
                        </tr>
                        <?php generarTablaAula($conn); ?>
                    </table>
                </div>
            </div>

            <?php $conn->close(); ?>

            <!-- Modal para editar usuario -->
            <div id="userModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editarModalLabel">Informacion Usuarios</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="editarModalContent">
                            <!-- Aquí se cargará el contenido del formulario de edición -->

                        </div>
                    </div>
                </div>
            </div>



        </section>






        <?php
            // Configuración de la conexión a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "senati";

            // Crear la conexión
            $conexion = new mysqli($servername, $username, $password, $database);

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Realizar consultas SQL para obtener los datos combinados de las tres tablas
            $query = "SELECT 'Terno' AS tipo, SUM(terno_cantidad) AS cantidad FROM admistrativo
                    UNION ALL
                    SELECT 'Guardapolvo' AS tipo, COUNT(CASE WHEN talla_guardapolvo != '' THEN 1 END) AS cantidad FROM aula
                    UNION ALL
                    SELECT 'Guantes' AS tipo, SUM(guantes_entrega) AS cantidad FROM talleres
                    UNION ALL
                    SELECT 'Mascarilla' AS tipo, SUM(mascarilla_entrega) AS cantidad FROM talleres
                    UNION ALL
                    SELECT 'Talla Zapato' AS tipo, COUNT(CASE WHEN talla_zapato != '' THEN 1 END) AS cantidad FROM talleres
                    UNION ALL
                    SELECT 'Talla Pantalón' AS tipo, COUNT(CASE WHEN talla_pantalon != '' THEN 1 END) AS cantidad FROM talleres";

            $result = mysqli_query($conexion, $query);

            // Obtener los datos y almacenarlos en un array asociativo
            $eppsData = [];
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $eppsData[$row['tipo']] = $row['cantidad'];
                }
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }

            // Ordenar los EPPs por cantidad en orden descendente
            arsort($eppsData);

            // Tomar los tres EPPs más usados
            $topThreeEPPs = array_slice($eppsData, 0, 3, true);
            ?>

        <section id="personal" style="display: none;">
            <div
                style="background-image: url('https://www.iebschool.com/blog/wp-content/uploads/2022/11/image-51.png'); background-size: cover; padding: 20px; border-radius: 10px; height:610px;">
                <div style="background-color: rgba(255, 255, 255, 0.5); padding: 20px; border-radius: 10px;">
                    <div
                        style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; display: flex; flex-direction: column; align-items: center; height: 500px; width: 80%; margin-left: 15%; margin-top: 5%;">

                        <div style="display: flex; justify-content: space-around; margin-bottom: 20px;">
                            <?php
                    // Mostrar los tres EPPs más usados encima del gráfico
                    foreach ($topThreeEPPs as $epp => $cantidad) {
                        echo '<div style="background-color: rgba(255, 255, 255, 0.8); padding: 10px; border-radius: 5px;">';
                        echo "<p>$epp</p>";
                        echo "<p>Cantidad: $cantidad</p>";
                        echo '</div>';
                    }
                    ?>
                        </div>

                        <canvas id="graficoBarras" width="300" height="100"></canvas>

                        <script>
                        // Datos obtenidos de PHP
                        var labels = <?php echo json_encode(array_keys($eppsData)); ?>;
                        var data = <?php echo json_encode(array_values($eppsData)); ?>;

                        // Crear el gráfico de barras
                        var ctx = document.getElementById('graficoBarras').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Cantidad de EPPs por tipo y tabla',
                                    data: data,
                                    backgroundColor: 'rgba(54, 162, 235, 0.5)', // Color de las barras
                                    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde de las barras
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true // Empezar el eje Y desde 0
                                    }
                                }
                            }
                        });
                        </script>
                        <button onclick="imprimirGrafico()">Imprimir Gráfico</button>

                    </div>
                </div>
            </div>
        </section>
        <!-- #region-->

        <?php
            // Realizar la conexión a la base de datos (ajustar según tu configuración)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "senati"; // Cambiar por el nombre de tu base de datos

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            $nombre = isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : "Nombre del usuario";
            $cargo = isset($_SESSION["cargo"]) ? $_SESSION["cargo"] : "Cargo del usuario";

            ?>

        <section id="Perfil" style="display: none; align-items: center;">
            <div
                style="background-image: url('https://www.iebschool.com/blog/wp-content/uploads/2022/11/image-51.png'); background-size: cover; padding: 20px; border-radius: 10px; height: 600px;">
                <div style="background-color: rgba(255, 255, 255, 0.5); padding: 20px; border-radius: 10px;">
                    <div
                        style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px; display: flex; flex-direction: column; align-items: center;  height: 400px; width: 400px; margin-left: 35%; margin-top: 5%;">
                        <!-- Coloca la foto del usuario -->

                        <input type="file" id="inputImagen" style="display: none;" accept="image/*">
                        <label for="inputImagen">
                            <img src="?" alt="Foto de perfil" style="width: 100px; height: 100px; border-radius: 50%;">
                        </label>


                        <!-- Datos del usuario -->
                        <!-- Código HTML donde deseas mostrar los datos del usuario -->
                        <h1>Perfil de Usuario</h1>
                        <div>
                            <p>Nombre: <?php echo $nombre; ?></p>
                            <p>Cargo: <?php echo $cargo; ?></p>
                        </div>

                        <div style="display: flex;">
                            <!-- Botón para abrir el modal -->
                            <button onclick="document.getElementById('myModal').style.display='block'">Agregar
                                Acceso</button>
                            <!-- Botón para abrir el modal de Listar Acceso -->
                            <button onclick="abrirModalListar()">Listar Acceso</button>
                            <!-- Botón para abrir el modal -->
                            <button onclick="abrirModal('modalCambiarContrasena')">Cambiar Contraseña</button>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Cambio de Contraseña -->
            <div id="modalCambiarContrasena" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="cerrarModal('modalCambiarContrasena')">&times;</span>
                    <h2>Cambiar Contraseña</h2>
                    <form onsubmit="return validarCambiarContrasena()" method="post" action="actualizarD.php">
                        <p>Contraseña Actual: <input type="password" id="contrasenaActual" name="contrasenaActual"></p>
                        <p>Nueva Contraseña: <input type="password" id="nuevaContrasena" name="nuevaContrasena"></p>
                        <p>Confirmar Contraseña: <input type="password" id="confirmarContrasena"
                                name="confirmarContrasena"></p>
                        <input type="submit" value="Confirmar">
                    </form>

                </div>
            </div>

            <?php 
             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "senati";
             
             $conn = new mysqli($servername, $username, $password, $dbname);
             
             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             }
             $sql = "SELECT `id`, `nombre`, `apellido`, `correo`, `cargo`, `password` FROM `usuarios` WHERE 1";
             $result = $conn->query($sql);
            ?>

            <div aria-colindex="" id="modalListar" class="modal">
                <div class="modal-content" style="width: 50%;">
                    <h2>Lista de Usuarios</h2>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>

                            <th>Correo</th>
                            <th>Cargo</th>
                            <th>Password</th>
                        </tr>
                        <?php
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nombre"]. "</td><td>" . $row["correo"]. "</td><td>" . $row["cargo"]. "</td><td>" . $row["password"]. "</td></tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No se encontraron resultados.</td></tr>";
                            }
                            $conn->close();
                         ?>
                    </table>
                    <button style="width: 10%; margin-left: 45%; background-color: #f44336; color: #ccc; "
                        onclick="cerrarModal1()">Cancelar</button>
                </div>
            </div>




        </section>
        <!-- Modal -->
        <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #f9f9f9; border: 1px solid #ccc; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 400px; margin-top:50px;"
            id="myModal" class="modal">
            <div class="modal-content">
                <!-- Campos para completar -->
                <p>Nombre: <input type="text" id="username"></p>
                <p>Apellido: <input type="text" id="apellido"></p>
                <p>Correo: <input type="text" id="correo"></p>
                <label for="cargo">Cargo:</label>
                <select name="cargo" id="cargo" required>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Administrador">Administrador</option>
                </select>
                <p>Contraseña: <input type="password" id="contrasena"></p>

                <!-- Botón para guardar -->
                <div style="display: flex;">
                    <button
                        style="background-color: blue; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; margin-right: 10px;"
                        onclick="guardarDatos()">Guardar</button>
                    <button
                        style="background-color: #f44336; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;"
                        onclick="cerrarModal()">Cancelar</button>

                </div>
            </div>
        </div>


        <section id="Cerrar" style="display: none;">
            <!-- Contenido de la página de Cursos -->
            <h1>Cerrar</h1>
            <p>En esta sección, puedes colocar información sobre los cursos disponibles.</p>
        </section>

        <!-- Agrega más secciones de contenido aquí -->

    </main>




    <script src="script.js"></script>

</body>

</html>