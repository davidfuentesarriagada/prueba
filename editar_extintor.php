<?php
// Conexión a la base de datos (asegúrate de tener la conexión establecida)
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

if (isset($_POST['id_extintor'])) {
    $id = $_POST['id_extintor'];
} else {
    // Maneja el caso en el que no se ha recibido el ID del extintor
    $response['success'] = false;
    $response['message'] = 'ID del extintor no especificado';
    echo json_encode($response);
    exit; // Termina el script
}

if (isset($_POST['ala']) && isset($_POST['cantidad']) && isset($_POST['responsable']) && isset($_POST['fecha_mantencion']) && isset($_POST['fecha_vencimiento'])) {
    // Aquí puedes acceder de manera segura a los valores de los campos del formulario
    $id = $_POST['id_extintor'];
    $ala = $_POST['ala'];
    $cantidad = $_POST['cantidad'];
    $responsable = $_POST['responsable'];
    $fecha_mantencion = $_POST['fecha_mantencion'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];

    // Validación y sanitización de datos (realiza las validaciones específicas según tus necesidades)

    // Actualización de los datos en la base de datos
    $sql = "UPDATE extintores SET Ala=?, Cantidad=?, Responsable=?, fecha_mantencion=?, fecha_vencimiento=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sissii', $ala, $cantidad, $responsable, $fecha_mantencion, $fecha_vencimiento, $id);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Extintor actualizado correctamente';
    } else {
        $response['success'] = false;
        $response['message'] = 'Error al actualizar el extintor: ' . $stmt->error;
        error_log('Error en la actualización: ' . $stmt->error);
    }
    

    $stmt->close();
} else {
    $response['success'] = false;
    $response['message'] = 'Método no permitido';
}

echo json_encode($response);
?>