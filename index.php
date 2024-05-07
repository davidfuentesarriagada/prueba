<?php
session_start();
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/recsys.png" style="border-radius: 20px 20px 20px 20px;">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <meta http-equiv="Expires" content="0">


    <title>RecSys</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Enlaces de los archivos CSS 
    <link href="fullcalendar/fullcalendar.min.css" rel="stylesheet">
    <link href="fullcalendar/dist/main.min.css" rel="stylesheet">
    <link href="fullcalendar/packages/core/main.min.css" rel="stylesheet">
    <link href="fullcalendar/packages/daygrid/main.min.css" rel="stylesheet">
    <link href="fullcalendar/packages/timegrid/main.min.css" rel="stylesheet">
    <link href="fullcalendar/packages/bootstrap/main.min.css" rel="stylesheet">-->

    <!-- Enlaces de los archivos JS -->
    <script src="fullcalendar/dist/index.global.js"></script>
    <script src="js/CALENDARIO.js"></script>
    <!--<script src="fullcalendar/packages/core/main.min.js"></script>
    <script src="fullcalendar/packages/daygrid/main.min.js"></script>
    <script src="fullcalendar/packages/timegrid/main.min.js"></script>
    <script src="fullcalendar/packages/moment/main.min.js"></script>
    <script src="fullcalendar/packages/jquery/main.min.js"></script>
    <script src="fullcalendar/packages/popper/main.min.js"></script>
    <script src="fullcalendar/packages/bootstrap/main.min.js"></script>-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/144e03a4af.js" crossorigin="anonymous"></script>

    



   

</head>

<body id="page-top">
    

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: url(img/4.jpg);background-size: 100% 100%; background-attachment: fixed; visibility: visible;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon "><br>
                    <img class="mt-4" src="img/recsys.png" height="100PX" width="110px" style="border-radius: 20px 20px 20px 20px;">
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
                                    <a class="collapse-item" href="documentos.php">Documentos de finanzas</a>
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
                        <a class="collapse-item" href="simulacros.php ">Registro simulacro.</a>
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
                                <a class="collapse-item" href="logs.php">Activity Log</a>
                                <a class="collapse-item" href="comentarios.php">Comentarios</a>
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
        <div id="content-wrapper" class="d-flex flex-column"style="background-image: url(img/Abstract_background_15.jpg);background-size: 100% 100%; background-attachment: fixed; visibility: visible;">

            <!-- Main Content -->
            <div id="content" >

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-image: url(img/Abstract_background_15.jpg);background-size: 100% 100%; background-attachment: fixed; visibility: visible;">
                
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Agregar imágenes responsivas -->
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.sistemasicep.cl" target="_blank">
                                <img src="img/Marca-AIA.png" class="img-fluid" alt="Imagen 1" style="width: 90px; height: 55px;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.aia.cl" target="_blank">
                                <img src="https://www.pruebadyc.cl/AIA.png" class="img-fluid" alt="Imagen 2" style="width: 110px; height: 65px;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.exponor.cl" target="_blank">
                                <img src="img/exponor.png" class="img-fluid" alt="Imagen 3" style="width: 120px; height: 55px;">
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="https://www.codetia.cl" target="_blank">
                                <img src="img/codetia2.png" class="img-fluid" alt="Imagen 3" style="width: 80px; height: 55px;">
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <?php include 'navbar.php'; ?>

                        

                    </ul>
                    

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid" >

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><strong>RecSys</strong></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Cantidad de Usuarios Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Cantidad de Usuarios Registrados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo obtenerCantidadUsuarios(); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cantidad de Equipos con Windows 10 Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Cantidad de Socios AIA</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo obtenerCantidadSocios(); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            </i><i class="fa-solid fa-handshake-angle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cantidad de Reuniones de Comité Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Reuniones de Comité</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo obtenerCantidadReunionesComite(); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Empresas en SICEP</div>
                                            <div id="pendingCount" style="font-size: 24px; color: #333; font-weight: bold;">Loading...</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            // Realizar una solicitud GET al endpoint
                            fetch('https://www.sistemasicep.cl/ColaboradoraController/public/cantidadColaboradoras')

                                .then(response => response.json())
                                .then(data => {
                                    console.log(data);

                                    // Obtener el elemento por su ID
                                    const pendingCountElement = document.getElementById('pendingCount');
                                    // Establecer el contenido utilizando innerHTML
                                    pendingCountElement.innerHTML = `<span style="font-size: 24px; color: #333; font-weight: bold;">${data}</span>`;
                                    console.log(data.pendingCount);
                                })
                                .catch(error => {
                                    console.error('Error al obtener los datos:', error);
                                });
                        </script>

                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Eventos Registrados</h6>
                                    
                                </div>
                                
                                <div class="card-body">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Personal total AIA</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> AIA
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Sicep
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Codetia
                                        </span>
                                    </div>
                                    <!--<div class="ok" style="text-align: center;" >
                                        <h1>Cantidad Mujeres y Hombres.</h1>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Mujeres
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Sicep
                                        </span>
                                    </div>
                                </div><br>-->
                                
                                <br>
                                <br>
                                <br>
                                <!-- Content Row -->
                                  <!--  <div class="row">
                                    <div class="col-lg-12 mb-4">-->

                                        <!-- Approach -->
                                        <!--<div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Personal total AIA</h6>
                                            </div>
                                            <div class="card-body">
                                                <p>En este apartado se encuentra el total de todos los trabajadores de nuestra organizacion, 
                                                    es por ello que ademas se desglosa por las area o unidades estrategicas.
                                                </p>
                                                <p class="mb-0">La idea de este pequeño modulo es para tener en cuenta la cantidad 
                                                    exacta de todos los que componemos actualmente la AIA.
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white" style="background-image: url(img/Abstract_background_15.jpg);background-size: 100% 100%; background-attachment: fixed; visibility: visible;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span style="color: white"><img src="img/recsys.png" style="width: 60px; height: 55px; border-radius: 20px 20px 20px 20px;"><strong style="color: white">  RecSys</strong> &copy; www.sicep.cl</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    




</body>

</html>