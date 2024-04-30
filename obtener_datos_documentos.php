<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id_documento = $_GET['id_documento'];
$response = array();

if (isset($id_documento)) {
    $query = "SELECT Fecha, Tipo_documento, Detalles FROM documentos WHERE id_documento = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_documento);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $response = array('error' => false, 'Fecha' => $row['Fecha'], 'Tipo_documento' => $row['Tipo_documento'], 'detalles' => $row['detalles']);
    } else {
        $response = array('error' => true, 'mensaje' => 'No se encontró el documento');
    }
    $stmt->close();
} else {
    $response = array('error' => true, 'mensaje' => 'ID de documento no proporcionado');
}

header('Content-Type: application/json');
echo json_encode($response);
?>
