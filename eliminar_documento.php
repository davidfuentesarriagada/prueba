<?php
// Realizar la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del registro a eliminar
$id = $_GET['id_documento'];

// Preparar una consulta SQL parametrizada
$query = "DELETE FROM documentos WHERE id_documento = ?";
$stmt = $conn->prepare($query);

if ($stmt) {
    // Vincular el parámetro y establecer su valor
    $stmt->bind_param("i", $id);

    // Ejecutar la consulta preparada
    if ($stmt->execute()) {
        // La eliminación fue exitosa
        echo "Registro eliminado correctamente";
    } else {
        // Si hay un error al ejecutar la consulta
        echo "Error al eliminar el registro: " . $stmt->error;
    }

    // Cerrar la consulta preparada
    $stmt->close();
} else {
    // Si hay un error al preparar la consulta
    echo "Error al preparar la consulta: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>


