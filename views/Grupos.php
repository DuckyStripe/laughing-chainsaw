<main class="container">
  <div class="row mt-4">
    <div class="col-12 text-center">
      <h1>Grupos</h1>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-12">
      <form id="Grupos" onsubmit="return validateFormGrupos(event)">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="ID_Grupo">ID Grupo</label>
              <input type="Text" class="form-control" id="ID_Grupo" name="ID_Grupo" aria-describedby="ID_Grupo" placeholder="ID Grupo">
            </div>
            <div class="form-group">
              <label for="Materia_Grupo">Materia</label>
              <select class="form-control" id="Materia_Grupo" name="Materia_Grupo"> <!-- Agrega el atributo name aquí -->
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
              <label for="ID_Profesor_Grupo">ID Profesor</label>
              <select class="form-control" id="ID_Profesor_Grupo" name="ID_Profesor_Grupo"> 
                <option selected value="0">Selecciona una Opción</option>
                <?php
                $query = "SELECT `profesor_id` FROM `profesor` group by `profesor_id` ORDER BY `profesor_id` ASC; ";
                $consulta = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($consulta)) {
                ?>
                  <option value="<?php echo $row['profesor_id'] ?>"><?php echo $row['profesor_id'] ?></option>
                <?php
                }
                mysqli_free_result($consulta);
                ?>
              </select>
            </div>
          </div>
          <div class="col-6">
          <div class="form-group">
              <label for="Nombre_Profesor_Grupo">Nombre Profesor</label>
              <input type="Text" class="form-control" id="Nombre_Profesor_Grupo" name="Nombre_Profesor_Grupo" placeholder="Nombre profesor" disabled>
            </div>
            <div class="form-group">
              <label for="Apellido_Paterno_profesor_Grupo">Apellido Paterno</label>
              <input type="Text" class="form-control" id="Apellido_Paterno_profesor_Grupo" name="Paterno" placeholder="Apellido Paterno" disabled>
            </div>
            <div class="form-group">
              <label for="Apellido_Materno_Grupo">Apellido Materno</label>
              <input type="text" class="form-control" id="Apellido_Materno_Grupo" name="Apellido_Materno_Grupo" aria-describedby="Apellido_Materno_Grupo" placeholder="Apellido Materno" disabled>
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
          <th scope="col">GrupoID</th>
          <th scope="col">Materia</th>
          <th scope="col">Profesor Nombre</th>
          <th scope="col">Profesor Apellido</th>
          <th scope="col">Eliminar</th>
          <th scope="col">Editar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "
                SELECT 
                g.grupo_id AS GrupoID,
                m.materia_nombre AS Materia,
                p.profesor_nombre AS ProfesorNombre,
                p.profesor_apaterno AS ProfesorApellido
                FROM grupo g
                INNER JOIN materia m ON g.materia_id = m.materia_id
                INNER JOIN profesor p ON g.profesor_id = p.profesor_id;
              ";
        $consulta = mysqli_query($connect, $query);

        if ($consulta) {
          while ($row = mysqli_fetch_array($consulta)) {
        ?>
            <tr>
              <td colspan="1"><?php echo $row['GrupoID'] ?></td>
              <td colspan="1"><?php echo $row['Materia'] ?></td>
              <td colspan="1"><?php echo $row['ProfesorNombre'] ?></td>
              <td colspan="1"><?php echo $row['ProfesorApellido'] ?></td>
              <td colspan="1">
                <a href="#" class="btn" onclick="confirmDelete(event, '<?php echo $row['GrupoID']; ?>', 'Grupos')">
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