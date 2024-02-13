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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- estilostemplate-->
    <link href="css/estilo.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/144e03a4af.js" crossorigin="anonymous"></script>

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
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventario"
                        aria-expanded="true" aria-controls="collapseInventario">
                            <i class="fas fa-fw fa-network-wired"></i>
                            <span>Inventario</span>
                        </a>
                        <div id="collapseInventario" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Opciones de Inventario</h6>
                                
                                <!-- Inventario AIA -->
                                <a class="collapse-item" href="#collapseInventarioAIA" data-toggle="collapse" aria-expanded="false">
                                    <span>Inventario AIA</span>
                                    <span class="arrow"><i class="fas fa-angle-down"></i></span>
                                </a>
                                <div class="collapse" id="collapseInventarioAIA">
                                    <a class="collapse-item" href="Ingreso-Inventario-AIA.php">Ingreso Inventario</a>
                                    <a class="collapse-item" href="Listado-Inventario-AIA.php">Listado Inventario</a>
                                    <a class="collapse-item" href="Listado-Bajas-AIA.php">Listado Bajas</a>
                                    <a class="collapse-item" href="Informacion-Adicional-AIA.php">Información Adicional</a>
                                </div>
                                
                                <!-- Inventario SICEP -->
                                <a class="collapse-item" href="#collapseInventarioSICEP" data-toggle="collapse" aria-expanded="false">
                                    <span>Inventario SICEP</span>
                                    <span class="arrow"><i class="fas fa-angle-down"></i></span>
                                </a>
                                <div class="collapse" id="collapseInventarioSICEP">
                                    <a class="collapse-item" href="Ingreso-Inventario-SICEP.php">Ingreso Inventario</a>
                                    <a class="collapse-item" href="Listado-Inventario-SICEP.php">Listado Inventario</a>
                                    <a class="collapse-item" href="Listado-Bajas-SICEP.php">Listado Bajas</a>
                                    <a class="collapse-item" href="Informacion-Adicional-SICEP.php">Información Adicional</a>
                                </div>
                                
                                <!-- Inventario CODETIA -->
                                <a class="collapse-item" href="#collapseInventarioCODETIA" data-toggle="collapse" aria-expanded="false">
                                    <span>Inventario CODETIA</span>
                                    <span class="arrow"><i class="fas fa-angle-down"></i></span>
                                </a>
                                <div class="collapse" id="collapseInventarioCODETIA">
                                    <a class="collapse-item" href="Ingreso-Inventario-CODETIA.php">Ingreso Inventario</a>
                                    <a class="collapse-item" href="Listado-Inventario-CODETIA.php">Listado Inventario</a>
                                    <a class="collapse-item" href="Listado-Bajas-CODETIA.php">Listado Bajas</a>
                                    <a class="collapse-item" href="Informacion-Adicional-CODETIA.php">Información Adicional</a>
                                </div>
                                
                                <!-- Mantenedor -->
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
            <div id="content" >

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="background-image: url(img/Abstract_background_15.jpg);background-size: 100% 100%; background-attachment: fixed; visibility: visible;">


                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                

                    
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Agregar imágenes responsivas -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
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

                        <!-- Nav Item - User Information -->
                        <?php include 'navbar.php'; ?>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Mantenedor de Software</h1>

                    <div class="row">

                        <div class="col-lg-12">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Mantenedor de Software</h6>
                                </div>
                                <div class="container mt-5">
                                    <h2>Agregar Extintor</h2><br>
                                    <form action="insert_extintor.php" method="POST" class="row g-3">
                                        <div class="col-md-4">
                                            <label for="ala" class="form-label">Ala:</label>
                                            <input type="text" class="form-control" name="ala" required placeholder="Nombre del Ala..">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="cantidad" class="form-label">Cantidad:</label>
                                            <input type="number" class="form-control" name="cantidad" required placeholder="Ingrese la Cantidad..">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="responsable" class="form-label">Responsable:</label>
                                            <input type="text" class="form-control" name="responsable" required placeholder="Nombre del Responsable..">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="fecha_mantencion" class="form-label">Fecha de Mantención:</label>
                                            <input type="date" class="form-control" name="fecha_mantencion" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento:</label>
                                            <input type="date" class="form-control" name="fecha_vencimiento" required>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Agregar Extintor</button>
                                        </div>
                                    </form>

                                    <br>
                                </div>
                            </div>


                            
                            <!-- Brand Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Mantenedor de Equipos</h6>
                                </div>
                                <div class="card-body">
                                    <p>
                                        En este espacio solamente podemos actualizar la informacion que se encuentra en esta tabla,
                                        ingresando algun nuevo Software y sus caracterirsticas.
                                    </p>
                                    
                                    

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->
                <!-- Footer -->
                <footer class="sticky-footer bg-white" style="background-image: url(img/Abstract_background_15.jpg);background-size: 100% 100%; background-attachment: fixed; visibility: visible;">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span><img src="img/logo.png" style="width: 40px; height: 60px;">RecSys &copy; www.sicep.cl</span>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- End of Main Content -->
           
            

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>