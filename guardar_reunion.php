<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $fechaReunion = $_POST["fechaReunion"];
    $observaciones = $_POST["observaciones"];

    // Obtener el array de asistentes seleccionados desde el formulario
    $asistentesIds = $_POST["asistentes"];

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar la nueva reunión en la tabla planificacion
    $sql_reunion = "INSERT INTO planificacion (fecha_reunion, observaciones) VALUES ('$fechaReunion', '$observaciones')";

    if ($conn->query($sql_reunion) === TRUE) {
        // Si la inserción de la reunión fue exitosa, obtener el ID de la nueva reunión insertada
        $idReunion = $conn->insert_id;

        // Preparar la consulta SQL para insertar los asistentes de la reunión en la tabla asistentes_reunion
        // Se inserta un asistente por cada ID seleccionado en el array $asistentesIds
        foreach ($asistentesIds as $idAsistente) {
            $sql_asistentes = "INSERT INTO asistentes_reunion (id_reunion, id_asistente) VALUES ('$idReunion', '$idAsistente')";
            $conn->query($sql_asistentes);
        }

        // Redirigir al usuario a la página principal o mostrar un mensaje de éxito
        header("Location: reuniones.php"); 
        exit();
    } else {
        // Si hubo un error en la inserción de la reunión, mostrar un mensaje de error
        echo "Error al guardar la reunión: " . $conn->error;
    }

    $conn->close();
}
?>
