<?php
require '../php/connect.php';

// Obtener el ID del profesor enviado desde la solicitud AJAX
$IDAlumno = $_POST['IDAlumno'];
// Consulta para obtener la información del profesor
$query = "SELECT alumno_nombre,alumno_apaterno,alumno_amaterno FROM `alumno` WHERE `curp_id` = '$IDAlumno'";
$consulta = mysqli_query($connect, $query);

if ($consulta) {
    $profesorInfo = mysqli_fetch_assoc($consulta);

    // Devolver la información del profesor en formato JSON
    echo json_encode($profesorInfo);
} else {
    echo json_encode(['error' => 'Error al obtener la información del profesor']);
}

mysqli_close($connect);
?>