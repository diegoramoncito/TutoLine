<?php
include_once('Tools/config.php');


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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Page title</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- BAR CHART -->
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Estudiantes</h3>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
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
<script src="../../plugins/chart.js/Chart.min.js"></script>
<?php
$query = "select concat(nombre_alumno,' ',apellido_alumno)"
$query .= ",(select sum(calificacion_tarea) from tareas where alumno_id_alumno = al.id_alumno and tutor_id_tutor = $id ) tareas"
$query .= ",(select count(id_objetivo)*20 from objetivos where alumno_id_alumno = al.id_alumno and tutor_id_tutor = $id and estado_objetivo = 'Completado') objetivos"
$query .= ",() fecha"
$query .= " from alumnos al where id_alumno in (select id_alumno from tutoralumno where id_tutor = $id);";
$result = $db->fetchAll("select id_tarea, nombre_tarea, alumno_id_alumno, tutor_id_tutor, estado_tarea, DATEDIFF(fecha_entrega, updated_at) as days from tareas");

?>
<script>
  $(function () {

    var areaChartData = {
      labels  : ['Enero', 'Febrero', 'Marzo'],
      datasets: [
        {
          label               : 'Tareas',
          backgroundColor     : 'rgba(130,170,194,0.9)',
          borderColor         : 'rgba(130,170,194,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(130,170,194,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(130,170,194,1)',
          data                : [1, 2, 3]
        },
        {
          label               : 'Objetivos',
          backgroundColor     : 'rgba(161, 200, 224, 1)',
          borderColor         : 'rgba(161, 200, 224, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(161, 200, 224, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(161,200,224,1)',
          data                : [6, 5, 4]
        },
        {
          label               : 'Fecha de envio',
          backgroundColor     : 'rgba(192, 232, 255, 1)',
          borderColor         : 'rgba(192, 232, 255, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(192, 232, 255, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(192,232,255,1)',
          data                : [9, 8, 7]
        },
        {
          label               : 'Total EXCELENCIA',
          backgroundColor     : 'rgba(43, 84, 109, 1)',
          borderColor         : 'rgba(43, 84, 109, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(43, 84, 109, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(43,84,109,1)',
          data                : [4, 6, 8]
        },
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

  })
</script>

</body>
</html>
