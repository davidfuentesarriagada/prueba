<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejo de inserción
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_area_trabajo = $_POST["Id_AreaTrabajo"];
    $marca = $_POST["marca"];
    $serie = $_POST["serie"];
    $tipo_disco = $_POST["tipo_disco"];
    $ram = $_POST["ram"];
    $s_o = $_POST["s_o"];

    // Validación y saneamiento de datos (por seguridad)
    $id_area_trabajo = mysqli_real_escape_string($conn, $id_area_trabajo);
    $marca = mysqli_real_escape_string($conn, $marca);
    $serie = mysqli_real_escape_string($conn, $serie);
    $tipo_disco = mysqli_real_escape_string($conn, $tipo_disco);
    $ram = mysqli_real_escape_string($conn, $ram);
    $s_o = mysqli_real_escape_string($conn, $s_o);

    $sql = "INSERT INTO equipos (id_area_trabajo, marca, serie, tipo_disco, ram, s_o) VALUES ('$id_area_trabajo', '$marca', '$serie', '$tipo_disco', '$ram', '$s_o')";

    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">
                alert("Equipo agregado exitosamente");
                window.location.href = "mantenedor.php"; 
              </script>';

    } else {
        echo '<script type="text/javascript">
                alert("Error: ' . $sql . '\n' . $conn->error . '");
                window.location.href = "insert_equipo_form.php"; // Cambiar a la página correcta
              </script>';
    }
}

$conn->close();
?>
