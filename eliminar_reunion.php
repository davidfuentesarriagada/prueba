<?php
header("Access-Control-Allow-Origin: *");

if (isset($_GET["id"])) {
    $idReunion = $_GET["id"];

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Primero, eliminar los registros relacionados en la tabla "asistentes_reunion"
    $deleteQuery = "DELETE FROM asistentes_reunion WHERE id_reunion = ?";
    $stmtDelete = $conn->prepare($deleteQuery);
    $stmtDelete->bind_param("i", $idReunion);
    if ($stmtDelete->execute()) {
        // Luego, eliminar la reunión de la tabla "planificacion"
        $deleteQuery2 = "DELETE FROM planificacion WHERE id = ?";
        $stmtDelete2 = $conn->prepare($deleteQuery2);
        $stmtDelete2->bind_param("i", $idReunion);
        if ($stmtDelete2->execute()) {
            // Si la eliminación fue exitosa, enviar una respuesta con el código 200 (OK)
            http_response_code(200);
            echo "success"; // Devolver "success" en la respuesta
        } else {
            // Si hubo un error en la eliminación, enviar una respuesta con el código 500 (Error interno del servidor)
            http_response_code(500);
            echo "Error al eliminar la reunión: " . $stmtDelete2->error;
        }
        $stmtDelete2->close();
    } else {
        // Si hubo un error en la eliminación, enviar una respuesta con el código 500 (Error interno del servidor)
        http_response_code(500);
        echo "Error al eliminar los registros relacionados: " . $stmtDelete->error;
    }

    // Cerrar las consultas preparadas y la conexión a la base de datos
    $stmtDelete->close();
    $conn->close();
}
?>
