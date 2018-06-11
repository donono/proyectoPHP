<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" href="css/style.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <!-- font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />

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
                <div class="col-12">
                    <div class="container col-6">


                        <form action="s_login.php" method="POST">
                            <div class="form-group col-10">
                                <label for="txtRut">Rut</label>
                                <a clas="fa fas-user-alt"><input type="text" class="form-control" name="txtRut" id="txtRut" aria-describedby="rutHelp" placeholder="14.197.443-5" required>
                                    <small id="rutHelp" class="form-text text-muted">El rut debe estar sin puntos ni guión.</small>
                            </div>
                            <div class="form-group col-10">
                                <label for="txtContraseña">Contraseña</label>
                                <input type="password" class="form-control" name="txtContraseña" id="txtContraseña" placeholder="clave.123" required>
                            </div>
                            <div class="col-10">
                                <button type="submit" class="btn btn-primary float-right">Ingresar</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</html>
