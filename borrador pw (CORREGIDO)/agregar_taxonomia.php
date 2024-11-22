
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Taxonomía de Árboles</title>
    <style>
        /* Agrega estilos aquí */
    </style>
</head>
<body>
    <h1>Agregar Taxonomía de Árboles</h1>
    <form id="formulario" action="procesar_datos.php" method="post">
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

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Enviar" href="index.html">
    </form>

    <script>
        // Redirige a la página principal al enviar el formulario
        document.getElementById("formulario").addEventListener("submit", function() {
            window.location.href = "index.html";
        });
    </script>
</body>
</html>
