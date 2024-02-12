<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Incluir la librería PHPMailer
require 'PHPMailer-master/PHPMailer.php';
require 'PHPMailer-master/SMTP.php';
require 'PHPMailer-master/Exception.php';

// Aumentar el tiempo máximo de ejecución a 300 segundos (5 minutos)
ini_set('max_execution_time', 300);

// Configuración de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurar el servidor SMTP y autenticación
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Cambia a DEBUG_CLIENT si solo quieres ver los mensajes del cliente
    $mail->isSMTP();
    $mail->Host       = 'mail.sicep.cl';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'sicepinterno@sicep.cl';
    $mail->Password   = 'P}WuVd;p.Zz?';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 465;

    // Recuperar los datos del formulario
    $idJefe = $_POST['Id_AreaTrabajo'];
    $fechaSolicitud = $_POST['equipo_solicitado'];
    $justificacion = $_POST['justificacion'];

    // Establecer la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Agrega un punto de depuración
    echo "Punto 1: Antes de la consulta SQL<br>";

    // Consulta preparada para obtener el correo de la jefatura seleccionada
    $queryCorreoJefatura = "SELECT Email FROM Empleados WHERE id = ?";
    $stmt = $conn->prepare($queryCorreoJefatura);
    $stmt->bind_param("i", $idJefe);
    $stmt->execute();
    $resultadoCorreo = $stmt->get_result();

    if ($resultadoCorreo->num_rows > 0) {
        $filaCorreo = $resultadoCorreo->fetch_assoc();
        $correoDestino = $filaCorreo['Email'];
    } else {
        $correoDestino = 'sicepinterno@sicep.cl'; // Correo por defecto si no se encuentra la jefatura
    }

    // Agrega un punto de depuración
    echo "Punto 2: Antes de configurar el correo<br>";

    // ... Resto de tu código ...

    // Configuración del correo
    $mail->setFrom('sicepinterno@sicep.cl', 'SICEP Interno');
    $mail->addAddress($correoDestino, 'Destinatario'); // Usa el correo recuperado de la base de datos

    // Agrega un punto de depuración
    echo "Punto 3: Antes de enviar el correo<br>";

    // Configuración del contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Nueva solicitud de equipo';
    $mail->Body = 'Se ha recibido una nueva solicitud de equipo. A continuación, los detalles:<br>';
    $mail->Body .= 'Jefe Responsable: ' . $idJefe . '<br>';
    $mail->Body .= 'Fecha Solicitada: ' . $fechaSolicitud . '<br>';
    $mail->Body .= 'Justificación: ' . $justificacion . '<br>';

    // Envía el correo
    $mail->send();

    // Agrega un punto de depuración
    echo "Punto 4: Después de enviar el correo<br>";

    echo '<script>alert("Solicitud agregada exitosamente, Su respuesta será dentro de 3 días hábiles. Se ha enviado una notificación al jefe responsable.");</script>';
    echo '<script>window.location.replace("solicitudes.php");</script>';
} catch (Exception $e) {
    echo '<script>alert("Error al agregar solicitud: ' . $conn->error . '. No se pudo enviar la notificación por correo.");</script>';
    echo '<script>window.location.replace("solicitudes.php");</script>';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
