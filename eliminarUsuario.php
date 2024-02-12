<?php
// Realiza la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica si se ha proporcionado el parámetro "id" en la URL
if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];

    // Antes de eliminar al usuario, eliminamos los comentarios asociados a ese usuario
    $sql_delete_comments = "DELETE FROM comentarios WHERE id_usuario = $idUsuario";
    if ($conn->query($sql_delete_comments) === TRUE) {
        // Ahora eliminamos al usuario
        $sql_delete_user = "DELETE FROM usuarios WHERE id = $idUsuario";
        if ($conn->query($sql_delete_user) === TRUE) {
            echo "Usuario eliminado exitosamente.";
        } else {
            echo "Error al eliminar el usuario: " . $conn->error;
        }
    } else {
        echo "Error al eliminar los comentarios: " . $conn->error;
    }
} else {
    echo "No se proporcionó un ID de usuario válido.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
