<?php
header('Content-Type: application/json');

// Desactivar la visualización de errores en la producción
ini_set('display_errors', 0);
error_reporting(E_ALL);

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
    $tipo_documento = isset($_POST['tipo_documento']) ? $_POST['tipo_documento'] : null;
    $detalles = isset($_POST['detalles']) ? $_POST['detalles'] : null;

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        echo json_encode(['error' => true, 'mensaje' => "Conexión fallida: " . $conn->connect_error]);
        exit();
    }

    // Consulta para actualizar los datos en la tabla documentos
    $sql = "UPDATE documentos SET fecha = ?, Tipo_documento = ?, detalles = ? WHERE id_documento = ?";

    // Preparar la declaración
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo json_encode(['error' => true, 'mensaje' => "Error en la preparación: " . $conn->error]);
        $conn->close();
        exit();
    }

    // Vincular los parámetros a la declaración preparada
    if (!$stmt->bind_param("sssi", $fecha, $tipo_documento, $detalles, $id)) {
        echo json_encode(['error' => true, 'mensaje' => "Error en bind_param: " . $stmt->error]);
        $stmt->close();
        $conn->close();
        exit();
    }

    // Ejecutar la consulta
    if (!$stmt->execute()) {
        echo json_encode(['error' => true, 'mensaje' => "Error al actualizar el registro: " . $stmt->error]);
    } else {
        echo json_encode(['error' => false, 'mensaje' => "Registro actualizado con éxito."]);
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => true, 'mensaje' => "Solicitud no válida."]);
}
?>
