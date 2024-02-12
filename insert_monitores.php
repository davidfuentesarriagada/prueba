<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establece la conexión a la base de datos (ajusta los valores según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Obtiene los datos del formulario
    $monitor = $_POST['monitor'];
    $piso_unidad = $_POST['piso_unidad'];
    $cantidad_responsables = $_POST['cantidad_responsables'];
    $objetivo = $_POST['objetivo'];

    // Prepara la consulta SQL para insertar los datos en la tabla "monitores"
    $sql = "INSERT INTO monitores (Monitor, Piso_Unidad, Cantidad_Responsables, Objetivo) VALUES (?, ?, ?, ?)";

    // Prepara la consulta
    $stmt = $conn->prepare($sql);

    // Vincula los valores a la consulta
    $stmt->bind_param("ssis", $monitor, $piso_unidad, $cantidad_responsables, $objetivo);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        // Éxito: Genera un mensaje de éxito y muestra un alert en JavaScript
        echo '<script>alert("Datos insertados exitosamente.");</script>';
        echo '<script>window.location.href = "monitores.php";</script>';
    } else {
        // Error: Genera un mensaje de error y muestra un alert en JavaScript
        echo '<script>alert("Error al insertar datos: ' . $stmt->error . '");</script>';
    }
    

    // Cierra la conexión a la base de datos
    $conn->close();
} else {
    echo "Acceso no válido.";
}
