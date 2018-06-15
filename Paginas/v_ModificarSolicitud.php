<?php session_start(); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>

        <link type="text/css" rel="stylesheet" href="css/style_6.css"/>
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

                        if (trim($_SESSION["nombre"]) != "admin") {
                            ?> 
                            <li><a href="v_AgregarPostulante.php">Crear Solicitud</a></li>
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
                <div class="container image">
                    <div class="container pt-5 col-12">
                        <br>
                        <?php
                        include_once '../Dto/PostulanteDto.php';
                        include_once '../Dao/PostulanteDaoImp.php';
                        include_once '../Dao/ComunaDaoImp.php';
                        include_once '../Dao/EducacionDaoImp.php';
                        include_once '../Dao/EstadoCivilDaoImp.php';
                        include_once '../Dao/RentaDaoImp.php';
                        if (isset($_SESSION["salida"])) {
                            $dto = new PostulanteDto();
                            $solicitud = new SolicitudDto();

                            $dto = $_SESSION["salida"];
                            $dtoSolicitud = $_SESSION["solicitud"];
                            ?>
                            <form action="s_ModificarSolicitud.php" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-sm-4">
                                        <label for="txtRut">Rut</label>
                                        <input type="text" class="form-control" name="txtRut" id="txtRut" value="<?php echo $dto->getRut(); ?>" required>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="txtTelefono">Telefono</label>
                                        <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" value="<?php echo $dto->getTelefono(); ?>" required>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="txtEmail">Email</label>
                                        <input type="email" class="form-control" name="txtEmail" id="txtEmail" value="<?php echo $dto->getEmail(); ?> " required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-4">
                                        <label for="txtNombre">Nombre</label>
                                        <input type="text" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $dto->getNombre(); ?>" required>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="txtPaterno">Apellido Paterno</label>
                                        <input type="text" class="form-control" name="txtPaterno" id="txtPaterno" value="<?php echo $dto->getAp_paterno(); ?>" required>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="txtMaterno">Apellido Materno</label>
                                        <input type="text" class="form-control" name="txtMaterno" id="txtMaterno" value="<?php echo $dto->getAp_materno(); ?>" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-4">
                                        <label for="txtDireccion">Direccion</label>
                                        <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" value="<?php echo $dto->getDireccion(); ?>" required>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="dropComuna">Comuna</label>
                                        <select class="form-control" name="dropComuna" id="dropComuna">
                                            <?php
                                            $idComuna = $dto->getComuna();
                                            $textoComuna = ComunaDaoImp::IdToText($idComuna);
                                            ?>
                                            <option value="<?php echo $idComuna; ?>" disabled="" selected="true"><?php echo $textoComuna; ?></option>
                                            <?php
                                            include_once '../Dao/ComunaDaoImp.php';
                                            $opcionC = ComunaDaoImp::ListarTodas();
                                            foreach ($opcionC as $valueC) {
                                                echo "<option> $valueC </option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="dateNacimiento">Fecha Nacimiento</label>
                                        <input type="date" class="form-control" name="dateNacimiento" id="dateNacimiento" value="<?php $dto->getFechaNacimiento(); ?>" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-4">
                                        <label for="dropEstadoCivil">Estado Civil</label>
                                        <select class="form-control" name="dropEstadoCivil">
                                            <?php
                                            $idEstado = $dto->getEstadoCivil();
                                            $textoEstado = EstadoCivilDaoImp::IdToText($idEstado);
                                            ?>
                                            <option value="<?php echo $idEstado; ?>" disabled="" selected="true"><?php echo $textoEstado; ?></option>
                                            <?php
                                            include_once '../Dao/EstadoCivilDaoImp.php';
                                            $opcionEs = EstadoCivilDaoImp::Listar();
                                            foreach ($opcionEs as $valueEs) {
                                                echo "<option> $valueEs </option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="form-row">Sexo</label>
                                        <?php $sexo = $dto->getSexo(); ?>

                                        <?php if ($sexo == "M") {
                                            ?>
                                            <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input class="form-check-input" type="radio" name="radioSexo" id="radioSexo" value="M" checked  autocomplete="off">
                                                <label class="form-check-label" for="inlineRadio1">Masculino</label>
                                            </div>
                                            <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input class="form-check-input" type="radio" name="radioSexo" id="radioSexo" value="F">
                                                <label class="form-check-label" for="inlineRadio2">Femenino</label>
                                            </div>
                                        <?php } if ($sexo == "F") { ?>
                                            <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input class="form-check-input" type="radio" name="radioSexo" id="radioSexo" value="M">
                                                <label class="form-check-label" for="inlineRadio1">Masculino</label>
                                            </div>
                                            <div class="form-check form-check-inline">&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input class="form-check-input" type="radio" name="radioSexo" id="radioSexo" value="F" checked  autocomplete="off">
                                                <label class="form-check-label" for="inlineRadio2">Femenino</label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-4">
                                        <label for="dropEducacion">Educación</label>
                                        <select class="form-control" name="dropEducacion">
                                            <?php
                                            $idEducacion = $dto->getEducacion();
                                            $textoEducacion = EducacionDaoImp::IdToText($idEducacion);
                                            ?>

                                            <option value="<?php echo $idEducacion; ?>" disabled="" selected="true"><?php echo $textoEducacion; ?></option>
                                            <?php
                                            include_once '../Dao/EducacionDaoImp.php';
                                            $opcionEd = EducacionDaoImp::Listar();
                                            foreach ($opcionEd as $valueE) {
                                                echo "<option> $valueE </option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="dropRenta">Renta</label>
                                        <select class="form-control" name="dropRenta">
                                            <?php
                                            $idRenta = $dto->getRenta();
                                            $textoRenta = RentaDaoImp::IdToText($idRenta);
                                            ?>
                                            <option value="<?php echo $idRenta; ?>" disabled="" selected="true"><?php echo $textoRenta; ?></option>
                                            <?php
                                            include_once '../Dao/RentaDaoImp.php';
                                            $opcionR = RentaDaoImp::Listar();
                                            foreach ($opcionR as $valueR) {
                                                echo "<option> $valueR </option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="txtSueldoLiquido">Sueldo Líquido</label>
                                        <input type="text" class="form-control" name="txtSueldoLiquido" id="txtSueldoLiquido" value="<?php echo $dto->getSueldo(); ?>" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-4">
                                        <?php $hijos = $dto->getHijos(); ?>

                                        <?php if ($hijos == 0) { ?>
                                            <div class = "form-check">
                                                <input class = "form-check-input" type = "checkbox" value = "ON" id = "checkHijos" name = "checkHijos">
                                                <label class = "form-check-label" for = "checkHijos">Hijos</label>
                                            </div>
                                            <div class = "float-right col-sm-4 pl-2">
                                                <input disabled="disabled" class="form-control" type="text" id = "txtHijos" name = "txtHijos" value = "<?php echo $dto->getHijos(); ?>"/>
                                                <label class = "text-muted" for="txtHijos">Cantidad</label>
                                            </div>
                                        <?php } ?>
                                        <?php if ($hijos != 0) { ?>
                                            <div class = "form-check">
                                                <input class = "form-check-input" type = "checkbox" value = "ON" id = "checkHijos" name = "checkHijos" checked>
                                                <label class = "form-check-label" for = "checkHijos">Hijos</label>
                                            </div>
                                            <div class = "float-right col-sm-4 pl-2">
                                                <input class="form-control" type = "text" id = "txtHijos" name = "txtHijos" value = "<?php echo $dto->getHijos(); ?>"/>
                                                <label class = "text-muted" for="txtHijos">Cantidad</label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-4">
                                        <?php
                                        $enfermedad = $dto->getEnfermedad();

                                        if ($enfermedad) {
                                            ?>
                                            <div class="form-check">&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input class="form-check-input" type="checkbox" value="ON" id="checkEnfermedad" value="ON" checked>
                                                <label class="form-check-label" for="checkEnfermedad">Padece Enfermedades Crónicas</label>
                                            </div> 
                                        <?php } ?>
                                        <?php if (!$enfermedad) { ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="ON" id="checkEnfermedad" value="ON">
                                                <label class="form-check-label" for="checkEnfermedad">Padece Enfermedades Crónicas</label>
                                            </div> 
                                        <?php } ?>
                                    </div>                                    
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <?php $estado = SolicitudDaoImp::MostrarEstadoPorRut($dto->getRut()); ?>
                                        <label>Estado</label>
                                        <?php if ($estado == 1) { ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioEstado" id="radioEstado" value= "1" checked="true" autocomplete="off">
                                                <label class="form-check-label" for="radioEstado1">Pendiente</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioEstado" id="radioEstado" value= "2">
                                                <label class="form-check-label" for="radioEstado2">Aprobar</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radioEstado" id="radioEstado" value= "3">
                                                <label class="form-check-label" for="radioEstado3">Rechazar</label>
                                            </div>
                                        <?php } ?>

                                        <?php if ($estado == 2) { ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="radioEstado" id="radioEstado" value= "1">
                                                <label class="form-check-label" for="radioEstado1">Pendiente</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radioEstado" id="radioEstado" value= "2" checked="true" autocomplete="off">
                                                <label class="form-check-label" for="radioEstado2">Aprobar</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radioEstado" id="radioEstado" value= "3">
                                                <label class="form-check-label" for="radioEstado3">Rechazar</label>
                                            </div>
                                        <?php } ?>

                                        <?php if ($estado == 3) { ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radioEstado" id="radioEstado" value= "1" >
                                                <label class="form-check-label" for="radioEstado1">Pendiente</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radioEstado" id="radioEstado" value= "2">
                                                <label class="form-check-label" for="radioEstado2">Aprobar</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radioEstado" id="radioEstado" value= "3" checked="true" autocomplete="off">
                                                <label class="form-check-label" for="radioEstado3">Rechazar</label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="form-row">
                                <br>
                                <input type ="hidden" name="rutModificar" value="<?php echo $dto->getRut(); ?>"/>
                                <input type="submit" class="btn btn-success btn-sm btn-block" value="Actualizar" name="btnActualizar" value="" />
                            </div>
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

            $(function () {
                $("#checkHijos").click(function () {
                    if ($(this).is(":checked")) {
                        $("#txtHijos").removeAttr("disabled");
                        $("#txtHijos").focus();
                    } else {
                        $("#txtHijos").attr("disabled", "disabled");
                    }
                });
            });

            function Error() {
                swal({
                    title: "Error!",
                    text: "Error al enviar solicitud!",
                    icon: "error",
                    button: "Cerrar"
                });
            }

            function Success() {
                swal({
                    title: "Exito",
                    text: "Solicitud enviada!",
                    icon: "success",
                    button: "Cerrar"
                });
            }
        </script>

    </body>
</html>
