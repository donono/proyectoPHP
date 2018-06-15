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
            $dto = new PostulanteDto();
            $solicitud = new SolicitudDto();

            $dto = $_SESSION["salida"];
            $dtoSolicitud = $_SESSION["solicitud"];
            ?>
            <form action="s_ModificarSolicitud.php" method="POST">
                <table>
                    <tbody>

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
                                    <option value="<?php $textoComuna; ?>" disabled="" selected="true">Seleccionar...</option>
                                    <?php
                                    include_once '../Dao/ComunaDaoImp.php';
                                    $opcionC = ComunaDaoImp::ListarTodas();
                                    foreach ($opcionC as $valueC) {
                                        echo "<option> $valueC </option>";
                                    }
                                    ?>
                                </select></td>
                        </tr>

                        <tr>
                            <td>Fecha Nacimiento: <input type="date" class="form-control" name="dateNacimiento" id="dateNacimiento" required
                                                         value="<?php $dto->getFechaNacimiento(); ?>"></td>

                            <td>Educación: <select class="form-control" name="dropEducacion" id="dropEducacion">

                                    <?php
                                    $idEducacion = $dto->getEducacion();
                                    $textoEducacion = EducacionDaoImp::IdToText($idEducacion);
                                    ?>

                                    <option value="<?php $textoEducacion; ?>" disabled="" selected="true">Seleccionar...</option>
                                    <?php
                                    include_once '../Dao/EducacionDaoImp.php';
                                    $opcionEd = EducacionDaoImp::Listar();
                                    foreach ($opcionEd as $valueE) {
                                        echo "<option> $valueE </option>";
                                    }
                                    ?>
                                </select></td>
                        </tr>

                        <tr>
                            <td>
                                <?php $sexo = $dto->getSexo(); ?>

                                Sexo: <?php echo $dto->getSexo(); ?>

                                <?php if ($sexo == "M") {
                                    ?>
                                    M
                                    <input type = "radio" name = "radioSexo" value= "M" checked="true" />
                                    F
                                    <input type = "radio" name = "radioSexo" value= "F" checked="false" />

                                    <?php
                                }
                                ?>

                                <?php if ($sexo == "F") {
                                    ?>
                                    M
                                    <input type = "radio" name = "radioSexo" value= "M" checked="false" />
                                    F
                                    <input type = "radio" name = "radioSexo" value= "F" checked="true" />

                                    <?php
                                }
                                ?>
                            </td>

                            <td>Renta: <select class="form-control" name="dropRenta" id="dropRenta">

                                    <?php
                                    $idRenta = $dto->getRenta();
                                    $textoRenta = RentaDaoImp::IdToText($idRenta);
                                    ?>
                                    <option value="<?php $textoRenta; ?>" disabled="" selected="true">Seleccionar...</option>
                                    <?php
                                    include_once '../Dao/RentaDaoImp.php';
                                    $opcionR = RentaDaoImp::Listar();
                                    foreach ($opcionR as $valueR) {
                                        echo "<option> $valueR </option>";
                                    }
                                    ?>
                                </select></td>
                        </tr>

                        <tr>
                            <td>Estado Civil: <select class="form-control" name="dropEstadoCivil" id="dropEstadoCivil">

                                    <?php
                                    $idEstado = $dto->getEstadoCivil();
                                    $textoEstado = EstadoCivilDaoImp::IdToText($idEstado);
                                    ?>
                                    <option value="<?php $textoEstado; ?>" disabled="" selected="true">Seleccionar...</option>
                                    <?php
                                    include_once '../Dao/EstadoCivilDaoImp.php';
                                    $opcionEs = EstadoCivilDaoImp::Listar();
                                    foreach ($opcionEs as $valueEs) {
                                        echo "<option> $valueEs </option>";
                                    }
                                    ?>
                                </select></td>
                            <td>Sueldo Líquido: <input type="text" name="txtSueldo" value="<?php echo $dto->getSueldo(); ?>" /></td>
                        </tr>

                        <tr>
                            <td>Hijos: <input type="text" name="txtHijos" value="<?php echo $dto->getHijos(); ?>" /></td>

                            <td>
                                <?php $enfermedad = $dto->getEnfermedad(); ?>

                                <?php if ($enfermedad == 0) {
                                    ?>
                                    Enfermedad
                                    <input type = "checkbox" name = "checkEnfermedad" value= "0" checked="" />

                                    <?php
                                }
                                ?>
                                <?php if ($enfermedad == 1) { ?>
                                    Enfermedad
                                    <input type = "checkbox" name = "checkEnfermedad" value= "1" checked="true" />
                                <?php } ?>
                            </td>

                        </tr>



                        <tr>
                            <td>

                                <?php $estado = SolicitudDaoImp::MostrarEstadoPorRut($dto->getRut()); ?>

                                <?php if ($estado == 1) {
                                    ?>
                                    Pendiente
                                    <input type = "radio" name = "radioEstado" value= "1" checked="true" />
                                    Aprobar
                                    <input type = "radio" name = "radioEstado" value= "2" checked="false" />
                                    Rechazar
                                    <input type = "radio" name = "radioEstado" value= "3" checked="false" />
                                    <?php
                                }
                                ?>

                                <?php if ($estado == 2) {
                                    ?>
                                    Pendiente
                                    <input type = "radio" name = "radioEstado" value= "1" checked="false" />
                                    Aprobar
                                    <input type = "radio" name = "radioEstado" value= "2" checked="true" />
                                    Rechazar
                                    <input type = "radio" name = "radioEstado" value= "3" checked="false" />
                                    <?php
                                }
                                ?>

                                <?php if ($estado == 3) {
                                    ?>
                                    Pendiente
                                    <input type = "radio" name = "radioEstado" value= "1" checked="false" />
                                    Aprobar
                                    <input type = "radio" name = "radioEstado" value= "2" checked="false" />
                                    Rechazar
                                    <input type = "radio" name = "radioEstado" value= "3" checked="true" />
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type ="hidden" name="rutModificar" value="<?php echo $dto->getRut(); ?>"/>
                                <input type="submit" value="Actualizar" name="btnActualizar" value="" />
                            </td>
                        </tr>
                    <?php } ?> 
                </tbody>
            </table>
        </form>


    </body>

</html>