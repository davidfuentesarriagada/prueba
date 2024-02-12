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
                    $query = "SELECT id_notificacion, mensaje, fecha, leida FROM notificaciones WHERE id_usuario = ? ORDER BY fecha DESC";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $_SESSION['id']);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $numNotifications = 0; // Contador de notificaciones no leídas

                    while ($row = $result->fetch_assoc()) {
                        if ($row['leida'] == 0) {
                            $numNotifications++;

                            // Marcar la notificación como leída en la base de datos
                            $notificationID = $row['id_notificacion'];
                            $updateQuery = "UPDATE notificaciones SET leida = 1 WHERE id_notificacion = ?";
                            $updateStmt = $conn->prepare($updateQuery);

                            if ($updateStmt === false) {
                                die("Error en la preparación de la actualización: " . $conn->error);
                            }

                            $updateStmt->bind_param("i", $notificationID);
                            $updateStmt->execute();

                            if ($updateStmt->error) {
                                die("Error al marcar la notificación como leída: " . $updateStmt->error);
                            }

                            $updateStmt->close();
                        }

                        // Muestra la notificación
                        ?>
                        <a class="dropdown-item d-flex align-items-center" href="#">
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

                    echo $numNotifications; // Muestra el número de notificaciones no leídas

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
            <!-- Contenido de las notificaciones -->
            <a class="dropdown-item text-center small text-gray-500" href="aprueba.php">Ver todas las alertas</a>
        </div>
    </li>