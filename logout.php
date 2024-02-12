<?php
// Iniciar sesión (asegúrate de tener esto en la parte superior del archivo)
session_start();

// Destruir todas las variables de sesión
session_unset();
session_destroy();

// Redirigir al usuario a la página de inicio de sesión (login.html)
header("Location: login.html");
exit();
?>

