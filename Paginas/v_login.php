<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" href="css/style.css" rel="stylesheet"/>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <!-- font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        <script type="text/javascript">
            function badLogin() {
                swal({
                    title: "Error!",
                    text: "Usuario o contraseña incorrecta!",
                    icon: "error",
                    button: "Cerrar"
                });
            }
            function badRut() {
                swal({
                    title: "Error!",
                    text: "El usuario no existe!",
                    icon: "error",
                    button: "Cerrar"
                });
            }
        </script>
    </head>
    <body>
        <br><br><br>  
        <div class="container image">
            <div class="container pt-2 outer-div">
                <div class="container col-12 pl-5">
                    <form action="s_login.php" method="POST">
                        <img class="logo"></img>
                        <div class="form-row">
                            <div class="form-group col-10">
                                <i class="far fa-user"></i>&nbsp;<label for="txtRut">Rut</label>
                                <input type="text" class="form-control" name="txtRut" id="txtRut" aria-describedby="rutHelp" placeholder="14.197.443-5" required>
                                <small id="rutHelp" class="form-text text-muted">El rut debe estar sin puntos ni guión.</small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-10">
                                <i class="fas fa-key"></i>&nbsp;<label for="txtContraseña">Contraseña</label>
                                <input type="password" class="form-control" name="txtContraseña" id="txtContraseña" placeholder="clave.123" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div style="align-items: center;">
                                <button type="submit" class="btn btn-outline-primary ml-1">Ingresar</button>
                            </div>
                        </div>
                        <br>
                        <div class="form-row text-center">
                            <div class="col-10 pl-5">
                                <p style="float:left;">¿Nuevo en DAICREDIT?&nbsp;
                                    <a style="text-align: right;" href="v_RegistrarUsuario.php">
                                        Crear una cuenta.
                                    </a>
                                </p>
                            </div>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</html>
