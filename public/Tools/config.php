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

//Menu options



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
      <a href="Controller/default.php?route1=1" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Categorías
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="Controller/default.php?route1=2" class="nav-link">
        <i class="nav-icon fas fa-user-graduate"></i>
        <p>
          Alumnos
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="Controller/default.php?route1=3" class="nav-link">
        <i class="nav-icon fas fa-chalkboard-teacher"></i>
        <p>
          Tutores
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-bullseye"></i>
        <p>
          Objetivos
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>
          Tareas
        </p>
      </a>
    </li>

    <li class="nav-header">Estadísticas</li>

    <li class="nav-header">Configuración</li>

    <li class="nav-item">
      <a href="#" class="nav-link">
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
    </li>
';
}
?>
