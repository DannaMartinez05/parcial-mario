<?php
// Incluir archivo de conexión a la base de datos
include 'db_connection.php';

// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_Arbol = $_POST['id_Arbol'];
    $id_taxonomia = $conn->real_escape_string($_POST['id_taxonomia']);
    $altura = $conn->real_escape_string($_POST['altura']);
    $diametro = $conn->real_escape_string($_POST['diametro']);
    $edad_Estimada = $conn->real_escape_string($_POST['edad_Estimada']);
    $coordenada_Latitud = $conn->real_escape_string($_POST['coordenada_Latitud']);
    $coordenada_Longitud = $conn->real_escape_string($_POST['coordenada_Longitud']);
    $fecha_Registro = $conn->real_escape_string($_POST['fecha_Registro']);
    $Observaciones = $conn->real_escape_string($_POST['Observaciones']);

    // Actualizar los datos del árbol
    $sql_update = "UPDATE arboles 
                   SET id_taxonomia = '$id_taxonomia', altura = '$altura', diametro = '$diametro', 
                       edad_Estimada = '$edad_Estimada', coordenada_Latitud = '$coordenada_Latitud', 
                       coordenada_Longitud = '$coordenada_Longitud', fecha_Registro = '$fecha_Registro', 
                       Observaciones = '$Observaciones' 
                   WHERE id_Arbol = '$id_Arbol'";

    if ($conn->query($sql_update) === TRUE) {
        echo "Árbol actualizado exitosamente.";
        header("Location: index.php"); // Redirigir a una página de éxito
        exit();
    } else {
        echo "Error actualizando el árbol: " . $conn->error;
    }
}

// Obtener el ID del árbol de la URL si no se ha enviado el formulario
if (!isset($id_Arbol)) {
    $id_Arbol = $_GET['id'];
}

// Consultar los datos del árbol
$sql = "SELECT * FROM arboles WHERE id_Arbol = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_Arbol);
$stmt->execute();
$result = $stmt->get_result();
$arbol = $result->fetch_assoc();

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar árbol</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <header>
    <h1>Editar Árbol</h1>
  </header>
  <form action="editar_arbol.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_Arbol" value="<?php echo $arbol['id_Arbol']; ?>">
    <div class="form-group">
      <label for="id_taxonomia">ID Taxonomía</label>
      <input type="text" class="form-control" id="id_taxonomia" name="id_taxonomia" value="<?php echo $arbol['id_taxonomia']; ?>" required>
    </div>
    <div class="form-group">
      <label for="altura">Altura</label>
      <input type="text" class="form-control" id="altura" name="altura" value="<?php echo $arbol['altura']; ?>" required>
    </div>
    <div class="form-group">
      <label for="diametro">Diámetro</label>
      <input type="text" class="form-control" id="diametro" name="diametro" value="<?php echo $arbol['diametro']; ?>" required>
    </div>
    <div class="form-group">
      <label for="edad_Estimada">Edad Estimada</label>
      <input type="text" class="form-control" id="edad_Estimada" name="edad_Estimada" value="<?php echo $arbol['edad_Estimada']; ?>" required>
    </div>
    <div class="form-group">
      <label for="coordenada_Latitud">Coordenada Latitud</label>
      <input type="text" class="form-control" id="coordenada_Latitud" name="coordenada_Latitud" value="<?php echo $arbol['coordenada_Latitud']; ?>" required>
    </div>
    <div class="form-group">
      <label for="coordenada_Longitud">Coordenada Longitud</label>
      <input type="text" class="form-control" id="coordenada_Longitud" name="coordenada_Longitud" value="<?php echo $arbol['coordenada_Longitud']; ?>" required>
    </div>
    <div class="form-group">
      <label for="fecha_Registro">Fecha de Registro</label>
      <input type="date" class="form-control" id="fecha_Registro" name="fecha_Registro" value="<?php echo $arbol['fecha_Registro']; ?>" required>
    </div>
    <div class="form-group">
      <label for="Observaciones">Observaciones</label>
      <textarea class="form-control" id="Observaciones" name="Observaciones" required><?php echo $arbol['Observaciones']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </form>
  <!-- Botones de guardar y salir -->
</body>
</html>
