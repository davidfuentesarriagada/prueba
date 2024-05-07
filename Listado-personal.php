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
    <link rel="icon" type="image/png" href="img/recsys.png">

    <title>RecSys</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/144e03a4af.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="excel.css">
      
    <!--datables CSS básico--> 
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

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
            if ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'ejecutivo') {
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
                                <button class="btn btn-primary ml-2 rounded-circle bg-primary" type="button" data-toggle="tooltip" data-placement="top" title="Puedes realizar la búsqueda por nombre o Rut  " >
                                    <i class="fas fa-info-circle"></i>
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
                                    <th>RUT</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Área de Trabajo</th>
                                    <th>Hijos</th>
                                    <th>Móvil</th>
                                    <th>Profesión</th>
                                    <th>Previsión</th>
                                    <th>Enfermedad</th>
                                    <th>Medicamento</th>
                                    <th>Nombre de Emergencia</th>
                                    <th>Contacto de Emergencia</th>
                                    <th>Alergia a Medicamento</th>
                                    <th>¿Cuál?</th>
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
                                    row.insertCell(0).innerHTML = result.rut;
                                    row.insertCell(1).innerHTML = result.nombre;
                                    row.insertCell(2).innerHTML = result["cargo_p"];
                                    row.insertCell(3).innerHTML = result["area_trabajo"];
                                    row.insertCell(4).innerHTML = result.Hijos;
                                    row.insertCell(5).innerHTML = result.Movil;
                                    row.insertCell(6).innerHTML = result.Profesion;
                                    row.insertCell(7).innerHTML = result.Prevision;
                                    row.insertCell(8).innerHTML = result.Enfermedad;
                                    row.insertCell(9).innerHTML = result.Medicamento;
                                    row.insertCell(10).innerHTML = result["Nombre_Emg"];
                                    row.insertCell(11).innerHTML = result["Cto_Emg"];
                                    row.insertCell(12).innerHTML = result["a_medicamento"];
                                    row.insertCell(13).innerHTML = result["alergia"];
                                    });

                                    // Mostrar el modal
                                    $('#searchModal').modal('show');
                                }
                                };

                                xhr.open('GET', 'buscar.php?term=' + searchTerm, true);
                                xhr.send();
                            });
                        </script>
                    </div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Agregar imágenes responsivas -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="img/Marca-AIA.png" class="img-fluid" alt="Imagen 1" style="width: 90px; height: 55px;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.aia.cl" target="_blank">
                                <img src="https://www.pruebadyc.cl/AIA.png" class="img-fluid" alt="Imagen 2" style="width: 110px; height: 65px;">
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
                    <h1 class="h3 mb-1 text-gray-800">Listado de Personal</h1>
                    <p class="mb-5">Esta herramienta es para poder informar de información relevante al momento de una emergencia.</p>
                    <!-- End Page Heading -->

                    <div class="row">
                        <div class="col-lg-10 col-sm-12">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-5">
                                <div class="container mt-5">
                                    <div class="card-header py-3">
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
                                    $registros_por_pagina = 10; // Cantidad de registros a mostrar por página
                                    $pagina_actual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1; // Página actual (por defecto es la página 1)
                                    $offset = ($pagina_actual - 1) * $registros_por_pagina;

                                    // Consulta SQL para obtener los datos desde la tabla de dispositivos con paginación
                                    $sql = "SELECT id_formu, rut, nombre, Hijos, NumeroHijos, Movil, direccion FROM personal LIMIT $offset, $registros_por_pagina";
                                    $result = $conn->query($sql);

                                    // Contar el total de registros en la tabla de dispositivos para calcular la cantidad de páginas
                                    $sql_total_registros = "SELECT COUNT(*) AS total FROM personal";
                                    $result_total = $conn->query($sql_total_registros);
                                    $row_total = $result_total->fetch_assoc();
                                    $total_registros = $row_total['total'];
                                    $total_paginas = ceil($total_registros / $registros_por_pagina);


                                    // Genera las filas de la tabla con los datos obtenidos de la consulta
                                    ?>
                                    <h2>Tabla de Datos Registrados Personales.</h2>
                                    <table id="example" class="table-responsive table table-striped table-striped" width="200%" >
                                        <thead>
                                            <tr style="background-color: grey;">
                                                <th style="color: white;">RUT</th>
                                                <th style="color: white;">Nombre</th>
                                                <th style="color: white;">¿Hijos?</th>
                                                <th style="color: white;">Numero de Hijos</th>
                                                <th style="color: white;">Móvil</th>
                                                <th style="color: white;">Dirección</th>
                                                

                                                <?php
                                                if (isset($_SESSION['rol'])) {
                                                    // Si el usuario ha iniciado sesión, mostrar las opciones según su rol
                                                    if ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'ejecutivo' || $_SESSION['rol'] === 'general') {
                                                        echo '<th style="color: white;">Acciones</th>'; // Nueva columna para el botón de eliminar
                                                    } elseif ($_SESSION['rol'] === 'visualizador') {
                                                        // Mostrar opciones para visualizador
                                                    }
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        
                                            while ($row = $result->fetch_assoc()) {
                                                // Obtén el nombre del área de trabajo basado en el ID
                                                $areaTrabajoQuery = "SELECT area FROM area_trabajo WHERE id = ?";
                                                $stmt = $conn->prepare($areaTrabajoQuery);
                                                $stmt->bind_param("i", $row['Id_AreaTrabajo']);

                                                if ($stmt->execute()) {
                                                    $areaTrabajoResult = $stmt->get_result();
                                                    if ($areaTrabajoRow = $areaTrabajoResult->fetch_assoc()) {
                                                        $areaTrabajo = $areaTrabajoRow['area'];
                                                    }
                                                    $stmt->close();
                                                } else {
                                                    // Manejar error en la ejecución de la consulta
                                                    echo "Error al ejecutar la consulta: " . $stmt->error;
                                                }
                                                if ($areaTrabajoRow = $areaTrabajoResult->fetch_assoc()) {
                                                    $areaTrabajo = $areaTrabajoRow['area'];
                                                }
                                                
                                                echo "<tr>";
                                                echo "<td>" . $row['rut'] . "</td>";
                                                echo "<td>" . $row['nombre'] . "</td>";
                                                echo "<td>" . $row['Hijos'] . "</td>";
                                                echo "<td>" . $row['NumeroHijos'] . "</td>";
                                                echo "<td>" . $row['Movil'] . "</td>";
                                                echo "<td>" . $row['direccion'] . "</td>";
                                                
                                                // Verificar si el usuario tiene uno de los roles especificados para mostrar los botones
                                                if (isset($_SESSION['rol']) && ($_SESSION['rol'] === 'admin' || $_SESSION['rol'] === 'ejecutivo' || $_SESSION['rol'] === 'general')) {
                                                    echo '<td>';
                                                    //echo '<button type="button" class="btn btn-primary btn-sm" onclick="editarFila(' . $row['id_formu'] . ')">Editar</button> ';
                                                    echo '<button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(' . $row['id_formu'] . ', this)">Eliminar</button>';
                                                    echo '</td>';
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

                                    
                                    <script>
                                        // Función para eliminar la fila de la tabla y el registro de la base de datos
                                        function eliminarFila(id_formu, btn) {
                                            var row = btn.parentNode.parentNode; // Obtenemos la fila que contiene el botón
                                            row.remove(); // Eliminamos la fila de la tabla

                                            // Realizamos la solicitud AJAX para eliminar el registro de la base de datos
                                            $.ajax({
                                                url: 'eliminar_persona.php', // Archivo PHP que procesará la solicitud de eliminación
                                                method: 'POST',
                                                data: { id_formu: id_formu }, // Enviamos el ID de la persona a eliminar como datos de la solicitud
                                                success: function(response) {
                                                    // La respuesta del servidor se recibe aquí
                                                    // Puedes manejarla si es necesario
                                                    console.log(response); // Mostrar la respuesta del servidor en la consola
                                                },
                                                error: function(xhr, status, error) {
                                                    // Manejar errores si los hay
                                                    console.error(xhr.responseText);
                                                }
                                            });
                                        }
                                        




                                    </script>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- /.container-fluid -->

                    

                </div>

                <!-- Footer -->
                <footer class="sticky-footer bg-white" style="background-image: url(img/Abstract_background_15.jpg);background-size: 100% 100%; background-attachment: fixed; visibility: visible;">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span style="color: white"><img src="img/recsys.png" style="width: 60px; height: 55px; border-radius: 20px 20px 20px 20px;"><strong style="color: white">  RecSys</strong> &copy; www.sicep.cl</span>
                        </div>
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

                <!-- Logout Modal -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">¿Está seguro?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
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
    <!-- Agrega estos scripts al final del documento -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <script>
        // Inicializar el tooltip
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>

</html>