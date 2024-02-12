<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los valores enviados por el formulario
$motivo = $_POST['motivo'];
$tipo = $_POST['tipo'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$departamento = $_POST['departamento'];
$cargo = $_POST['cargo'];
$observaciones = $_POST['observaciones'];

// Preparar la consulta SQL para insertar los datos en la tabla "ingreso"
$sql = "INSERT INTO tabla_baja (motivo, tipo, marca, modelo, departamento, cargo, observaciones) 
        VALUES ('$motivo', '$tipo', '$marca', '$modelo', '$departamento', '$cargo', '$observaciones')";

// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente.";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
