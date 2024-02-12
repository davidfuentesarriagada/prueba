<?php
// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $fecha = $_POST['fecha'];
    $detalles = $_POST['detalles'];
    $tipo = $_POST['tipo_documento'];
    $nombreDocumento = $_POST['nombreArchivo'];

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Iniciar una transacción
    $conn->begin_transaction();

    // Consulta para insertar los datos en la tabla documentos usando consultas preparadas
    $sql = "INSERT INTO documentos (fecha, detalles, Tipo_documento, archivo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "<script>alert('Error al preparar la consulta'); window.location.href = 'documentos.php';</script>";
        $conn->close();
        exit();
    }

    $archivoActa = null; // Variable para almacenar el nombre del archivo subido

    // Subir el archivo si está presente
    if (isset($_FILES['archivoActa']) && $_FILES['archivoActa']['error'] == 0) {
        $directorioDestino = 'img/documentos/';
        $archivo = $_FILES['archivoActa'];

        if (!is_dir($directorioDestino) && !mkdir($directorioDestino, 0755, true)) {
            echo "<script>alert('No se pudo crear el directorio de destino.'); window.location.href = 'documentos.php';</script>";
            $conn->rollback(); // Cancelar la transacción
            $conn->close();
            exit();
        }

        $nombreArchivo = preg_replace("/[^a-zA-Z0-9_\-\.]/", '', $nombreDocumento);
        $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        $archivoActa = $nombreArchivo . '.' . $extension;
        $rutaArchivo = $directorioDestino . $archivoActa;

        if (!move_uploaded_file($archivo['tmp_name'], $rutaArchivo)) {
            echo "<script>alert('Hubo un error al subir el documento.'); window.location.href = 'documentos.php';</script>";
            $conn->rollback(); // Cancelar la transacción
            $conn->close();
            exit();
        }
    }

    // Vincular los parámetros a la declaración preparada
    $stmt->bind_param("ssss", $fecha, $detalles, $tipo, $archivoActa);

    // Ejecutar la consulta
    if (!$stmt->execute()) {
        echo "<script>alert('Error al insertar el registro'); window.location.href = 'documentos.php';</script>";
        $stmt->close();
        $conn->rollback(); // Cancelar la transacción
        $conn->close();
        exit();
    }

    // Si todo salió bien, hacer commit de la transacción
    $stmt->close();
    $conn->commit();
    echo "<script>alert('Registro insertado y documento subido correctamente.'); window.location.href = 'documentos.php';</script>";
    $conn->close();
} else {
    // Redirigir si el formulario no se envió
    header("Location: documentos.php");
    exit();
}
?>
