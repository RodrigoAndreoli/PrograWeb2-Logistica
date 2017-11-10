<div id='sidebar-wrapper'>
    <ul class='sidebar-nav'>
        
        <li>
            <a href='ppal.php'>LOGISTICA</a>
        </li>
        <?php if($_SESSION['rol']=='Supervisor'){ ?>
        <li>
            <a href='vista_usuarios.php'>Usuarios<span class='icon-users'></span></a>
        </li>
        <?php } ?>
        <?php if($_SESSION['rol']=='Administrador' || $_SESSION['rol']=='Mecanico' || $_SESSION['rol']=='Supervisor'){ ?>
        <li>
            <a href='#' data-toggle='collapse' data-target='#reparacion' class='collapsed active'>Mantenimiento<span class='icon-wrench'></span></a>
        </li>
        <ul class='sub-menu collapse' id='reparacion'>
            <li>
                <a href='vista_mantenimientos.php'><i>Reportes de Mantenimiento</i></a>
            </li>
            <li>
                <a href='graficos.php'><i>Graficos</i></a>
            </li>
            <li>
                <a href='service.php'><i>Service</i></a>
            </li>
        </ul>
        
        <li>
            <a href='vista_vehiculos.php' data-toggle='collapse' data-target='#vehiculos' class='collapsed active'>Vehiculos<span class='icon-truck'></span></a>
        </li>
        <?php } ?>
        <?php if($_SESSION['rol']=='Administrador' || $_SESSION['rol']=='Mecanico' || $_SESSION['rol']=='Supervisor' || $_SESSION['rol']=='Chofer'){ ?>
        <li>
            <a href='#' data-toggle='collapse' data-target='#viajes' class='collapsed active'>Viajes<span class='icon-location'></span></a>
        </li>
        <ul class='sub-menu collapse' id='viajes'>
            <li>
                <a href='vista_viajes.php'><i>Viajes</i></a>
            </li>
            <li>
                <a href='vista_reportes.php'><i>Reportes de Viaje</i></a>
            </li>
        </ul>
        <?php } ?>
        <?php if($_SESSION['rol']=='Administrador' || $_SESSION['rol']=='Supervisor'){ ?>
        <li>
            <a href='vista_clientes.php' data-toggle='collapse' data-target='#clientes' class='collapsed active'>Clientes<span class='icon-user'></span></a>
        </li>
        <?php } ?>
        <?php if($_SESSION['rol']=='Supervisor'){ ?>
        <li>
            <a href='vista_presupuestos.php' data-toggle='collapse' data-target='#presupuestos' class='collapsed active'>Presupuestos<span class='icon-wallet'></span></a>
        </li>
        <?php } ?>
    </ul>
</div>
