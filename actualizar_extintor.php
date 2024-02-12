<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validación de datos
    $id_extintor = isset($_POST['id_extintor']) ? intval($_POST['id_extintor']) : 0;
    $ala = isset($_POST['Ala']) ? $conn->real_escape_string($_POST['Ala']) : "";
    $cantidad = isset($_POST['Cantidad']) ? intval($_POST['Cantidad']) : 0;
    $responsable = isset($_POST['Responsable']) ? $conn->real_escape_string($_POST['Responsable']) : "";
    $fechaMantencion = isset($_POST['fecha_mantencion']) ? $conn->real_escape_string($_POST['fecha_mantencion']) : "";
    $fechaVencimiento = isset($_POST['fecha_vencimiento']) ? $conn->real_escape_string($_POST['fecha_vencimiento']) : "";

    // Mensajes de depuración
    error_log("ID del extintor: " . $id_extintor);
    error_log("Ala: " . $ala);
    error_log("Cantidad: " . $cantidad);
    error_log("Responsable: " . $responsable);
    error_log("Fecha de Mantención: " . $fechaMantencion);
    error_log("Fecha de Vencimiento: " . $fechaVencimiento);

    // Verificar si el usuario tiene los permisos adecuados para actualizar el registro

    // Actualizar los datos del extintor en la base de datos (sentencia preparada)
    $stmt = $conn->prepare("UPDATE extintores SET Ala = ?, Cantidad = ?, Responsable = ?, fecha_mantencion = ?, fecha_vencimiento = ? WHERE id_extintor = ?");
    $stmt->bind_param("sissii", $ala, $cantidad, $responsable, $fechaMantencion, $fechaVencimiento, $id_extintor);

    if ($stmt->execute()) {
        // Éxito: muestra un mensaje de éxito y redirige a extintores2.php
        echo "<script>alert('Extintor actualizado correctamente');</script>";
        echo "<script>window.location = 'extintores2.php';</script>";
    } else {
        // Error: muestra un mensaje de error
        echo "<script>alert('Error al actualizar el extintor: " . $stmt->error . "');</script>";
    }

    $stmt->close();
} else {
    echo "Método no permitido";
}

$conn->close();
?>
