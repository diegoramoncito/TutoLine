<?php
include_once('../Tools/config.php');
$tutor = $id;
if(isset($_GET['passport']))
    $id=$_GET['passport'];
else
    $id = 0;

if(isset($_GET['alumno']))
    $alumno=$_GET['alumno'];
else
    $alumno = 0;

if(isset($_GET['mode']))
    $mode=$_GET['mode'];
else
    $mode = "";

if(isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $alumno = $_POST['alumno'];
    $fecha = $_POST['fecha'];
    if(is_numeric($_POST['calificacion']))
        $calificacion = number_format($_POST['calificacion'], 2);
    else
        $calificacion = 0;
    $comentarios = $_POST['comentarios'];
    $entregable = $_POST['entregable'];
    include_once('../Model/tarea.php');
    $element = new Tarea();
    $element->get($id,$db);
    $element->nombre_tarea=$nombre;
    $element->descripcion_tarea=$descripcion;
    $element->estado_tarea=$estado;
    if(isset($_POST['fecha']))$element->fecha_entrega=$fecha;
    $element->calificacion_tarea=$calificacion;
    $element->comentarios_tarea=$comentarios;
    $element->entregable_tarea=$entregable;
    if(isset($_POST['alumno']))$element->alumno_id_alumno=$alumno;
    $element->tutor_id_tutor=$tutor;
    $element->save($db);
    header("Location: /tutor/tareas.php");
}

if($id!=0){
    $result = $db->fetchAll("select * from tareas where id_tarea = $id");
    foreach($result as $element){
        $nombre = $element['nombre_tarea'];
        $descripcion = $element['descripcion_tarea'];
        $estado = $element['estado_tarea'];
        $fecha = $element['fecha_entrega'];
        $calificacion = $element['calificacion_tarea'];
        $comentarios = $element['comentarios_tarea'];
        $entregable = $element['entregable_tarea'];
        $alumno = $element['alumno_id_alumno'];
        $tutor = $element['tutor_id_tutor'];
        $fecha = explode(" ", $fecha)[0];
    }
}

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
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tarea</h3>
        </div>
        <div class="card-body">
            <form action="tarea.php?passport=<?php echo $id; ?>" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $nombre; ?>"" <?php if($mode == "calificar") echo 'readonly="readonly"'; ?>>
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-user"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" value="<?php echo $descripcion; ?>" <?php if($mode == "calificar") echo 'readonly="readonly"'; ?>>
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-user"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                    <select name="estado" id="estado" class="custom-select custom-select-sm">
                        <option value="" disabled <?php if(!isset($estado)) echo "selected"; ?>>Seleccione</option>
                        <option value="Por completar" <?php if($estado == "Por completar") echo "selected";?>>Por completar</option>
                        <option value="En progreso" <?php if($estado == "En progreso") echo "selected";?>>En progreso</option>
                        <option value="Completado" <?php if($estado == "Completado") echo "selected";?>>Completado</option>
                    </select>
                    
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-list-alt"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                  <input type="date" class="form-control" placeholder="Fecha entrega" name="fecha" value="<?php echo $fecha; ?>" <?php if($mode == "calificar") echo 'readonly="readonly"'; ?>>
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-calendar"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="number" step="any" class="form-control" placeholder="Calificación" name="calificacion" value="<?php echo $calificacion; ?>">
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-user"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Comentarios" name="comentarios" value="<?php echo $comentarios; ?>">
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-user"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3" disabled>
                  <input type="text" class="form-control" placeholder="Entregable" name="entregable" value="<?php echo $entregable; ?>" <?php if($mode == "calificar") echo 'readonly="readonly"'; ?>>
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-user"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                    <select name="alumno" id="alumno" class="custom-select custom-select-sm" <?php if($mode == "editar" || $mode == "calificar") echo 'disabled'; ?>>
                        <option value="" disabled <?php if(!isset($alumno)) echo "selected"; ?>>Seleccione</option>
                        <?php
                        $result = $db->fetchAll("select * from alumnos where id_alumno in (select distinct id_alumno from tutoralumno where id_tutor = $tutor)");
                        foreach($result as $element){?>
                        <option value="<?php echo $element['id_alumno'];?>" <?php if($alumno == $element['id_alumno']) echo "selected";?>><?php echo $element['nombre_alumno']." ".$element['apellido_alumno'].""; ?></option>
                        <?php } ?>
                    </select>
                    
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-user-graduate"></span>
                        </div>
                    </div>
                </div><div class="input-group mb-3">
                    <select name="tutor" id="tutor" class="custom-select custom-select-sm" disabled>
                        <option value="" disabled <?php if(!isset($tutor)) echo "selected"; ?>>Seleccione</option>
                        <?php
                        $result = $db->fetchAll("select * from tutors");
                        foreach($result as $element){?>
                        <option value="<?php echo $element['id_tutor'];?>" <?php if($tutor == $element['id_tutor']) echo "selected";?>><?php echo $element['nombre_tutor']." ".$element['apellido_tutor'].""; ?></option>
                        <?php } ?>
                    </select>
                    
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-chalkboard-teacher"></span>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                </div>
                <!-- /.col -->
                </div>
            </form> 
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
