<main class="container">
  <div class="row mt-4">
    <div class="col-12 text-center">
      <h1>Profesores</h1>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-12">
      <form id="Profesores" onsubmit="return validateFormProfesor(event)">

        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="lidProfesor">ID Profesor</label>
              <input type="Text" class="form-control" id="ID_Profesor" aria-describedby="ID_Profesor" placeholder="ID Profesor" name="ID_Profesor">
            </div>
            <div class="form-group">
              <label for="Nombre_Profesor">Nombre</label>
              <input type="Text" class="form-control" id="Nombre_Profesor" placeholder="Nombre" name="Nombre_Profesor">
            </div>
            <div class="form-group">
              <label for="Apellido_Paterno_Profesor">Apellido Paterno</label>
              <input type="Text" class="form-control" id="Apellido_Paterno_Profesor" placeholder="Apellido Paterno" name="Apellido_Paterno_Profesor">
            </div>
            <div class="form-group">
              <label for="Direccion_Profesor">Direccion</label>
              <input type="Text" class="form-control" id="Direccion_Profesor" placeholder="Direccion" name="Direccion_Profesor">
            </div>
            <div class="form-group">
              <label for="Correo_profesor">Correo</label>
              <input type="mail" class="form-control" id="Correo_profesor" name="Correo_profesor" placeholder="test@test.com">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="Apellido_Materno_Profesor">Apellido Materno</label>
              <input type="text" class="form-control" id="Apellido_Materno_Profesor" aria-describedby="Apellido_Materno_Profesor" placeholder="Apellido Materno" name="Apellido_Materno_Profesor">
            </div>
            <div class="form-group">
              <label for="Telefono_Profesor">Telefono</label>
              <input type="Text" class="form-control" id="Telefono_Profesor" placeholder="5511225588" name="Telefono_Profesor">
            </div>
            <div class="form-group">
              <label for="Genero_Profesor">Genero</label>
              <input type="Text" class="form-control" id="Genero_Profesor" placeholder="Genero_Profesor" name="Genero_Profesor">
            </div>
            <div class="form-group">
              <label for="Fotogafia_Profesor">Fotogafia</label>
              <input type="file" class="form-control-file" id="Fotogafia_Profesor" name="Fotogafia_Profesor">
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row text-center">
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Enviar</button>
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
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Paterno</th>
            <th scope="col">Materno</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Direccion</th>
            <th scope="col">Genero</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Borrar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM `profesor`";
          $consulta = mysqli_query($connect, $query);

          if ($consulta) {
            while ($row = mysqli_fetch_array($consulta)) {
          ?>
              <tr>
                <td colspan="1"><img src="<?php echo "./ImgUsers/Profesores/" . $row['profesor_foto'] ?>" alt="<?php echo $row['profesor_foto'] ?>" height="40" width="40"></td>
                <td colspan="1"><?php echo $row['profesor_id'] ?></td>
                <td colspan="1"><?php echo $row['profesor_nombre'] ?></td>
                <td colspan="1"><?php echo $row['profesor_apaterno'] ?></td>
                <td colspan="1"><?php echo $row['profesor_amaterno'] ?></td>
                <td colspan="1"><?php echo $row['profesor_amaterno'] ?></td>
                <td colspan="1"><?php echo $row['profesor_correo'] ?></td>
                <td colspan="1"><?php echo $row['profesor_direccion'] ?></td>
                <td colspan="1"><?php echo $row['profesor_genero'] ?></td>
                <td colspan="1">
                  <a href="#" class="btn" onclick="confirmDelete(event, '<?php echo $row['profesor_id']; ?>', 'Profesores')">
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