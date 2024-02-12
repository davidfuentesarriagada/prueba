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

// Verificar si se proporcionó un ID de socio válido en la solicitud GET
if (isset($_GET['id_socio'])) {
    $id_socio = intval($_GET['id_socio']); // Obtener el ID de socio de la solicitud y convertirlo a entero

    if ($id_socio > 0) {
        // Crear una consulta SQL preparada para obtener los datos del socio
        $sql = "SELECT * FROM socios WHERE id_socio = ?";
        $stmt = $conn->prepare($sql);

        // Vincular el parámetro ID de socio a la consulta preparada
        $stmt->bind_param("i", $id_socio);

        // Ejecutar la consulta preparada
        if ($stmt->execute()) {
            // Obtener el resultado de la consulta
            $resultado = $stmt->get_result();

            // Verificar si se encontraron resultados
            if ($resultado->num_rows > 0) {
                // Obtener los datos del socio como un arreglo asociativo
                $socio = $resultado->fetch_assoc();

                // Devolver los datos del socio como una respuesta JSON
                echo json_encode($socio);
            } else {
                echo "Socio no encontrado";
            }
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }

        // Cerrar la consulta preparada
        $stmt->close();
    } else {
        echo "ID de socio no válido";
    }
} else {
    echo "ID de socio no especificado";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
