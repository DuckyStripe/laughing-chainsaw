<?php
require '../php/connect.php';

$response = array();

if (isset($_GET['opcion']) && isset($_GET['id'])) {
    $opcion = $_GET['opcion'];
    $id = $_GET['id'];
    // Realizar la eliminación según la opción
    switch ($opcion) {
        case "Alumno":
            // Inicia la transacción
            mysqli_begin_transaction($connect);

            // Ejecuta las consultas dentro de la transacción
            $query1 = "DELETE FROM calificacion WHERE curp_id = '$id'";
            $query2 = "DELETE FROM alumno WHERE curp_id = '$id'";

            $consulta1 = mysqli_query($connect, $query1);
            $consulta2 = mysqli_query($connect, $query2);

            // Verificar si ambas consultas fueron exitosas
            if ($consulta1 && $consulta2) {
                // Confirma la transacción si ambas consultas fueron exitosas
                mysqli_commit($connect);

                $response['success'] = true;
                $response['message'] = 'El elemento se ha eliminado correctamente';
            } else {
                // Revierte la transacción si alguna consulta falla
                mysqli_rollback($connect);

                $response['success'] = false;
                $response['message'] = 'No se pudo eliminar el elemento';
                $response['error'] = mysqli_error($connect);
            }
            break;


        case "Calificaciones":
            mysqli_begin_transaction($connect);

            $query = "DELETE FROM calificacion WHERE curp_id = '$id'";
            $consulta = mysqli_query($connect, $query);

            if ($consulta) {
                mysqli_commit($connect);

                $response['success'] = true;
                $response['message'] = 'El elemento se ha eliminado correctamente';
            } else {
                mysqli_rollback($connect);

                $response['success'] = false;
                $response['message'] = 'No se pudo eliminar el elemento';
                $response['error'] = mysqli_error($connect);
            }
            break;


        case "Grupos":
            mysqli_begin_transaction($connect);

            // Asumiendo que el id es el materia_id
            $query1 = "DELETE FROM grupo WHERE grupo_id = '$id'";
            $query4 = "DELETE FROM `alumno_grupo` WHERE grupo_id = '$id'";

            $consulta1 = mysqli_query($connect, $query1);
            $consulta4 = mysqli_query($connect, $query4);
            if ($consulta1 && $consulta4) {
                mysqli_commit($connect);

                $response['success'] = true;
                $response['message'] = 'El elemento se ha eliminado correctamente';
            } else {
                mysqli_rollback($connect);

                $response['success'] = false;
                $response['message'] = 'No se pudo eliminar el elemento';
                $response['error'] = mysqli_error($connect);
            }
            break;



        case "Materias":
            mysqli_begin_transaction($connect);

            // Asumiendo que el id es el materia_id
            $query2 = "DELETE FROM grupo WHERE materia_id = '$id'";
            $query3 = "DELETE FROM calificacion WHERE materia_id = '$id'";
            $query4 = "DELETE FROM `alumno` WHERE materia_id = '$id'";
            $query1 = "DELETE FROM materia WHERE materia_id = '$id'";

            $consulta2 = mysqli_query($connect, $query2);
            $consulta3 = mysqli_query($connect, $query3);
            $consulta4 = mysqli_query($connect, $query4);
            $consulta1 = mysqli_query($connect, $query1);

            if ($consulta1 && $consulta2 && $consulta3 && $consulta4) {
                mysqli_commit($connect);

                $response['success'] = true;
                $response['message'] = 'El elemento se ha eliminado correctamente';
            } else {
                mysqli_rollback($connect);

                $response['success'] = false;
                $response['message'] = 'No se pudo eliminar el elemento';
                $response['error'] = mysqli_error($connect);
            }
            break;
        case "Profesores":
            mysqli_begin_transaction($connect);

            // Asumiendo que el id es el profesor_id
            $query2 = "DELETE FROM grupo WHERE profesor_id = '$id'";
            $query3 = "DELETE FROM profesor WHERE profesor_id = '$id'";

            $consulta2 = mysqli_query($connect, $query2);
            $consulta3 = mysqli_query($connect, $query3);

            if ($consulta2 && $consulta3) {
                mysqli_commit($connect);

                $response['success'] = true;
                $response['message'] = 'El elemento se ha eliminado correctamente';
            } else {
                mysqli_rollback($connect);

                $response['success'] = false;
                $response['message'] = 'No se pudo eliminar el elemento';
                $response['error'] = mysqli_error($connect);
            }
            break;



        default:
            $response['success'] = false;
            $response['message'] = 'Opción no válida';
            break;
    }
} else {
    $response['success'] = false;
    $response['message'] = 'Parámetros no válidos';
}

// Devuelve la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>