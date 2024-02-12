<?php
// Conexión a la base de datos (Ajusta los datos de conexión según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

// Obtén los datos del evento desde la solicitud POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["title"]) && isset($_POST["start"])) {
    $title = $_POST["title"];
    $start = $_POST["start"];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar el evento en la tabla "evento"
    $query = "INSERT INTO evento (title, start) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $title, $start);

    // Ejecutar la consulta y verificar si fue exitosa
    if ($stmt->execute()) {
        echo "Evento guardado exitosamente";
    } else {
        echo "Error al guardar el evento: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Datos incorrectos o faltantes";
}
?>



