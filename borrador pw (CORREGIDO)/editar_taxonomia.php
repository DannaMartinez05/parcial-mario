<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Taxonomía</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <header>
    <h1>Editar Taxonomía</h1>
  </header>
  <div class="contenedor-formulario">
    <form action="procesar_edicion_taxonomia.php" method="post">
      <label for="id_Taxonomia">ID Taxonomía:</label>
      <input type="number" id="id_Taxonomia" name="id_Taxonomia"><br><br>

      <label for="nombreComun">Nombre Común:</label>
      <input type="text" id="nombreComun" name="nombreComun"><br><br>

      <label for="nombreCientifico">Nombre Científico:</label>
      <input type="text" id="nombreCientifico" name="nombreCientifico"><br><br>

      <label for="familia">Familia:</label>
      <input type="text" id="familia" name="familia"><br><br>

      <label for="genero">Género:</label>
      <input type="text" id="genero" name="genero"><br><br>

      <label for="especie">Especie:</label>
      <input type="text" id="especie" name="especie"><br><br>

      <label for="tipo_Reproduccion">Tipo de Reproducción:</label>
      <select id="tipo_Reproduccion" name="tipo_Reproduccion">
        <option value="">Seleccione una opción</option>
        <option value="Semilla">Semilla</option>
        <option value="Estolón">Sexual</option>
        <option value="Tallo">Polinización</option>
        <!-- Agrega más opciones según sea necesario -->
      </select><br><br>

      <!-- Botones de guardar y salir -->
      <button onclick="location.href='procesar_datos.php'">guardar</button>
    </form>
    <!-- Botón para salir -->
    <button onclick="location.href='index.html'"> Salir</button>
   
  </div>
</body>
</html>
    