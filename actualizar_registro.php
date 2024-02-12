<?php
function mostrarMensaje($mensaje, $esError = false) {
    header('Content-Type: application/json');
    echo json_encode(['mensaje' => $mensaje, 'error' => $esError]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $fecha = $_POST['fecha'] ?? null;
    $detalles = $_POST['detalles'] ?? null;
    $asistencia = $_POST['asistencia'] ?? null;
    $id = $_POST['id'] ?? null;  // Asegúrate de obtener el ID

    // Aquí puedes incluir validaciones para los datos recibidos

    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    // Establece conexión con la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        mostrarMensaje("Conexión fallida: " . $conn->connect_error, true);
    }

    // Prepara la consulta SQL
    $sql = "UPDATE acta SET fecha = ?, detalles = ?, asistencia = ? WHERE id = ?";

    // Prepara la declaración
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Vincula los parámetros a la declaración
        $stmt->bind_param("sssi", $fecha, $detalles, $asistencia, $id);

        // Ejecuta la declaración
        if ($stmt->execute()) {
            mostrarMensaje("Registro actualizado exitosamente.");
        } else {
            mostrarMensaje("Error al actualizar registro: " . $stmt->error, true);
        }

        // Cierra la declaración
        $stmt->close();
    } else {
        mostrarMensaje("Error en la preparación de la sentencia: " . $conn->error, true);
    }

    // Cierra la conexión
    $conn->close();
} else {
    mostrarMensaje("Datos del formulario no válidos.", true);
}
?>

