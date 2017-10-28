<!DOCTYPE html>
<html lang="es">
    
<head>
    <title>Graficos</title>
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');
        $miSession = new Sesion();
        $miSession -> iniciarSesion();
        if($_SESSION['rol']=="chofer"){
            $miSession -> permisos();}
          
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart']});
  
        
    google.charts.setOnLoadCallback(cargarTres);
    function cargarTres(){
        $.ajax({
            url:"total_km_vehiculo.php",
            dataType:"JSON",
            success: dibujar3
        });
    } 
    
    function dibujar3(jsonData){
        var pieData=new google.visualization.arrayToDataTable(jsonData);
        
        var chart3=new google.visualization.ColumnChart(document.getElementById('chart3'));
        chart3.draw(pieData,{title:'Km por vehiculo',height:320,colors: ['red'],});
    }  

  
    </script>
</head>
    
<body>
    <!-- HEADER -->
    <?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/templates/header.php');
    ?>
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
            require_once($_SERVER['DOCUMENT_ROOT'].'/resources/templates/sidebar.php');        
        ?>
        <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h1>Graficos</h1>
                                    <hr/>
                                </div>
                            </div>
                        </div>           
                        <div class="row">
                           
                            <div id="chart3"></div>   

                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>