<?php
// Verifica si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombreSimulacro = $_POST["nombreSimulacro"];
    $fechaSimulacro = $_POST["fechaSimulacro"];
    $responsablesSimulacro = $_POST["responsablesSimulacro"];
    $objetivoSimulacro = $_POST["objetivoSimulacro"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    // Prepara la consulta SQL para insertar los datos en la tabla "Simulacros"
    $sql = "INSERT INTO Simulacros (nombreSimulacro, fechaSimulacro, responsablesSimulacro, objetivoSimulacro) VALUES (?, ?, ?, ?)";

    // Prepara la declaración
    $stmt = $conn->prepare($sql);

    // Vincula los parámetros
    $stmt->bind_param("ssss", $nombreSimulacro, $fechaSimulacro, $responsablesSimulacro, $objetivoSimulacro);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        // La inserción fue exitosa
        echo '<script>alert("Datos insertados exitosamente.");</script>';
        echo '<script>window.location.href = "simulacros.php";</script>';
       
    } else {
        echo '<script>alert("Error al insertar en la base de datos: ' . $stmt->error . '");</script>';
    }

    // Cierra la conexión
    $stmt->close();
    $conn->close();
} else {
    // Si no se enviaron datos por POST, muestra un mensaje de error
    echo "Error: No se han recibido datos del formulario.";
}
?>

