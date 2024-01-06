<?php
require './php/connect.php';
if (isset($_GET['view']) && $_GET['view'] == "Alumno") {
  $variable_get = "Alumno";
} else if (isset($_GET['view']) && $_GET['view'] == "Calificaciones") {
  $variable_get = "Calificaciones";
} else if (isset($_GET['view']) && $_GET['view'] == "Grupos") {
  $variable_get = "Grupos";
} else if (isset($_GET['view']) && $_GET['view'] == "Materias") {
  $variable_get = "Materias";
} else if (isset($_GET['view']) && $_GET['view'] == "Profesores") {
  $variable_get = "Profesores";
} else {
  $variable_get = "Alumno";
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/styles.css">
  <title>Fes Cuautitlan</title>
</head>

<body>
  <!-- Image and text -->
  <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="./images/logo_fesc.png" width="50" height="50" class="d-inline-block align-top" alt="LogoFesCuautitlan">
        <span class="align-middle">Fes Cuautitlan</span>
      </a>
      <div class="collapse navbar-collapse align-middle" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menu
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="?view=Alumnos">Alumnos</a>
              <a class="dropdown-item" href="?view=Profesores">Profesores</a>
              <a class="dropdown-item" href="?view=Grupos">Grupos</a>
              <a class="dropdown-item" href="?view=Materias">Materias</a>
              <a class="dropdown-item" href="?view=Calificaciones">Calificaciones</a>
            </div>
          </li>
        </ul>
      </div>
    </div>

  </nav>

  <?php
  if ($variable_get == "Alumno") {
    include('./views/Alumnos.php');
  } else if ($variable_get == "Calificaciones") {
    include('./views/Calificaciones.php');
  } else if ($variable_get == "Grupos") {
    include('./views/Grupos.php');
  } else if ($variable_get == "Materias") {
    include('./views/Materias.php');
  } else if ($variable_get == "Profesores") {
    include('./views/Profesores.php');
  } else {
    include('./views/Alumnos.php');
  }
  ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="./src/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>