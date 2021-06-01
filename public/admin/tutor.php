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
    $formacion = $_POST['formacion'];
    $categoria = $_POST['categoria'];
    include_once('Model/tutor.php');
    $element = new Tutor();
    $element->get($id,$db);
    $element->nombre_tutor=$nombre;
    $element->apellido_tutor=$apellido;
    $element->fecha_nacimiento_tutor=$fecha;
    $element->email_tutor=$email;
    $element->password_tutor=$password;
    $element->formacion_academica=$formacion;
    $element->categorias_id_categoria=$categoria;
    $element->save($db);
    header("Location: /admin/tutores.php");
    
}

if($id!=0){
    $result = $db->fetchAll("select * from tutors where id_tutor = $id");
    foreach($result as $element){
        $name = $element['nombre_tutor']." ".$element['apellido_tutor'];
        $nombre = $element['nombre_tutor'];
        $apellido = $element['apellido_tutor'];
        $fecha = $element['fecha_nacimiento_tutor'];
        $telefono = $element['telefono_tutor'];
        $email = $element['email_tutor'];
        $password = $element['password_tutor'];
        $formacion = $element['formacion_academica'];
        $categoria = $element['categorias_id_categoria'];
        $fecha = explode(" ", $fecha)[0];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
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
  <!-- /.navbar -->

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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perfil</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Alumno</h3>
        </div>
        <div class="card-body">
            <form action="tutor.php" method="post">
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
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Formación" name="formacion" value="<?php echo $formacion; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-university"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Categoria" name="categoria" value="<?php echo $categoria; ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
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

<!-- jQuery -->
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
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
