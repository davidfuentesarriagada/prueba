<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recopilar datos del formulario
$fecha = $_POST['fecha'];
$detalles = $_POST['detalles'];
$asistencia = $_POST['asistencia'];
$nombreDocumento = $_POST['nombreDocumento'];

// Procesar archivo subido
if (isset($_FILES['archivoActa']) && $_FILES['archivoActa']['error'] == 0) {
    $target_dir = "uploads/";

    // Crear directorio si no existe
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Obtener la extensión del archivo original
    $fileExtension = pathinfo($_FILES["archivoActa"]["name"], PATHINFO_EXTENSION);

    // Construir el nombre del archivo final. Asegúrate de limpiar el nombre del documento para evitar problemas de seguridad.
    $archivoActa = basename($nombreDocumento) . "." . $fileExtension;
    $target_file = $target_dir . $archivoActa;

    // Mover archivo a la carpeta "uploads/"
    if (move_uploaded_file($_FILES["archivoActa"]["tmp_name"], $target_file)) {
        echo "El archivo " . htmlspecialchars($archivoActa) . " ha sido subido.";
    } else {
        echo "Hubo un error subiendo el archivo.";
    }
} else {
    echo "No se subió ningún archivo.";
}

// Insertar datos en la base de datos
$sql = "INSERT INTO acta (fecha, detalles, asistencia, archivo) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $fecha, $detalles, $asistencia, $archivoActa);

if ($stmt->execute()) {
    echo "<script>alert('Nuevo registro agregado con éxito.'); window.location.href = 'http://localhost/prueba/actas.php';</script>";
} else {
    echo "<script>alert('Error: " . addslashes($stmt->error) . "'); window.location.href = 'http://localhost/prueba/actas.php';</script>";
}



$stmt->close();
$conn->close();
?>
