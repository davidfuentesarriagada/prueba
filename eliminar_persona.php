<?php
// Archivo eliminar_persona.php

// Verificar si se recibió el ID de la persona a eliminar
if (isset($_POST['id_formu'])) {
    $id = $_POST['id_formu'];

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para eliminar la persona de la tabla personal
    $query = "DELETE FROM personal WHERE id_formu = $id";

    if ($conn->query($query) === TRUE) {
        // La persona se eliminó correctamente
        // Puedes enviar una respuesta al cliente si es necesario
        echo "Persona eliminada correctamente.";
    } else {
        // Si ocurre un error, enviar una respuesta con el mensaje de error
        echo "Error al eliminar la persona: " . $conn->error;
    }

    $conn->close();
}
?>



    