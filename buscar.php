<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

// Término de búsqueda proporcionado por el usuario
$searchTerm = $_GET['term'];

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para buscar registros que coincidan con el término de búsqueda
$sql = "SELECT * FROM personal WHERE nombre LIKE '%$searchTerm%' OR rut LIKE '%$searchTerm%'";
$result = $conn->query($sql);


// Obtener los resultados de la consulta y devolverlos como JSON
$results = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
}


// Cerrar la conexión a la base de datos
$conn->close();

// Devolver los resultados como JSON
echo json_encode($results);
?>

