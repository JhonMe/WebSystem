<?php
session_start();
require_once("../loguin/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $password = $_POST["password"];

    $sql = "SELECT contrasena FROM usuarios WHERE nombre = '$nombre'";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $contrasenaAlmacenada = $row['contrasena'];
    
    // Verificar si la contraseña proporcionada coincide con la almacenada
    if ($contrasenaAlmacenada === $password) {
        // Contraseña válida
        $_SESSION["nombre"] = $nombre;
        header("location: bienvenido.php");
    } else {
        echo "La contraseña es incorrecta. Por favor, inténtalo de nuevo.";
    }
} else {
    echo "Usuario no encontrado.";
}

}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
    <style>
    body {
        background-image: url('https://png.pngtree.com/background/20230610/original/pngtree-landscapes-wallpaper-images-picture-image_3021437.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: Arial, sans-serif;
    }

    .login-container {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        padding: 20px;
        max-width: 300px;
        margin: 0 auto;
        margin-top: 100px;
    }

    h2 {
        text-align: center;
    }

    label {
        display: block;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input[type="submit"] {
        width: 100%;
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 3px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .forgot-password {
        text-align: center;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <form method="post" action="">
            <label for="nombre">Usuario:</label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="cargo">Cargo:</label>
            <select name="cargo" id="cargo" required>
                <option value="Supervisor">Supervisor</option>
                <option value="Administrador">Administrador</option>
            </select>


            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="Ingresar">
        </form>
        <p class="forgot-password"><a href="olvido.php">¿Olvidaste tu contraseña?</a></p>
    </div>
</body>

</html>