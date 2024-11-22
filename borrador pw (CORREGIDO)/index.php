<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Corredor Del Bosque</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <header>
    <h1>Corredor Del Bosque</h1>
  </header>
  <div class="imagen-destacada">
    <div class="texto-destacado">
      <h2>¡Bienvenido a nuestra galería de árboles presentes en el corredor ecológico!</h2>
    </div>
  </div>
  <nav class="barra-menu">
    <a href="login.php">Login</a>
  </nav>
  <div class="contenedor-busqueda">
    <input type="text" id="inputBusqueda" placeholder="Buscar árbol por nombre">
    <button id="botonBusqueda">Buscar</button>
  </div>

  <main id="galeriaArboles" class="contenedor-tarjetas">
    <?php 
    // Asegúrate de que 'db_connection.php' incluye la conexión a la base de datos correctamente
    require_once 'db_connection.php';

    // Verifica que la conexión a la base de datos sea exitosa
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = 'SELECT * FROM Arboles';
    $resultado = $conn->query($sql);

    if ($resultado === false) {
        die("Error en la consulta: " . $conn->error);
    }

    if ($resultado->num_rows > 0) {
        while ($show = $resultado->fetch_assoc()) {
            echo "<div class='arbolito'>";
            echo "<h3>ID: " . $show['id_Arbol'] . "</h3>";
            echo "<p>Taxonomía ID: " . $show['id_taxonomia'] . "</p>";
            echo "<p>Altura: " . $show['altura'] . " metros</p>";
            echo "<p>Diámetro: " . $show['diametro'] . " cm</p>";
            echo "<p>Edad Estimada: " . $show['edad_Estimada'] . " años</p>";
            echo "<p>Latitud: " . $show['coordenada_Latitud'] . "</p>";
            echo "<p>Longitud: " . $show['coordenada_Longitud'] . "</p>";
            echo "<p>Fecha de Registro: " . $show['fecha_Registro'] . "</p>";
            echo "<p>Observaciones: " . $show['Observaciones'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No se encontraron árboles en la base de datos.</p>";
    }

    // Cierra la conexión a la base de datos
    $conn->close();
    ?>
  </main>
  <script src="js.js"></script>
</body>
</html>
