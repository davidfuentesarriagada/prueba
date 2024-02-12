<?php
session_start(); // Iniciar sesión (asegúrate de tener esto en la parte superior del archivo)
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

if (!isset($_SESSION['rol'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión (login.html)
    header("Location: login.html");
    exit();
}

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    // Si el usuario no tiene el rol de administrador, redirigirlo a otra página o mostrar un mensaje de error
    echo '<script>alert("Acceso denegado. No tienes permiso para acceder a esta página.");</script>';
   
    exit(); // Salir del script para evitar que el contenido de la página se muestre después del mensaje emergente
}

// Obtener el nombre del usuario desde las variables de sesión de PHP
$nombreUsuario = $_SESSION['usuario']; // Corregido para usar $_SESSION['usuario']

// Si el usuario tiene el rol de administrador, mostrar el contenido de la página de administrador aquí
echo '<script>alert("Bienvenido ' . $nombreUsuario. ', Aquí puedes realizar tareas de administración.");</script>';


// Redireccionar a otra página después de mostrar el mensaje emergente
    echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 1000);</script>";
?>

