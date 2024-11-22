<?php
// Incluir archivo de conexión a la base de datos
include 'db_connection.php';

// Procesar formulario de inserción
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_taxonomia = $conn->real_escape_string($_POST['id_taxonomia']);
    $altura = $conn->real_escape_string($_POST['altura']);
    $diametro = $conn->real_escape_string($_POST['diametro']);
    $edad_Estimada = $conn->real_escape_string($_POST['edad_Estimada']);
    $coordenada_Latitud = $conn->real_escape_string($_POST['coordenada_Latitud']);
    $coordenada_Longitud = $conn->real_escape_string($_POST['coordenada_Longitud']);
    $fecha_Registro = $conn->real_escape_string($_POST['fecha_Registro']);
    $Observaciones = $conn->real_escape_string($_POST['Observaciones']);

    $sql_insert = "INSERT INTO arboles (id_taxonomia, altura, diametro, edad_Estimada, coordenada_Latitud, coordenada_Longitud, fecha_Registro, Observaciones)
                   VALUES ('$id_taxonomia', '$altura', '$diametro', '$edad_Estimada', '$coordenada_Latitud', '$coordenada_Longitud', '$fecha_Registro', '$Observaciones')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Nuevo árbol agregado exitosamente.";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

// Consulta para obtener los datos de los árboles
$sql = "SELECT * FROM arboles";
$result = $conn->query($sql);

// Cerrar la conexión al final del script
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Árboles</title>
    <link rel="stylesheet" href="styles.css"> <!-- Incluye tu archivo CSS -->
</head>
<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Árboles</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-upload"></i></div>
                            Inicio
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <br>
                    <h4 class="text-center">Agregar Información de Árboles</h4>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="id_taxonomia">ID Taxonomía</label>
                                    <input type="text" class="form-control" id="id_taxonomia" name="id_taxonomia" required>
                                </div>
                                <div class="form-group">
                                    <label for="altura">Altura</label>
                                    <input type="text" class="form-control" id="altura" name="altura" required>
                                </div>
                                <div class="form-group">
                                    <label for="diametro">Diámetro</label>
                                    <input type="text" class="form-control" id="diametro" name="diametro" required>
                                </div>
                                <div class="form-group">
                                    <label for="edad_Estimada">Edad Estimada</label>
                                    <input type="text" class="form-control" id="edad_Estimada" name="edad_Estimada" required>
                                </div>
                                <div class="form-group">
                                    <label for="coordenada_Latitud">Coordenada Latitud</label>
                                    <input type="text" class="form-control" id="coordenada_Latitud" name="coordenada_Latitud" required>
                                </div>
                                <div class="form-group">
                                    <label for="coordenada_Longitud">Coordenada Longitud</label>
                                    <input type="text" class="form-control" id="coordenada_Longitud" name="coordenada_Longitud" required>
                                </div>
                                <div class="form-group">
                                    <label for="fecha_Registro">Fecha de Registro</label>
                                    <input type="date" class="form-control" id="fecha_Registro" name="fecha_Registro" required>
                                </div>
                                <div class="form-group">
                                    <label for="Observaciones">Observaciones</label>
                                    <textarea class="form-control" id="Observaciones" name="Observaciones" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <h4 class="text-center">Listado de Árboles</h4>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID Árbol</th>
                                        <th>ID Taxonomía</th>
                                        <th>Altura</th>
                                        <th>Diámetro</th>
                                        <th>Edad Estimada</th>
                                        <th>Coordenada Latitud</th>
                                        <th>Coordenada Longitud</th>
                                        <th>Fecha de Registro</th>
                                        <th>Observaciones</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                <td>{$row['id_Arbol']}</td>
                                                <td>{$row['id_taxonomia']}</td>
                                                <td>{$row['altura']}</td>
                                                <td>{$row['diametro']}</td>
                                                <td>{$row['edad_Estimada']}</td>
                                                <td>{$row['coordenada_Latitud']}</td>
                                                <td>{$row['coordenada_Longitud']}</td>
                                                <td>{$row['fecha_Registro']}</td>
                                                <td>{$row['Observaciones']}</td>
                                                <td>
                                                    <a href='editar_arbol.php?id={$row['id_Arbol']}' class='btn btn-warning btn-sm'>Editar</a>
                                                </td>
                                            </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='10' class='text-center'>No hay árboles registrados</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
s