<main class="container">
  <div class="row mt-4">
    <div class="col-12 text-center">
      <h1>Materias</h1>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-12">
      <form id="Materias" onsubmit="return validateFormMaterias(event)">
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="ID_Materia">ID Materia</label>
              <input type="Text" class="form-control" id="ID_Materia" name="ID_Materia" aria-describedby="ID_Materia" placeholder="ID Materia">
            </div>
            <div class="form-group">
              <label for="Materia_Materia">Materia</label>
              <input type="Text" class="form-control" id="Materia_Materia" name="Materia_Materia" aria-describedby="Materia_Materia" placeholder="Materia">
            </div>
            <div class="form-group">
              <label for="Semestre_Materia">Semestre</label>
              <input type="Text" class="form-control" id="Semestre_Materia" name="Semestre_Materia" aria-describedby="Semestre_Materia" placeholder="Semestre">
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
      <h2>Historial Alumnos</h2>
    </div>
  </div>
  <div class="row mt-4">

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Materia</th>
          <th scope="col">Semestre</th>
          <th scope="col">Eliminar</th>
          <th scope="col">Editar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM `materia`";
        $consulta = mysqli_query($connect, $query);

        if ($consulta) {
          while ($row = mysqli_fetch_array($consulta)) {
        ?>
            <tr>
              <td colspan="1"><?php echo $row['materia_id'] ?></td>
              <td colspan="1"><?php echo $row['materia_nombre'] ?></td>
              <td colspan="1"><?php echo $row['semestre'] ?></td>
              <td colspan="1">
                <a href="#" class="btn" onclick="confirmDelete(event, '<?php echo $row['materia_id']; ?>', 'Materias')">
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