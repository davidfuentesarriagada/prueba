<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"])) {
    $action = $_POST["action"];

    // Realiza la conexión a la base de datos (ajusta los valores según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Inserta la respuesta del usuario en una tabla específica (por ejemplo, "respuesta_usuario")
   
    $sql = "INSERT INTO respuesta_usuario (respuesta) VALUES (?)";


    // Ajusta los valores que deseas insertar en la base de datos
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $action);

    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Responde al cliente
    echo "La acción '$action' se ha guardado en la base de datos correctamente";
} else {
    echo "Error: Acceso no válido";
}
?>
