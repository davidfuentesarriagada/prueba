<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_POST['id'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    $servername = "localhost";
    $username = "root";
    $password_bd = "";
    $database = "prueba";

    $conn = new mysqli($servername, $username, $password_bd, $database);

    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    $query = "UPDATE usuarios SET usuario = ?, email = ?, password = ?, rol = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $usuario, $email, $password, $rol, $idUsuario);

    if ($stmt->execute()) {
        echo '<script>alert("Usuario modificado exitosamente"); window.location.href = "usuarios.php";</script>';
    } else {
        echo '<script>alert("Error al modificar el usuario: ' . $stmt->error . '"); window.location.href = "usuarios.php";</script>';
    }
    

    $stmt->close();

    // Redirigir a la página de listado de usuarios
    header("Location: usuarios.php");
    exit();
}
?>
