<?php
// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $fecha = $_POST['fecha'];
    $detalles = $_POST['detalles'];
    $asistencia = $_POST['asistencia'];


    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para insertar los datos en la tabla cparitario
    $query = "INSERT INTO acta (fecha, detalles, asistencia) VALUES ('$fecha', ' $detalles', ' $asistencia')";

    if ($conn->query($query) === TRUE) {
        // La inserción fue exitosa
        echo "<script>alert('Registro insertado correctamente');</script>";
    } else {
        // Ocurrió un error durante la inserción
        echo "<script>alert('Error al insertar el registro');</script>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();

    // Redireccionar a la página principal después de 2 segundos
    echo "<script>setTimeout(function() { window.location.href = 'actas.php'; }, 2000);</script>";
}
?>
