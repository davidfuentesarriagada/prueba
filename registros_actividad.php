<?php
// Conexión a la base de datos (reemplaza con tus propias credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Información para el registro
session_start(); // Iniciar o reanudar la sesión (asegúrate de iniciar la sesión en todas las páginas)
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'Usuario Desconocido'; // Obtener el nombre de usuario si la sesión está activa
$descripcion = "El usuario ha iniciado sesión"; // Puedes personalizar la descripción según la acción
$fecha_hora = date("Y-m-d H:i:s"); // Obtener la fecha y hora actual

// Registro de actividad en un archivo
$log_message = "Usuario: " . $usuario . "\n";
$log_message .= "Descripción: " . $descripcion . "\n";
$log_message .= "Fecha y Hora: " . $fecha_hora . "\n";

// Nombre del archivo de registro
$log_file = "/ruta/a/tu/archivo-de-registro.log"; // Reemplaza con la ruta adecuada

// Guardar el registro en el archivo
file_put_contents($log_file, $log_message, FILE_APPEND | LOCK_EX);

// Sentencia SQL para insertar el registro de actividad en la base de datos
$sql = "INSERT INTO registros_actividad (Usuario, Fecha_Hora, Descripcion) VALUES (?, ?, ?)";

// Preparar la consulta
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

// Vincular los valores
$stmt->bind_param("sss", $usuario, $fecha_hora, $descripcion);

// Ejecutar la consulta en la base de datos
if ($stmt->execute()) {
    echo "Registro de actividad insertado con éxito.";
} else {
    echo "Error al insertar el registro de actividad en la base de datos: " . $stmt->error;
}

// Cierre de la conexión a la base de datos
$conn->close();
?>


