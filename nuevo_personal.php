<?php
session_start();
$id_formu = isset($_POST['id_formu']) ? $_POST['id_formu'] : null;

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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/144e03a4af.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


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


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
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
                    
                    <!-- Formulario de ingreso de Datos -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!--<h6 class="m-0 font-weight-bold text-primary">Formulario de ingreso de Datos</h6>-->
                            <div class="alert alert-danger" role="alert" style="background-color: #042DFC; color: #ffff">
                                Formulario de ingreso de Datos Personales y Laborales.
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <form action="http://localhost/prueba/registro_persona.php" method="POST">
                                    <div class="row">
                                        <!-- Primera columna -->
                                        <div class="col-md-4">
                                            <!-- Información personal -->
                                            <div class="form-group">
                                            <label for="rut">Rut:</label>
                                            <input type="text" class="form-control" id="rut" name="rut" placeholder="12345678-9" maxlength="10" required>
                                            <span id="rut-error-message" class="text-danger"></span> <!-- Elemento para mostrar el mensaje de error -->
                                        </div>
                                        <script>
                                            document.getElementById("rut").addEventListener("blur", function() {
                                                var rut = this.value;
                                                var xhr = new XMLHttpRequest();
                                                 // Verificación de formato extendido que incluye letra 'k' o 'K'
                                                 if (!/^\d{7,8}-[0-9kK]$/.test(rut)) {
                                                    document.getElementById("rut-error-message").textContent = "Formato de RUT inválido. Debe ser como 12345678-9 o 12345678-K y no exceder los 10 caracteres.";
                                                    document.getElementById("rut").value = ""; // Limpiar el campo si el formato no es correcto
                                                    return; // Detener la función si el formato no es correcto
                                                }
                                                xhr.open("POST", "verificar_rut.php", true);
                                                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                xhr.onreadystatechange = function() {
                                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                                        if (xhr.responseText == "existe") {
                                                            document.getElementById("rut-error-message").textContent = "El RUT ya existe";
                                                            document.getElementById("rut").value = ""; // Limpiar el campo
                                                        } else {
                                                            document.getElementById("rut-error-message").textContent = ""; // Limpiar el mensaje de error
                                                        }
                                                    }
                                                };
                                                xhr.send("rut=" + rut);
                                            });
                                        </script>


                                            <div class="form-group">
                                                <label for="nombre">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Completo...." maxlength="50" required>
                                            </div>


                                            <!-- Información laboral -->
                                            <div class="form-group">
                                                <label for="Profesion">Profesión u Oficio:</label>
                                                <input type="text" class="form-control" id="Profesion" name="Profesion" placeholder="Ingrese su Actividad" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="flaboral">Teléfono Laboral:</label>
                                                <input type="text" class="form-control" id="flaboral" name="flaboral" required placeholder="Ingrese Fono laboral" maxlength="12">
                                                <span id="phone-error-message" class="text-danger" style="display: none;">Formato de teléfono inválido.</span>
                                            </div>
                                            <script>
                                                document.getElementById('flaboral').addEventListener('blur', function() {
                                                    var phone = this.value;
                                                    // Verificación de formato de número telefónico
                                                    // Permite números que empiezan con + seguido por dígitos, con o sin guiones (e.g., +56-912345678, +56912345678)
                                                    if (!/^(\+\d{1,3}-?)?(\d{3,10})$/.test(phone)) {
                                                        document.getElementById('phone-error-message').textContent = "Formato de teléfono inválido. Debe ser como +56912345678 o 912345678.";
                                                        document.getElementById('phone-error-message').style.display = 'block';
                                                    } else {
                                                        document.getElementById('phone-error-message').style.display = 'none';
                                                    }
                                                });
                                            </script>

                                        </div>

                                        <!-- Segunda columna -->
                                        <div class="col-md-4">
                                            <!-- Información personal -->
                                            <div class="form-group">
                                            <label for="Movil">Móvil:</label>
                                            <input type="text" class="form-control" id="Movil" name="Movil" placeholder="Ingrese Fono Particular" maxlength="12">
                                            <span id="mobile-error-message" class="text-danger"></span> <!-- Elemento para mostrar el mensaje de error -->
                                        </div>
                                        <script>
                                            document.getElementById("Movil").addEventListener("blur", function() {
                                                var mobile = this.value;
                                                // Verificación de formato de número telefónico
                                                // Permite números que empiezan con + seguido por dígitos, con o sin guiones (e.g., +56-912345678, +56912345678)
                                                if (!/^(\+\d{1,3}-?)?(\d{3,10})$/.test(mobile)) {
                                                    document.getElementById("mobile-error-message").textContent = "Formato de número móvil inválido. Debe ser como +56912345678 o 912345678.";
                                                    document.getElementById("Movil").value = ""; // Limpiar el campo si el formato no es correcto
                                                    return; // Detener la función si el formato no es correcto
                                                } else {
                                                    document.getElementById("mobile-error-message").textContent = ""; // Limpiar el mensaje de error si el formato es correcto
                                                }
                                            });
                                        </script>


                                            <div class="form-group">
                                                <label for="direccion">Dirección Particular:</label>
                                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su dirección particular">
                                            </div>

                                            <!-- Área de Trabajo -->
                                            <div class="form-group">
                                                <label for="Id_AreaTrabajo">Área de Trabajo:</label>
                                                <select class="form-control" id="Id_AreaTrabajo" name="Id_AreaTrabajo" required>
                                                    <option value="">Seleccionar Su Área de trabajo...</option>
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

                                            <!-- Cargo en comite paritario -->
                                            <div class="form-group">
                                                <label for="a_medicamento">¿ Cargo en comite paritario ?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="cargo_p_si" name="cargo_p" value="si">
                                                    <label class="form-check-label" for="hijos_si">Sí</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="cargo_p_no" name="cargo_p" value="no">
                                                    <label class="form-check-label" for="cargo_p_no">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tercera columna -->
                                        <div class="col-md-4">
                                            <!-- Hijos -->
                                            <div class="form-group" id="hijos-div">
                                                <label for="Hijos">Hijos:</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="hijos_si" name="Hijos" value="si">
                                                    <label class="form-check-label" for="hijos_si">Sí</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="hijos_no" name="Hijos" value="no">
                                                    <label class="form-check-label" for="hijos_no">No</label>
                                                </div>
                                            </div>

                                            <!-- Cuántos hijos tienes (se mostrará si se selecciona "Sí" en Hijos) -->
                                            <div class="form-group" id="cuantos-div" style="display: none;">
                                                <label for="cuantos">¿Cuántos hijos tienes?</label>
                                                <input type="number" class="form-control" id="cuantos_input" name="cuantos" placeholder="Ingrese solo Cantidad..." min="0">
                                            </div>

                                            <script>
                                                document.getElementById('hijos_si').addEventListener('change', function() {
                                                    var cuantosDiv = document.getElementById('cuantos-div');
                                                    cuantosDiv.style.display = this.checked ? 'block' : 'none';
                                                    if (!this.checked) {
                                                        document.getElementById('cuantos_input').value = ''; // Opcional: limpiar el valor
                                                    }
                                                });

                                                document.getElementById('hijos_no').addEventListener('change', function() {
                                                    var cuantosDiv = document.getElementById('cuantos-div');
                                                    if (this.checked) {
                                                        cuantosDiv.style.display = 'none';
                                                        document.getElementById('cuantos_input').value = ''; // Limpiar el valor
                                                    }
                                                });

                                            </script><br>

                                            <!-- Campo oculto para el ID -->
                                            <input type='hidden' name='id_formu' value='<?php echo $id_formu; ?>'>

                                            <!-- Botón de guardar -->
                                            <input type="submit" value="Guardar" class="btn btn-primary mt-5">

                                            <!-- Imagen -->
                                            <img class="mt-5" src="img/foto.jpg" style="width: 250px; height: 300px;margin-left: 100px;">
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
    
    
    

                        <!-- Brand Buttons -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <!--<h6 class="m-0 font-weight-bold text-primary">Información Importante</h6>-->
                                <div class="alert alert-danger" role="alert" style="background-color: #FC0404; color: #ffff">
                                Información Importante
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="mt-3"><strong>El formulario de ingreso de personal tiene carácter privado y se implementa con el fin de garantizar la seguridad de 
                                    todos los involucrados en nuestras instalaciones. La recopilación de información personal <br>en este formulario se realiza 
                                    con estrictos protocolos de confidencialidad y cumplimiento de la normativa de protección de datos. Esta medida de seguridad
                                     es crucial para tener un registro preciso de todas las personas presentes en nuestras instalaciones en caso de alguna emergencia, 
                                     permitiéndonos tomar acciones rápidas y eficientes para proteger la integridad y el bienestar de todos los individuos involucrados.</strong> 
                                </p>
                                <p>
                                    <strong>Respetamos y valoramos la privacidad de cada persona y nos comprometemos a proteger sus datos personales en todo momento.<br>
                                    <br>
                                    <br>
                                     muchas gracias.</strong> 
                                </p>
                                

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
    <script>
        var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
            trigger: 'focus'
        })
    </script>
    <script>
        document.getElementById("rut").oninput = function() {
            var rutPattern = /^\d{0,8}(-[\dkK]{0,1})?$/; // Permite escribir hasta 8 dígitos y opcionalmente el guión y el dígito verificador que puede ser un número o 'k' o 'K'
            
            if (!rutPattern.test(this.value)) {
                this.value = this.value.slice(0, -1); // Eliminar el último caracter no válido
            }
        };

    </script>

</body>

</html>