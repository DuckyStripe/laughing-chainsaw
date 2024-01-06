<?php
require '../php/connect.php';
$response = array();
if (isset($_POST['opcion'])) {
    $opcion = $_POST['opcion'];
    // Realizar la eliminación según la opción
    switch ($opcion) {
        case "Alumno":
            // Obtener datos del formulario (reemplaza con los nombres reales de tus campos)
            $curp = $_POST['Curp'];
            $nombre = $_POST['Nombre'];
            $apellidoPaterno = $_POST['Apellido_Paterno'];
            $direccion = $_POST['Direccion'];
            $apellidoMaterno = $_POST['Apellido_Materno'];
            $telefono = $_POST['Telefono'];
            $genero = $_POST['Genero'];
            $materia = $_POST['Materia'];
            $Correo = $_POST['Correo'];

            // Verificar si la fotografía se cargó y manejarla según tus necesidades
            if (isset($_FILES['Fotogafia']) && $_FILES['Fotogafia']['error'] == UPLOAD_ERR_OK) {
                // Ruta donde se guardará la fotografía (ajusta según tus necesidades)
                $carpetaDestino = "../ImgUsers/Alumnos/";

                // Obtener información de la fotografía
                $nombreFotografia = $_FILES['Fotogafia']['name'];
                $tipoFotografia = $_FILES['Fotogafia']['type'];
                $tamanioFotografia = $_FILES['Fotogafia']['size'];
                $nombrehash = hash('sha256', $nombreFotografia . time()) . "." . pathinfo($nombreFotografia, PATHINFO_EXTENSION);
                $rutaFotografia = $carpetaDestino . hash('sha256', $nombreFotografia . time()) . "." . pathinfo($nombreFotografia, PATHINFO_EXTENSION);

                // Mover la fotografía a la carpeta de destino
                move_uploaded_file($_FILES['Fotogafia']['tmp_name'], $rutaFotografia);
            } else {
                // La fotografía no se cargó o hubo un error
                $rutaFotografia = null;  // Puedes establecer un valor predeterminado o manejarlo según tus necesidades
            }

            mysqli_begin_transaction($connect);

            // Consulta SQL para insertar datos en la tabla "alumno"
            $sql = "INSERT INTO alumno (curp_id, alumno_nombre, alumno_apaterno, alumno_direccion, alumno_amaterno, alumno_telefono, alumno_genero, alumno_foto, materia_id,alumno_correo)VALUES ('$curp', '$nombre', '$apellidoPaterno', '$direccion', '$apellidoMaterno', '$telefono', '$genero', '$nombrehash', '$materia','$Correo')";

            // Inicializar la variable de respuesta
            $response = array();

            try {
                // Ejecutar la consulta
                $consulta = mysqli_query($connect, $sql);

                if ($consulta) {
                    // Confirmar la transacción si la inserción fue exitosa
                    mysqli_commit($connect);

                    $response['success'] = true;
                    $response['message'] = 'El elemento se ha insertado correctamente';
                } else {
                    // Revertir la transacción en caso de fallo
                    mysqli_rollback($connect);

                    $response['success'] = false;
                    $response['message'] = 'No se pudo insertar el elemento';
                    $response['error'] = mysqli_error($connect);
                }
            } catch (mysqli_sql_exception $e) {
                // Capturar excepción y manejarla
                $response['success'] = false;
                $response['message'] = 'No se pudo insertar el elemento';
                $response['error'] = $e->getMessage();
            }

            break;


        case "Calificaciones":
            // Obtener datos del formulario (reemplaza con los nombres reales de tus campos)
            $Curp_alumno = $_POST['Curp_alumno'];
            $Materia_cal = $_POST['Materia_cal'];
            $Calificacion_cal = $_POST['Calificacion_cal'];
            $Calificacion_id = $Curp_alumno . $Materia_cal . $Calificacion_cal;
            mysqli_begin_transaction($connect);

            // Consulta SQL para insertar datos en la tabla "alumno"
            $sql = "INSERT INTO `calificacion` (`calificacion_id`,`curp_id`,`materia_id`,`calificacion`) VALUES ('$Calificacion_id', '$Curp_alumno', '$Materia_cal', '$Calificacion_cal')";
            
            // Inicializar la variable de respuesta
            $response = array();

            try {
                // Ejecutar la consulta
                $consulta = mysqli_query($connect, $sql);

                if ($consulta) {
                    // Confirmar la transacción si la inserción fue exitosa
                    mysqli_commit($connect);

                    $response['success'] = true;
                    $response['message'] = 'El elemento se ha insertado correctamente';
                } else {
                    // Revertir la transacción en caso de fallo
                    mysqli_rollback($connect);

                    $response['success'] = false;
                    $response['message'] = 'No se pudo insertar el elemento';
                    $response['error'] = mysqli_error($connect);
                }
            } catch (mysqli_sql_exception $e) {
                // Capturar excepción y manejarla
                $response['success'] = false;
                $response['message'] = 'No se pudo insertar el elemento';
                $response['error'] = $e->getMessage();
            }
            break;


        case "Grupos":
            // Obtener datos del formulario (reemplaza con los nombres reales de tus campos)
            $ID_Grupo = $_POST['ID_Grupo'];
            $ID_Profesor_Grupo = $_POST['ID_Profesor_Grupo'];
            $Materia_Grupo = $_POST['Materia_Grupo'];

            mysqli_begin_transaction($connect);

            // Consulta SQL para insertar datos en la tabla "alumno"
            $sql = "INSERT INTO `grupo` (`grupo_id`,`materia_id`,`profesor_id`) VALUES ('$ID_Grupo', '$Materia_Grupo', '$ID_Profesor_Grupo')";

            // Inicializar la variable de respuesta
            $response = array();

            try {
                // Ejecutar la consulta
                $consulta = mysqli_query($connect, $sql);

                if ($consulta) {
                    // Confirmar la transacción si la inserción fue exitosa
                    mysqli_commit($connect);

                    $response['success'] = true;
                    $response['message'] = 'El elemento se ha insertado correctamente';
                } else {
                    // Revertir la transacción en caso de fallo
                    mysqli_rollback($connect);

                    $response['success'] = false;
                    $response['message'] = 'No se pudo insertar el elemento';
                    $response['error'] = mysqli_error($connect);
                }
            } catch (mysqli_sql_exception $e) {
                // Capturar excepción y manejarla
                $response['success'] = false;
                $response['message'] = 'No se pudo insertar el elemento';
                $response['error'] = $e->getMessage();
            }
            break;



        case "Materias":
            // Obtener datos del formulario (reemplaza con los nombres reales de tus campos)
            $ID_Materia = $_POST['ID_Materia'];
            $Materia_Materia = $_POST['Materia_Materia'];
            $Semestre_Materia = $_POST['Semestre_Materia'];

            mysqli_begin_transaction($connect);

            // Consulta SQL para insertar datos en la tabla "alumno"
            $sql = "INSERT INTO `materia` (`materia_id`,`materia_nombre`,`semestre`)VALUES ('$ID_Materia', '$Materia_Materia', '$Semestre_Materia')";

            // Inicializar la variable de respuesta
            $response = array();

            try {
                // Ejecutar la consulta
                $consulta = mysqli_query($connect, $sql);

                if ($consulta) {
                    // Confirmar la transacción si la inserción fue exitosa
                    mysqli_commit($connect);

                    $response['success'] = true;
                    $response['message'] = 'El elemento se ha insertado correctamente';
                } else {
                    // Revertir la transacción en caso de fallo
                    mysqli_rollback($connect);

                    $response['success'] = false;
                    $response['message'] = 'No se pudo insertar el elemento';
                    $response['error'] = mysqli_error($connect);
                }
            } catch (mysqli_sql_exception $e) {
                // Capturar excepción y manejarla
                $response['success'] = false;
                $response['message'] = 'No se pudo insertar el elemento';
                $response['error'] = $e->getMessage();
            }
            break;
        case "Profesores":
            // Obtener datos del formulario (reemplaza con los nombres reales de tus campos)
            $ID_Profesor = $_POST['ID_Profesor'];
            $Nombre_Profesor = $_POST['Nombre_Profesor'];
            $Apellido_Paterno_Profesor = $_POST['Apellido_Paterno_Profesor'];
            $Direccion_Profesor = $_POST['Direccion_Profesor'];
            $Apellido_Materno_Profesor = $_POST['Apellido_Materno_Profesor'];
            $Telefono_Profesor = $_POST['Telefono_Profesor'];
            $Genero_Profesor = $_POST['Genero_Profesor'];
            $Correo_profesor = $_POST['Correo_profesor'];

            // Verificar si la fotografía se cargó y manejarla según tus necesidades
            if (isset($_FILES['Fotogafia_Profesor']) && $_FILES['Fotogafia_Profesor']['error'] == UPLOAD_ERR_OK) {
                // Ruta donde se guardará la fotografía (ajusta según tus necesidades)
                $carpetaDestino = "../ImgUsers/Profesores/";

                // Obtener información de la fotografía
                $nombreFotografia = $_FILES['Fotogafia_Profesor']['name'];
                $tipoFotografia = $_FILES['Fotogafia_Profesor']['type'];
                $tamanioFotografia = $_FILES['Fotogafia_Profesor']['size'];
                $nombrehash = hash('sha256', $nombreFotografia . time()) . "." . pathinfo($nombreFotografia, PATHINFO_EXTENSION);
                $rutaFotografia = $carpetaDestino . hash('sha256', $nombreFotografia . time()) . "." . pathinfo($nombreFotografia, PATHINFO_EXTENSION);

                // Mover la fotografía a la carpeta de destino
                move_uploaded_file($_FILES['Fotogafia_Profesor']['tmp_name'], $rutaFotografia);
            } else {
                // La fotografía no se cargó o hubo un error
                $rutaFotografia = null;  // Puedes establecer un valor predeterminado o manejarlo según tus necesidades
            }

            mysqli_begin_transaction($connect);

            // Consulta SQL para insertar datos en la tabla "alumno"
            $sql = "INSERT INTO profesor ( `profesor_id`,`profesor_nombre`,`profesor_apaterno`,`profesor_amaterno`,`profesor_telefono`,`profesor_correo`,`profesor_direccion`,`profesor_genero`, `profesor_foto`) VALUES ('$ID_Profesor', '$Nombre_Profesor', '$Apellido_Paterno_Profesor','$Apellido_Materno_Profesor', '$Telefono_Profesor','$Correo_profesor', '$Direccion_Profesor', '$Genero_Profesor', '$nombrehash')";

            // Inicializar la variable de respuesta
            $response = array();

            try {
                // Ejecutar la consulta
                $consulta = mysqli_query($connect, $sql);

                if ($consulta) {
                    // Confirmar la transacción si la inserción fue exitosa
                    mysqli_commit($connect);

                    $response['success'] = true;
                    $response['message'] = 'El elemento se ha insertado correctamente';
                } else {
                    // Revertir la transacción en caso de fallo
                    mysqli_rollback($connect);

                    $response['success'] = false;
                    $response['message'] = 'No se pudo insertar el elemento';
                    $response['error'] = mysqli_error($connect);
                }
            } catch (mysqli_sql_exception $e) {
                // Capturar excepción y manejarla
                $response['success'] = false;
                $response['message'] = 'No se pudo insertar el elemento';
                $response['error'] = $e->getMessage();
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

// Cerrar la conexión
mysqli_close($connect);
