<?php

// Iniciar sesión
//function iniciarSesion() {
   // session_start();
//}

// Función para obtener la cantidad de usuarios desde la base de datos
function obtenerCantidadUsuarios() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener la cantidad de usuarios
    $sql = "SELECT COUNT(id) AS cantidad FROM usuarios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["cantidad"];
    } else {
        return 0;
    }

    $conn->close();
}

function obtenerCantidadSocios() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener la cantidad de socios
    $sql = "SELECT COUNT(*) AS cantidad FROM socios";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error en la consulta: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cantidad = $row["cantidad"];
        $conn->close(); // Cierra la conexión
        return $cantidad;
    } else {
        $conn->close(); // Cierra la conexión
        return 0;
    }
}




// Función para obtener la cantidad de reuniones de comité desde la base de datos
function obtenerCantidadReunionesComite() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prueba";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener la cantidad de reuniones de comité
    $sql = "SELECT COUNT(*) AS cantidad FROM planificacion WHERE fecha_reunion IS NOT NULL";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["cantidad"];
    } else {
        return 0;
    }

    $conn->close();
}


function determinarJefatura($idUsuario) {
    $servername = "localhost";
    $username = "root";
    $password_bd = "";
    $database = "prueba"; 

    $conn = new mysqli($servername, $username, $password_bd, $database);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $query = "SELECT nombre FROM empleados WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $stmt->bind_result($jefatura);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    return $jefatura; // Devuelve true si es jefatura, o false si no lo es
}

function validarSocio() {
    $errores = [];

    // Validar RUT (podrías querer verificar el formato o la unicidad en la base de datos)
    if (empty($parametros['rut']) || !validarFormatoRut($parametros['rut'])) {
        $errores['rut'] = 'El RUT es inválido o está vacío.';
    }

    // Validar Nombre (por ejemplo, asegurarse de que no esté vacío)
    if (empty($parametros['nombre'])) {
        $errores['nombre'] = 'El nombre no puede estar vacío.';
    }

    // Validar Año de Ingreso (por ejemplo, que sea un año válido)
    if (empty($parametros['ano_ingreso']) || !validarAnoIngreso($parametros['ano_ingreso'])) {
        $errores['ano_ingreso'] = 'El año de ingreso es inválido.';
    }

    // Aquí puedes añadir más validaciones según sea necesario

    return $errores;
}

function validarFormatoRut($rut) {
    // Aquí puedes añadir la lógica para validar el formato del RUT
    // Por ejemplo, verificar si sigue un patrón específico
    return preg_match('/^[0-9]+-[0-9kK]$/', $rut);
}

function validarAnoIngreso($ano) {
    // Validar que el año sea un número y esté en un rango razonable
    $anoActual = date('Y');
    return is_numeric($ano) && $ano > 1900 && $ano <= $anoActual;
}

?>


