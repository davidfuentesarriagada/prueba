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
$id = $_GET['id'];

// Preparar una consulta SQL parametrizada
$query = "DELETE FROM acta WHERE id = ?";
$stmt = $conn->prepare($query);

if ($stmt) {
    // Vincular el parámetro y establecer su valor
    $stmt->bind_param("i", $id);

    // Ejecutar la consulta preparada
    if ($stmt->execute()) {
        echo "<script>alert('Registro eliminado correctamente'); window.location.href='http://localhost/prueba/actas.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el registro: " . addslashes($stmt->error) . "'); window.history.back();</script>";
    }

    // Cerrar la consulta preparada
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
