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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                    <span>Solicitudes</span>
                </a>
                <div id="collapseSix" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="solicitudes.php">Solicitud</a>
                        <a class="collapse-item" href="mis_solicitudes.php">Mis Solicitudes</a>
                        <?php
                        // Verificar el rol del usuario

                        if (isset($_SESSION['rol'])) {
                            // Si el usuario ha iniciado sesión, mostrar las opciones según su rol
                            if ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'ejecutivo' || $_SESSION['rol'] === 'general') {
                                // Mostrar opciones para administrador
                                echo '<a class="collapse-item" href="VistaSolicitudes.php">Permisos Internos</a>
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
                                <a class="collapse-item" href="mantenciones.php">Listado de Mantenciones</a>
                                <a class="collapse-item" href="#">Programar Mantención</a>
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
                    <h1 class="h3 mb-4 text-gray-800">Inventario de Extintores AIA.</h1>

                    <div class="row">

                        <div class="col-lg-12">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Extintores en Organización</h6>
                                </div>
                                <?php
                                // Establece la conexión con la base de datos (asegúrate de tener una conexión establecida)
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "prueba";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Verifica si la conexión es exitosa
                                if ($conn->connect_error) {
                                    die("Conexión fallida: " . $conn->connect_error);
                                }

                                // Realiza la consulta a la tabla "extintores"
                                $sql = "SELECT id_extintor, Ala, Cantidad, Responsable, fecha_mantencion, fecha_vencimiento FROM extintores";
                                $result = $conn->query($sql);

                                
                                ?>
                                <div class="container mt-5">
                                    <h2>Extintores</h2><br>
                                    <table id="example" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Ala</th>
                                                <th>Cantidad</th>
                                                <th>Responsable</th>
                                                <th>Fecha de Mantención</th>
                                                <th>Fecha de Vencimiento</th>
                                                <?php
                                                if (isset($_SESSION['rol'])) {
                                                    // Si el usuario ha iniciado sesión, mostrar las opciones según su rol
                                                    if ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'ejecutivo' || $_SESSION['rol'] === 'general') {
                                                        // Mostrar opciones para administrador
                                                
                                                echo '
                                                <th>Acciones</th>
                                                ';
                                            
                                                } elseif ($_SESSION['rol'] === 'visualizador') {
                                                            
                                                }
                                            }
                                                
                                            ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Recorre los resultados de la consulta y genera las filas de la tabla
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['Ala'] . "</td>";
                                                echo "<td>" . $row['Cantidad'] . "</td>";
                                                echo "<td>" . $row['Responsable'] . "</td>";
                                                echo "<td>" . $row['fecha_mantencion'] . "</td>";
                                                echo "<td>" . $row['fecha_vencimiento'] . "</td>";
                                                if (isset($_SESSION['rol'])) {
                                                    // Si el usuario ha iniciado sesión, mostrar las opciones según su rol
                                                    if ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'ejecutivo' || $_SESSION['rol'] === 'general') {
                                                        // Mostrar opciones para administrador
                                                
                                                echo '<td>';
                                                echo '<button class="btn btn-primary editar-btn" data-toggle="modal" data-target="#editarModal" data-id="' . $row['id_extintor'] . '">Editar</button>';
                                                echo '<button class="btn btn-danger" onclick="eliminarRegistro(\'' . $row['id_extintor'] . '\')">Eliminar</button>';
                                                echo '</td>';
                                                echo '</tr>';
                                            
                                                } elseif ($_SESSION['rol'] === 'visualizador') {
                                                            
                                                }
                                            }
                                                
                                            }
                                            ?>
                                            
                                      
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <script>
                                function eliminarRegistro(id) {
                                    var respuesta = confirm('¿Estás seguro de que deseas eliminar este registro?');
                                    if (respuesta) {
                                        fetch('eliminar_extintor.php?id=' + id, {
                                            method: 'DELETE' // Puedes usar 'POST' o 'GET' según tu configuración del servidor
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                // Actualiza la tabla o realiza cualquier acción adicional si se eliminó correctamente
                                                location.reload(); // Recarga la página para reflejar los cambios
                                            } else {
                                                alert('Error al eliminar el registro');
                                            }
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                            alert('Hubo un error al comunicarse con el servidor');
                                        });
                                    }
                                }
                            </script>

                            <!-- Agrega este modal en tu página -->
                            <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarModalLabel">Editar Extintor</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Aquí debes agregar un formulario para editar los campos del registro -->
                                            <form id="editarForm" method="POST">
                                                <input type="hidden" id="extintorId" name="id_extintor">
                                                <div class="form-group">
                                                    <label for="ala">Ala</label>
                                                    <input type="text" class="form-control" id="ala" name="Ala">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cantidad">Cantidad</label>
                                                    <input type="text" class="form-control" id="cantidad" name="Cantidad">
                                                </div>
                                                <div class="form-group">
                                                    <label for="responsable">Responsable</label>
                                                    <input type="text" class="form-control" id="responsable" name="Responsable">
                                                </div>

                                                <div class="form-group">
                                                    <label for="fechaMantencion">Fecha de Mantención</label>
                                                    <input type="date" class="form-control" id="fechaMantencion" name="fecha_mantencion">
                                                </div>
                                                <div class="form-group">
                                                    <label for="fechaVencimiento">Fecha de Vencimiento</label>
                                                    <input type="date" class="form-control" id="fechaVencimiento" name="fecha_vencimiento" pattern="\d{4}-\d{2}-\d{2}">
                                                </div>

                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary" id="guardarCambios">Guardar Cambios</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
 
                               $(document).on('click', '.editar-btn', function() {
                                    var extintorId = $(this).data('id');
                                    console.log('Clic en el botón de editar');
                                    
                                    // Aquí debes escribir el código para cargar los datos del registro en el modal
                                    // Puedes utilizar AJAX para obtener los datos del servidor y mostrarlos en el formulario
                                    $.ajax({
                                        type: "GET",
                                        url: "obtener_datos_extintor.php", 
                                        data: { id_extintor: extintorId },
                                        success: function(response) {
                                            console.log('Datos del extintor obtenidos con éxito');
                                            var extintor = JSON.parse(response);
                                            $('#extintorId').val(extintor.id_extintor);
                                            $('#ala').val(extintor.Ala);
                                            $('#cantidad').val(extintor.Cantidad);
                                            $('#responsable').val(extintor.Responsable);
                                            $('#fechaMantencion').val(extintor.fecha_mantencion);
                                            $('#fechaVencimiento').val(extintor.fecha_vencimiento);
                                        },
                                        error: function(error) {
                                            console.log("Error al obtener datos del extintor:", error);
                                        }
                                    });
                                });

                                $('#guardarCambios').click(function() {
                                    console.log('Clic en el botón de guardar');

                                    // Comprobación adicional: asegurarse de que el formulario se haya completado antes de enviarlo
                                    if ($("#Ala").val() === "" || $("#Cantidad").val() === "" || $("#Responsable").val() === "" || $("#fecha_mantencion").val() === "" || $("#fecha_vencimiento").val() === "") {
                                        alert("Por favor, complete todos los campos antes de guardar.");
                                        return; // Evita que el formulario se envíe si falta algún dato
                                    }
                                    
                                   

                                    // Resto del código para enviar el formulario al servidor
                                    var extintorId = $('#extintorId').val();
                                    var ala = $('#ala').val();
                                    var cantidad = $('#cantidad').val();
                                    var responsable = $('#responsable').val();
                                    var fechaMantencion = $('#fechaMantencion').val();
                                    var fechaVencimiento = $('#fechaVencimiento').val();

                                    // Convertir fecha de vencimiento al formato correcto (yyyy-MM-dd)
                                    var fechaVencimientoInput = $('#fechaVencimiento').val();
                                    var parts = fechaVencimientoInput.split('-');
                                    if (parts.length === 3) {
                                        var fechaVencimientoFormateada = parts[2] + '-' + parts[1] + '-' + parts[0];
                                        // Ahora, fechaVencimientoFormateada tiene el formato "yyyy-MM-dd"
                                    } else {
                                        alert("Por favor, ingrese la fecha de vencimiento en el formato correcto (dd-MM-yyyy).");
                                        return;
                                    }

                                    console.log('Valores a guardar:', extintorId, ala, cantidad, responsable, fechaMantencion, fechaVencimiento);

                                    $.ajax({
                                        type: "POST",
                                        url: "actualizar_extintor.php", // Reemplaza con la URL correcta para actualizar el extintor
                                        data: {
                                            id_extintor: extintorId,
                                            Ala: ala,
                                            Cantidad: cantidad,
                                            Responsable: responsable,
                                            fecha_mantencion: fechaMantencion,
                                            fecha_vencimiento: fechaVencimiento
                                        },
                                        success: function(response) {
                                            console.log('Respuesta del servidor:', response);
                                            // Cierra el modal
                                            $('#editarModal').modal('hide');
                                            // Recarga la página
                                            location.reload();
                                        },
                                        error: function(error) {
                                            console.log("Error al actualizar el extintor:", error);
                                        }
                                    });
                                });






                            </script>

 
                            
                            <!-- Brand Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Extintores en cada piso</h6>
                                </div>
                                <div class="card-body">
                                    <p>
                                        En este espacio, debes especificar la cantidad de extintores ubicados en cada piso, junto con sus respectivos 
                                        responsables y las fechas importantes que no debemos pasar por alto para garantizar que el polvo de los 
                                        extintores no se venza y mantener un inventario preciso de los mismos.
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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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