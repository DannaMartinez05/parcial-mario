<?php

// Definir los datos de conexión a la base de datos
define('DB_SERVER', 'localhost'); // Nombre del servidor MySQL (por lo general, 'localhost')
define('DB_USERNAME', 'root'); // Nombre de usuario de MySQL
define('DB_PASSWORD', ''); // Contraseña de MySQL
define('DB_NAME', 'zonaU'); // Nombre de la base de datos

// Intentar conectarse a la base de datos
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);


}