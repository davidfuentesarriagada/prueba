<?php
// Verificar si se ha enviado el formulario de ingreso
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $area = $_POST['area'];
    $cod_inventario = $_POST['cod_inventario'];
    $asignado = $_POST['asignado'];
    $dispositivo = $_POST['dispositivo'];
    $tipo_ip = $_POST['tipo_ip'];
    $marca = $_POST['marca'];
    $serie = $_POST['serie'];
    $modelo = $_POST['modelo'];
    $caracteristicas = $_POST['caracteristicas'];
    $fabricante = $_POST['fabricante'];
    $ghz = $_POST['ghz'];
    $ram = $_POST['ram'];
    $hdd = $_POST['hdd'];
    $ssd = $_POST['ssd'];
    $sistema_operativo = $_POST['sistema_operativo'];

    // Configurar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conexion = new mysqli($servername, $username, $password, $dbname);

    // Verificar si hay errores en la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }

    // Ejecutar la consulta de inserción
    $sql = "INSERT INTO ingreso (Area, CodInventario, Asignado, Dispositivo, TipoIp, Marca, SerieN, Modelo, Caracteristicas, Fabricante, GHz, RamGB, HDDGB, SSDGB, SistemaOperativo) VALUES ('$area', '$cod_inventario', '$asignado', '$dispositivo', '$tipo_ip', '$marca', '$serie', '$modelo', '$caracteristicas', '$fabricante', '$ghz', '$ram', '$hdd', '$ssd', '$sistema_operativo')";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la página de ingresos registrados
        header("Location: http://localhost/prueba/ingresos_registrados.php");
        exit();
    } else {
        echo "Error al insertar el registro: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>
