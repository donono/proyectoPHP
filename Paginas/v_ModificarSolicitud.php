<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <h2>Detalle de Postulante y Solicitud</h2>
    <body>
        <?php
        include_once '../Dto/PostulanteDto.php';
        include_once '../Dao/PostulanteDaoImp.php';
        include_once '../Dao/ComunaDaoImp.php';
        include_once '../Dao/EducacionDaoImp.php';
        include_once '../Dao/EstadoCivilDaoImp.php';
        include_once '../Dao/RentaDaoImp.php';

        if (isset($_SESSION["salida"])) {
            ?>

            <table>
                <tbody>
                    <?php foreach ($_SESSION["salida"] as $dto) { ?>
                        <tr>
                            <td>Rut: <input type="text" name="txtRut" value="<?php echo $dto->getRut(); ?>" /></td>
                            <td>Teléfono: <input type="text" name="txtTelefono" value="<?php echo $dto->getTelefono(); ?>" /></td>
                        </tr>

                        <tr>
                            <td>Nombre: <input type="text" name="txtNombre" value="<?php echo $dto->getNombre(); ?>" /></td>
                            <td>Email: <input type="text" name="txtEmail" value="<?php echo $dto->getEmail(); ?> " /></td>
                        </tr>

                        <tr>
                            <td>Apellido Paterno: <input type="text" name="txtPaterno" value="<?php echo $dto->getAp_paterno(); ?>" /></td>
                            <td>Dirección: <input type="text" name="txtDireccion" value="<?php echo $dto->getDireccion(); ?>" /></td>
                        </tr>

                        <tr>
                            <td>Apellido Materno: <input type="text" name="txtMaterno" value="<?php echo $dto->getAp_materno(); ?>" /></td>
                            <td>Comuna: 
                                <select  name="dropComuna" id="dropComuna">
                                    <?php
                                    $idComuna = $dto->getComuna();
                                    $textoComuna = ComunaDaoImp::IdToText($idComuna);
                                    ?>
                                    <option value="<?php $textoComuna ?>" disabled="" selected="true">Seleccionar...</option>
                                    <?php
                                    include_once '../Dao/ComunaDaoImp.php';
                                    $opcion = ComunaDaoImp::ListarTodas();
                                    foreach ($opcion as $value) {
                                        echo "<option> $value </option>";
                                    }
                                    ?>
                                </select></td>
                        </tr>

                        <tr>
                            <td>Fecha Nacimiento: <input type="date" class="form-control" name="dateNacimiento" id="dateNacimiento" required></td>
                            <td>Educación: <select class="form-control" name="dropEducacion">
                                    <option value="" disabled="" selected="true">Seleccionar...</option>
                                    <?php
                                    include_once '../Dao/EducacionDaoImp.php';
                                    $opcion = EducacionDaoImp::Listar();
                                    foreach ($opcion as $value) {
                                        echo "<option> $value </option>";
                                    }
                                    ?>
                                </select></td>
                        </tr>

                        <tr>
                            <td>Sexo: <?php echo $dto->getSexo(); ?></td>
                            <td>Renta:                                                 <select class="form-control" name="dropRenta">
                                    <option value="" disabled="" selected="true">Seleccionar...</option>
                                    <?php
                                    include_once '../Dao/RentaDaoImp.php';
                                    $opcion = RentaDaoImp::Listar();
                                    foreach ($opcion as $value) {
                                        echo "<option> $value </option>";
                                    }
                                    ?>
                                </select></td>
                        </tr>

                        <tr>
                            <td>Estado Civil: <select class="form-control" name="dropEstadoCivil">
                                    <option value="" disabled="" selected="true">Seleccionar...</option>
                                    <?php
                                    include_once '../Dao/EstadoCivilDaoImp.php';
                                    $opcion = EstadoCivilDaoImp::Listar();
                                    foreach ($opcion as $value) {
                                        echo "<option> $value </option>";
                                    }
                                    ?>
                                </select></td>
                            <td>Sueldo Líquido: <input type="text" name="txtSueldo" value="<?php echo $dto->getSueldo(); ?>" /></td>
                        </tr>

                        <tr>
                            <td>Hijos: <input type="text" name="txtHijos" value="<?php echo $dto->getHijos(); ?>" /></td>
                            <td>Enfermedad: <?php echo $dto->getEnfermedad(); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        <?php } ?>
    </body>
</html>