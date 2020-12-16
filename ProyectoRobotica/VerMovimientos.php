<!DOCTYPE html>
<html>
<head>
<?php include('contenido-index/head.php'); ?>
</head>
<body class="hold-transition skin-purple-light sidebar-mini">
<div class="wrapper">
<?php include('contenido-index/header-sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bienvenidos
        <small>Proyecto robotica</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Movimientos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
 
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Movimientos:</h3>
                    <input type="date" placeholder="DESDE" id="fechaDesde">
                    <input type="date" placeholder="HASTA" id="fechaHasta">
                    <button type="submit" class="btn btn-default" id="search"><i class="fa fa-search"></i></button>
                    <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 200px;">
                            <input type="search" name="table_search" class="form-control pull-right" placeholder="Search" id="searchComponente">             
                        </div> 
                    </div>                

                </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <thead>
                    <tr>
                        <th>ID MOV</th>
                        <th>FECHA</th>
                        <th>COMPONENTE</th>
                        <th>VALOR</th>
                        <th>ESTADO</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody id="movimientos">
            
                  </tbody>
                </table>
              </div>

              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        

      </div>
    </section>
  </div>   
</div>
  <!-- /.content-wrapper -->
  <?php include('contenido-index/footer.php'); ?>
</div>
</div>
<?php include('contenido-index/librerias.php'); ?>
<script src="javascript/verMovimientos.js"></script>
  <!-- Control Sidebar -->
</body>
<!-- ./wrapper -->
</html>
