<?php
include_once('../Tools/config.php');


?>
<!DOCTYPE html>
<html lang="en">
<?php headers(); ?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php navBar(); ?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="/img/AdminLTELogo.png"class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">TutoLine</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/user2-160x160.jpg" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php  echo $name; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <?php
          tutorMenu();
          ?>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          
        </div>
        <div class="card-body">
          <table id="dataTable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Alumno</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php $result = $db->fetchAll("select *,(select concat(nombre_alumno,' ',apellido_alumno) from alumnos where id_alumno= alumno_id_alumno) as alumno from objetivos");
                    foreach($result as $element){ ?>
              <tr>
                <td><?php echo $element['nombre_objetivo']; ?></td>
                <td><?php echo $element['descripcion_objetivo']; ?></td>
                <td><?php echo $element['alumno']; ?></td>
                <td><a href="/tutors/1/edit" class="btn btn-info">Editar</a><a href="/tutors/1/edit" class="btn btn-danger">Eliminar</a></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Alumno</th>
                <th>Opciones</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->
<?php footer(); ?>
</body>
</html>
