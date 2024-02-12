<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descripcion = $_POST["descripcion"];
    $fecha_programada = $_POST["fecha_programada"];
    $tipo_mantenimiento = $_POST["tipo_mantenimiento"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);;

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar y enlazar parámetros
    $stmt = $conn->prepare("INSERT INTO mantenimientos (descripcion, fecha_programada,tipo_mantenimiento) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $descripcion, $fecha_programada,$tipo_mantenimiento);

    // Ejecutar
    $stmt->execute();

    // Cerrar conexión
    $stmt->close();
    $conn->close();

    // Redirigir a la página de visualización
    header("Location: visualizar_mantenimientos.php");
    exit();
}
?>
