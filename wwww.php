<?php
// Supongamos que $id_formu y $otra_columna contienen los valores que deseas insertar
$id_formu = 99; // Asigna aquí el valor de id_formu
$otra_columna = 99; // Asigna aquí el valor de otra_columna

// Realiza la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realiza una consulta para verificar si el valor existe en la tabla personal
$consulta = "SELECT COUNT(*) AS existe FROM personal WHERE id_formu = ?";
$stmt = $conn->prepare($consulta);
$stmt->bind_param("i", $id_formu); // "i" indica un parámetro de tipo entero (integer)

if ($stmt->execute()) {
    $resultado = $stmt->get_result();
    $fila = $resultado->fetch_assoc();
    $existe = $fila['existe'];

    if ($existe > 0) {
        // El valor de id_formu es válido y existe en la tabla personal
        // Ahora puedes proceder con la inserción en la tabla inventario
        
        // Realiza la inserción en la tabla inventario
        $consulta_inventario = "INSERT INTO inventario (id_formu, otra_columna) VALUES (?, ?)";
        $stmt_inventario = $conn->prepare($consulta_inventario);
        $stmt_inventario->bind_param("is", $id_formu, $otra_columna); // "is" indica un entero y una cadena

        if ($stmt_inventario->execute()) {
            echo "Inserción exitosa en la tabla inventario.";
        } else {
            echo "Error al insertar en la tabla inventario: " . $stmt_inventario->error;
        }
        
        $stmt_inventario->close();
    } else {
        // El valor de id_formu no existe en la tabla personal
        // Puedes manejar este caso según tus necesidades (por ejemplo, mostrar un mensaje de error)
        echo "El valor de id_formu no existe en la tabla personal.";
    }
} else {
    // Manejar el caso en el que la consulta no se pudo ejecutar
    // Esto podría ser debido a un problema de conexión o consulta SQL incorrecta
    echo "Error en la consulta: " . $stmt->error;
}

$stmt->close(); // Cierra la consulta preparada
$conn->close(); // Cierra la conexión a la base de datos
?>
