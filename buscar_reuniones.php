<?php
header("Access-Control-Allow-Origin: *");

if (isset($_GET["term"])) {
    $searchTerm = $_GET["term"];

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para buscar reuniones que coincidan con el término de búsqueda
    $sql = "SELECT p.fecha_reunion, GROUP_CONCAT(c.nombre SEPARATOR ', ') AS asistentes, p.observaciones
            FROM planificacion p
            LEFT JOIN asistentes_reunion ar ON p.id = ar.id_reunion
            LEFT JOIN cparitario c ON ar.id_asistente = c.id
            WHERE p.fecha_reunion LIKE ? OR c.nombre LIKE ?
            GROUP BY p.fecha_reunion, p.observaciones";
    
    // Preparar la consulta preparada
    $stmt = $conn->prepare($sql);
    if ($stmt === FALSE) {
        // Si hubo un error en la preparación de la consulta, enviar una respuesta con el código 500 (Error interno del servidor)
        http_response_code(500);
        echo "Error al preparar la consulta: " . $conn->error;
        $conn->close();
        exit;
    }

    // Agregar el comodín % al término de búsqueda para hacer coincidencias parciales
    $searchTerm = "%" . $searchTerm . "%";

    // Vincular el valor del término de búsqueda a la consulta preparada
    $stmt->bind_param("ss", $searchTerm, $searchTerm);

    // Ejecutar la consulta preparada
    if ($stmt->execute()) {
        // Obtener los resultados de la consulta
        $result = $stmt->get_result();
        $reuniones = array();

        // Agregar los resultados a un array
        while ($row = $result->fetch_assoc()) {
            $reuniones[] = $row;
        }

        // Enviar los resultados en formato JSON
        http_response_code(200);
        header("Content-Type: application/json");
        echo json_encode($reuniones);
    } else {
        // Si hubo un error en la búsqueda, enviar una respuesta con el código 500 (Error interno del servidor)
        http_response_code(500);
        echo "Error al buscar las reuniones: " . $stmt->error;
    }

    // Cerrar la consulta preparada y la conexión a la base de datos
    $stmt->close();
    $conn->close();
}
?>
