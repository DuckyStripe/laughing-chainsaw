<main class="container">
    <div class="row mt-4">
        <div class="col-12 text-center">
            <h1>Calificaciones</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <form id="Calificaciones" onsubmit="return validateFormCalificacion(event)">
                <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                            <label for="Curp_alumno">Curp Alumno</label>
                            <select class="form-control" id="Curp_alumno" name="Curp_alumno"> 
                                <option selected value="0">Selecciona una Opción</option>
                                <?php
                                $query = "SELECT curp_id FROM `alumno` group by curp_id;";
                                $consulta = mysqli_query($connect, $query);
                                while ($row = mysqli_fetch_array($consulta)) {
                                ?>
                                    <option value="<?php echo $row['curp_id'] ?>"><?php echo $row['curp_id'] ?></option>
                                <?php
                                }
                                mysqli_free_result($consulta);
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Nombre_cal">Nombre</label>
                            <input type="Text" class="form-control" id="Nombre_cal" name="Nombre_cal" aria-describedby="Nombre_cal" placeholder="Nombre" disabled>
                        </div>
                        <div class="form-group">
                            <label for="ApellidoP_cal">Apellido Paterno</label>
                            <input type="Text" class="form-control" id="ApellidoP_cal" name="ApellidoP_cal" aria-describedby="ApellidoP_cal" placeholder="Apellido Paterno" disabled>
                        </div>
                        <div class="form-group">
                            <label for="ApellidoM_cal">Apellido Materno</label>
                            <input type="Text" class="form-control" id="ApellidoM_cal" name="ApellidoM_cal" aria-describedby="ApellidoM_cal" placeholder="Apellido Materno" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Materia_cal">Materia</label>
                            <select class="form-control" id="Materia_cal" name="Materia_cal">
                                <option selected value="0">Selecciona una Opción</option>
                                <?php
                                $query = "SELECT materia_id FROM `materia` group by materia_id;";
                                $consulta = mysqli_query($connect, $query);
                                while ($row = mysqli_fetch_array($consulta)) {
                                ?>
                                    <option value="<?php echo $row['materia_id'] ?>"><?php echo $row['materia_id'] ?></option>
                                <?php
                                }
                                mysqli_free_result($consulta);
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Nombre_Materia">Nombre Materia</label>
                            <input type="Text" class="form-control" id="Nombre_Materia" name="Nombre_Materia" aria-describedby="Nombre_Materia" placeholder="0" disabled> 
                        </div>
                     <div class="form-group">
                            <label for="Semestre_cal">Semestre</label>
                            <input type="Text" class="form-control" id="Semestre_cal" name="Semestre_cal" aria-describedby="Semestre_cal" placeholder="0" disabled> 
                        </div>
                        <div class="form-group">
                            <label for="Calificacion_cal">Calificacion</label>
                            <input type="Text" class="form-control" id="Calificacion_cal" name="Calificacion_cal" aria-describedby="Calificacion_cal" placeholder="Calificacion">
                        </div>
                    </div>
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary boton">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 text-center">
            <h2>Historial Calificaciones</h2>
        </div>
    </div>
    <div class="row mt-4">

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Curp</th>
                    <th scope="col">Materia</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Calificacion</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Modificar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT 
                a.curp_id AS Curp,
                m.materia_nombre AS Materia,
                m.semestre AS Semestre,
                c.calificacion AS Calificacion
              FROM alumno a
              INNER JOIN materia m ON a.materia_id = m.materia_id
              INNER JOIN calificacion c ON a.curp_id = c.curp_id;
              ";
                $consulta = mysqli_query($connect, $query);

                if ($consulta) {
                    while ($row = mysqli_fetch_array($consulta)) {
                ?>
                        <tr>
                            <td colspan="1"><?php echo $row['Curp'] ?></td>
                            <td colspan="1"><?php echo $row['Materia'] ?></td>
                            <td colspan="1"><?php echo $row['Semestre'] ?></td>
                            <td colspan="1"><?php echo $row['Calificacion'] ?></td>
                            <td colspan="1">
                                <a href="#" class="btn" onclick="confirmDelete(event, '<?php echo $row['Curp']; ?>', 'Calificaciones')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="18" y1="6" x2="6" y2="18" />
                                        <line x1="6" y1="6" x2="18" y2="18" />
                                    </svg>
                                </a>
                            </td>
                            <td colspan="1">
                                <a href="#" class="btn" onlick="">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-caret-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M18 15l-6 -6l-6 6h12" transform="rotate(270 12 12)" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo '<td colspan="11" class="text-center">Error en la consulta</td>';
                }

                mysqli_free_result($consulta);
                ?>
            </tbody>
        </table>


    </div>
</main>