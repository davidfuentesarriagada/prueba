<?php
// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el valor del tipo de dispositivo del formulario
    $tipo = $_POST["tipo"];

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar el nuevo tipo de dispositivo con el nombre como NULL
    $sql = "INSERT INTO dispositivos (nombre, tipo) VALUES (NULL, '$tipo')";

    // Ejecutar la consulta y verificar si se insertaron los datos correctamente
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Tipo de dispositivo agregado exitosamente.');</script>";
        header("Location: index.php"); // Cambia la redirección según tus necesidades
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
