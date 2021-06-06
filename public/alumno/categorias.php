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
          alumnoMenu();
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
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tutorias</h3>
        </div>
        <div class="card-body">
          <table id="dataTable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Materia</th>
                <th>Dificultad</th>
                <th>Perfil</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php $result = $db->fetchAll("select *,(select nombre_categoria from categorias where id_categoria = categorias_id_categoria) materia, (select dificultad from categorias where id_categoria = categorias_id_categoria) dificultad from tutors where id_tutor not in (select distinct id_tutor from tutoralumno where id_alumno=$id))");
                    foreach($result as $element){ ?>
              <tr>
                <td><?php echo $element['nombre_tutor']." ". $element['apellido_tutor']; ?></td>
                <td><?php echo $element['materia']; ?></td>
                <td><?php echo $element['dificultad']; ?></td>
                <td><?php echo $element['formacion_academica']; ?></td>
                <td><a href="controller.php?route2=1&passport=<?php echo $element['id_tutor']; ?>" class="btn btn-danger">Contratar</a></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Materia</th>
                <th>Dificultad</th>
                <th>Perfil</th>
                <th>Opciones</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
        
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
