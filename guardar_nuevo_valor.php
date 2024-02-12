<?php
// Depuración con var_dump()
var_dump($_POST);

// Verifica que se haya recibido el valor y el dato a editar
if (isset($_POST['valor']) && isset($_POST['dato'])) {
    $nuevoValor = $_POST['valor'];
    $datoAEditar = $_POST['dato'];

    // Agrega mensajes de depuración para verificar los valores
    var_dump("Nuevo Valor: " . $nuevoValor);
    var_dump("Dato a Editar: " . $datoAEditar);
    
    // Aquí puedes realizar la lógica para guardar el nuevo valor en tu base de datos o sistema
    
    // Ejemplo de conexión a una base de datos MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
    // Actualiza el nuevo valor en la base de datos
    $sql = "UPDATE usuarios SET $datoAEditar = '$nuevoValor' WHERE usuario = '$nombreUsuario'";
    
    if ($conn->query($sql) === TRUE) {
        $response = ['success' => true];
    } else {
        $response = ['success' => false, 'message' => 'Error al actualizar el valor'];
    }
    
    $conn->close();
} else {
    $response = ['success' => false, 'message' => 'Datos incompletos'];
}

// Agrega mensajes de depuración para verificar la respuesta
var_dump("Respuesta: " . json_encode($response));

// Devuelve la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
