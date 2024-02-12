<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre = $_POST["nombre"];
    $version = $_POST["version"];

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para insertar los datos en la tabla "software"
    $sql = "INSERT INTO software (nombre, version) VALUES ('$nombre', '$version')";

    // Ejecutar la consulta y verificar si se insertaron los datos correctamente
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Software agregado exitosamente");</script>';
        header("Location: mantenedor_soft.php");
        
    } else {
        echo '<script>alert("Error al agregar el software: ' . $conn->error . '");</script>';
    }

    $conn->close();
}
?>
