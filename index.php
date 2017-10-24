<!DOCTYPE html>
<html lang="es">

<head>
    <title>Logistica</title>
    <?php
    
        require_once($_SERVER['DOCUMENT_ROOT'].'/resources/config.php');  
    
    ?>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top my-navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                <a class="navbar-brand" href="index.php">Logistica</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <li><a href="#">Default</a></li>
                    <li class="active"><a href="/logistica/login.php">Acceder<span class="sr-only">(current)</span></a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container-fluid no-padding">
        <div class="row">
            <img src="/resources/images/index.jpg" alt="" class="img-responsive">
            <div class="message">
                <h1>Logistica</h1>
                <p class="hidde">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-lg-4">
                <div class="thumbnail">
                    <img src="/resources/images/flota.png" alt="...">
                    <div class="caption">
                        <h3>Title</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4">
                <div class="thumbnail">
                    <img src="/resources/images/transporte.png" alt="...">
                    <div class="caption">
                        <h3>Title</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4">
                <div class="thumbnail">
                    <img src="/resources/images/almacen.png" alt="...">
                    <div class="caption">
                        <h3>Title</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>