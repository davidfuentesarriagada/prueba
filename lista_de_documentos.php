<?php
// Ruta al directorio de las actas
$directorio = 'img/documentos/';

// Escanea el directorio y obtiene los nombres de los archivos
$archivos = scandir($directorio);

// Filtra los archivos y excluye "." y ".."
$archivos = array_diff($archivos, ['.', '..']);

// Verifica si hay archivos para mostrar
if (count($archivos) > 0) {
    echo '<table class="table table-striped">';
    echo '<thead><tr><th>Nombre del Archivo</th><th>Descargar</th></tr></thead>';
    echo '<tbody>';
    
    foreach ($archivos as $archivo) {
        echo '<tr>';
        echo '<td>' . $archivo . '</td>';
        echo '<td><a href="' . $directorio . '/' . $archivo . '" class="btn btn-primary" download>Descargar</a></td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
} else {
    echo '<p>No se encontraron archivos en el directorio de actas.</p>';
}
?>

