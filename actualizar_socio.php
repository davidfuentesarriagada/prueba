<?php


// Función para mostrar mensajes y errores en formato JSON
function mostrarMensaje($mensaje, $errores = []) {
    header('Content-Type: application/json');
    $esError = !empty($errores);
    echo json_encode(['mensaje' => $mensaje, 'error' => $esError, 'detalles' => $errores]);
    exit;
}

// Manejo de la solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recolecta los valores del formulario
    $id_socio = $_POST['id_socio'] ?? null;
    $rut = $_POST['rut'] ?? null;
    $razon_social = $_POST['razon_social'] ?? null;
    $nombre_fantasia = $_POST['nombre_fantasia'] ?? null;
    $contacto = $_POST['contacto'] ?? null;
    $ano_ingreso = $_POST['ano_ingreso'] ?? null;

    // Validar los datos del socio
    $erroresValidacion = validarSocio($rut, $razon_social, $nombre_fantasia, $contacto, $ano_ingreso);

    if (!empty($erroresValidacion)) {
        mostrarMensaje("Datos del formulario no válidos.", $erroresValidacion);
        return;
    }

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        mostrarMensaje("Error de conexión a la base de datos: " . $conn->connect_error, []);
        return;
    }

    // Preparar y ejecutar la consulta SQL
    $sql = "UPDATE socios SET
                rut = ?,
                razon_social = ?,
                nombre_fantasia = ?,
                contacto = ?,
                ano_ingreso = ?
            WHERE id_socio = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssssi", $rut, $razon_social, $nombre_fantasia, $contacto, $ano_ingreso, $id_socio);

        if ($stmt->execute()) {
            echo "<script>alert('Socio actualizado exitosamente.'); window.location.href = 'http://localhost/prueba/listado_socios.php';</script>";
        } else {
            echo "<script>alert('Error: " . addslashes($stmt->error) . "'); window.location.href = 'http://localhost/prueba/listado_socios.php';</script>";
        }
        

        $stmt->close();
    } else {
        mostrarMensaje("Error en la preparación de la sentencia: " . $conn->error, []);
    }

    

    $conn->close();
} else {
    mostrarMensaje("Método de solicitud no permitido.", []);
}


// Función para validar los datos del socio
function validarSocio($rut, $razon_social, $nombre_fantasia, $contacto, $ano_ingreso) {
    $errores = [];

    // Validar RUT
    if (empty($rut) || !preg_match("/^[0-9]+[-][0-9kK]$/", $rut)) {
        $errores['rut'] = 'El RUT es inválido o está vacío.';
    }

    // Validar razón social
    if (empty($razon_social)) {
    $errores['razon_social'] = 'La razón social no puede estar vacía.';
    }

    // Validar nombre de fantasía
    if (empty($nombre_fantasia)) {
        $errores['nombre_fantasia'] = 'El nombre de fantasía no puede estar vacío.';
    }

    // Validar contacto
    if (empty($contacto)) {
        $errores['contacto'] = 'El campo de contacto no puede estar vacío.';
    }

    // Validar año de ingreso
    if (empty($ano_ingreso) || !is_numeric($ano_ingreso)) {
        $errores['ano_ingreso'] = 'El año de ingreso es inválido o está vacío.';
    }

    return $errores;

}

?>


