<?php
include_once('../Tools/config.php');
if(isset($_GET['passport']))
    $id=$_GET['passport'];
else
    $id = 0;

if(isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    include_once('../Model/alumno.php');
    $element = new Alumno();
    $element->get($id,$db);
    $element->nombre_alumno=$nombre;
    $element->apellido_alumno=$apellido;
    $element->fecha_nacimiento_alumno=$fecha;
    $element->email_alumno=$email;
    $element->password_alumno=$password;
    $element->save($db);
    header("Location: /admin/alumnos.php");
}

if($id!=0){
    $result = $db->fetchAll("select * from alumnos where id_alumno = $id");
    foreach($result as $element){
        $name = $element['nombre_alumno']." ".$element['apellido_alumno'];
        $nombre = $element['nombre_alumno'];
        $apellido = $element['apellido_alumno'];
        $fecha = $element['fecha_nacimiento_alumno'];
        $telefono = $element['telefono_alumno'];
        $email = $element['email_alumno'];
        $password = $element['password_alumno'];
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
          <h3 class="card-title">Alumno</h3>
        </div>
        <div class="card-body">
            <form action="alumno.php?passport=<?php echo $id; ?>" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $nombre; ?>"">
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-user"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Apellido" name="apellido" value="<?php echo $apellido; ?>">
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-user"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="date" class="form-control" placeholder="Fecha nacimiento" name="fecha" value="<?php echo $fecha; ?>">
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-calendar"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="tel" class="form-control" placeholder="Telefono" name="telefono" value="<?php echo $telefono; ?>">
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-phone"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>">
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $password; ?>">
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-lock"></span>
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
