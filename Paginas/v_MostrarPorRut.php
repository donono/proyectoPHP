<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Reservas Por Rut</h2>
        <div>
            <form action="s_MostrarPorRut.php" method="POST">
                <table border="0">
                    <tbody>
                        <tr>
                            <td>Rut</td>
                            <td><input type="text" name="txtRut" value="" /></td>
                        </tr>
                    </tbody>
                </table>
                <input type="submit" value="Buscar" name="btnBuscar" />
            </form>
        </div>

        <?php
        include_once '../Dto/PostulanteDto.php';
        include_once '../Dao/ComunaDaoImp.php';
        include_once '../Dao/EducacionDaoImp.php';
        include_once '../Dao/EstadoCivilDaoImp.php';
        include_once '../Dao/RentaDaoImp.php';
        if (isset($_SESSION["salida"])) {
            ?>
            <div class="col-8">
                <table class="table table-striped" id="tablaSalida" border="0">

                    <tbody>
                        <?php foreach ($_SESSION["salida"] as $dto) { ?>
                            <tr>
                                <td>Rut: <?php echo $dto->getRut(); ?></td>
                                <td> Teléfono: <?php echo $dto->getTelefono();?></td>
                            </tr>

                            <tr>
                                <td>Nombre: <?php echo $dto->getNombre(); ?></td>
                                <td>Email: <?php echo $dto->getEmail(); ?> </td>
                            </tr>

                            <tr>
                                <td>Apellido Paterno: <?php echo $dto->getAp_paterno(); ?></td>
                                <td>Dirección: <?php echo $dto->getDireccion();?></td>
                            </tr>

                            <tr>
                                <td>Apellido Materno: <?php echo $dto->getAp_materno();?></td>
                                <td>Comuna: <?php echo ComunaDaoImp::IdToText($dto->getComuna()); ?></td>
                            </tr>

                            <tr>
                                <td>Fecha Nacimiento: <?php echo $dto->getFechaNacimiento();?></td>
                                <td>Educación: <?php echo EducacionDaoImp::IdToText($dto->getEducacion());  ?></td>
                            </tr>

                            <tr>
                                <td>Sexo: <?php echo $dto->getSexo();?></td>
                                <td>Renta: <?php echo RentaDaoImp::IdToText($dto->getRenta()); ?></td>
                            </tr>

                            <tr>
                                <td>Estado Civil: <?php echo EstadoCivilDaoImp::IdToText($dto->getEstadoCivil()); ?></td>
                                <td>Sueldo Líquido: <?php echo $dto->getSueldo(); ?></td>
                            </tr>

                            <tr>
                                <td>Hijos: <?php echo $dto->getHijos(); ?></td>
                                <td>Enfermedad: <?php echo  $dto->getEnfermedad();?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>






    </body>
</html>
