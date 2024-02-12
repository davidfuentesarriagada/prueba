<?php
// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el correo electrónico ingresado en el formulario
    $email = $_POST['email'];

    // Generar un token único
    $token = bin2hex(random_bytes(32));

    // Verificar si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el correo electrónico ingresado en el formulario
    $email = $_POST['email'];

    // Generar un token único
    $token = bin2hex(random_bytes(32));

    // Establecer los detalles de conexión a la base de datos
    $servername = "localhost";
    $username = "tu_usuario";
    $password = "tu_contraseña";
    $dbname = "nombre_de_tu_base_de_datos";

    // Crear una conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar si se estableció la conexión correctamente
    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Escapar los valores para evitar inyección SQL
    $email = $conn->real_escape_string($email);
    $token = $conn->real_escape_string($token);

    // Crear la consulta SQL INSERT
    $sql = "INSERT INTO usuarios_token (email, token) VALUES ('$email', '$token')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "El token se ha almacenado correctamente en la base de datos";
    } else {
        echo "Error al almacenar el token en la base de datos: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    }

    // Construir el enlace para restablecer la contraseña
    $resetLink = "https://localhost/reset_password.php?token=" . $token;

    // Configurar los detalles del correo electrónico
    $to = $email;
    $subject = "Restablecer contraseña";
    $message = "Hola,\n\nPara restablecer tu contraseña, haz clic en el siguiente enlace:\n\n" . $resetLink . "\n\nSi no has solicitado restablecer tu contraseña, ignora este correo.\n\nGracias.";

    // Enviar el correo electrónico
    if (mail($to, $subject, $message)) {
        echo "Se ha enviado un correo electrónico con el enlace para restablecer la contraseña";
    } else {
        echo "Error al enviar el correo electrónico";
    }
}
?>
