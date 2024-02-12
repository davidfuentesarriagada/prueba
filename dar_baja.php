<?php
// Verificar si se recibieron los datos por POST
if (isset($_POST['codigo_inventario']) && isset($_POST['personal']) && isset($_POST['dispositivo']) && isset($_POST['equipo']) && isset($_POST['software']) && isset($_POST['fecha_alta']) && isset($_POST['motivo'])) {
    // Obtener los datos del formulario
    $codigo_inventario = $_POST['codigo_inventario'];
    $personal = $_POST['personal'];
    $dispositivo = $_POST['dispositivo'];
    $equipo = $_POST['equipo'];
    $software = $_POST['software'];
    $fecha_alta = $_POST['fecha_alta'];
    $motivo = $_POST['motivo'];

    // Convertir la fecha a formato "YYYY-MM-DD" antes de insertarla en la base de datos
    $fecha_alta = date('Y-m-d', strtotime($fecha_alta));

    // Realizar la inserción en la nueva tabla (tabla_de_bajas, por ejemplo)
    // (Asumiendo que ya tienes una conexión con la base de datos)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Crear la consulta SQL para insertar los datos en la tabla_de_bajas
    $sql = "INSERT INTO tabla_de_bajas (codigo_inventario, personal, dispositivo, equipo, software, fecha_baja, motivo) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $fecha_actual = date("Y-m-d"); // Obtener la fecha actual
    $stmt->bind_param("sssssss", $codigo_inventario, $personal, $dispositivo, $equipo, $software, $fecha_actual, $motivo);


    if ($stmt->execute()) {
        // Eliminar el registro de la tabla de inventario
        $sql_delete = "DELETE FROM inventario WHERE codigo_inventario = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("s", $codigo_inventario);
        $stmt_delete->execute();

        // Cerrar la conexión
        $conn->close();

        // Enviar una respuesta de éxito (esto es importante para la parte de AJAX en el frontend)
        echo "success";
        exit;
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }
} else {
    // Si no se recibieron los datos esperados, redirigir a una página de error
    header("Location: error_baja.php");
    exit;
}
?>
