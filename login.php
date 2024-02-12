<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $password_bd = "";
    $database = "prueba";

    $conn = new mysqli($servername, $username, $password_bd, $database);

    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Preparar la consulta con una sentencia preparada para evitar la inyección SQL
    $query = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Usuario y contraseña válidos, obtener los datos del usuario
        $row = $result->fetch_assoc();
        $rol = $row['rol'];
        $nombre_de_usuario = $row['first_name'];
        $imagen_perfil = $row['imagen_perfil'];
        $id_usuario = $row['id'];
        $last_name = $row['last_name'];
        $email = $row['email'];

        // Iniciar la sesión y almacenar datos del usuario
        session_start();
        $_SESSION['rol'] = $rol;
        $_SESSION['usuario'] = $nombre_de_usuario;
        $_SESSION['id'] = $id_usuario;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['email'] = $email;

        if (!empty($imagen_perfil)) {
            $_SESSION['imagen_perfil'] = $imagen_perfil;
        } else {
            $_SESSION['imagen_perfil'] = "img/fotos/default.jpg";
        }

        // Redirigir según el rol del usuario
        switch ($rol) {
            case 'admin':
                header("Location: administrador.php");
                exit();
            case 'visualizador':
                header("Location: visualizador.php");
                exit();
            case 'ejecutivo':
                header("Location: ejecutivo.php");
                exit();
            case 'general':
                header("Location: general.php");
                exit();
            default:
                echo "<script>alert('Rol de usuario desconocido');</script>";
        }
    } else {
        // Usuario o contraseña incorrectos, mostrar mensaje de error
        echo "<script>alert('Usuario o contraseña incorrectos');</script>";
        header("Location: login.html");
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
