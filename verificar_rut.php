<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el RUT enviado desde el formulario
$rut = $_POST['rut'] ?? '';

// Preparar consulta para verificar si el RUT ya existe
// Usar consultas preparadas para evitar la inyección SQL
$stmt = $conn->prepare("SELECT * FROM personal WHERE rut = ?");
$stmt->bind_param("s", $rut);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // El RUT ya existe
    echo "existe";
} else {
    // El RUT no existe
    echo "no existe";
}

// Cerrar la conexión a la base de datos
$stmt->close();
$conn->close();
?>
