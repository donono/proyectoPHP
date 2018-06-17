<?php session_start(); ?>
<?php
if (!isset($_SESSION["rut"])) {
    echo '<script type="text/javascript">
document.location="v_login.php";
</script>';
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>

        <link type="text/css" rel="stylesheet" href="css/style_1.css"/>
        <!-- font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/inicio.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    </head>
    <body>

        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="fas fa-chevron-left fa-2x"></i>
                </div>

                <div class="sidebar-header">
                    <a href="v_inicio.php"><h3>DAICREDIT</h3></a>
                </div>

                <ul class="list-unstycled components">
                    <p><?php
                        if (isset($_SESSION["nombre"])) {
                            echo $_SESSION["nombre"];
                        } else {
                            echo "no se ha iniciado sesión";
                        }
                        ?>
                    </p>
                    <?php
                    if (isset($_SESSION["nombre"])) {
                        include_once '../Dto/UsuarioDto.php';

                        //desplegar menú segun tipo de usuario en la sesion
                        if (trim($_SESSION["nombre"]) != "admin") {

                            //deshabilitar link "Crear solicitud" si el usuario 
                            //ya posee una solicitud creada
                            include_once '../Dao/SolicitudDaoImp.php';
                            $rut = trim($_SESSION["rut"]);

                            if (SolicitudDaoImp::tieneSolicitud($rut)) {
                                ?> 
                                <li class="disabled"><a class="disabled" href="#">Crear Solicitud</a></li>
                            <?php } else { ?>
                                <li><a href="v_AgregarPostulante.php">Crear Solicitud</a></li>

                            <?php } ?>
                            <li><a href="v_VerEstado.php">Estado Solicitud</a></li>

                        <?php } else { ?>
                            <!-- solo si el usuario es admin, puede ver el listado de solicitudes -->
                            <li><a href="v_VistaQueries.php">Buscar Solicitudes</a></li>
                            <li><a href="v_MostrarTodas.php">Ver Solicitudes</a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </nav>

            <div id="content">

                <!-- barra con boton para desplegar menu y cerrar sesión-->
                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Menú</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="s_logout.php" class="article">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- aqui va el contenido de la página -->
                <?php
                if (isset($_SESSION["rut"])) {
                    include_once '../Dao/SolicitudDaoImp.php';
                    $rut = $_SESSION["rut"];
                    if (SolicitudDaoImp::tieneSolicitud($rut)) {
                        ?>  
                        <div class="container alerta"> 
                            <div class="cont-estado">

                                <div class="estado">
                                    <h3 class="text-center" style="color: white">Usted ya cuenta con una solicitud enviada,
                                        por lo cual, ahora solo puede acceder al estado de ésta.
                                    </h3>
                                </div>                               

                            </div>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
        </div>

        <div class="overlay"></div>


        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#dismiss, .overlay').on('click', function () {
                    $('#sidebar').removeClass('active');
                    $('.overlay').fadeOut();
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').addClass('active');
                    $('.overlay').fadeIn();
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
        </script>
    </body>
</html>
