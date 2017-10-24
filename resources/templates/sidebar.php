<div id='sidebar-wrapper'>
    <ul class='sidebar-nav'>
        
        <li>
            <a href='ppal.php'>ADMIN</a>
        </li>
        <?php if($_SESSION['rol']=='supervisor'){ ?>
        <li>
            <a href='usuarios.php'>Usuarios<span class='icon-users'></span></a>
        </li>
        <?php } ?>
        <?php if($_SESSION['rol']=='admin' || $_SESSION['rol']=='mecanico' || $_SESSION['rol']=='supervisor'){ ?>
        <li>
            <a href='#' data-toggle='collapse' data-target='#reparacion' class='collapsed active'>Mantenimiento<span class='icon-wrench'></span></a>
        </li>
        <ul class='sub-menu collapse' id='reparacion'>
            <li>
                <a href='mantenimientoReparacion.php'><i>Reportes</i></a>
            </li>
            <li>
                <a href='reporteReparacion.php'><i>Graficos</i></a>
            </li>
            <li>
                <a href='serviceReparacion.php'><i>Service</i></a>
            </li>
        </ul>
        
        <li>
            <a href='vehiculo.php' data-toggle='collapse' data-target='#vehiculos' class='collapsed active'>Vehiculos<span class='icon-truck'></span></a>
        </li>
        <?php } ?>
        <?php if($_SESSION['rol']=='admin' || $_SESSION['rol']=='mecanico' || $_SESSION['rol']=='supervisor' || $_SESSION['rol']=='chofer'){ ?>
        <li>
            <a href='#' data-toggle='collapse' data-target='#viajes' class='collapsed active'>Viajes<span class='icon-location'></span></a>
        </li>
        <ul class='sub-menu collapse' id='viajes'>
            <li>
                <a href='viajes.php'><i>Reportes</i></a>
            </li>
            <li>
                <a href='#'><i>item</i></a>
            </li>
        </ul>
        <?php } ?>
        <?php if($_SESSION['rol']=='admin' || $_SESSION['rol']=='supervisor'){ ?>
        <li>
            <a href='clientes.php' data-toggle='collapse' data-target='#clientes' class='collapsed active'>Clientes<span class='icon-user'></span></a>
        </li>
        <?php } ?>
        <?php if($_SESSION['rol']=='supervisor'){ ?>
        <li>
            <a href='#' data-toggle='collapse' data-target='#presupuestos' class='collapsed active'>Presupuestos<span class='icon-wallet'></span></a>
        </li>
        <ul class='sub-menu collapse' id='presupuestos'>
            <li>
                <a href='presupuestos.php'><i>Reportes</i></a>
            </li>
        </ul>
        <?php } ?>
    </ul>
</div>
