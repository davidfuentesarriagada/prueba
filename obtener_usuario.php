<?php
session_start();

$nombreUsuario = "Usuario"; // Nombre de usuario genérico por defecto

if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
    $nombreUsuario = $_SESSION['usuario'];
}


echo "Bienvenid@ " . $nombreUsuario;
?>
