<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" href="css/style_4.css" rel="stylesheet"/>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <!-- font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <!-- FONT  -->
        <link href='https://fonts.googleapis.com/css?family=Barlow+Condensed:700' rel='stylesheet' type='text/css'>

        <!-- JS -->
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script type="text/javascript">
            function badRegister() {
                swal({
                    title: "Error!",
                    text: "Usuario o contraseña incorrecta!",
                    icon: "error",
                    button: "Cerrar"
                });
            }

            function ExitoRegister() {
                swal({
                    title: 'Exito!',
                    text: "Se ha registrado",
                    icon: "success",
                    button: "Cerrar"
                });
            }
            function checkRut() {
                if (document.getElementById('txtRut').value.length < 8)
                {
                    document.getElementById('lenghtRut').style.color = 'red';
                    document.getElementById('lenghtRut').innerHTML = 'rut invalido';
                    $('#btnRegistrar').attr('disabled', true);
                } else {
                    document.getElementById('lenghtRut').innerHTML = '';
                }
            }
            ;

            $(document).on('keyup', '#txtRut', function () {
                var rut = $(this).val();
                if (rut != "") {
                    validarRut(rut);
                }
            });

            function validarRut(rut) {
                $.ajax({
                    url: "s_ValidarRut.php",
                    type: 'POST',
                    data: {'txtRut': rut},
                    dataType: 'JSON',
                    success: Respustafunction,
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
                    }
                }
                );
            }

            function Respustafunction(response) {
                if (response.d === '1') {
                    swal('El rut ingresado ya existe!', '', 'warning');
                } else {
                    console.log(response.d);
                }
            }

            $(document).ready(function () {
                $('#btnRegistrar').attr('disabled', true);
            });

            function check() {
                //no desencadenar el aviso si el campo esta vacio
                if (document.getElementById('txtContrasena').value !== "") {
                    //validar que el largo de la contraseña no sea menor a 8
                    if (document.getElementById('txtContrasena').value.length < 8)
                    {
                        document.getElementById('lenght').style.color = 'red';
                        document.getElementById('lenght').innerHTML = 'contraseña muy corta';
                        $('#btnRegistrar').attr('disabled', true);
                    } else {
                        document.getElementById('lenght').innerHTML = '';
                    }
                    //validar claves iguales
                    if (document.getElementById('txtContrasena').value ===
                            document.getElementById('txtConfirmarContrasena').value) {
                        document.getElementById('confirm').style.color = 'green';
                        $('#btnRegistrar').attr('disabled', false);

                    } else {
                        document.getElementById('confirm').style.color = 'red';
                        $('#btnRegistrar').attr('disabled', true);
                    }
                }
            }
            ;
        </script>
    </head>
    <body>
        <br><br><br>  
        <div class="container image">
            <div class="container pt-2 outer-div">
                <div class="container col-12 pl-5">
                    <form action="s_RegistrarUsuario.php" method="POST">
                        <br><br>
                        <div class="form row">
                            <div class="form-group col-11">
                                <span class="fa fa-R"></span>&nbsp;<label class="text-muted" for="txtRut">DNI</label>&nbsp;<span id="lenghtRut"></span>
                                <input type="text" class="form-control form-control-sm" name="txtRut" id="txtRut" aria-describedby="rutHelp" placeholder="14.197.443-5" required onkeyup='checkRut();'>
                                <small id="rutHelp" class="form-text text-muted">El rut debe estar sin puntos ni guión.</small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-11">
                                <span class="fa fa-N"></span>&nbsp;<label class="text-muted" for="txtNombre">Name</label>
                                <input type="text" class="form-control form-control-sm" name="txtNombre" id="txtNombre" placeholder="Alex" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-11">
                                <span class="fa fa-AP"></span></i>&nbsp;<label class="text-muted" for="txtPaterno">Last name</label>
                                <input type="text" class="form-control form-control-sm" name="txtPaterno" id="txtPaterno" placeholder="Smith" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-11">
                                <span class="fa fa-AM"></span>&nbsp;<label class="text-muted" for="txtMaterno">Second last name</label>
                                <input type="text" class="form-control form-control-sm" name="txtMaterno" id="txtMaterno" placeholder="Sepulveda" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-11">
                                <span class="fa fa-C"></span>&nbsp;<label class="text-muted" for="txtContrasena">Password</label>&nbsp;<span id="lenght"></span>
                                <input type="password" class="form-control form-control-sm" name="txtContrasena" id="txtContrasena" placeholder="contraseña" required onkeyup='check();'>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-11">
                                <span class="fa fa-RC" id="confirm"></span>&nbsp;<label class="text-muted" for="txtConfirmarContrasena">confirm password</label>
                                <input type="password" class="form-control form-control-sm" name="txtConfirmarContrasena" id="txtConfirmarContrasena" placeholder="contraseña" required onkeyup='check();'>
                            </div>
                        </div>

                        <br>
                        <div class="pr-5" align="center">
                            <input type="submit" class="btn btn-outline-primary" value="Registrar" name="btnRegistrar" id="btnRegistrar"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <!-- JS -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</html>
