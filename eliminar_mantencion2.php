<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Asegurar que el ID esté presente y sea un entero válido
if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $id = $_GET['id'];
} else {
    echo "<script>alert('ID no proporcionado o inválido.'); window.history.back();</script>";
    exit;
}

// Preparar la consulta SQL
$query = "DELETE FROM mantencion_fisica WHERE id = ?";
$stmt = $conn->prepare($query);

if ($stmt) {
    // Vincular el parámetro y ejecutar
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Verificar si algún registro fue realmente eliminado
        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Registro eliminado correctamente.'); window.location.href='http://localhost/prueba/mantenciones2.php';</script>";
        } else {
            echo "<script>alert('No se encontró el registro a eliminar.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Error al eliminar el registro.'); window.history.back();</script>";
    }
    
    // Cerrar la declaración
    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
