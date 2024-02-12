<?php
// Función para mostrar mensajes en formato JSON
function mostrarMensaje($mensaje, $esError = false) {
    header('Content-Type: application/json');
    echo json_encode(['mensaje' => $mensaje, 'error' => $esError]);
    exit();
}

// Verificar el método de la solicitud
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        mostrarMensaje("Conexión fallida: " . $conn->connect_error, true);
    }

    // Validar y obtener el ID del registro a actualizar
    $id = isset($_POST['id']) && is_numeric($_POST['id']) ? $_POST['id'] : null;
    if (is_null($id)) {
        mostrarMensaje("El ID no está definido o es inválido.", true);
    }

    // Obtener los otros valores del formulario
    $fecha = $_POST['fecha'] ?? null;
    $observacion = $_POST['observacion'] ?? null;
    
    // Inicializar $archivoActa con un valor predeterminado o existente
    $archivoActa = ''; // Asumir un valor predeterminado o recuperar el existente de la base de datos si es necesario

    // Manejo de la carga del archivo, si se envió uno
    if (isset($_FILES['archivoActa']) && $_FILES['archivoActa']['error'] == 0) {
        $directorioDestino = "uploads/"; // Asegúrate de que este directorio existe y tiene permisos de escritura
        $nombreArchivo = basename($_FILES['archivoActa']['name']);
        $rutaArchivo = $directorioDestino . $nombreArchivo;
        
        // Mover el archivo subido al directorio de destino
        if (move_uploaded_file($_FILES['archivoActa']['tmp_name'], $rutaArchivo)) {
            $archivoActa = $nombreArchivo; // Actualizar con el nuevo nombre de archivo
        } else {
            mostrarMensaje("Error al cargar el archivo.", true);
        }
    }

    // Preparar la consulta SQL para actualizar el registro
    $sql = "UPDATE mantenciones SET fecha = ?, observacion = ?, archivo = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        mostrarMensaje("Error en la preparación de la sentencia: " . $conn->error, true);
    }

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
