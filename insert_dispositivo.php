<?php
// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre = $_POST["nombre"];
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

    // Preparar la consulta SQL para insertar los datos en la tabla de dispositivos
    $sql = "INSERT INTO dispositivos (nombre, tipo) VALUES ('$nombre', '$tipo')";

    // Ejecutar la consulta y verificar si se insertaron los datos correctamente
    if ($conn->query($sql) === TRUE) {
        // Redireccionar a la página mantenedor_Dis.php después de agregar el dispositivo
        header("Location: mantenedor_Dis.php");
        exit(); // Asegurarse de terminar la ejecución del script después de la redirección
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
