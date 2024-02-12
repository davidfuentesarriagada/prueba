<?php
// Establecer la conexión a la base de datos (reemplaza con tus propios valores)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del socio a dar de baja desde la solicitud POST
if (isset($_POST['id_socio'])) {
    $idSocio = $_POST['id_socio'];

    // Consulta SQL para obtener los datos del socio que se dará de baja
    $sql = "SELECT * FROM socios WHERE id_socio = ?";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idSocio);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        // Verificar si se encontró un registro
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();


            // Insertar el registro en la tabla baja_socios
            $insert_sql = "INSERT INTO baja_socios (rut, razon_social, nombre_fantasia, contacto, ano_ingreso, monto_cuota_mensual, tamano_cuotas_sociales) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);

            // La cadena de definición de tipo debe ser "ssssidi" para reflejar los tipos de datos
            $insert_stmt->bind_param("ssssidi", $row['rut'], $row['razon_social'], $row['nombre_fantasia'], $row['contacto'], $row['ano_ingreso'], $row['monto_cuota_mensual'], $row['tamano_cuotas_sociales']);

            if ($insert_stmt->execute()) {
            // Eliminar el registro de la tabla principal
            $delete_sql = "DELETE FROM socios WHERE id_socio = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("i", $idSocio);

            if ($delete_stmt->execute()) {
            echo 'success'; // Indicar que la operación fue exitosa
            } else {
            echo 'error al eliminar'; // Indicar error en la eliminación
            }
            } else {
            echo 'error al insertar en baja_socios'; // Indicar error al insertar en baja_socios
            }

        } else {
            echo 'registro no encontrado'; // Indicar que no se encontró el registro
        }
    } else {
        echo 'error en la consulta'; // Indicar error en la consulta
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo 'ID de socio no proporcionado'; // Indicar que no se proporcionó el ID del socio
}
?>
