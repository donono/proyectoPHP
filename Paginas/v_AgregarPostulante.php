<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>

        <link type="text/css" href="css/style_1.css" rel="stylesheet"/>

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

        <script type="text/javascript">
            function Error() {
                swal({
                    title: "Error!",
                    text: "Usuario o contraseña incorrecta!",
                    icon: "error",
                    button: "Cerrar"
                });
            }
            function Success() {
                swal({
                    title: "Exito",
                    text: "Solicitud enviada ",
                    icon: "success",
                    button: "Cerrar"
                });
            }
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

            function cargarDatos() {
<?php include_once '../Dto/UsuarioDto.php'; ?>
<?php $user = $_SESSION['logged'] ?>
                var user = $user;
                document.getElementById('txtRut').value = user.rut;
                document.getElementById('txtNombre').value = user.nombre;
                document.getElementById('txtPaterno').value = user.ap_paterno;
                document.getElementById('txtMaterno').value = user.ap_materno;
            }
        </script>

    </head>
    <body onload="cargarDatos()">
    <body>

        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                </div>

                <div class="sidebar-header">
                    <h3>DAICREDIT</h3>
                </div>

                <ul class="list-unstyled components">
                    <p><?php
                        if (isset($_SESSION["logged"])) {
                            include_once '../Dto/UsuarioDto.php';
                            $dto = new UsuarioDto();
                            $dto = $_SESSION["logged"];
                            echo $dto->getNombre() . ' ' . $dto->getAp_paterno() . ' ' . $dto->getAp_materno();
                        }
                        ?>
                    </p>
                    <li class="active">
                    <li><a href="v_AgregarPostulante.php">Crear Solicitud</a></li>
                    <li><a href="v_EstadoSolicitud.php">Estado Solicitud</a></li>
                    <li><a href="v_VerSolicitudes.php">Ver Solicitudes</a></li>
                </ul>
            </nav>

            <!-- Page Content Holder -->

            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Abrir Menú</span>
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
                <br><br><br>  
                <div class="container image">
                    <div class="container pt-2 inner-div">
                        <div class="col-12">
                            <div class="container col-10 pt-5">


                                <form action="s_AgregarPostulante.php" method="POST">

                                    <div class="form-row">
                                        <div class="form-group col-xs-6">
                                            <label for="txtRut">Rut</label>
                                            <input type="text" class="form-control" name="txtRut" id="txtRut" required>
                                        </div>

                                        <div class="form-group col-xs-6">
                                            <label for="txtTelefono">Telefono</label>
                                            <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" required>
                                        </div>

                                        <div class="form-group col-xs-6">
                                            <label for="txtEmail">Email</label>
                                            <input type="email" class="form-control" name="txtEmail" id="txtEmail" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-xs-6">
                                            <label for="txtNombre">Nombre</label>
                                            <input type="text" class="form-control" name="txtNombre" id="txtNombre" required>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="txtPaterno">Apellido Paterno</label>
                                            <input type="text" class="form-control" name="txtPaterno" id="txtPaterno" required>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="txtMaterno">Apellido Materno</label>
                                            <input type="text" class="form-control" name="txtMaterno" id="txtMaterno" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-xs-6">
                                            <label for="txtDireccion">Direccion</label>
                                            <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" required>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="dropComuna">Comuna</label>
                                            <select class="form-control" name="dropComuna" id="dropComuna">
                                                <option value="" disabled="" selected="true">Seleccionar...</option>
                                                <?php
                                                include_once '../Dao/ComunaDaoImp.php';
                                                $opcion = ComunaDaoImp::ListarTodas();
                                                foreach ($opcion as $value) {
                                                    echo "<option> $value </option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-xs-6">
                                            <label for="dateNacimiento">Fecha Nacimiento</label>
                                            <input type="date" class="form-control" name="dateNacimiento" id="dateNacimiento" required>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="dropEstadoCivil">Estado Civil</label>
                                            <select class="form-control" name="dropEstadoCivil">
                                                <option value="" disabled="" selected="true">Seleccionar...</option>
                                                <?php
                                                include_once '../Dao/EstadoCivilDaoImp.php';
                                                $opcion = EstadoCivilDaoImp::Listar();
                                                foreach ($opcion as $value) {
                                                    echo "<option> $value </option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group pl-2">
                                            <label class="form-row">Sexo</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radioSexo" id="radioSexo" value="M">
                                                <label class="form-check-label" for="inlineRadio1">Masculino</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radioSexo" id="radioSexo" value="F">
                                                <label class="form-check-label" for="inlineRadio2">Femenino</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-xs-6">
                                            <label for="dropEducacion">Educación</label>
                                            <select class="form-control" name="dropEducacion">
                                                <option value="" disabled="" selected="true">Seleccionar...</option>
                                                <?php
                                                include_once '../Dao/EducacionDaoImp.php';
                                                $opcion = EducacionDaoImp::Listar();
                                                foreach ($opcion as $value) {
                                                    echo "<option> $value </option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="dropRenta">Renta</label>
                                            <select class="form-control" name="dropRenta">
                                                <option value="" disabled="" selected="true">Seleccionar...</option>
                                                <?php
                                                include_once '../Dao/RentaDaoImp.php';
                                                $opcion = RentaDaoImp::Listar();
                                                foreach ($opcion as $value) {
                                                    echo "<option> $value </option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="txtSueldoLiquido">Sueldo Líquido</label>
                                            <input type="text" class="form-control" name="txtSueldoLiquido" id="txtSueldoLiquido" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-xs-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="ON" id="checkHijos" name="checkHijos">
                                                <label class="form-check-label" for="checkHijos">Hijos</label>
                                            </div> 
                                        </div>

                                        <div class="float-left pl-2">Cantidad</div>
                                        <div class="float-right pl-2 col-2">
                                            <input disabled="disabled" class="form-control" type="text" id="txtHijos" name="txtHijos" />
                                        </div>
                                        <div class="form-check pl-5">
                                            <input class="form-check-input" type="checkbox" value="ON" id="checkEnfermedad" value="ON">
                                            <label class="form-check-label" for="checkEnfermedad">Padece Enfermedades Crónicas</label>
                                        </div> 
                                    </div>

                                    <div align="center">
                                        <input type="submit" class="btn btn-success" value="Postular" name="btnPostular" />
                                    </div>
                            </div>
                            </form>


                        </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</html>
