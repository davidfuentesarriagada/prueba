<?php
// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $fecha = $_POST['fecha'] ?? null;
    $observacion = $_POST['observacion'] ?? null;
    // El nombre del documento se usará para el nombre del archivo, pero no se insertará en la base de datos directamente
    $nombreDocumento = $_POST['nombreDocumento'] ?? null;

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $conn->begin_transaction();

    $archivoActa = null; // Variable para almacenar el nombre del archivo subido

    // Subir el archivo si está presente
    if (isset($_FILES['archivoActa']) && $_FILES['archivoActa']['error'] == 0) {
        $directorioDestino = 'img/mantenciones_logicas/';
        $archivo = $_FILES['archivoActa'];

        if (!is_dir($directorioDestino) && !mkdir($directorioDestino, 0755, true)) {
            echo "<script>alert('No se pudo crear el directorio de destino.'); window.location.href = 'mantenciones.php';</script>";
            $conn->rollback();
            $conn->close();
            exit();
        }

        // Construir el nombre del archivo
        $nombreArchivo = preg_replace("/[^a-zA-Z0-9_\-\.]/", '', $nombreDocumento);
        $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        $archivoActa = $nombreArchivo . '.' . $extension;
        $rutaArchivo = $directorioDestino . $archivoActa;

        if (!move_uploaded_file($archivo['tmp_name'], $rutaArchivo)) {
            echo "<script>alert('Hubo un error al subir el documento.'); window.location.href = 'mantenciones.php';</script>";
            $conn->rollback();
            $conn->close();
            exit();
        }
    }

    // Verificar que todos los campos requeridos estén presentes antes de proceder
    if ($fecha && $observacion && $archivoActa) {
        // Consulta para insertar los datos
        $sql = "INSERT INTO mantenciones (fecha, observacion, archivo) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            echo "<script>alert('Error al preparar la consulta'); window.location.href = 'mantenciones.php';</script>";
            $conn->close();
            exit();
        }

        // Vincular los parámetros a la declaración preparada
        $stmt->bind_param("sss", $fecha, $observacion, $archivoActa);

        // Ejecutar la consulta
        if (!$stmt->execute()) {
            echo "<script>alert('Error al insertar el registro'); window.location.href = 'mantenciones.php';</script>";
            $stmt->close();
            $conn->rollback();
            $conn->close();
            exit();
        }

        $stmt->close();
        $conn->commit();
        echo "<script>alert('Registro insertado y documento subido correctamente.'); window.location.href = 'mantenciones.php';</script>";
    } else {
        echo "<script>alert('Faltan datos requeridos.'); window.location.href = 'mantenciones.php';</script>";
        $conn->rollback();
    }
    $conn->close();
} else {
    header("Location: mantenciones.php");
    exit();
}
?>
