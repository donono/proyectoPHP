<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" href="css/style.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


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
                                <input type="text" class="form-control" id="txtRut" aria-describedby="rutHelp" placeholder="14.197.443-5" required>
                                <small id="rutHelp" class="form-text text-muted">El rut debe estar sin puntos ni guión.</small>
                            </div>
                            <div class="form-group col-10">
                                <label for="txtContraseña">Contraseña</label>
                                <input type="password" class="form-control" id="txtContraseña"  placeholder="clave.123" required>
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
<script>
    var vm = new Vue({
        el: '#SEL',
        data: {
            rut: '',
            contrasena: 0
        },
        methods: {
            enviar: function () {
                //utilizamos resource para enviar los datos, aquí indicamos a quien enviamos y que.     
                this.$http.post('login_servlet.php', {

                    rut: this.rut,
                    contrasena: this.contrasena

                }).then(function () {

                    this.rut = '';
                    this.contrasena = '';
                });
            },

            validations: {
                rut: {
                    required,
                    isUnique(value) {
                        // standalone validator ideally should not assume a field is required
                        if (value === '')
                            return true

                        // simulate async call, fail for all logins with even length
                        return new Promise((resolve, reject) => {
                            setTimeout(() => {
                                resolve(typeof value === 'string' && value.length % 2 !== 0);
                            }, 350 + Math.random() * 300);
                        });
                    }
                }
            }
        }
    }
    });

</script>