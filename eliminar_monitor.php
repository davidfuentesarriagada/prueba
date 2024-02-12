<?php
// Verifica si se proporciona un ID válido en la solicitud
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Realiza la conexión a la base de datos (reemplaza con tus propias credenciales)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Escapa el ID para evitar inyección SQL (más seguro)
    $id = $conn->real_escape_string($_GET['id']);

    // Realiza la eliminación del registro en la tabla "monitores"
    $sql = "DELETE FROM monitores WHERE MonitorID = $id";

    if ($conn->query($sql) === TRUE) {
        // Éxito: devuelve una respuesta JSON
        echo json_encode(['success' => true]);
    } else {
        // Error: devuelve una respuesta JSON con un mensaje de error
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }

    $conn->close();
} else {
    // Si no se proporciona un ID válido, devuelve una respuesta JSON con un mensaje de error
    echo json_encode(['success' => false, 'error' => 'ID inválido']);
}
?>


