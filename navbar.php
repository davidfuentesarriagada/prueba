<?php
//include("functions.php");

$nombreUsuario = "Usuario";
$rutaImagenCompleta = "img/fotos/default.jpg"; // Ruta de imagen predeterminada

if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
    $nombreUsuario = $_SESSION['usuario'];
    $rutaImagenCompleta = $_SESSION['imagen_perfil']; // Obtener la ruta de la imagen de perfil
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .nav-link.dropdown-toggle .img-profile {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span id="username" class="mr-2 d-none d-lg-inline text-gray-600 small">
                <?php echo "Bienvenid@ " . $nombreUsuario; ?>
            </span>
            
            <img class="img-profile rounded-circle" src="<?php echo $rutaImagenCompleta; ?>" alt="Imagen de perfil">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="perfil.php">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Perfil
            </a>
           
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Cerrar Sesión
            </a>
        </div>
    </li>
   
    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="aprueba.php" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">
                <?php
                
                $servername = "localhost";
                $username = "root";
                $password_bd = "";
                $database = "prueba"; 

                $conn = new mysqli($servername, $username, $password_bd, $database);
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                if (isset($_SESSION['id'])) {
                    $query = "SELECT id_notificacion, mensaje, fecha FROM notificaciones WHERE id_usuario = ? ORDER BY fecha DESC";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $_SESSION['id']);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    echo $result->num_rows;

                    $stmt->close();
                } else {
                    echo "0"; // No hay notificaciones si no hay sesión de usuario
                }

                $conn->close();
                ?>
            </span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <?php
            if (isset($_SESSION['id'])) {
                while ($row = $result->fetch_assoc()) {
            ?>
                <a class="dropdown-item d-flex align-items-center" href="aprueba.php">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500"><?php echo $row['fecha']; ?></div>
                        <span class="font-weight-bold"><?php echo $row['mensaje']; ?></span>
                    </div>
                </a>
            <?php
                }
            }
            ?>
            <a class="dropdown-item text-center small text-gray-500" href="aprueba.php">Ver todas las alertas</a>
        </div>
    </li>


    <script>
        // Obtener el nombre de usuario mediante una solicitud AJAX a un archivo PHP
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var username = document.getElementById('username');
                username.textContent = xhr.responseText; // Establecer el nombre de usuario en el elemento
            }
        };
        xhr.open('GET', 'obtener_usuario.php', true); // Archivo PHP para obtener el nombre de usuario
        xhr.send();
    </script>
    
    <script>
        console.log("Nombre de usuario: <?php echo $nombreUsuario; ?>");
        console.log("Ruta de imagen completa: <?php echo $rutaImagenCompleta; ?>");
    </script>


</body>
</html>
