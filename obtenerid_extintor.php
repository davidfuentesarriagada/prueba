<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica si la conexión es exitosa
if ($conn->connect_error) {
    $response['success'] = false;
    $response['message'] = 'Error en la conexión a la base de datos';
    echo json_encode($response);
    exit; // Termina el script
}

// Lógica para obtener el ID del extintor a partir de un parámetro en la solicitud
if (isset($_GET['id_extintor'])) {
    $id_extintor = $_GET['id_extintor'];
    
    // Realiza una consulta para obtener el ID del extintor a partir de la base de datos
    $sql = "SELECT id_extintor FROM extintores WHERE id = ? LIMIT 1"; // Ajusta la consulta a tu estructura de la base de datos
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id_extintor); // Suponiendo que el ID del extintor es un número entero

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $response['success'] = true;
            $response['id_extintor'] = $row['id_extintor'];
        } else {
            $response['success'] = false;
            $response['message'] = 'No se encontró ningún extintor con el ID especificado';
        }
    } else {
        $response['success'] = false;
        $response['message'] = 'Error al obtener el ID del extintor';
    }

    $stmt->close();
} else {
    $response['success'] = false;
    $response['message'] = 'ID del extintor no especificado en la solicitud';
}

echo json_encode($response);
?>