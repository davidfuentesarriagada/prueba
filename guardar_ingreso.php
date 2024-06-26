<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $codigo_inventario = $_POST["codigo_inventario"];
    $id_formu = $_POST["id_formu"];
    $id_dispositivo = $_POST["id_dispositivo"];
    $id_equipos = $_POST["id_equipos"];
    $motivo = $_POST["motivo"];

    // Obtener el array de software seleccionados desde el formulario
    $softwareIds = $_POST["asistentes"];

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

   // Preparar y ejecutar la consulta para obtener el nombre del personal
    $stmt = $conn->prepare("SELECT nombre FROM personal WHERE id_formu = ?");
    if (!$stmt) {
        echo "Error preparando la consulta: " . $conn->error;
        exit;
    }
    $stmt->bind_param("i", $id_formu);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $personal = $row['nombre'];
    } else {
        echo "No se encontró personal con ID: $id_formu"; // Más específico
        $personal = "No encontrado";
    }
    $stmt->close();
   

    

    // Crear la consulta SQL para insertar los datos en la tabla "inventario"
    $sql = "INSERT INTO inventario (codigo_inventario, id_formu, nombre, id_dispositivo, id_equipos, motivo) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $codigo_inventario, $id_formu, $personal,  $id_dispositivo, $id_equipos, $motivo);


   
    if ($stmt->execute()) {
        $inventario_id = $stmt->insert_id;
        $sql_software = "INSERT INTO software_inventario (inventario_id, software_id) VALUES (?, ?)";
        $stmt_software = $conn->prepare($sql_software);
        
        if (isset($_POST["asistentes"]) && is_array($_POST["asistentes"])) {
            foreach ($_POST["asistentes"] as $software_id) {
                $software_id = intval($software_id); // Convertir a entero
                // Verificar si software_id existe en la tabla 'software'
                
                $stmt_software->bind_param("ii", $inventario_id, $software_id);
                if (!$stmt_software->execute()) {
                    echo "Error al insertar en software_inventario: " . $conn->error;
                    // Considerar agregar un 'break;' o manejar el error de manera diferente
                }
            }
        } else {
            echo "No se seleccionaron software.";
        }

        header("Location: Nuevo-Producto.php"); 
        exit();
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    // Cerrar las conexiones y liberar los recursos
    $stmt_software->close();
    $stmt->close();
    $conn->close();
}


?>

