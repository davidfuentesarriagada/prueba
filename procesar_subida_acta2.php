<?php
// Directorio de destino para almacenar las actas
$directorioDestino = 'img/actas_Directorio/';

// Verificar si se ha enviado un archivo
if (isset($_FILES['archivoActa']) && isset($_POST['nombreDocumento'])) {
    $archivo = $_FILES['archivoActa'];
    $nombreDocumento = $_POST['nombreDocumento'];

    if (!is_dir($directorioDestino)) {
        // El directorio no existe, intenta crearlo
        if (!mkdir($directorioDestino, 0755, true)) {
            // No se pudo crear el directorio, muestra un mensaje de error
            $error_message = 'No se pudo crear el directorio de destino.';
            echo "<script>alert('$error_message')</script>";
        }
    }

    // Limpia el nombre del documento para evitar caracteres no deseados
    $nombreArchivo = preg_replace("/[^a-zA-Z0-9_\-\.]/", '', $nombreDocumento);

    // Añade la extensión del archivo original al nombre proporcionado por el usuario
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
    $nombreArchivoCompleto = $nombreArchivo . '.' . $extension;

    // Ruta completa del archivo en el servidor
    $rutaArchivo = $directorioDestino . $nombreArchivoCompleto;

    // Verificar si el directorio existe y tiene permisos antes de mover el archivo
    if (is_dir($directorioDestino) && is_writable($directorioDestino)) {
        if (move_uploaded_file($archivo['tmp_name'], $rutaArchivo)) {
            $message = "El acta se ha subido correctamente.";
            echo "<script>alert('$message'); window.location.href = 'actas.php';</script>";
        } else {
            $error_message = 'Hubo un error al subir el acta.';
            echo "<script>alert('$error_message')</script>"; 
        }
    } else {
        $error_message = 'El directorio de destino no tiene permisos de escritura.';
        echo "<script>alert('$error_message')</script>";
    }
}
?>
