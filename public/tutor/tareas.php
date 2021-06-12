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
    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <!--h3 class="card-title">Tareas</h3-->
          <a href="tarea.php?id=0" class="btn btn-primary">Nueva Tarea</a>
        </div>
        <div class="card-body">
          <table id="dataTable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Alumno</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Calificación</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result = $db->fetchAll("select *,(select concat(nombre_alumno,' ',apellido_alumno) from alumnos where id_alumno=alumno_id_alumno) alumno from tareas where tutor_id_tutor = $id");
              foreach($result as $element){
              ?>
              <tr>
                <?php
                  $result = $db->fetchAll("select count(id_tarea) as total from tareas where alumno_id_alumno = ".$element['alumno_id_alumno']);
                  foreach($result as $element){
                      $total = intval($element['total']);
                  }
                  if($total<11)
                    $createURL = "tarea.php?alumno=".$element['alumno_id_alumno'];
                  else
                    $createURL = "#";
                ?>
                <td><a href="<?php echo $createURL; ?>" class="btn btn-info"><?php echo $element['alumno']; ?> + </a></td>
                <td><?php echo $element['nombre_tarea']; ?></td>
                <td><?php echo $element['descripcion_tarea']; ?></td>
                <td><?php echo $element['calificacion_tarea']; ?></td>
                <?php
                  $editar = "#"; $calificar ="#"; $disabled = " disabled";
                  $estado = $element['estado_tarea'];
                  if($estado != "Completado"){
                    $editar = "tarea.php?passport=".$element['id_tarea']."&mode=editar";
                    $calificar = "tarea.php?passport=".$element['id_tarea']."&mode=calificar";
                    $disabled = "";
                  }
                ?>
                <td><a href="<?php echo $editar; ?>" class="btn btn-info<?php echo $disabled;?>">Editar</a><a href="<?php echo $calificar; ?>" class="btn btn-danger<?php echo $disabled;?>">Calificar</a></td>
              </tr>
              <?php
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Alumno</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Calificación</th>
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
