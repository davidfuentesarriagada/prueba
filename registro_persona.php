<?php

$id_formu = isset($_POST['id_formu']) ? $_POST['id_formu'] : null;

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
$rut = isset($_POST['rut']) ? $_POST['rut'] : null;
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$Movil = isset($_POST['Movil']) ? $_POST['Movil'] : null;
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
$Hijos = isset($_POST['Hijos']) ? $_POST['Hijos'] : 'no';
$Profesion = isset($_POST['Profesion']) ? $_POST['Profesion'] : null;
$flaboral = isset($_POST['flaboral']) ? $_POST['flaboral'] : null;
$Id_AreaTrabajo = isset($_POST['Id_AreaTrabajo']) ? $_POST['Id_AreaTrabajo'] : null;
$cargo_p = isset($_POST['cargo_p']) ? $_POST['cargo_p'] : null;

echo "ID recibido: " . $id_formu . "<br>";

// ...

if ($Hijos === 'si') {
    // Si el usuario tiene hijos, deja cuantos como está
} else {
    // Si el usuario no tiene hijos, asigna 'no' a $Hijos
    $Hijos = 'no';
}

// Preparar la consulta SQL para insertar los datos en la tabla "personal"
$sql = "INSERT INTO personal (rut, nombre, Hijos, Movil, direccion, cargo_p, flaboral, Id_AreaTrabajo, Profesion, Prevision, Enfermedad, Medicamento, Nombre_Emg, Cto_Emg, a_medicamento, alergia, grupo_sanguineo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar la consulta
$stmt = $conn->prepare($sql);

// Vincular los valores
$stmt->bind_param("sssssssssssssssss", $rut, $nombre, $Hijos, $Movil, $direccion, $cargo_p, $flaboral, $Id_AreaTrabajo, $Profesion, $Prevision, $Enfermedad, $Medicamento, $Nombre_Emg, $Cto_Emg, $a_medicamento, $alergia, $grupo_sanguineo);


// Ejecutar la consulta
if ($stmt->execute()) {
        // Obtenemos el ID generado automáticamente para la nueva fila
        $id_formu = $conn->insert_id; // Cambiamos $nuevoID a $id_formu
    
        // Agregar un campo oculto para almacenar el id_formu
        echo "<script>";
        echo "alert('Datos guardados correctamente');";
        echo "var form = document.createElement('form');";
        echo "form.method = 'post';";
        echo "form.action = 'nuevo_personal2.php';";
        echo "var input = document.createElement('input');";
        echo "input.type = 'hidden';";
        echo "input.name = 'id_formu';";
        echo "input.value = '$id_formu';";
        echo "form.appendChild(input);";
        echo "var submit = document.createElement('input');";
        echo "submit.type = 'submit';";
        echo "submit.value = 'Siguiente';";
        echo "form.appendChild(submit);";
        echo "document.body.appendChild(form);";
        echo "form.submit();";
        echo "</script>";
       
    } else {
        echo "<script>alert('Error al guardar los datos: " . $stmt->error . "');</script>";
    }


// Cierra la consulta y la conexión
$stmt->close();
$conn->close();
?>

?>
