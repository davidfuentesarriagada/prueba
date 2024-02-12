<?php
session_start(); // Iniciar sesión

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    // ID de usuario presente en la sesión
    $id_usuario = $_SESSION['id'];
    $comentario = $_POST['comentario'];
    $nombreUsuario = $_SESSION['usuario'];

    $servername = "localhost";
    $username = "root";
    $password_bd = "";
    $database = "prueba";

    $conn = new mysqli($servername, $username, $password_bd, $database);

    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    $query = "INSERT INTO comentarios (id_usuario, comentario, nombre_usuario) VALUES ('$id_usuario', '$comentario', '$nombreUsuario')";
    
    if ($conn->query($query) === TRUE) {
        // Comentario agregado correctamente, mostrar mensaje emergente
        echo '<script>
                document.getElementById("myModal").querySelector(".modal-body").innerHTML = "Comentario agregado correctamente.";
                $("#myModal").modal();
              </script>';
              header("Location: perfil.php");
    } else {
        echo "Error al agregar el comentario: " . $conn->error;
    }

    $conn->close();
} else {
    // ID de usuario no definido en la sesión
    echo "ID de usuario no definido en la sesión.";
}
?>

