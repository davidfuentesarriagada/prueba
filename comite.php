<?php
session_start();
?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/logo.png">

    <title>RecSys</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/144e03a4af.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="excel.css">  
      
    <!--datables CSS básico--> 
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  

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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: url(img/4.jpg);background-size: 100% 100%; background-attachment: fixed; visibility: visible;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon "><br>
                    <img class="mt-4" src="img/logo.png" height="120PX" width="130px">
                </div>
                <div class="sidebar-brand-text mx-3"><sup></sup></div>
            </a><br>
            <br>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-hand-holding-water"></i>
                    <span>Panel de Control</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Secciones
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <?php
                // Verificar el rol del usuario

                if (isset($_SESSION['rol'])) {
                    // Si el usuario ha iniciado sesión, mostrar las opciones según su rol
                    if ($_SESSION['rol'] === 'ejecutivo' || $_SESSION['rol'] === 'general') {
                        // Mostrar opciones para administrador
                        echo '

                            <li class="nav-item">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa-solid fa-coins"></i>
                                    <span>Administración y <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Finanzas</span>
                                </a>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <h6 class="collapse-header">Datos Generales:</h6>
                                        <a class="collapse-item" href="actas.php">Actas de sesiones</a>
                                        <a class="collapse-item" href="documentos.php">Docuemntos de finanzas</a>
                                        <a class="collapse-item" href="listado_socios.php">Socios AIA</a>
                                        <a class="collapse-item" href="mantenedor_socios.php">Mantenedor Socios</a>
                                        <a class="collapse-item" href="baja_socios.php">Listado de Baja-socios</a>
                                        
                                    </div>
                                </div>
                            </li>';
                                    
                                } elseif ($_SESSION['rol'] === 'visualizador') {
                                    
                                }
                                
                    }
            ?>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-person-booth"></i>
                    <span>Personal</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Datos Generales:</h6>
                        <!--<a class="collapse-item" href="listado-personal.php">Información del Personal</a>
                        <a class="collapse-item" href="nuevo_personal.php">Ingreso nuevo Personal</a>-->
                        <a class="collapse-item" href="#collapseMantenedor1" data-toggle="collapse" aria-expanded="false">
                            <span>Datos Generales</span>
                            <span class="arrow"><i class="fas fa-angle-down"></i></span>
                        </a>
                        <div class="collapse" id="collapseMantenedor1">

                        
                            <a class="collapse-item" href="nuevo_personal.php">Ingreso de Datos</a>
                            
                        </div>
                        <a class="collapse-item" href="#collapseMantenedor2" data-toggle="collapse" aria-expanded="false">
                            <span>Tabla de Información</span>
                            <span class="arrow"><i class="fas fa-angle-down"></i></span>
                        </a>
                        <div class="collapse" id="collapseMantenedor2">
                            <a class="collapse-item" href="listado-personal.php">Datos Personales</a>
                            <a class="collapse-item" href="listado-personal2.php">Datos de Salud</a>
                            <a class="collapse-item" href="listado-personal3.php">Datos Laborales</a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-people-carry"></i>
                    <span>Comité Paritario</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Información Actual:</h6>
                        <a class="collapse-item" href="comite.php">Personal Vigente</a>
                        <a class="collapse-item" href="reuniones.php">Reuniones</a>
                        <a class="collapse-item" href="extintores2.php">C. Extintores</a>
                        <a class="collapse-item" href="monitores.php">Monitores Emer.</a>
                        <a class="collapse-item" href="simulacros.php">Registro simulacro.</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix"
                    aria-expanded="true" aria-controls="collapseSix">
                    <i class="fa-solid fa-arrow-right"></i>
                    <span>Permisos ADM</span>
                </a>
                <div id="collapseSix" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="solicitudes.php">Permisos ADM</a>
                        <a class="collapse-item" href="mis_solicitudes.php">Mis permisos</a>
                        <?php
                        // Verificar el rol del usuario

                        if (isset($_SESSION['rol'])) {
                            // Si el usuario ha iniciado sesión, mostrar las opciones según su rol
                            if ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'ejecutivo' || $_SESSION['rol'] === 'general') {
                                // Mostrar opciones para administrador
                                echo '<a class="collapse-item" href="VistaSolicitudes.php">Permisos Internos</a>
                                <a class="collapse-item" href="aprueba.php">Aprovar permiso</a>
                                <a class="collapse-item" href="mantenedorJefe.php">Mantenedor Jefaturas</a>';
                                
                            } elseif ($_SESSION['rol'] === 'visualizador') {
                                
                            }
                            
                        }
                        ?>

                    </div>
                </div>
            </li>

            <?php
            // Verificar el rol del usuario

            if (isset($_SESSION['rol'])) {
                // Si el usuario ha iniciado sesión, mostrar las opciones según su rol
                if ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'ejecutivo' || $_SESSION['rol'] === 'general') {
                    // Mostrar opciones para administrador
                    echo '<li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                                aria-expanded="true" aria-controls="collapseThree">
                                <i class="fas fa-fw fa-network-wired"></i>
                                <span>Inventario</span>
                            </a>

                            <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Opciones de Inventario</h6>
                                    <a class="collapse-item" href="Nuevo-Producto.php">Ingreso Inventario</a>
                                    <a class="collapse-item" href="Listado-productos.php">Listado Inventario</a>
                                    <a class="collapse-item" href="Listado-bajas.php">Listado Bajas</a>
                                    <a class="collapse-item" href="listados.php">Información Adicional</a>
                                    <a class="collapse-item" href="#collapseMantenedor" data-toggle="collapse" aria-expanded="false">
                                        <span>Mantenedor</span>
                                        <span class="arrow"><i class="fas fa-angle-down"></i></span>
                                    </a>
                                    <div class="collapse" id="collapseMantenedor">
                                        <a class="collapse-item" href="mantenedor.php">Mantenedor Equipos</a>
                                        <a class="collapse-item" href="mantenedor_dis.php">Mantenedor dispositivos</a>
                                        <a class="collapse-item" href="mantenedor_soft.php">Mantenedor Software</a>
                                        <a class="collapse-item" href="mantenedor_extintores.php">Mantenedor Extintores</a>
                                        <a class="collapse-item" href="mantenedor_monitores.php">Mantenedor Monitores</a>
                                    </div>
                                </div>
                            </div>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                                aria-expanded="true" aria-controls="collapseFour">
                                <i class="fa-brands fa-creative-commons-nd"></i>
                                <span>Mantenciones</span>
                            </a>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Listado de Mantenciones:</h6>
                                    <a class="collapse-item" href="mantenciones.php">Mantenciones Fisícas</a>
                                    <a class="collapse-item" href="mantenciones2.php">mantenciones Logicas</a>
                                </div>
                            </div>
                        </li>';
                } elseif ($_SESSION['rol'] === 'visualizador') {
                    
                }
                
            }
            ?>


            <!-- Divider -->
            <hr class="sidebar-divider"><br>
            <br>

            <?php
            if (isset($_SESSION['rol'])) {
                // Si el usuario ha iniciado sesión, mostrar las opciones según su rol
                if ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'ejecutivo' || $_SESSION['rol'] === 'general') {
                    // Mostrar opciones para administrador
                    echo'<div class="sidebar-heading">
                        Administración
                    </div>';
                } elseif ($_SESSION['rol'] === 'visualizador') {
                    echo'<div class="sidebar-heading">
                    Que tengas un lindo día!!!
                    </div>' ;    
                }
                
            }
            ?>

            <?php
            // Verificar el rol del usuario

            if (isset($_SESSION['rol'])) {
                // Si el usuario ha iniciado sesión, mostrar las opciones según su rol
                if ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'ejecutivo' || $_SESSION['rol'] === 'general') {
                    // Mostrar opciones para administrador
                    echo '<li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-wrench"></i>
                            <span>Usuarios</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Custom Utilities:</h6>
                                <a class="collapse-item" href="usuarios.php">Usuarios</a>
                                <a class="collapse-item" href="comentarios.php">Comentarios</a>
                                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                                <a class="collapse-item" href="utilities-other.html">Other</a>
                            </div>
                        </div>
                    </li>';
                } elseif ($_SESSION['rol'] === 'visualizador') {
                            
                }
                
            }
            ?>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="background-image: url(img/Abstract_background_15.jpg);background-size: 100% 100%; background-attachment: fixed; visibility: visible;">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="background-image: url(img/Abstract_background_15.jpg);background-size: 100% 100%; background-attachment: fixed; visibility: visible;">


                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                

                    
                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" id="searchInput" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="searchButton">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Agrega el siguiente código HTML para el modal -->
                    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="searchModalLabel">Resultados de búsqueda</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                            <th>Nombre</th>
                                            <th>Cargo</th>
                                            <th>Telefono</th>
                                            <th>Email</th>
                                            <th>cargo en cómite</th>
                                            </tr>
                                        </thead>
                                        <tbody id="modalResultsTable">
                                            <!-- Aquí se mostrarán los resultados de la búsqueda -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <script>
                            // Capturar el evento de clic en el botón de búsqueda
                            document.getElementById('searchButton').addEventListener('click', function() {
                                // Obtener el valor del campo de búsqueda
                                var searchTerm = document.getElementById('searchInput').value;

                                // Realizar la solicitud AJAX al archivo "buscar.php"
                                var xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function() {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    // Actualizar la tabla con los resultados de búsqueda
                                    var results = JSON.parse(xhr.responseText);
                                    var table = document.getElementById('modalResultsTable');
                                    table.innerHTML = ''; // Limpiar los resultados anteriores

                                    // Agregar los resultados a la tabla en el modal
                                    results.forEach(function(result) {
                                            var row = table.insertRow();
                                            row.insertCell(0).innerHTML = result.nombre;
                                            row.insertCell(1).innerHTML = result.cargo;
                                            row.insertCell(2).innerHTML = result.area_trabajo;
                                            row.insertCell(3).innerHTML = result.telefono;
                                            row.insertCell(4).innerHTML = result.email;
                                            row.insertCell(5).innerHTML = result.cargo_p;
                                        });

                                        // Mostrar el modal
                                    $('#searchModal').modal('show');
                                }
                                };

                                xhr.open('GET', 'buscar_comite.php?term=' + searchTerm, true);
                                xhr.send();
                            });
                        </script>
                    </div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Agregar imágenes responsivas -->
                        <li class="nav-item">
                            <a class="nav-link"  href="https://www.sicep.cl">
                                <img src="img/Marca-AIA.png" class="img-fluid" alt="Imagen 1" style="width: 90px; height: 55px;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="img/aia.png" class="img-fluid" alt="Imagen 2" style="width: 130px; height: 55px;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="img/exponor.png" class="img-fluid" alt="Imagen 3" style="width: 120px; height: 55px;">
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="https://www.codetia.cl" target="_blank">
                                <img src="img/codetia2.png" class="img-fluid" alt="Imagen 3" style="width: 80px; height: 55px;">
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <div class="navbar">
                            <?php
                            $nombreUsuario = "Usuario";
                            $rutaImagenCompleta = "img/fotos/default.jpg"; // Ruta de imagen predeterminada

                            if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
                                $nombreUsuario = $_SESSION['usuario'];
                                $rutaImagenCompleta = $_SESSION['imagen_perfil']; // Obtener la ruta de la imagen de perfil
                            }
                            ?>

                        
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
                        </div>
                        

                    </ul>

                </nav>
                <!-- End of Topbar -->
                
                

                <!-- Modal para subir actas -->
                <div class="modal fade" id="subirActaModal" tabindex="-1" role="dialog" aria-labelledby="subirActaModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="subirActaModalLabel">Subir Acta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario para la subida del acta -->
                                <form action="procesar_subida_acta.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="archivoActa">Seleccionar archivo de acta:</label>
                                        <input type="file" class="form-control-file" id="archivoActa" name="archivoActa" accept=".pdf, .doc, .docx">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Subir</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Cómite Paritario Vigente.</h1>
                    <p class="mb-5">esta herramienta es para poder informar del actual Cómite Paritario lo cual tienen sus datos de 
                        contactos.
                    </p>

                    <!-- Page Heading -->

                    <div class="row">
                    
                        <div class="col-lg-10 col-sm-12">
                            <div class="card shadow mb-5">
                                <div class="container mt-5">
                                    <div class="card-header py-3">
                                        <h2>Cómite vigente 2023</h2>
                                        <br>
                                        <br>
                                        <h6 class="m-0 font-weight-bold text-primary">Ingresos Registrados</h6>
                                    </div>
                                    <?php
                                    // Realiza la conexión a la base de datos y realiza la consulta
                                    
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "prueba";

                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    if ($conn->connect_error) {
                                        die("Conexión fallida: " . $conn->connect_error);
                                    }

                                    // Variables de paginación
                                    $registros_por_pagina = 5; // Cantidad de registros a mostrar por página
                                    $pagina_actual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1; // Página actual (por defecto es la página 1)
                                    $offset = ($pagina_actual - 1) * $registros_por_pagina;

                                    // Consulta SQL para obtener los datos desde la tabla de dispositivos con paginación
                                    $sql = "SELECT id, nombre, cargo, id_AreaTrabajo, telefono, email, cargo_p FROM cparitario LIMIT $offset, $registros_por_pagina";
                                    $result = $conn->query($sql);

                                    // Contar el total de registros en la tabla de dispositivos para calcular la cantidad de páginas
                                    $sql_total_registros = "SELECT COUNT(*) AS total FROM cparitario";
                                    $result_total = $conn->query($sql_total_registros);
                                    $row_total = $result_total->fetch_assoc();
                                    $total_registros = $row_total['total'];
                                    $total_paginas = ceil($total_registros / $registros_por_pagina);


                                    // Genera las filas de la tabla con los datos obtenidos de la consulta
                                    ?>

                                    <table id="example" class="table-responsive table table-striped table-striped">
                                        <!-- Encabezados de la tabla -->
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cargo</th>
                                                <th>Area de trabajo</th>
                                                <th>Telefono laboral</th>
                                                <th>Email Laboral</th>
                                                <th>Cargo en cómite</th>
                                                <?php
                                                if ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'ejecutivo' || $_SESSION['rol'] === 'general') {
                                                    // Mostrar la columna de acciones solo para el rol de administrador
                                                    echo '<th>Acciones</th>';
                                                }
                                                ?>
                                            </tr>
                                        </thead>

                                        <!-- Cuerpo de la tabla -->
                                        <tbody>
                                            <?php
                                        
                                            while ($row = $result->fetch_assoc()) {
                                                // Obtén el nombre del área de trabajo basado en el ID
                                                $areaTrabajoQuery = "SELECT area FROM area_trabajo WHERE id = " . $row['id_AreaTrabajo'];
                                                $areaTrabajoResult = $conn->query($areaTrabajoQuery);
                                                $areaTrabajo = "";
                                                if ($areaTrabajoRow = $areaTrabajoResult->fetch_assoc()) {
                                                    $areaTrabajo = $areaTrabajoRow['area'];
                                               }
                                               
                                                echo "<tr>";
                                                echo "<td>" . $row['nombre'] . "</td>";
                                                echo "<td>" . $row['cargo'] . "</td>";
                                                echo "<td>" . $areaTrabajo . "</td>";
                                                echo "<td>" . $row['telefono'] . "</td>";
                                                echo "<td>" . $row['email'] . "</td>";
                                                echo "<td>" . $row['cargo_p'] . "</td>";
                                                // Verificar si el usuario tiene el rol de administrador para mostrar el botón de eliminar
                                                if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'|| $_SESSION['rol'] === 'ejecutivo' || $_SESSION['rol'] === 'general') {
                                                    echo '<td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(' . $row['id'] . ', this)">Eliminar</button></td>';
                                                }
                                                echo "</tr>";
                                            }

                                            $conn->close();
                                            ?>
                                        </tbody>
                                    </table>

                                    
                                    <!-- Paginación -->
                                    <ul class="pagination justify-content-center mt-5">
                                        <?php if ($pagina_actual > 1): ?>
                                            <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina_actual - 1; ?>">Anterior</a></li>
                                        <?php endif; ?>

                                        <?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
                                            <li class="page-item <?php echo ($i == $pagina_actual) ? 'active' : ''; ?>">
                                                <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                                            </li>
                                        <?php endfor; ?>

                                        <?php if ($pagina_actual < $total_paginas): ?>
                                            <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina_actual + 1; ?>">Siguiente</a></li>
                                        <?php else: ?>
                                            <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>

                            
                          
                            <div class="modal fade" id="botonesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Documentos para Descargar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Aquí colocaremos los botones -->
                                        <a href="https://sicep.cl/RicardoM/REGLAMENTO2023.pdf" class="btn btn-primary btn-block mb-2" target="_blank" download>Descargar Reglamento Interno</a>
                                        <a href="https://sicep.cl/RicardoM/David/elecciones.pdf" class="btn btn-secondary btn-block mb-4" target="_blank" download>Elecciones Comite 2023</a>
                                        <button type="button" class="btn btn-danger btn-block mb-4" data-toggle="modal" data-target="#actasModal">Descargar actas</button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-2 col-sm-12 mt-3 text-right">
                            <?php
                            if (isset($_SESSION['rol']) && ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'ejecutivo' || $_SESSION['rol'] === 'general')) {
                                echo '<button type="button" class="btn btn-success btn-block mb-2" data-toggle="modal" data-target="#agregarModal">
                                Agregar Nuevo Participante</button>';
                                echo '<button type="button" class="btn btn-secondary btn-block mb-2" data-toggle="modal" data-target="#subirActaModal">
                                        Subir Acta
                                </button>';
                            }
                                echo '<button type="button" class="btn btn-primary btn-block mb-2" data-toggle="modal" data-target="#botonesModal">
                                Documentos Importantes
                                </button>';
                            ?>
                        </div>
                    </div>
                    <!-- Modal para mostrar la lista de archivos -->
                    <div class="modal fade" id="actasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Lista de Actas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Aquí se mostrará la lista de archivos generada por PHP -->
                                    <?php include 'lista_de_actas.php'; // Reemplaza con la ruta correcta del archivo PHP ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                  

                    <script>
                        // Función para eliminar la fila de la tabla y el registro de la base de datos
                        function eliminarFila(id, btn) {
                            var row = btn.parentNode.parentNode; // Obtenemos la fila que contiene el botón
                            row.remove(); // Eliminamos la fila de la tabla

                            // Realizamos la solicitud AJAX para eliminar el registro de la base de datos
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    // Aquí puedes manejar la respuesta del servidor si es necesario
                                    console.log(xhr.responseText); // Mostrar la respuesta del servidor en la consola
                                }
                            };

                            xhr.open('GET', 'eliminar_registro.php?id=' + id, true);
                            xhr.send();
                        }
                    </script>

                </div>

                    
                <!-- /.container-fluid -->

                <!-- Modal para ingresar nuevos registros -->
                <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="agregarModalLabel">Agregar Nuevo Participante</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario para ingresar los datos -->
                                <form method="POST" action="procesar_registro.php">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cargo">Cargo en la Organización</label>
                                        <input type="text" class="form-control" id="cargo" name="cargo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Id_AreaTrabajo">Área de Trabajo:</label>
                                        <select class="form-control" id="Id_AreaTrabajo" name="Id_AreaTrabajo" required>
                                            <?php
                                            // Realiza la conexión a la base de datos y realiza la consulta
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "prueba";

                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                            if ($conn->connect_error) {
                                                die("Conexión fallida: " . $conn->connect_error);
                                            }

                                            $query = "SELECT id, area FROM area_trabajo";
                                            $result = $conn->query($query);

                                            // Genera las opciones del campo de selección
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row['id'] . '">' . $row['area'] . '</option>';
                                            }

                                            $conn->close();
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cargoComite">Cargo en comité</label>
                                        <input type="text" class="form-control" id="cargoComite" name="cargoComite" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Esta seguro?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="login.html">Cerrar sesión</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white" style="background-image: url(img/Abstract_background_15.jpg);background-size: 100% 100%; background-attachment: fixed; visibility: visible;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span><img src="img/logo.png" style="width: 40px; height: 60px;">RecSys &copy; www.sicep.cl</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

   


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="excel.js"></script> 

</body>

</html>
