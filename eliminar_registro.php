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

// Realizar la consulta SQL para eliminar el registro por su ID
$query = "DELETE FROM cparitario WHERE id = $id";
if ($conn->query($query) === TRUE) {
    // La eliminación fue exitosar
    echo "Registro eliminado correctamente";
} else {
    // Si hay un error en la consulta SQL
    echo "Error al eliminar el registro: " . $conn->error;
}

$conn->close();
?>

