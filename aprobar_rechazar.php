<?php

session_start();

require 'PHPMailer/src/PHPMailer.php'; // Ruta relativa desde el archivo 
require 'PHPMailer/src/SMTP.php';// Agrega esta línea para cargar la clase SMTP


// Verificar si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del usuario y la acción desde la solicitud POST
    $id_solicitud = $_POST["id_solicitud"];
    $accion = $_POST["accion"];

    // Validar la solicitud POST
    if (!validarSolicitud($id_solicitud, $accion)) {
        echo "Error: Campos obligatorios vacíos o datos no válidos.";
        exit;
    }

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        echo "Conexión fallida: " . $conn->connect_error;
    } else {
        // Definir una variable para el estado predeterminado
        $estado = "";

        // Preparar la consulta SQL
        if ($accion == "aprobar") {
            $estado = "Aprobada";
        } elseif ($accion == "rechazar") {
            $estado = "Rechazada";
        }

        $update_query = "UPDATE solicitudes SET estado = ?, fecha_aprobacion = NOW() WHERE id_solicitud = ?";
        $stmt = $conn->prepare($update_query);

        $stmt->bind_param("si", $estado, $id_solicitud);

        if ($stmt->execute()) {
            echo "La solicitud ha sido $accion correctamente.";
             // Obtener el ID de usuario creador de la solicitud
            $idUsuarioCreador = obtenerIdUsuarioCreador($id_solicitud);

            // Verificar si se obtuvo el ID de usuario creador
            if ($idUsuarioCreador) {
                // Obtener la dirección de correo electrónico del usuario creador
                $emailUsuario = obtenerCorreoUsuario($idUsuarioCreador);

                // Verificar si se obtuvo la dirección de correo electrónico
                if ($emailUsuario) {
                    // Envía el correo electrónico al usuario creador
                    enviarCorreoUsuario($emailUsuario, $estado, $id_solicitud);

                }
            }

            echo "La solicitud ha sido $accion correctamente.";
        header("location: aprueba.php");
    } else {
            echo "Error al $accion la solicitud: " . $stmt->error;
        }

        // Cerrar la conexión a la base de datos
        $stmt->close();
        $conn->close();
    }
} else {
    // Si no se recibe una solicitud POST, enviar una respuesta de error
    echo "Solicitud no válida";
}

header("Location: aprueba.php"); 
exit();

// Función para validar los datos de la solicitud
function validarSolicitud($id_solicitud, $accion) {
    // Validar que los datos no estén vacíos
    if (empty($id_solicitud) || empty($accion)) {
        return false;
    }

    // Validar que la acción sea válida
    if ($accion != "aprobar" && $accion != "rechazar") {
        return false;
    }

    // Agregar una función para limpiar los datos del usuario
    $id_solicitud = filter_var($id_solicitud, FILTER_SANITIZE_NUMBER_INT);
    $accion = filter_var($accion, FILTER_SANITIZE_STRING);

    return true;
}


// Dentro de la función enviarCorreoUsuario
function enviarCorreoUsuario($emailUsuario, $estado, $id_solicitud) {
    // Configurar y enviar el correo usando PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurar el servidor SMTP
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'mail.sicep.cl'; // Configura el servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'sicepinterno@sicep.cl'; 
        $mail->Password = 'P}WuVd;p.Zz?'; 
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587;

        // Configurar el remitente y el destinatario
        $mail->setFrom('sicepinterno@sicep.cl', 'SICEP');
        $mail->addAddress($emailUsuario);
        
        // Configurar el contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Resultado de tu solicitud';
        $mail->Body = "Tu solicitud con ID $id_solicitud ha sido $estado.";

        // Enviar el correo
        $mail->send();
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}


// Obtener el ID de usuario creador de la solicitud desde la base de datos
function obtenerIdUsuarioCreador($id_solicitud) {
    global $conn; 

    // Consulta SQL para obtener el ID de usuario creador de la solicitud
    $select_query = "SELECT id_usuario FROM solicitudes WHERE id_solicitud = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->bind_param("i", $id_solicitud);
    $stmt->execute();
    $stmt->bind_result($idUsuarioCreador);

    if ($stmt->fetch()) {
        return $idUsuarioCreador;
    } else {
        return false;
    }
}

// Función para obtener el correo electrónico del usuario creador
function obtenerCorreoUsuario($idUsuario) {
    global $conn; 

    // Consulta SQL para obtener el correo electrónico del usuario
    $select_query = "SELECT email FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $stmt->bind_result($emailUsuario);

    if ($stmt->fetch()) {
        return $emailUsuario;
    } else {
        return false;
    }
}


?>


