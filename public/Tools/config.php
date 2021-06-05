<?php
session_start();
if(!isset($_SESSION['type'])){
    header("Location: /login.html");
}
//DB conn settings
include_once('pdo.php');
define('DATABASE_NAME', 'tutoria');
define('DATABASE_USER', 'user');
define('DATABASE_PASS', 'pass');
define('DATABASE_HOST', 'localhost');

$db = new DBPDO();

//Comon variables
$type = $_SESSION['type'];
switch($type){
  case "alumno":
    $id=$_SESSION['id'];
    $result = $db->fetchAll("select * from alumnos where id_alumno = $id");
    foreach($result as $element){
        $name = $element['nombre_alumno']." ".$element['apellido_alumno'];
    }
    break;
  case "tutor":
    $id=$_SESSION['id'];
    $result = $db->fetchAll("select * from tutors where id_tutor = $id");
    foreach($result as $element){
        $name = $element['nombre_tutor']." ".$element['apellido_tutor'];
    }
    break;
  default:
    $name = "Administrador";
}


//Build functions
function alumnoMenu(){
    echo '<li class="nav-header">Tutorías</li>

    <li class="nav-item">
      <a href="/alumno/tutorias.php" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Mis tutorías
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/alumno/tareas.php" class="nav-link">
        <i class="nav-icon fas fa-user-graduate"></i>
        <p>
          Tareas
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/alumno/objetivos.php" class="nav-link">
        <i class="nav-icon fas fa-user-graduate"></i>
        <p>
          Objetivos
        </p>
      </a>
    </li>
    

    <!--li class="nav-header">Estadísticas</li-->

    <li class="nav-header">Configuración</li>

    <li class="nav-item">
      <a href="/perfil.php" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Perfil
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/closeSession.php" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Cerrar sesión
        </p>
      </a>
    </li>';
}

function tutorMenu(){
    echo '<li class="nav-header">Tutorías</li>

    <li class="nav-item">
      <a href="/tutor/alumnos.php" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Alumnos
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/tutor/tareas.php" class="nav-link">
        <i class="nav-icon fas fa-user-graduate"></i>
        <p>
          Tareas
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/tutor/objetivos.php" class="nav-link">
        <i class="nav-icon fas fa-chalkboard-teacher"></i>
        <p>
          Objetivos
        </p>
      </a>
    </li>
    

    <li class="nav-header">Estadísticas</li>

    <li class="nav-header">Configuración</li>

    <li class="nav-item">
      <a href="/perfil.php" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Perfil
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/closeSession.php" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Cerrar sesión
        </p>
      </a>
    </li>';
}

function adminMenu(){
    echo '<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    
    <li class="nav-header">Administración</li>

    <li class="nav-item">
      <a href="/admin/categorias.php" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Categorías
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/alumnos.php" class="nav-link">
        <i class="nav-icon fas fa-user-graduate"></i>
        <p>
          Alumnos
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/tutores.php" class="nav-link">
        <i class="nav-icon fas fa-chalkboard-teacher"></i>
        <p>
          Tutores
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/objetivos.php" class="nav-link">
        <i class="nav-icon fas fa-bullseye"></i>
        <p>
          Objetivos
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/tareas.php" class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>
          Tareas
        </p>
      </a>
    </li>

    <li class="nav-header">Estadísticas</li>

    <li class="nav-item">
      <a href="/closeSession.php" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Cerrar sesión
        </p>
      </a>
    </li>';
}

function headers(){
  echo '<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TutoLine</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/adminlte.min.css">
</head>';
}

function footer(){
  echo '<!-- jQuery -->
  <script src="/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/js/adminlte.min.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      $(\'#dataTable\').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>';
}

function navBar(){
  echo '<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->';
}
?>
