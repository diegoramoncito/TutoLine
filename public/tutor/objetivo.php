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
    $tutor = $_POST['tutor'];
    include_once('../Model/objetivo.php');
    $element = new Objetivo();
    $element->get($id,$db);
    $element->nombre_objetivo=$nombre;
    $element->descripcion_objetivo=$descripcion;
    $element->estado_objetivo=$estado;
    $element->alumno_id_alumno=$alumno;
    $element->tutor_id_tutor=$tutor;
    $element->save($db);
    header("Location: /tutor/objetivos.php");
}

if($id!=0){
    $result = $db->fetchAll("select * from objetivos where id_objetivo = $id");
    foreach($result as $element){
        $nombre = $element['nombre_objetivo'];
        $descripcion = $element['descripcion_objetivo'];
        $estado = $element['estado_objetivo'];
        $alumno = $element['alumno_id_alumno'];
        $tutor = $element['tutor_id_tutor'];
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
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Objetivo</h3>
        </div>
        <div class="card-body">
            <form action="objetivo.php?passport=<?php echo $id; ?>" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $nombre; ?>"">
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-user"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" value="<?php echo $descripcion; ?>">
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
                    <select name="alumno" id="alumno" class="custom-select custom-select-sm">
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
