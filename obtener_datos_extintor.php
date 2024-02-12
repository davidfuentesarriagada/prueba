<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id_extintor'])) {
    // Validación de entrada
    $id_extintor = intval($_GET['id_extintor']);

    if ($id_extintor > 0) {
        // Realiza una consulta SQL utilizando una sentencia preparada para mayor seguridad.
        $sql = "SELECT * FROM extintores WHERE id_extintor = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_extintor);

        if ($stmt->execute()) {
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                $extintor = $resultado->fetch_assoc();
                echo json_encode($extintor);
            } else {
                echo "Extintor no encontrado";
            }
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "ID de extintor no válido";
    }
} else {
    echo "ID de extintor no especificado";
}

$conn->close();
?>

