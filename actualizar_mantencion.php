<?php
// Función para mostrar mensajes en formato JSON
function mostrarMensaje($mensaje, $esError = false, $datosDebug = []) {
    header('Content-Type: application/json');
    $respuesta = ['mensaje' => $mensaje, 'error' => $esError];
    if (!empty($datosDebug)) {
        $respuesta['debug'] = $datosDebug;
    }
    echo json_encode($respuesta);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        mostrarMensaje("Conexión fallida: " . $conn->connect_error, true);
    }

    $id = isset($_POST['id']) && is_numeric($_POST['id']) ? $_POST['id'] : null;
    if (is_null($id)) {
        mostrarMensaje("El ID no está definido o es inválido.", true);
    }

    $fecha = $_POST['fecha'] ?? null;

    // Inicializa $observacion y $archivoActa con null para manejar correctamente su ausencia
    $observacion = null;
    $archivoActa = null;

    // Consulta para obtener los datos existentes
    $sql = "SELECT observacion, archivo FROM mantenciones WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $resultado = $stmt->get_result();
        if ($fila = $resultado->fetch_assoc()) {
            $observacionExistente = $fila['observacion'];
            $archivoActaExistente = $fila['archivo'];
        }
    }
    $stmt->close();

    // Asigna la observación existente si no se proporciona una nueva
    $observacion = $_POST['observacion'] ?? $observacionExistente;

    // Si se sube un nuevo archivo, procesa la carga
    if (isset($_FILES['archivoActa']) && $_FILES['archivoActa']['error'] === UPLOAD_ERR_OK) {
        $directorioDestino = "uploads/";
        $nombreArchivo = basename($_FILES['archivoActa']['name']);
        $rutaArchivo = $directorioDestino . $nombreArchivo;
        if (move_uploaded_file($_FILES['archivoActa']['tmp_name'], $rutaArchivo)) {
            $archivoActa = $nombreArchivo; // Actualiza con el nuevo nombre de archivo
        } else {
            mostrarMensaje("Error al cargar el archivo.", true);
        }
    } else {
        // Mantiene el archivo existente si no se sube uno nuevo
        $archivoActa = $archivoActaExistente;
    }

    // Preparar la consulta de actualización
    $sql = "UPDATE mantenciones SET fecha = ?, observacion = ?, archivo = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        mostrarMensaje("Error en la preparación de la sentencia: " . $conn->error, true);
    }

    // Ejecutar la actualización
    $stmt->bind_param("sssi", $fecha, $observacion, $archivoActa, $id);
    if ($stmt->execute()) {
        mostrarMensaje("Registro actualizado exitosamente.");
    } else {
        mostrarMensaje("Error al actualizar registro: " . $stmt->error, true);
    }

    $stmt->close();
    $conn->close();
} else {
    mostrarMensaje("Método de solicitud no válido.", true);
}
?>
