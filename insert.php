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

// Obtener los valores del formulario
$nombre = $_POST['nombre'];
$id_jefatura = $_POST['Id_AreaTrabajo']; // Asegúrate de que el nombre sea correcto
$email = $_POST['Email'];

// Consulta para insertar un nuevo empleado con id_jefatura
$query = "INSERT INTO empleados (nombre, id_jefatura, Email) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sis", $nombre, $id_jefatura, $email);
if ($stmt->execute()) {
    echo '<script>alert("Empleado agregado exitosamente");</script>';
    echo '<script>window.location.replace("mantenedorjefe.php");</script>';
} else {
    echo '<script>alert("Error al agregar empleado: ' . $stmt->error . '");</script>';
}

$stmt->close();
$conn->close();
?>
