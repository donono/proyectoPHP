<!DOCTYPE html>
<?php session_start(); ?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>

        <link type="text/css" rel="stylesheet" href="css/style_2.css"/>
        <!-- font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                    <i class="glyphicon glyphicon-arrow-left"></i>
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


                <form action="s_VistaPorRut.php" method="POST">
                    Búsqueda por Rut
                    <input type="text" name="txtRut" value="" />
                    <input type="submit" value="Mostrar" name="btnVerPorRut" />
       
                </form>



                <div class="container image">
                    <div class="container pt-5">
                        <form action="s_VistaQueries.php" method="POST">
                            Fecha Inicio:
                            <input type="date" name="dateInicio" value="" />
                            Fecha término:
                            <input type="date" name ="dateFin" value=""/>

                            <input type="submit" value="Mostrar" name="btnMostrar" />
                            <br><br>
                            <?php
                            include_once '../Dto/PostulanteDto.php';
                            include_once '../Dao/PostulanteDaoImp.php';
                            include_once '../Dao/SolicitudDaoImp.php';

                            if (isset($_SESSION["salida"])) {
                                $listaPostulantes = $_SESSION["salida"];
                                ?>
                                <table class="table">
                                    <thead class="thead-dark">
                                    <th>Rut</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($listaPostulantes as $postulante) { ?>

                                            <tr >
                                                <td> <?php echo $postulante->getRut(); ?> </td>

                                                <?php $estado = SolicitudDaoImp::MostrarEstadoPorRut($postulante->getRut()); ?>
                                                <?php $texto = SolicitudDaoImp::IdToText($estado); ?>
                                                <td> <?php echo $texto ?> </td>

                                                <td align="center">
                                                    <form action="s_Eliminar.php" method="POST">
                                                        <input type ="hidden" name="rutEliminar" value="<?php echo $postulante->getRut(); ?>"/>
                                                        <button type="submit" class="btn btn-danger" value="" name="btnEliminar"><i class="fas fa-times"></i></button>
                                                    </form>
                                                </td>
                                                <td align="center">
                                                    <form action="s_MostrarPorRut.php" method="POST">
                                                        <input type ="hidden" name="rutMostrar" value="<?php echo $postulante->getRut(); ?>"/>
                                                        <button type="submit" class="btn btn-info" value="Mostrar" name="btnVer"><i class="fas fa-external-link-square-alt"></i></button>
                                                    </form>
                                                </td>
                                                <td align="center">
                                                    <form action="s_SeleccionarModificar.php" method="POST">
                                                        <input type ="hidden" name="rutModificar" value="<?php echo $postulante->getRut(); ?>"/>
                                                        <button type="submit" class="btn btn-primary" value="" name="btnModificar"><i class="fas fa-pencil-alt"></i></button>
                                                    </form>
                                                </td>

                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            <?php }
                            ?>
                        </form>
                    </div>
                </div>

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

