<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rut = $_POST["RUT"] ?? '';
    $razon_social = $_POST["razon_social"] ?? '';
    $nombre_fantasia = $_POST["nombre_fantasia"] ?? '';
    $contacto = $_POST["contacto"] ?? '';
    $anio_ingreso = $_POST["anio_ingreso"] ?? 0;
    $total_ventas_anuales = $_POST["total_ventas_anuales"] ?? 0;

    // Divide el total de ventas anuales por 1,000,000 para obtener el resultado
    $resultado = $total_ventas_anuales / 1000000;

    // Asigna la cuota social basada en el rango de ventas netas
    if ($resultado >= 1000.1) {
        $monto_cuota = 610000;
    } elseif ($resultado >= 500.1) {
        $monto_cuota = 457000;
    } elseif ($resultado >= 100.1) {
        $monto_cuota = 381000;
    } elseif ($resultado >= 40.1) {
        $monto_cuota = 305000;
    } elseif ($resultado >= 10.1) {
        $monto_cuota = 152000;
    } elseif ($resultado >= 5.1) {
        $monto_cuota = 76000;
    } elseif ($resultado >= 1.1) {
        $monto_cuota = 61000;
    } elseif ($resultado >= 0.5) {
        $monto_cuota = 46000;
    } else {
        $monto_cuota = 23000;
    }

    // Asigna el tamaño de la empresa basado en el resultado
    if ($resultado >= 10.1) {
        $tamano_cuotas_sociales = 'grande';
    } elseif ($resultado >= 1.1) {
        $tamano_cuotas_sociales = 'mediana';
    } else {
        $tamano_cuotas_sociales = 'pequeña';
    }

    // Establece los parámetros de la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    // Crea la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Prepara la consulta SQL para insertar los datos
    $stmt = $conn->prepare("INSERT INTO socios (rut, razon_social, nombre_fantasia, contacto, ano_ingreso, monto_cuota_mensual, tamano_cuotas_sociales) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssids", $rut, $razon_social, $nombre_fantasia, $contacto, $anio_ingreso, $monto_cuota, $tamano_cuotas_sociales);

    // Ejecuta la consulta y verifica si fue exitosa
    if ($stmt->execute()) {
        echo '<script>alert("Nuevo socio agregado exitosamente.");</script>';
        echo '<script>window.location.href = "listado_socios.php";</script>';
    } else {
        echo '<script>alert("Error al agregar socio: ' . $stmt->error . '");</script>';
        echo '<script>window.location.href = "listado_socios.php";</script>';
    }

    // Cierra la sentencia y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo '<script>alert("Método no permitido.");</script>';
    echo '<script>window.location.href = "listado_socios.php";</script>';
}
?>
