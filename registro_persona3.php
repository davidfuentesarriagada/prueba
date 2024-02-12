<?php
// Obtener el ID del formulario enviado
$id_formu = isset($_POST['id_formu']) ? $_POST['id_formu'] : null;
echo "<input type='hidden' name='id_formu' value='$id_formu'>";


// Verificar si se recibió el ID del formulario
if ($id_formu !== null) {
    // Acceder a los elementos del array y mostrarlos como cadenas
    $Profesion = isset($_POST['Profesion']) ? $_POST['Profesion'] : null;
    $flaboral = isset($_POST['flaboral']) ? $_POST['flaboral'] : null;
    $Id_AreaTrabajo = isset($_POST['Id_AreaTrabajo']) ? $_POST['Id_AreaTrabajo'] : null;
    $cargo_p = isset($_POST['cargo_p']) ? $_POST['cargo_p'] : null;

    // Mostrar los valores recibidos
    echo "ID recibido: " . $id_formu . "<br>";
    echo "Profesión u Oficio: " . $Profesion . "<br>";
    echo "Telefono Laboral: " . $flaboral . "<br>";
    echo "Área de Trabajo: " . $Id_AreaTrabajo . "<br>";
    echo "¿Cargo en comite paritario?: " . $cargo_p . "<br>";

    // Aquí puedes realizar cualquier otra lógica que necesites con estos datos

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

    // Actualizar la fila con la información adicional en la tabla "personal"
    $sql = "UPDATE personal SET Profesion=?, flaboral=?, Id_AreaTrabajo=?, cargo_p=? WHERE id_formu=?";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Vincular los valores
    $stmt->bind_param("sssii", $Profesion, $flaboral, $Id_AreaTrabajo, $cargo_p, $id_formu);

     // Ejecutar la consulta
     if ($stmt->execute()) {
        // Obtenemos el ID generado automáticamente para la nueva fila
        $id_formu = $conn->insert_id; // Cambiamos $nuevoID a $id_formu
    
        // Agregar un campo oculto para almacenar el id_formu
        echo "<form method='post' action='nuevo_personal3.php'>";
        echo "<input type='hidden' name='id_formu' value='$id_formu'>"; // Cambiamos $nuevoID a $id_formu
        echo "<input type='submit' value='Siguiente'>";
        echo "</form>";
        echo "Datos guardados correctamente. El ID de la nueva fila es: $id_formu";
        var_dump($id_formu);
    } else {
        echo "Error al guardar los datos: " . $stmt->error;
    }

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "ID no válido.";
}
?>