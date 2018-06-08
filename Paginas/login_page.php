<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" href="css/style.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <script  src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script> 
        <script  src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>

        <!-- sweetAlert-->
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


                        <form action="login_servlet.php" method="POST">
                            <div class="form-group col-10">
                                <label for="txtRut">Rut</label>
                                <input type="text" class="form-control" name="txtRut" id="txtRut" aria-describedby="rutHelp" placeholder="14.197.443-5" required>
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

        <script src="https://unpkg.com/vue"></script>
        <script src="https://unpkg.com/vue-resource"></script>

        <!--validaciones-->
        <script src="vuelidate/dist/vuelidate.min.js"></script>

    </body>
</html>
