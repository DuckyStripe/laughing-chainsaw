<?php
require '../php/connect.php';

// Obtener el ID del profesor enviado desde la solicitud AJAX
$MateriaID = $_POST['MateriaID'];
// Consulta para obtener la información del profesor
$query = "SELECT materia_nombre,semestre FROM `materia` WHERE `materia_id` = '$MateriaID'";
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