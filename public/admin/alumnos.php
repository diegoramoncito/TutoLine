<?php
include_once('../Tools/config.php');
$id=$_SESSION['id'];

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
          <a href="#" class="d-block">Administrador</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <?php
          adminMenu();
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
        <a href="alumno.php" class="btn btn-primary">Crear</a>
        </div>
        <div class="card-body">
          <table id="dataTable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result = $db->fetchAll("select * from alumnos");
              foreach($result as $element){
              ?>
              <tr>
                <td><?php echo $element['nombre_alumno']; ?></td>
                <td><?php echo $element['apellido_alumno']; ?></td>
                <td><?php echo $element['email_alumno']; ?></td>
                <td><a href="alumno.php?passport=<?php echo $element['id_alumno']; ?>" class="btn btn-info">Editar</a><a href="delete.php?route1=1&passport=<?php echo $element['id_alumno']; ?>" class="btn btn-danger">Eliminar</a></td>
              </tr>
              <?php
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
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
