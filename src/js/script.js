function confirmDelete(event,id,option) {
    event.preventDefault();

    Swal.fire({
        title: "¿Estás seguro?",
        text: "Esta acción no se puede deshacer",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminarlo",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            // Realizar solicitud AJAX para eliminar
            $.ajax({
                url: `./php/eliminar.php?id=${id}&opcion=${option}`,
                type: 'GET',
                complete: function(xhr, textStatus) {
                    if (textStatus === "success") {
                        var response = JSON.parse(xhr.responseText);
            
                        if (response.success) {
                            // Manejar éxito
                            Swal.fire({
                                title: "Eliminado",
                                text: "El elemento ha sido eliminado",
                                icon: "success"
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            // Manejar error lógico
                            Swal.fire({
                                title: "Error",
                                text: response.message,
                                icon: "error"
                            });
                        }
                    } else {
                        // Manejar errores de la solicitud AJAX
                        console.log("Error en la solicitud AJAX:", xhr.status, xhr.statusText);
                    }
                }
            });
            
        }
    });
}
function confirmModify(event,id,option) {
    event.preventDefault();

    Swal.fire({
        title: "¿Estás seguro?",
        text: "Esta acción no se puede deshacer",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminarlo",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            // Realizar solicitud AJAX para eliminar
            $.ajax({
                url: `./php/eliminar.php?id=${id}&opcion=${option}`,
                type: 'GET',
                complete: function(xhr, textStatus) {
                    if (textStatus === "success") {
                        var response = JSON.parse(xhr.responseText);
            
                        if (response.success) {
                            // Manejar éxito
                            Swal.fire({
                                title: "Eliminado",
                                text: "El elemento ha sido eliminado",
                                icon: "success"
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            // Manejar error lógico
                            Swal.fire({
                                title: "Error",
                                text: response.message,
                                icon: "error"
                            });
                        }
                    } else {
                        // Manejar errores de la solicitud AJAX
                        console.log("Error en la solicitud AJAX:", xhr.status, xhr.statusText);
                    }
                }
            });
            
        }
    });
}

function CreateAlumno(event, option) {
    event.preventDefault();

    // Obtener todos los datos del formulario
    var formData = new FormData(document.getElementById("Alumnos")); 
    formData.append('opcion', option);

    // Realizar solicitud AJAX para eliminar
    $.ajax({
        url: "./php/Insertar.php",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            //response = JSON.parse(response);

            if (response.success) {
                // Mostrar mensaje de éxito
                Swal.fire({
                    title: "Guardado Exitoso",
                    text: "Registro Guardado Correctamente",
                    icon: "success"
                }).then(() => {
                    location.reload();
                });
            } else {
                // Mostrar mensaje de error
                console.log(response.error);
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Algo salio mal al guardar la informacion",
                });
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            // Manejar errores de la solicitud AJAX
            console.log("Error en la solicitud AJAX:", textStatus, errorThrown);
        }
    });
}

function validateFormAlumno(event) {
    // Obtener los valores de los campos del formulario
    var Curp = document.getElementById("Curp").value;
    var Nombre = document.getElementById("Nombre").value;
    var apellidoPaterno = document.getElementById("Apellido_Paterno").value;
    var direccion = document.getElementById("Direccion").value;
    var apellidoMaterno = document.getElementById("Apellido_Materno").value;
    var telefono = document.getElementById("Telefono").value;
    var materia = document.getElementById("Materia").value;
    var genero = document.getElementById("Genero").value;
    var fotografia = document.getElementById("Fotogafia").value;
    var correo = document.getElementById("Correo").value;
    // Crear una lista de campos faltantes
    var camposFaltantes = [];

    // Realizar la validación (puedes agregar condiciones según tus necesidades)
    if (Curp === "") {
        camposFaltantes.push("Curp");
    }
    if (Nombre === "") {
        camposFaltantes.push("Nombre");
    }
    if (apellidoPaterno === "") {
        camposFaltantes.push("Apellido Paterno");
    }
    if (direccion === "") {
        camposFaltantes.push("Dirección");
    }
    if (correo === "") {
        camposFaltantes.push("Correo");
    }
    if (apellidoMaterno === "") {
        camposFaltantes.push("Apellido Materno");
    }
    if (telefono === "") {
        camposFaltantes.push("Teléfono");
    }
    if (genero === "") {
        camposFaltantes.push("Género");
    }
    if (materia === "0"||materia === 0) {
        camposFaltantes.push("Materia");
    }
    if (fotografia === "") {
        camposFaltantes.push("Fotografía");
    }

    // Verificar si hay campos faltantes
    if (camposFaltantes.length > 0) {
        // Mostrar mensaje de error con la lista de campos faltantes
        Swal.fire({
            icon: "error",
            title: "Oops...",
            html: `Por favor, completa los siguientes campos obligatorios:<br><strong>${camposFaltantes.join(", ")}</strong>`,
        });

        // Evitar que el formulario se envíe
        return false;
    }

    // Si la validación es exitosa, puedes llamar a la función Create
    CreateAlumno(event,'Alumno');
    return true;
}

function CreateProfesor(event, option) {
    event.preventDefault();

    // Obtener todos los datos del formulario
    var formData = new FormData(document.getElementById("Profesores")); 
    formData.append('opcion', option);

    // Realizar solicitud AJAX para eliminar
    $.ajax({
        url: "./php/Insertar.php",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            //response = JSON.parse(response);

            if (response.success) {
                // Mostrar mensaje de éxito
                Swal.fire({
                    title: "Guardado Exitoso",
                    text: "Registro Guardado Correctamente",
                    icon: "success"
                }).then(() => {
                    document.getElementById("Profesores").reset();
                    location.reload();
                });
            } else {
                console.log(response.error);
                // Mostrar mensaje de error
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Algo salio mal al guardar la informacion",
                });
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            // Manejar errores de la solicitud AJAX
            console.log("Error en la solicitud AJAX:", textStatus, errorThrown);
        }
    });
}

function validateFormProfesor(event) {
    console.log("Entro a la validacion")
    // Obtener los valores de los campos del formulario
    var ID_Profesor = document.getElementById("ID_Profesor").value;
    var Nombre_Profesor = document.getElementById("Nombre_Profesor").value;
    var Apellido_Paterno_Profesor = document.getElementById("Apellido_Paterno_Profesor").value;
    var Direccion_Profesor = document.getElementById("Direccion_Profesor").value;
    var Apellido_Materno_Profesor = document.getElementById("Apellido_Materno_Profesor").value;
    var Telefono_Profesor = document.getElementById("Telefono_Profesor").value;
    var Genero_Profesor = document.getElementById("Genero_Profesor").value;
    var Fotogafia_Profesor = document.getElementById("Fotogafia_Profesor").value;
    var Correo_profesor = document.getElementById("Correo_profesor").value;
    // Crear una lista de campos faltantes
    var camposFaltantes = [];

    // Realizar la validación (puedes agregar condiciones según tus necesidades)
    if (ID_Profesor === "") {
        camposFaltantes.push("ID Profesor");
    }
    if (Nombre_Profesor === "") {
        camposFaltantes.push("Nombre");
    }
    if (Apellido_Paterno_Profesor === "") {
        camposFaltantes.push("Apellido Paterno");
    }
    if (Direccion_Profesor === "") {
        camposFaltantes.push("Dirección");
    }
    if (Correo_profesor === "") {
        camposFaltantes.push("Correo");
    }
    if (Apellido_Materno_Profesor === "") {
        camposFaltantes.push("Apellido Materno");
    }
    if (Telefono_Profesor === "") {
        camposFaltantes.push("Teléfono");
    }
    if (Genero_Profesor === "") {
        camposFaltantes.push("Género");
    }
    if (Fotogafia_Profesor === "") {
        camposFaltantes.push("Fotografía");
    }

    // Verificar si hay campos faltantes
    if (camposFaltantes.length > 0) {
        // Mostrar mensaje de error con la lista de campos faltantes
        Swal.fire({
            icon: "error",
            title: "Oops...",
            html: `Por favor, completa los siguientes campos obligatorios:<br><strong>${camposFaltantes.join(", ")}</strong>`,
        });
        event.preventDefault();
        event.stopPropagation();
        // Evitar que el formulario se envíe
        return false;
    }
    // Si la validación es exitosa, puedes llamar a la función Create
    CreateProfesor(event,'Profesores');
    return true;
}

function CreateCalificacion(event, option) {
    event.preventDefault();

    // Obtener todos los datos del formulario
    var formData = new FormData(document.getElementById("Calificaciones")); 
    formData.append('opcion', option);

    // Realizar solicitud AJAX para eliminar
    $.ajax({
        url: "./php/Insertar.php",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            //response = JSON.parse(response);

            if (response.success) {
                // Mostrar mensaje de éxito
                Swal.fire({
                    title: "Guardado Exitoso",
                    text: "Registro Guardado Correctamente",
                    icon: "success"
                }).then(() => {
                    location.reload();
                });
            } else {
                // Mostrar mensaje de error
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Algo salio mal al guardar la informacion",
                });
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            // Manejar errores de la solicitud AJAX
            console.log("Error en la solicitud AJAX:", textStatus, errorThrown);
        }
    });
}

function validateFormCalificacion(event) {
    // Obtener los valores de los campos del formulario
    var Curp_alumno = document.getElementById("Curp_alumno").value;
    var Nombre_cal = document.getElementById("Nombre_cal").value;
    var ApellidoP_cal = document.getElementById("ApellidoP_cal").value;
    var ApellidoM_cal = document.getElementById("ApellidoM_cal").value;
    var Materia_cal = document.getElementById("Materia_cal").value;
    var Nombre_Materia = document.getElementById("Nombre_Materia").value;
    var Semestre_cal = document.getElementById("Semestre_cal").value;
    var Calificacion_cal = document.getElementById("Calificacion_cal").value;
    // Crear una lista de campos faltantes
    var camposFaltantes = [];

    // Realizar la validación (puedes agregar condiciones según tus necesidades)
    if (Curp_alumno === "") {
        camposFaltantes.push("Curp");
    }
    if (Nombre_cal === "") {
        camposFaltantes.push("Nombre");
    }
    if (ApellidoP_cal === "") {
        camposFaltantes.push("Apellido Paterno");
    }
    if (ApellidoM_cal === "") {
        camposFaltantes.push("Apllido Materno");
    }
    if (Materia_cal === "" || Materia_cal==0 ) {
        camposFaltantes.push("Materia");
    }
    if (Nombre_Materia === "") {
        camposFaltantes.push("Nombre Materia");
    }
    if (Semestre_cal === "") {
        camposFaltantes.push("Semestre");
    }
    if (Calificacion_cal === "") {
        camposFaltantes.push("Calificacion");
    }

    // Verificar si hay campos faltantes
    if (camposFaltantes.length > 0) {
        // Mostrar mensaje de error con la lista de campos faltantes
        Swal.fire({
            icon: "error",
            title: "Oops...",
            html: `Por favor, completa los siguientes campos obligatorios:<br><strong>${camposFaltantes.join(", ")}</strong>`,
        });

        // Evitar que el formulario se envíe
        return false;
    }

    // Si la validación es exitosa, puedes llamar a la función Create
    CreateCalificacion(event,'Calificaciones');
    return true;
}

function CreateGrupo(event, option) {
    event.preventDefault();

    // Obtener todos los datos del formulario
    var formData = new FormData(document.getElementById("Grupos")); 
    formData.append('opcion', option);

    // Realizar solicitud AJAX para eliminar
    $.ajax({
        url: "./php/Insertar.php",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            //response = JSON.parse(response);

            if (response.success) {
                // Mostrar mensaje de éxito
                Swal.fire({
                    title: "Guardado Exitoso",
                    text: "Registro Guardado Correctamente",
                    icon: "success"
                }).then(() => {
                    document.getElementById("Grupos").reset();
                    location.reload();
                });
            } else {
                // Mostrar mensaje de error
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Algo salio mal al guardar la informacion",
                });
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            // Manejar errores de la solicitud AJAX
            console.log("Error en la solicitud AJAX:", textStatus, errorThrown);
        }
    });
}

function validateFormGrupos(event) {
    // Obtener los valores de los campos del formulario
    var ID_Grupo = document.getElementById("ID_Grupo").value;
    var ID_Profesor_Grupo = document.getElementById("ID_Profesor_Grupo").value;
    var Materia_Grupo = document.getElementById("Materia_Grupo").value;
    var Nombre_Profesor_Grupo = document.getElementById("Nombre_Profesor_Grupo").value;
    var Apellido_Paterno_profesor_Grupo = document.getElementById("Apellido_Paterno_profesor_Grupo").value;
    var Apellido_Materno_Grupo = document.getElementById("Apellido_Materno_Grupo").value;
    // Crear una lista de campos faltantes
    var materia = document.getElementById("Materia_Grupo").value;
    var camposFaltantes = [];

    // Realizar la validación (puedes agregar condiciones según tus necesidades)
    if (ID_Grupo === ""||ID_Grupo== 0) {
        camposFaltantes.push("ID Grupo");
    }
    if (Materia_Grupo === "") {
        camposFaltantes.push("Materia");
    }
    if (ID_Profesor_Grupo === ""||ID_Profesor_Grupo== 0) {
        camposFaltantes.push("ID Profesor");
    }
    if (materia === "0"||materia === 0) {
        camposFaltantes.push("Materia");
    }
    if (Nombre_Profesor_Grupo === "") {
        camposFaltantes.push("Nombre Profesor");
    }
    if (Apellido_Paterno_profesor_Grupo === "") {
        camposFaltantes.push("Apellido Paterno");
    }
    if (Apellido_Materno_Grupo === "") {
        camposFaltantes.push("Apellido Materno");
    }
    // Verificar si hay campos faltantes
    if (camposFaltantes.length > 0) {
        // Mostrar mensaje de error con la lista de campos faltantes
        Swal.fire({
            icon: "error",
            title: "Oops...",
            html: `Por favor, completa los siguientes campos obligatorios:<br><strong>${camposFaltantes.join(", ")}</strong>`,
        });

        // Evitar que el formulario se envíe
        return false;
    }

    // Si la validación es exitosa, puedes llamar a la función Create
    CreateGrupo(event,'Grupos');
    return true;
}

function CreateMaterias(event, option) {
    event.preventDefault();

    // Obtener todos los datos del formulario
    var formData = new FormData(document.getElementById("Materias")); 
    formData.append('opcion', option);

    // Realizar solicitud AJAX para eliminar
    $.ajax({
        url: "./php/Insertar.php",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            //response = JSON.parse(response);

            if (response.success) {
                // Mostrar mensaje de éxito
                Swal.fire({
                    title: "Guardado Exitoso",
                    text: "Registro Guardado Correctamente",
                    icon: "success"
                }).then(() => {
                    location.reload();
                });
            } else {
                // Mostrar mensaje de error
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Algo salio mal al guardar la informacion",
                });
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            // Manejar errores de la solicitud AJAX
            console.log("Error en la solicitud AJAX:", textStatus, errorThrown);
        }
    });
}

function validateFormMaterias(event) {
    // Obtener los valores de los campos del formulario
    var ID_Materia = document.getElementById("ID_Materia").value;
    var Materia_Materia = document.getElementById("Materia_Materia").value;
    var Semestre_Materia = document.getElementById("Semestre_Materia").value;

    // Crear una lista de campos faltantes
    var camposFaltantes = [];

    // Realizar la validación (puedes agregar condiciones según tus necesidades)
    if (ID_Materia === "") {
        camposFaltantes.push("ID Materia");
    }
    if (Materia_Materia === "") {
        camposFaltantes.push("Materia");
    }
    if (Semestre_Materia === "") {
        camposFaltantes.push("Semestre");
    }

    // Verificar si hay campos faltantes
    if (camposFaltantes.length > 0) {
        // Mostrar mensaje de error con la lista de campos faltantes
        Swal.fire({
            icon: "error",
            title: "Oops...",
            html: `Por favor, completa los siguientes campos obligatorios:<br><strong>${camposFaltantes.join(", ")}</strong>`,
        });

        // Evitar que el formulario se envíe
        return false;
    }

    // Si la validación es exitosa, puedes llamar a la función Create
    CreateMaterias(event,'Materias');
    return true;
}

$(document).ready(function() {
    // Manejar el evento de cambio en el campo select
    $("#ID_Profesor_Grupo").change(function() {
        // Obtener el valor seleccionado
        var profesorID = $(this).val();

        // Hacer la solicitud AJAX para obtener la información del profesor
        $.ajax({
            url: "./php/ObtenerInfoProfesor.php",  // Reemplaza con la ruta correcta a tu script PHP
            type: 'POST',
            data: { profesorID: profesorID },
            success: function(response) {
                // Parsear la respuesta JSON
                var profesorInfo = JSON.parse(response);

                // Llenar automáticamente los campos del formulario
                $("#Nombre_Profesor_Grupo").val(profesorInfo.profesor_nombre).prop('disabled', true);
                $("#Apellido_Paterno_profesor_Grupo").val(profesorInfo.profesor_apaterno).prop('disabled', true);
                $("#Apellido_Materno_Grupo").val(profesorInfo.profesor_amaterno).prop('disabled', true);
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("Error en la solicitud AJAX:", textStatus, errorThrown);
            }
        });
    });
    $("#Curp_alumno").change(function() {
        // Obtener el valor seleccionado
        var IDAlumno = $(this).val();

        // Hacer la solicitud AJAX para obtener la información del profesor
        $.ajax({
            url: "./php/ObtenerInfoAlumno.php",  // Reemplaza con la ruta correcta a tu script PHP
            type: 'POST',
            data: { IDAlumno: IDAlumno },
            success: function(response) {
                // Parsear la respuesta JSON
                var AlumnoInfo = JSON.parse(response);

                // Llenar automáticamente los campos del formulario
                $("#Nombre_cal").val(AlumnoInfo.alumno_nombre).prop('disabled', true);
                $("#ApellidoP_cal").val(AlumnoInfo.alumno_apaterno).prop('disabled', true);
                $("#ApellidoM_cal").val(AlumnoInfo.alumno_amaterno).prop('disabled', true);
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("Error en la solicitud AJAX:", textStatus, errorThrown);
            }
        });
    });
    $("#Materia_cal").change(function() {
        // Obtener el valor seleccionado
        var MateriaID = $(this).val();

        // Hacer la solicitud AJAX para obtener la información del profesor
        $.ajax({
            url: "./php/ObtenerInfoMateria.php",  // Reemplaza con la ruta correcta a tu script PHP
            type: 'POST',
            data: { MateriaID: MateriaID },
            success: function(response) {
                // Parsear la respuesta JSON
                var MateriaInfo = JSON.parse(response);

                // Llenar automáticamente los campos del formulario
                $("#Semestre_cal").val(MateriaInfo.semestre).prop('disabled', true);
                $("#Nombre_Materia").val(MateriaInfo.materia_nombre).prop('disabled', true);
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("Error en la solicitud AJAX:", textStatus, errorThrown);
            }
        });
    });
});
