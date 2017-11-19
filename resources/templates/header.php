<nav class='navbar navbar-default'>
    <div class='container-fluid'>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
        <span class='sr-only'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
            <button type='button' class='navbar-toggle navbar-toggle-left collapsed' id='menu-toggle'>
        <span class='sr-only'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
            <a class='navbar-brand' href='ppal.php'>Inicio</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
            <ul class='nav navbar-nav navbar-right'>
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><?php echo 'Bienvenido, '.$_SESSION['usuario']; ?><span class='caret'></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href='logout.php' class='btn btn-danger' onmouseover="this.style.color= 'black';" onmouseout="this.style.color= 'white';" style="color: white;">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    <!-- /.navbar-collapse -->
    </div>
<!-- /.container-fluid -->
</nav>