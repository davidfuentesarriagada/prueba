<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Función para registrar una actividad
function registrar_actividad($id_usuario, $descripcion, $conn) {
    $fecha_hora = date("Y-m-d H:i:s"); // Obtiene la fecha y hora actual

    $sql = "INSERT INTO registros_actividad (Usuario, Fecha_Hora, Descripcion) VALUES ('$id_usuario', '$fecha_hora', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "Actividad registrada correctamente.";
    } else {
        echo "Error al registrar la actividad: " . $conn->error;
        echo "SQL: " . $sql; // Muestra la consulta SQL generada
    }
}

// Verifica si el usuario ha iniciado sesión y obtén su ID
session_start();
if (isset($_SESSION['usuario_id'])) {
    $id_usuario = $_SESSION['usuario_id'];
    $descripcion = "El usuario ha iniciado sesión.";
    registrar_actividad($id_usuario, $descripcion, $conn);
} else {
    echo "El usuario no ha iniciado sesión.";
}

// Cierra la conexión a la base de datos
$conn->close();

?>
