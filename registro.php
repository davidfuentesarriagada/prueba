<?php

   

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $usuario = $_POST['repita_su_email']; // Nombre del campo corregido
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    // Validar que los campos no estén vacíos
    if (empty($first_name) || empty($last_name) || empty($email) || empty($usuario) || empty($password) || empty($confirm_password)) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Verificar si las contraseñas coinciden
        if ($password != $confirm_password) {
            echo "Las contraseñas no coinciden.";
        } else {
            // Realizar la conexión a la base de datos
            $servername = "localhost";
            $username = "root";
            $password_bd = "";
            $database = "prueba";

            $conn = new mysqli($servername, $username, $password_bd, $database);

            // Verificar si la conexión fue exitosa
            if ($conn->connect_error) {
                die("Error en la conexión a la base de datos: " . $conn->connect_error);
            }

            // Insertar el nuevo usuario en la base de datos
            $query = "INSERT INTO usuarios (first_name, last_name, usuario, email, password) VALUES ('$first_name', '$last_name', '$email','$usuario', '$password')";
            if ($conn->query($query) === TRUE) {
                echo "Registro exitoso. Ahora puedes iniciar sesión.";
            } else {
                echo "Error al registrar el usuario: " . $conn->error;
            }

            // Cerrar la conexión a la base de datos
            $conn->close();

            // Redireccionar a Listado-productos.php después de 2 segundos
            echo "<script>setTimeout(function() { window.location.href = 'login.html'; }, 1000);</script>";
        }
    }
}
?>
