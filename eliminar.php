<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    // Obtener el ID de la fila a eliminar
    $id = $_GET['id'];

    // Preparar la consulta SQL para eliminar la fila con el ID especificado utilizando una sentencia preparada
    $sql = "DELETE FROM ingreso WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Mostrar mensaje emergente
        echo "<script>alert('Fila eliminada correctamente.');</script>";
    } else {
        echo "Error al eliminar la fila: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID no especificado en la URL.";
}

// Cerrar la conexión a la base de datos
$conn->close();

// Redireccionar a Listado-productos.php después de 2 segundos
echo "<script>setTimeout(function() { window.location.href = 'Listado-productos.php'; }, 1000);</script>";
