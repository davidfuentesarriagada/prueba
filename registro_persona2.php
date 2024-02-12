<?php
// Obtener el ID del formulario enviado (si se envió)
$id_formu = isset($_POST['id_formu']) ? $_POST['id_formu'] : null;

// Verificar si se recibió el ID del formulario
if ($id_formu !== null) {
    // Acceder a los elementos del array y mostrarlos como cadenas
    $Nombre_Emg = isset($_POST['Nombre_Emg']) ? $_POST['Nombre_Emg'] : null;
    $Cto_Emg = isset($_POST['Cto_Emg']) ? $_POST['Cto_Emg'] : null;
    $Enfermedad = isset($_POST['Enfermedad']) ? $_POST['Enfermedad'] : null;
    $grupo_sanguineo = isset($_POST['grupo']) ? $_POST['grupo'] : null;
    $Prevision = isset($_POST['Prevision']) ? $_POST['Prevision'] : null;
    $Medicamento = isset($_POST['Medicamento']) ? $_POST['Medicamento'] : null;
    $a_medicamento = isset($_POST['a_medicamento']) ? $_POST['a_medicamento'] : 'no';
    $cual_a_medicamento = isset($_POST['cual_a_medicamento']) ? $_POST['cual_a_medicamento'] : '';

    // Mostrar los valores recibidos
    echo "ID recibido: " . $id_formu . "<br>";
    echo "Nombre_Emg: " . $Nombre_Emg . "<br>";
    echo "Cto_Emg: " . $Cto_Emg . "<br>";
    echo "Enfermedad: " . $Enfermedad . "<br>";
    echo "Grupo Sanguíneo: " . $grupo_sanguineo . "<br>";
    echo "Previsión: " . $Prevision . "<br>";
    echo "Medicamento: " . $Medicamento . "<br>";
    echo "Alergico a medicamento: " . $a_medicamento . "<br>";
    if ($a_medicamento === 'si') {
        echo "Medicamento alérgico: " . $cual_a_medicamento . "<br>";
    }

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
    $sql = "UPDATE personal SET Nombre_Emg=?, Cto_Emg=?, Enfermedad=?, grupo_sanguineo=?, Prevision=?, Medicamento=?, a_medicamento=?, alergia=? WHERE id_formu=?";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Vincular los valores
    $stmt->bind_param("ssssssssi", $Nombre_Emg, $Cto_Emg, $Enfermedad, $grupo_sanguineo, $Prevision, $Medicamento, $a_medicamento, $cual_a_medicamento, $id_formu);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Obtenemos el ID generado automáticamente para la nueva fila
        $id_formu = $conn->insert_id; // Cambiamos $nuevoID a $id_formu
        echo "<script>";
        echo "alert('Datos guardados correctamente');";
        echo "var form = document.createElement('form');";
        echo "form.method = 'post';";
        echo "form.action = 'index.php';";
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
        echo "Error al guardar los datos: " . $stmt->error;
    }
    

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "ID no válido.";
}
?>
