<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $solicitudId = $_POST["id"];
    $action = $_POST["action"];

    // Aquí debes implementar la lógica para aprobar o rechazar la solicitud en la base de datos
    // Utiliza $solicitudId y $action para realizar las operaciones necesarias
    
    // Ejemplo de cómo podrías actualizar el estado de la solicitud
    $estado = ($action == "aprobar") ? "Aprobada" : "Rechazada";
    $query = "UPDATE solicitudes SET estado = '$estado' WHERE id = $solicitudId";
    
    if ($conn->query($query) === TRUE) {
        echo "Acción realizada exitosamente.";
    } else {
        echo "Error al realizar la acción: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Acceso denegado.";
}
?>

