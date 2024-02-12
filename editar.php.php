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
$id = $_POST['id'];
$area = $_POST['area'];
$codInventario = $_POST['cod_inventario'];
$asignado = $_POST['asignado'];
$dispositivo = $_POST['dispositivo'];
$tipoIp = $_POST['tipo_ip'];
$marca = $_POST['marca'];
$serieN = $_POST['serie'];
$modelo = $_POST['modelo'];
$caracteristicas = $_POST['caracteristicas'];
$fabricante = $_POST['fabricante'];
$ghz = $_POST['ghz'];
$ramGB = $_POST['ram'];
$hddGB = $_POST['hdd'];
$ssdGB = $_POST['ssd'];
$sistemaOperativo = $_POST['sistema_operativo'];

// Preparar la consulta SQL para actualizar los datos en la tabla "ingreso" utilizando una sentencia preparada
$sql = "UPDATE ingreso SET Area = ?, CodInventario = ?, Asignado = ?, Dispositivo = ?, TipoIp = ?, Marca = ?, SerieN = ?, Modelo = ?,
        Caracteristicas = ?, Fabricante = ?, GHz = ?, RamGB = ?, HDDGB = ?, SSDGB = ?, SistemaOperativo = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssssssi", $area, $codInventario, $asignado, $dispositivo, $tipoIp, $marca, $serieN, $modelo,
                 $caracteristicas, $fabricante, $ghz, $ramGB, $hddGB, $ssdGB, $sistemaOperativo, $id);

// Ejecutar la consulta SQL
if ($stmt->execute()) {
    echo "Datos actualizados correctamente.";
} else {
    echo "Error al actualizar los datos: " . $stmt->error;
}

$stmt->close();

// Cerrar la conexión a la base de datos
$conn->close();
?>
