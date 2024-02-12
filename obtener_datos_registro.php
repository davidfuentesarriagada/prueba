<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

// Crear una nueva conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se proporcionó un ID de registro válido en la solicitud GET
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Obtener el ID de registro de la solicitud y convertirlo a entero

    if ($id > 0) {
        // Crear una consulta SQL preparada para obtener los datos del registro
        $sql = "SELECT * FROM acta WHERE id = ?";
        $stmt = $conn->prepare($sql);

        // Vincular el parámetro ID de registro a la consulta preparada
        $stmt->bind_param("i", $id);

        // Ejecutar la consulta preparada
        if ($stmt->execute()) {
            // Obtener el resultado de la consulta
            $resultado = $stmt->get_result();

            // Verificar si se encontraron resultados
            if ($resultado->num_rows > 0) {
                // Obtener los datos del registro como un arreglo asociativo
                $registro = $resultado->fetch_assoc();

                // Devolver los datos del registro como una respuesta JSON
                echo json_encode($registro);
            } else {
                echo "Registro no encontrado";
            }
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }

        // Cerrar la consulta preparada
        $stmt->close();
    } else {
        echo "ID de registro no válido";
    }
} else {
    echo "ID de registro no especificado";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
