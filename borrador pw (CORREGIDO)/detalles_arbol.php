<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Árbol</title>
</head>
<body>
    <h1>Detalles del Árbol</h1>
    <?php
    // Verificar que se pasen los parámetros necesarios
    if (isset($_GET['id'])) {
        // Conectar a la base de datos
        $conn = new mysqli('localhost', 'tu_usuario', 'tu_contraseña', 'arbolesDB');
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Obtener el ID del árbol desde la URL
        $id_Arbol = intval($_GET['id']);

        // Obtener la información del árbol
        $sql = "SELECT a.*, t.*, rf.fotografia_Tronco, rf.fotografia_Hoja, dp.numero_Placa, dp.empresa_Placa
                FROM Arboles a
                JOIN Taxonomia t ON a.id_Taxonomia = t.id_Taxonomia
                JOIN Registro_Fotografico rf ON t.id_Taxonomia = rf.id_Fotografico
                JOIN Datos_Placa dp ON a.id_Arbol = dp.id_Arbol
                WHERE a.id_Arbol = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_Arbol);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<p><strong>Nombre Común:</strong> ' . $row['nombreComun'] . '</p>';
            echo '<p><strong>Nombre Científico:</strong> ' . $row['nombreCientifico'] . '</p>';
            echo '<p><strong>Familia:</strong> ' . $row['familia'] . '</p>';
            echo '<p><strong>Género:</strong> ' . $row['genero'] . '</p>';
            echo '<p><strong>Especie:</strong> ' . $row['especie'] . '</p>';
            echo '<p><strong>Tipo de Reproducción:</strong> ' . $row['tipo_Reproduccion'] . '</p>';
            echo '<p><strong>Altura:</strong> ' . $row['altura'] . ' metros</p>';
            echo '<p><strong>Diámetro:</strong> ' . $row['diametro'] . ' cm</p>';
            echo '<p><strong>Edad Estimada:</strong> ' . $row['edad_Estimada'] . ' años</p>';
            echo '<p><strong>Coordenada Latitud:</strong> ' . $row['coordenada_Latitud'] . '</p>';
            echo '<p><strong>Coordenada Longitud:</strong> ' . $row['coordenada_Longitud'] . '</p>';
            echo '<p><strong>Fecha de Registro:</strong> ' . $row['fecha_Registro'] . '</p>';
            echo '<p><strong>Observaciones:</strong> ' . $row['Observaciones'] . '</p>';
            echo '<p><strong>Número de Placa:</strong> ' . $row['numero_Placa'] . '</p>';
            echo '<p><strong>Empresa de la Placa:</strong> ' . $row['empresa_Placa'] . '</p>';
            echo '<p><strong>Fotografía del Tronco:</strong><br><img src="data:image/jpeg;base64,' . base64_encode($row['fotografia_Tronco']) . '"></p>';
            echo '<p><strong>Fotografía de la Hoja:</strong><br><img src="data:image/jpeg;base64,' . base64_encode($row['fotografia_Hoja']) . '"></p>';
        } else {
            echo "No se encontraron detalles para este árbol.";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "ID del árbol no proporcionado.";
    }
    ?>
</body>
</html>

