<main class="container">
    <div class="row mt-4">
        <div class="col-12 text-center">
            <h1>Alumnos</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <form id="Alumnos" onsubmit="return validateFormAlumno(event)">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Curp">Curp</label>
                            <input type="Text" class="form-control" id="Curp" name="Curp" aria-describedby="Curp" placeholder="Curp">
                        </div>
                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input type="Text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="Apellido_Paterno">Apellido Paterno</label>
                            <input type="Text" class="form-control" id="Apellido_Paterno" name="Apellido_Paterno" placeholder="Apellido Paterno">
                        </div>
                        <div class="form-group">
                            <label for="Direccion">Direccion</label>
                            <input type="Text" class="form-control" id="Direccion" name="Direccion" placeholder="Direccion">
                        </div>
                        <div class="form-group">
                            <label for="Correo">Correo</label>
                            <input type="mail" class="form-control" id="Correo" name="Correo" placeholder="test@test.com">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Apellido_Materno">Apellido Materno</label>
                            <input type="text" class="form-control" id="Apellido_Materno" name="Apellido_Materno" aria-describedby="Apellido_Materno" placeholder="Apellido Materno">
                        </div>
                        <div class="form-group">
                            <label for="Telefono">Telefono</label>
                            <input type="Text" class="form-control" id="Telefono" name="Telefono" placeholder="5511225588">
                        </div>

                        <div class="form-group">
                            <label for="Genero">Genero</label>
                            <input type="Text" class="form-control" id="Genero" name="Genero" placeholder="Genero">
                        </div>
                        <div class="form-group">
                                    <label for="Materia">Materia</label>
                                    <select class="form-control" id="Materia" name="Materia"> <!-- Agrega el atributo name aquí -->
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
                            <label for="Fotogafia">Fotogafia</label>
                            <input type="file" class="form-control-file" id="Fotogafia" name="Fotogafia">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary boton">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <h2>Historial Alumnos</h2>
            </div>
        </div>

        <div class="row mt-4">

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Curp</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Paterno</th>
                        <th scope="col">Materno</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Modificar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM alumno";
                    $consulta = mysqli_query($connect, $query);

                    if ($consulta) {
                        while ($row = mysqli_fetch_array($consulta)) {
                    ?>
                            <tr>
                                <td colspan="1"><img src="<?php echo "./ImgUsers/Alumnos/" . $row['alumno_foto'] ?>" alt="" height="40" width="40"></td>
                                <td colspan="1"><?php echo $row['curp_id'] ?></td>
                                <td colspan="1"><?php echo $row['alumno_nombre'] ?></td>
                                <td colspan="1"><?php echo $row['alumno_apaterno'] ?></td>
                                <td colspan="1"><?php echo $row['alumno_amaterno'] ?></td>
                                <td colspan="1"><?php echo $row['alumno_telefono'] ?></td>
                                <td colspan="1"><?php echo $row['alumno_correo'] ?></td>
                                <td colspan="1"><?php echo $row['alumno_direccion'] ?></td>
                                <td colspan="1"><?php echo $row['alumno_genero'] ?></td>
                                <td colspan="1">
                                    <a href="#" class="btn" onclick="confirmDelete(event, '<?php echo $row['curp_id']; ?>', 'Alumno')">
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