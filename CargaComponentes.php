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
            <div class="col-xs-3"></div>
            <div class="col-xs-6">
            <div class="contenedor">
                    <h3>Formulario</h3>
                    <h4>Nuevo Componente</h4>
                    <form action="" id="formulario-componente">
                        <div class="contenedor-inputs">
                            <div class="input-group">  
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Descripcion" id="descripcion" required>
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class=" glyphicon glyphicon-sort-by-order"></i>
                                </span> 
                                <input type="number" class="form-control" placeholder="Numero de componente" id="numcomp" required>
                                
                                <span class="input-group-addon">
                                    <i class=" glyphicon glyphicon-globe "></i>  
                                </span>
                                <input type="text" class="form-control" placeholder="Ubicacion" id="ubicacion" required>
                            </div>
                            <br> 
                        </div>
                         <input type="submit" class="btn btn-success btn-block" value="registrar" id="btn-guardarRegistro">
                    </form>
                </div>
            </div>
            <div class="col-xs-3"></div>
                
            </div>
        </div>            
    </section>
  </div>   
  <!-- /.content-wrapper -->
  <?php include('contenido-index/footer.php'); ?>
</div>
<?php include('contenido-index/librerias.php'); ?>
<script src="javascript/cargaComponentes.js"></script>
  <!-- Control Sidebar -->
</body>
<!-- ./wrapper -->
</html>
