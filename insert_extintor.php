<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conectar a la base de datos (reemplaza con tus credenciales)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $ala = $_POST['ala'];
    $cantidad = $_POST['cantidad'];
    $responsable = $_POST['responsable'];
    $fechaMantencion = $_POST['fecha_mantencion'];
    $fechaVencimiento = $_POST['fecha_vencimiento'];

    // Preparar la sentencia SQL para insertar datos
    $sql = "INSERT INTO extintores (Ala, Cantidad, Responsable, fecha_mantencion, fecha_vencimiento) VALUES (?, ?, ?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conn->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("sisss", $ala, $cantidad, $responsable, $fechaMantencion, $fechaVencimiento);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        // Si la inserción fue exitosa, redirige o muestra un mensaje de éxito
        header("Location: extintores.php"); // Redirige a la página de extintores
        exit();
    } else {
        // Si hubo un error en la inserción, muestra un mensaje de error
        echo "Error al agregar el extintor: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    // Si no se envió el formulario, redirige a la página de extintores
    header("Location: extintores.php");
    exit();
}
?>
