<?php
include_once('../Tools/config.php');
if(isset($_GET['passport']))
    $id=$_GET['passport'];
else
    $id = 0;


if(isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $dificultad = $_POST['dificultad'];
    include_once('../Model/categoria.php');
    $element = new Categoria();
    $element->get($id,$db);
    $element->nombre_categoria=$nombre;
    $element->descripcion_categoria=$descripcion;
    $element->dificultad=$dificultad;
    $element->save($db);
    header("Location: /admin/categorias.php");
}

if($id!=0){
    $result = $db->fetchAll("select * from categorias where id_categoria = $id");
    foreach($result as $element){
        $nombre = $element['nombre_categoria'];
        $descripcion = $element['descripcion_categoria'];
        $dificultad = $element['dificultad'];
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
          <h3 class="card-title">Categoría</h3>
        </div>
        <div class="card-body">
            <form action="categoria.php?passport=<?php echo $id; ?>" method="post">
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
                    <select name="dificultad" id="dificultad" class="custom-select custom-select-sm">
                        <option value="" disabled <?php if(!isset($dificultad)) echo "selected"; ?>>Seleccione</option>
                        <option value="Principiante" <?php if($dificultad == "Principiante") echo "selected";?>>Principiante</option>
                        <option value="Medio" <?php if($dificultad == "Medio") echo "selected";?>>Medio</option>
                        <option value="Avanzado" <?php if($dificultad == "Avanzado") echo "selected";?>>Avanzado</option>
                    </select>
                    
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-list-alt"></span>
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
