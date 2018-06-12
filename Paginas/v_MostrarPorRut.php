<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>

        <link type="text/css" rel="stylesheet" href="css/style_1.css"/>
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

        <div class="container image">
            <div class="container pt-5">
                <div class="col-8">
                    <div class=" col-12 pt-5">
                        <br><br>
                        <?php
                        include_once '../Dto/PostulanteDto.php';
                        include_once '../Dao/PostulanteDaoImp.php';
                        include_once '../Dao/ComunaDaoImp.php';
                        include_once '../Dao/EducacionDaoImp.php';
                        include_once '../Dao/EstadoCivilDaoImp.php';
                        include_once '../Dao/RentaDaoImp.php';
                        if (isset($_SESSION["salida"])) {
                            $dto = new PostulanteDto();
                            $dto = $_SESSION["salida"];
                            ?>
                        <a href="v_MostrarTodas.php"><i class="fas fa-chevron-circle-left fa-3x"></i></a>
                            <table class="table">
                                <thead class="thead-dark">
                                <h1 align="center">Ficha Postulante</h1>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center"><p><strong>Rut: <?php echo $dto->getRut(); ?></strong></p></td>
                                        <td align="center"><p><strong>Teléfono: <?php echo $dto->getTelefono(); ?></strong></p></td>
                                    </tr>

                                    <tr>
                                        <td align="center"><p><strong>Nombre: <?php echo $dto->getNombre(); ?></strong></p></td>
                                        <td align="center"><p><strong>Email: <?php echo $dto->getEmail(); ?></strong></p></td>
                                    </tr>

                                    <tr>
                                        <td align="center"><p><strong>Apellido Paterno: <?php echo $dto->getAp_paterno(); ?></strong></p></td>
                                        <td align="center"><p><strong>Dirección: <?php echo $dto->getDireccion(); ?></strong></p></td>
                                    </tr>

                                    <tr>
                                        <td align="center"><p><strong>Apellido Materno: <?php echo $dto->getAp_materno(); ?></strong></p></td>
                                        <td align="center"><p><strong>Comuna: <?php echo ComunaDaoImp::IdToText($dto->getComuna()); ?></strong></p></td>
                                    </tr>

                                    <tr>
                                        <td align="center"><p><strong>Fecha Nacimiento: <?php echo $dto->getFechaNacimiento(); ?></strong></p></td>
                                        <td align="center"><p><strong>Educación: <?php echo EducacionDaoImp::IdToText($dto->getEducacion()); ?></strong></p></td>
                                    </tr>

                                    <tr>
                                        <td align="center"><p><strong>Sexo: <?php echo $dto->getSexo(); ?></strong></p></td>
                                        <td align="center"><p><strong>Renta: <?php echo RentaDaoImp::IdToText($dto->getRenta()); ?></strong></p></td>
                                    </tr>

                                    <tr>
                                        <td align="center"><p><strong>Estado Civil: <?php echo EstadoCivilDaoImp::IdToText($dto->getEstadoCivil()); ?></strong></p></td>
                                        <td align="center"><p><strong>Sueldo Líquido: <?php echo $dto->getSueldo(); ?></strong></p></td>
                                    </tr>

                                    <tr>
                                        <td align="center"><p><strong>Hijos: <?php
                                                    if ($dto->getHijos() == 0) {
                                                        echo "NO";
                                                    } else {
                                                        echo $dto->getHijos();
                                                    }
                                                    ?>
                                                </strong></p></td>
                                        <td align="center"><p><strong>Padece alguna enfermedad cronica: <?php
                                                    if ($dto->getEnfermedad() == 1) {
                                                        echo "si";
                                                    } else {
                                                        echo "no";
                                                    }
                                                    ?>
                                                </strong></p></td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
