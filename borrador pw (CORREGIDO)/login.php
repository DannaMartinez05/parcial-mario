<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-box">
 
        <form  method="POST" astion="">

          <div class="user-box">
            <input type="text" name="Usuario" required="">
            <label>Nombre de usuario</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" required="">
            <label>Contraseña</label>
          </div><center>
          <a href="#">
            <button type="submit" value="buttonl">Enviar</button>
             <span></span>
          </a></center>

        </form>
      </div>
</body>
</html>


<?php
// Incluir archivo de conexión a la base de datos
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['Usuario'];
    $contraseña = $_POST['password'];
    
    // Asegúrate de escapar correctamente las entradas del usuario para prevenir inyecciones SQL
    $usuario = $conn->real_escape_string($usuario);
    $contraseña = $conn->real_escape_string($contraseña);

    $sql = "SELECT * FROM user WHERE Nombre_usuario = '$usuario' AND password = '$contraseña'";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $show = $resultado->fetch_assoc();

        // Verificar si el nombre de usuario y la contraseña coinciden
        if ($show['Nombre_usuario'] == $usuario && $show['password'] == $contraseña) {
            header("Location: agregar_arboles.php");
            exit();
        } else {
            echo "Usuario o contraseña inválidos";
        }
    } else {
        echo "Usuario o contraseña inválidos";
    }
    $resultado->close();
    $conn->close();
}
?>
