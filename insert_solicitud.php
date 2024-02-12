<?php
session_start();
require 'PHPMailer/src/PHPMailer.php'; // Ruta relativa desde el archivo 
require 'PHPMailer/src/SMTP.php';// Agrega esta línea para cargar la clase SMTP

$servername = "localhost";
$username = "root";
$password_bd = "";
$database = "prueba";

$conn = new mysqli($servername, $username, $password_bd, $database);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}



if (isset($_POST['Id_AreaTrabajo']) && isset($_POST['equipo_solicitado']) && isset($_POST['justificacion'])) {
    $id_jefe = $_POST['Id_AreaTrabajo'];
    $fechaSolicitud = $_POST['equipo_solicitado'];
    $justificacion = $_POST['justificacion'];
    $estado = "Pendiente"; // Establece el estado por defecto

    $creadoPor = $_SESSION['id']; // Cambiar según cómo obtengas el ID del usuario

    // Obtener la dirección de correo electrónico del jefe seleccionado
    $queryJefe = "SELECT Email, nombre FROM Empleados WHERE id = '$id_jefe'";
    $resultJefe = $conn->query($queryJefe);
    $rowJefe = $resultJefe->fetch_assoc();
    $correoJefe = $rowJefe['Email'];
    $nombreJefe = $rowJefe['nombre']; // Agrega esta línea para obtener el nombre del jefe

    $insertQuery = "INSERT INTO solicitudes (id_jefe, fecha_solicitud, justificacion, estado, id_usuario, created_at) 
                    VALUES ('$id_jefe', '$fechaSolicitud', '$justificacion', '$estado', '$creadoPor', NOW())";

    if ($conn->query($insertQuery) === TRUE) {
        // Envío de correo electrónico al jefe
        // Insertar la notificación en la base de datos
        $notificacionMensaje = "Se ha creado una nueva solicitud para su revisión por " . $_SESSION['usuario'];
        $insertNotificacionQuery = "INSERT INTO notificaciones (id_usuario, mensaje, fecha) VALUES (?, ?, NOW())";
        $stmtNotificacion = $conn->prepare($insertNotificacionQuery);
        $stmtNotificacion->bind_param("is", $id_jefe, $notificacionMensaje);
        $stmtNotificacion->execute();
        $stmtNotificacion->close();
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'mail.sicep.cl'; // Configura el servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'sicepinterno@sicep.cl'; // Cambia esto
        $mail->Password = 'P}WuVd;p.Zz?'; // Cambia esto
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587;

        $mail->setFrom('sicepinterno@sicep.cl', 'SICEP');
        $mail->addAddress($correoJefe, $nombreJefe); // Cambia la variable para el nombre del jefe
        $mail->Subject = 'Nueva Solicitud';
        $mail->Body = 'Se ha creado una nueva solicitud para su revisión.' .
              "\n\nFecha Solicitada: " . $_POST['equipo_solicitado'] . 
              "\nMotivo: " . $_POST['justificacion'] . 
              "\nQuien solicita: " . $_SESSION['usuario']; // Utiliza $_SESSION['first_name'] para mostrar el nombre del usuario que creó la solicitud

        if ($mail->send()) {
            echo '<script>alert("Solicitud insertada exitosamente y correo enviado al jefe.");</script>';
            header("Location: solicitudes.php");
        } else {
            echo '<script>alert("Solicitud insertada exitosamente pero hubo un error al enviar el correo al jefe.");</script>';
        }
        
        
    } else {
        echo "Error al insertar la solicitud: " . $conn->error;
    }
} else {
    echo "Faltan datos en el formulario.";
}

$conn->close();
?>
