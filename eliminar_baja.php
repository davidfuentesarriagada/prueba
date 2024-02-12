<?php
// eliminar_baja.php

// Asegúrate de que se trata de una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realizar la conexión a la base de datos (asegúrate de configurar tus propios valores de conexión)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recoge el ID del registro a eliminar
    $id_baja = $_POST['id_baja'];

    // Prepara la sentencia SQL para eliminar el registro
    $stmt = $conn->prepare("DELETE FROM baja_socios WHERE id_baja = ?");
    $stmt->bind_param("i", $id_baja);

    // Ejecuta la sentencia
    if ($stmt->execute()) {
        echo "Registro eliminado con éxito";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }

    // Cierra la sentencia y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Método no permitido";
}
?>
